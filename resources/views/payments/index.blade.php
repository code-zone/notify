@extends('layouts.app')
    @section('content')
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                    <div class="title">Payments</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="datatable table table-striped table-responsive" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Reg No</th>
                                                <th>Transaction Number</th>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Reg No</th>
                                                <th>Transaction Number</th>
                                                <th>Amount</th>
                                                <th>Date Paid</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{$payment->student->name}}</td>
                                                <td>{{$payment->student->email}}</td>
                                                <td>{{$payment->student->reg_no}}</td>
                                                <td>{{$payment->trn}}</td>
                                                <td>Ksh. {{number_format($payment->amount)}}</td>
                                                
                                                <td>{{$payment->created_at->format('d-m-Y')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    @endsection