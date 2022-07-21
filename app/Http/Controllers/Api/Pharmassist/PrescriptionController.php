<?php

namespace App\Http\Controllers\Api\Pharmassist;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionPricing;
use App\Models\PricingItem;
use App\Models\Pharmacy;
use App\Models\UploadPrescription;
use App\Models\StatusLog;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function getPrescriptions()
    {
        $access_token = request()->bearerToken();
        $pharmacy = Pharmacy::where('access_token', '=', $access_token)->first();
        if (!empty($pharmacy)) {
            $prescription = UploadPrescription::with('user', 'statuslog', 'prescriptionpricing.pricingitem')->where('pharmacy_id', '=', $pharmacy->id)->get();
            if ($prescription) {
                return response()->json([
                    'status' => true,
                    'data' => $prescription
                ], 200);
            } else {
                return response()->json([
                    'status' => FALSE,
                    'data' => '',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => FALSE,
                'msg' => 'unauthenticated',
            ], 405);
        }
    }

    public function prescriptionPricing(Request $request)
    {
        $pricing = new PrescriptionPricing;

        $pricing->user_id = $request->user_id;
        $pricing->pharmacy_id = $request->pharmacy_id;
        $pricing->upload_prescription_id = $request->prescription_id;
        $pricing->save();

        if ($request->medicine_name) {
            foreach ($request->medicine_name as $key => $item) {
                PricingItem::create([
                    'prescription_pricing_id' => $pricing->id,
                    'medicine_name' => $request->medicine_name[$key],
                    'medicine_qty' => $request->medicine_qty[$key],
                    'medicine_price' => $request->medicine_price[$key],
                ]);
            }
        }

        $status = new StatusLog;
        $status->upload_prescription_id = $request->prescription_id;
        $status->status = 'Pending Payment';
        $status->save();

        $update = UploadPrescription::where('id', '=', $request->prescription_id)->update([
            'status' => 'Pending Payment'
        ]);
        $data =  PrescriptionPricing::with('pricingitem', 'prescription.statuslog')->where('id', '=', $pricing->id)->get();

        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $data
        ]);
    }

    public function getSinglePharmacy()
    {
        $access_token = request()->bearerToken();
        $pharmacy = Pharmacy::where('access_token', '=', $access_token)->first();
        if ($pharmacy) {
            return response()->json([
                'status' => TRUE,
                'data' => $pharmacy,

            ], 200);
        } else {
            return response()->json([
                'status' => FALSE,
                'data' => '',
            ], 400);
        }
    }

    public function getSinglePrescription($id)
    {
        $prescription = uploadPrescription::with('statuslog', 'prescriptionpricing.pricingitem')->where('id', '=', $id)->first();
        if (!empty($prescription)) {
            return response()->json([
                'status' => true,
                'data' => $prescription
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => ''
            ], 400);
        }
    }

    public function pickupStatus(Request $request){
        $prescription = UploadPrescription::where('id','=',$request->prescription_id)->update([
            'status' => $request->status
        ]);

        if($prescription){

            $log = new StatusLog;
            $log->upload_prescription_id = $request->prescription_id;
            $log->status = $request->status;
            $log->save();
            return response()->json([
                'status' => true,
            ],200);
        }
        else{
            return response()->json([
                'status' => true,
            ], 200);
        }

    }
}
