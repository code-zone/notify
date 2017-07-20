<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::when(\Bouncer::allows('order-meals'), function ($query) {
            return $query->where('student_id', \Auth::user()->student->id);
        })->where('status', 'pending')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.view', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order               $order
     *
     * @return \Illuminate\Http\Response
     */
    public function approve(Order $order)
    {
        $order->update(['status' => 'Approved']);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order               $order
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        $orders = Order::where('status', 'Approved')
        ->when(\Bouncer::allows('order-meals'), function ($query) {
            return $query->where('student_id', \Auth::user()->student->id);
        })->when($request->has('from'), function ($query) use ($request) {
            return $query->where('created_at', '>=', $request->get('from'));
        })->when($request->has('to'), function ($query) use ($request) {
            return $query->where('created_at', '<=', $request->get('to'));
        })->get();

        return view('orders.sales', compact('orders'));
    }
}
