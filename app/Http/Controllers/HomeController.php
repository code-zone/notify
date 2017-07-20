<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::when(\Bouncer::allows('order-meals'), function ($query) {
            return $query->where('student_id', \Auth::user()->student->id);
        })->where('status', 'pending')->count();
         $sales = Order::when(\Bouncer::allows('order-meals'), function ($query) {
            return $query->where('student_id', \Auth::user()->student->id);
        })->where('status', 'approved')->sum('amount');
        return view('home', compact('orders', 'sales'));
    }
}
