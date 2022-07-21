<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order= Order::all();
        return view('Admin.Order.index',compact('order'));
    }

    public function details($id){
        $details= Order::find($id);
        return view('Admin.Order.detail',compact('details'));
    }

			public function getPharmacyOrder(){
	    $access_token= request()->bearerToken();
	    $pharmacy= Pharmacy::where('access_token','=',$access_token)->first();
	    if(!empty($pharmacy)){
	            $order= Order::where('pharmacy_id','=',$pharmacy->id)->get();
	           if($order){
	                return response()->json([
											'status' => true,
											'data' => $order,
									],200);
	           }
						 else{
                   return response()->json([
											'status' => false,
											'data' => '',
									],404);
						 }
	    }
			else{
				return response()->json([
											'status' => false,
											'msg' => 'unauthenticated',
									],401);
			}
	}

	public function getCustomerOrder(){
		 $access_token= request()->bearerToken();
	    $user= User::where('access_token','=',$access_token)->first();
	    if(!empty($pharmacy)){
	            $order= Order::where('pharmacy_id','=',$pharmacy->id)->get();
	           if($order){
	                return response()->json([
											'status' => true,
											'data' => $order,
									],200);
	           }
						 else{
                   return response()->json([
											'status' => false,
											'data' => '',
									],404);
						 }
	    }
			else{
				return response()->json([
											'status' => false,
											'msg' => 'unauthenticated',
									],401);
			}
	}

}
