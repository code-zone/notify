<?php

namespace App\Http\Controllers;

use Bouncer;
use App\Student;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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
        $payments = Payment::when(Bouncer::allows('order-meals'), function ($query) {
            return $query->where('student_id', \Auth::user()->student->id);
        })->get();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Student $student)
    {
        return view('payments.modals.addPayment', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        $this->validate($request, ['amount' => 'required|numeric|min:0', 'trn' => 'required|unique:payments,trn'], ['trn.unique' => 'The transaction numeber is invalid']);
        $payment = $student->payments()->create($request->input());
        if ($account = $student->account) {
            $amount = $payment->amount + $account->current_amount;
            $account->update(['current_amount' => $amount]);

            return back();
        }
        $student->account()->create(['current_amount' => $payment->amount]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Payment $payment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Payment $payment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment             $payment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Payment $payment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
    }
}
