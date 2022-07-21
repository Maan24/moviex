<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PricingItem;
use App\Models\StatusLog;
use App\Models\UploadPrescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function makePayment(Request $request)
    {
        $order= new Order;
        $order->user_id = $request->user_id;
        $order->upload_prescription_id = $request->prescription_id;
        $order->pharmacy_id = $request->pharmacy_id;
        $order->total_amount = $request->total_amount;
        $order->order_placed = Carbon::now()->toDateTimeString();
        $order->payment_status = 'paid';
        $order->delivery_status = 'out for delivery';
        $order->save();

        if($order){
            if($request->item_name){
                foreach($request->item_name as $key => $value){
                    OrderItem::create([
                        'order_id' => $order->id,
                        'item_name' => $request->item_name[$key],
                        'quantity' => $request->quantity[$key],
                        'price' => $request->price[$key]
                    ]);
                }
            }
        }

        $prescription= UploadPrescription::where('id','=',$request->prescription_id)->update([
            'status' => 'Prescription is being Filled'
        ]);

        $log = new StatusLog;
        $log->upload_prescription_id= $request->prescription_id;
        $log->status= 'Prescription is being Filled';
        $log->save();

        $placed= Order::with('orderitem')->where('user_id','=',$request->user_id)->first();
        return response()->json([
            'status' => true,
            'msg' => 'Order placed successfully!',
            'data' => $placed
        ],200);
    }

	public function cancelOrder(Request $request)
	{
		$prescription = UploadPrescription::where('id', '=', $request->prescription_id)->update([
			'status' => 'Cancel'
		]);
		return response()->json([
			'status' => true,
			'msg' => 'Prescription cancelled'
		], 200);

	}

	public function deleteItem(Request $request)
	{
		$item = PricingItem::where('id', '=', $request->item_id)->delete();

		return response()->json([
			'status' => true,
			'msg' => 'Item removed'
		], 200);

	}
}
