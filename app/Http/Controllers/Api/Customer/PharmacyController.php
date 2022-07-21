<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function getPharmacy(){
        $pharmacy = Pharmacy::all();
        return response()->json([
            'status' => TRUE,
            'data' => $pharmacy,
            'code' => 200
        ]);
    }

    public function getSingleCustomer(Request $request)
    {
        $access_token = request()->bearerToken();
        $customer = User::where('access_token', '=', $access_token)->first();
        if ($customer) {
            return response()->json([
                'status' => TRUE,
                'data' => $customer,

            ], 200);
        } else {
            return response()->json([
                'status' => FALSE,
                'data' => '',
            ], 400);
        }
    }
}

