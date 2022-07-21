<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Mail\Support;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginCustomer(Request $request){

        $validator = Validator::make($request->all(),[
            'email'=> 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
        else{
            if(!Auth::attempt($request->only('email','password'))){
                return response()->json([
                    'status' => false,
                    'code' => 400,
                    'error' => 'The email or password you entered is incorrect'
                ]);
            }
            else{
                $user = Auth::user();
                return response()->json([
                    'status' => TRUE,
                    'message' => 'Login Successfully!',
                    'code' => 200,
                    'data' => $user
                ]);
            }
        }

    }

    public function contactSupport(Request $request){
        $contact = new Contact;
        $contact->user_id = $request->user_id;
        $contact->upload_prescriptions_id  = $request->prescription_id;
        $contact->message = $request->message;
        $contact->save();

        if($contact->user_id != ''){
            $name= $contact->user->username;
            $email = $contact->user->email;
            $phone = $contact->user->phone;
            $prescription = $contact->prescription->prescription_name;
            $pharmacy = $contact->prescription->pharmacy->pharmacy_name;
            $message = $request->message;
        }
        else{
            $name = $contact->prescription->pharmacy->pharmacy_name;
            $email = $contact->prescription->pharmacy->email;
            $phone = $contact->prescription->pharmacy->phone;
            $prescription= $contact->prescription->prescription_name;
            $message = $request->message;
        }


        $support = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'prescription' => $prescription ,
            'pharmacy' =>  $pharmacy ?? '',
            'message' => $message,
        ];

        Mail::to('rehman30912@gmail.com')->send(new Support($support));

        return response()->json([
            'status' => true,
            'msg' => 'Your request has been recieved'
        ]);
    }
}

