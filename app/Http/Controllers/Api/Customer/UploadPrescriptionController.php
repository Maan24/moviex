<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionPricing;
use App\Models\UploadPrescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class UploadPrescriptionController extends Controller
{
    public function uploadPrescription(Request $request){
        $validator = Validator::make($request->all(),[
            'prescription_name' => 'required',
            'prescription_image' => 'required|mimes:png,jpg',
            'insurance_image' => 'required|mimes:png,jpg',
            'latitude' => 'required',
            'longitude' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'code' => 500,
                'error' => $validator->errors()
            ]);
        }
        else{

            $prescription = new UploadPrescription;
            $prescription->user_id = $request->user_id;
            $prescription->pharmacy_id = $request->pharmacy_id;
            $prescription->prescription_name = $request->prescription_name;

            if($request->file('prescription_image')){
                $file = $request->file('prescription_image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $move = $file->move('storage/prescription/',$filename);
                $gethost = $request->getSchemeAndHttpHost();
                $url = $gethost.'/'.$move;
                $prescription->prescription_image = $url;
            }

            if ($request->file('insurance_image')) {
                $file1 = $request->file('insurance_image');
                $filename1 = time() . '.' . $file1->getClientOriginalExtension();
                $move1 = $file1->move('storage/prescription/', $filename1);
                $gethost1 = $request->getSchemeAndHttpHost();
                $url1 = $gethost1 . '/' . $move1;
                $prescription->insurance_image = $url1;
            }
            $prescription->latitude = $request->latitude;
            $prescription->longitude = $request->longitude;
            $prescription->street = $request->street;
            $prescription->city = $request->city;
            $prescription->state = $request->state;
            $prescription->status = 'Pending Pricing';
            $prescription->save();


            return response()->json([
                'status' => true,
                'code' =>200,
                'message' => 'Prescription send wait for pricing',
                'data' => $prescription
            ]);
        }
    }

    public function getPricing($id){
        $pricing = PrescriptionPricing::with('pricingitem')->where('user_id','=',$id)->get();
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $pricing
        ]);
    }

    public function updatePrescriptionImage(Request $request){

        if($request->file('prescription_image')){
            $file = $request->file('prescription_image');
            $filename = $file->getClientOriginalName();
            $move = $file->move('storage/prescription',$filename);
            $host = $request->getSchemeAndHttpHost();
            $url = $host.'/pharmasist/'.$host;
        }

        $image= uploadPrescription::where('id','=',$request->prescription_id)->update([
            'prescription_image' => $url
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Updated successfully!'
        ],200);
    }

    // public function updatePricing(Request $request){
    //     $update= prescir
    // }

}
