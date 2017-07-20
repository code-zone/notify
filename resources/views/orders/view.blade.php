@extends('layouts.app')
	@section('content')
		<div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header hidden-print">
                        <div class="card-title">
                            <div class="title">Order</div>
                        </div>
                         @if($order->status == 'Approved')
                        <div class="pull-right card-action">
                            <div class="btn-group" role="group">
                                <button id="print" type="button" class="btn btn-link" ><i class="fa fa-print fa-lg"></i></button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
						<div class="row text-center">
				            <div class="col-md-4 col-sm-5">
				                <span class="fa-stack fa-lg fa-5x">
				                  <i class="fa fa-circle-thin fa-stack-2x"></i>
				                  <i class="fa fa-user fa-stack-1x"></i>
				                </span>
				                <h3>{{$order->student->name}}</h3>
				                <p><i class="fa fa-graduation-cap"></i> {{$order->student->reg_no}}</p>
				                <p> <i class="fa fa-usd"></i> <strong> Ksh. {{number_format($order->amount)}}</strong></p>
				            </div>
				            <div class="col-md-8 col-sm-7">
                                <div class="sub-title">Order Items for #{{$order->order_number}}</div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Meal</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($order->items as $key => $item)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$item->meal->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>Ksh. {{number_format($item->price) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                                            <td>Ksh. {{number_format($order->amount) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if($order->status == 'Pending')
                                @can('dispense-orders')
                                <div class="row"> 
						        	<a href="{{ route('orders.approve', $order->id) }}" class="btn btn-lg btn-success pull-right" >Approve Sale</a>
						        </div>
                                @endcan
						        @endif
				            </div>				           
				        </div>
                   	</div>
               	</div>
           	</div>
       	</div>
	@endsection
	@push('js')
	<script type="text/javascript">
		$('#print').click(function(e) {
			return window.print();
		})
	</script>
	@endpush