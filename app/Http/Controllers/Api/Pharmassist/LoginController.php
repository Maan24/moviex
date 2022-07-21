<?php

namespace App\Http\Controllers\Api\Pharmassist;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginPharmacy(Request $request)
    {
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validator->fails()){
            return response()->json([
                'status' => false,
                'code' => 500,
                'error' => $validator->errors()
            ]);
            }
            else{
                $loginHash = Pharmacy::where('email','=',$request->email)->first();
                $login= Pharmacy::where('email','=',$request->email)->count();
                if($login == 0){
                return response()->json([
                    'status' => false,
                    'code' => 400,
                    'error' => 'The email or password you entered is incorrect'
                ]);
                }
                elseif(!Hash::check($request->password, $loginHash->password ?? '')){
                return response()->json([
                    'status' => false,
                    'code' => 400,
                    'error' => 'The email or password you entered is incorrect'
                ]);
                }
                else{
                return response()->json([
                    'status' => TRUE,
                    'message' => 'Login Successfully!',
                    'code' => 200,
                    'data' => $loginHash
                ]);
                }
            }
    }
}
