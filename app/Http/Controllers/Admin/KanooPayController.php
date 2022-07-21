<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KanooPayController extends Controller
{
    public function payment(){
        return view('payment');
    }
}
