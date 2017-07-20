@extends('layouts.app')
    @section('content')
                     <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                    <div class="title">Orders</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Student Name</th>
                                                <th>Reg No</th>
                                                <th>Order Number</th>
                                                <th>Amount</th>
                                                <th>Order Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Student Name</th>
                                                <th>Reg No</th>
                                                <th>Order Number</th>
                                                <th>Amount</th>
                                                <th>Order Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->student->name}}</td>
                                                <td>{{$order->student->reg_no}}</td>
                                                <td>{{$order->order_number}}</td>
                                                <td>Ksh. {{number_format($order->amount)}}</td>
                                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-xs btn-primary"> View Order</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    @endsection