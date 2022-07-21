<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $totalorder= Order::count();
        $recent= Order::latest()->take(4)->get();
        $earning= Order::sum('total_amount');
        return view('Admin.Report.index',compact('totalorder','recent', 'earning'));
    }
}
