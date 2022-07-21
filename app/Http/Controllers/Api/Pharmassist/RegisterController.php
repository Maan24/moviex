<?php

namespace App\Http\Controllers\Api\Pharmassist;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function createPharmacy(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'pharmacy_name' => 'required',
            'email' => 'required|unique:pharmacies,email,$this->id,id',
            'password' => 'required',
            'pharmacy_image' => 'required|mimes:jpeg,jpg,png|max:2048',
            'phone' => 'required',
            'location' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'code' => 500,
                'error' => $validator->errors()
            ]);
        }
        else{
            $pharmacy= new Pharmacy;
            $pharmacy->pharmacy_name = $request->pharmacy_name;
            $pharmacy->email = $request->email;
            $pharmacy->password = Hash::make($request->password);
            $pharmacy->phone = $request->phone;
            $pharmacy->location = $request->location;
            if($request->file('pharmacy_image')){
                $file = $request->file('pharmacy_image');
                $filename = time().'.'.$file->getClientOriginalName();
                $move = $file->move('storage/pharmacy/', $filename);
                $host = $request->getSchemeAndHttpHost();
                $imageurl = $host.'/'.$move;
                $pharmacy->image = $imageurl;
            }
            $pharmacy->save();

            return response()->json([
                'status' => true,
                'message' => 'Pharmacy Registered successfully!',
                'code' => 200,
                'data' => $pharmacy
            ]);
        }

    }

    public function updatePharmacy(Request $request)
    {
        $pharmacy= Pharmacy::find($request->pharmacy_id);
        $pharmacy->pharmacy_name = $request->pharmacy_name ??  $pharmacy->pharmacy_name ;
        $pharmacy->email = $request->email ??  $pharmacy->email;
        $pharmacy->phone = $request->phone ??  $pharmacy->phone;
        $pharmacy->location = $request->location ??  $pharmacy->location;
        if ($request->file('pharmacy_image')) {
            $file = $request->file('pharmacy_image');
            $filename = time().'.'.$file->getClientOriginalName();
            $move = $file->move('storage/pharmacy/',$filename);
            $host = $request->getSchemeAndHttpHost();
            $imageurl = $host.'/pharmassist/'.$move;
            $pharmacy->image = $imageurl ??  $pharmacy->image;
        }
        $pharmacy->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully!',
            'data' => $pharmacy
        ],200);
    }
}
