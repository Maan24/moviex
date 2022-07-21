<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index(){
        $pharmacy = Pharmacy::all();
        return view('Admin.Pharmacy.index',compact('pharmacy'));
    }
}
