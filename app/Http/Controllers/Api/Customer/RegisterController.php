<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function CreateCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username,$this->id,id',
            'date_of_birth' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email,$this->id,id',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'code' => 500,
                'error' => $validator->errors()
            ]);
        } else {

            $customer = new User;
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->username = $request->username;
            $customer->date_of_birth = $request->date_of_birth;
            $customer->country = $request->country;
            $customer->phone = $request->phone;
            $customer->email  = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->insurance  = $request->insurance;
            if($request->file('user_image')){
                $file= $request->file('user_image');
                $filename= $file->getClientOriginalName();
                $move=  $file->move('storage/users/',$filename);
                $host = $request->getSchemeAndHttpHost();
                $imageurl = $host.'/pharmassist/'.$move;
                $customer->user_image = $imageurl;
            }
            $customer->access_token  = null;
            $customer->save();

            $token = $customer->createToken('customertoken')->plainTextToken;

            $tokens =  User::where('id', '=', $customer->id)->update([
                'access_token' => $token
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Customer created successfully!',
                'code' => 200,
                'data' => $customer
            ]);
        }
    }

    public function updateCustomer(Request $request){

            $customer = User::find($request->user_id);
            $customer->firstname = $request->firstname ?? $customer->firstname;
            $customer->lastname = $request->lastname ?? $customer->lastname;
            $customer->username = $request->username ?? $customer->username;
            $customer->date_of_birth = $request->date_of_birth ?? $customer->date_of_birth;
            $customer->country = $request->country ?? $customer->country;
            $customer->phone = $request->phone ?? $customer->phone;
            $customer->email  = $request->email ?? $customer->email;

             if($request->file('user_image')){
                $file = $request->file('user_image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $move = $file->move('storage/user/',$filename);
                $gethost = $request->getSchemeAndHttpHost();
                $url = $gethost.'/'.$move;
                $customer->user_image = $url ??  $customer->user_image;
            }

             if ($request->file('insurance_image')) {
                $file1 = $request->file('insurance_image');
                $filename1 = time().'.'.$file1->getClientOriginalExtension();
                $move1 = $file1->move('storage/user/',$filename1);
                $gethost1 = $request->getSchemeAndHttpHost();
                $url1 = $gethost1.'/'.$move1;
               $customer->insurance  = $url1;
            }

            $customer->save();

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Customer profile updated',
                'data' => $customer
            ]);
    }

    public function updatePassword(Request $request){

        if($request->user_type == 1){
            $customer =User::where('email','=',$request->email)->first();
            if(Hash::check($request->old_password,$customer->password)){
                $updatecustomer= User::where('email','=',$request->email)->update([
                    'password' => Hash::make($request->password)
                ]);

                return response()->json([
                    'status' => TRUE,
                    'msg' => 'Password updated successfully!'
                ],200);
            }
            else{
                return response()->json([
                    'status' => FALSE,
                    'msg' => 'Password does not match'
                ],400);
            }
        }
        else{
            $pharmacy = Pharmacy::where('email', '=', $request->email)->first();
            if (Hash::check($request->old_password, $pharmacy->password)) {
                $updatepharmacy= Pharmacy::where('email', '=', $request->email)->update([
                    'password' => Hash::make($request->password)
                ]);

                return response()->json([
                    'status' => TRUE,
                    'msg' => 'Password updated successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => FALSE,
                    'msg' => 'Password does not match'
                ], 400);
            }
        }
    }
}
