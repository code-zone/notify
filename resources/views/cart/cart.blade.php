@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Your Cart</div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('messages'))
                        <div class="row">
                            <div class="alert alert-{{session('messages.type')}} fresh-color alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span></button>
                                <strong>{{session('messages.title')}}!</strong> {{session('messages.message')}}.
                            </div>
                        </div>
                        @endif
                        <form method="post" action="{{ route('cart.place-order') }}">
                        {{csrf_field()}}
                        <ul class="list-group">
                        @php
                            $total = 0;
                        @endphp
                    	@foreach($items as $item)
                            @php
                                $total+=$item->meal->price;
                            @endphp          
                            <li class="list-group-item row">
                                <div class="col-xs-2">
                                    <img src="{{asset('images/'.$item->meal->image)}}" width="100" class="pull-left">
                                </div>
                                <div class="col-xs-9">
                                    <div class="row">
                                        <span class="username">{{$item->meal->name}}</span> 
                                        <strong>Ksh. {{$item->meal->price}}</strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            {{$item->meal->details}}
                                        </div>
                                        <div class="col-xs-4">
                                            <input value="1" type="text" name="item[{{$item->meal_id}}]" class="form-control">
                                        </div>
                                        <div class="col-xs-4">
                                            <a href="{{ route('cart.pop-item', $item->meal->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</a> 
                                        </div>
                                    </div>
                                </div>
                            </li>                                       
                        @endforeach

                        <li class="list-group-item row">
                        @if($items->count() == 0)
                            <strong class="h3 pull-left">Your Cart is Empty!! </strong>
                        @endif
                            <strong class="h3 pull-right"> Total Amount.   Ksh. {{ number_format($total) }}</strong>
                        </li>
                        @if($items->count() > 0)
                        </ul>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success pull-right">Place Order</button>
                        </div>
                        @endif
                        </form>
                    </div>
	            </div>
	        </div>
	    </div>
    @endsection