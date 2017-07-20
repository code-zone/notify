@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Available Meals</div>
                        </div>
                        @can('create-meals')
                        <div class="pull-right card-action">
                            <div class="btn-group" role="group">
                                <a class="btn btn-link" href="{{ route('meals.create') }}"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        @if(session('messages'))
                        <div class="row">
                            <div class="alert alert-success fresh-color alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span class="fa fa-close"></span>
                                </button>
                                <strong>{{session('messages.title')}}!</strong> {{session('messages.message')}}.
                            </div>
                        </div>
                        @endif
                    	@foreach($meals as $meal)
                    	<div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img style="height:200px !important; width: 100%;" src="{{asset('images/'.$meal->image)}}" class="img-responsive">
                                <div class="caption text-center">
                                    <h4 id="thumbnail-label">{{ucwords($meal->name)}}<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h4>
                                    <p>{{$meal->details}}</p>
                                    <strong>Ksh. {{number_format($meal->price)}}</strong>
                                    @can('update-meals')
                                    <p><a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-primary" ><i class="fa fa-pencil"></i></a> <a href="{{ route('meals.availability', $meal->id) }}" class="ajaxModal btn btn-info"><i class="fa fa-cog"></i></a> <a href="#" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a></p>
                                    @endcan
                                    @if($meal->available)
                                    @can('order-meals')
                                    @if(Auth::user()->student->cart->contains('meal_id', $meal->id))
                                        <p><a disabled href="{{ route('cart-item.add', $meal->id) }}" class="btn btn-block btn-info">Added to Cart</a></p>
                                    @else
                                        <p><a href="{{ route('cart-item.add', $meal->id) }}" class="btn btn-block btn-success">Add to Cart</a></p>
                                    @endif
                                    @endcan
                                    <p><a disabled href="#" class="btn btn-block btn-success">Available</a></p>
                                    @else
                                    <p><a disabled href="#" class="btn btn-block btn-warning">Not Available</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
	            </div>
	        </div>
	    </div>
    @endsection