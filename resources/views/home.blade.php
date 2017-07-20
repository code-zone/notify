@extends('layouts.app')

@section('content')
<div class="panel">
   <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Welcome to {{config('app.name')}}</div>
                                        <div class="description">A brief overview of sales stats</div>
                                    </div>
                                    <div class="pull-right card-action hidden-xs">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalCardBannerExample"><i class="fa fa-code"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card red summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-coffee fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{$orders}}</div>
                                                            <div class="sub-title">New Orders</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @cannot('order-meals')
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card yellow summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-bar-chart fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{$sales}}</div>
                                                            <div class="sub-title">Total Sales</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endcannot
                                        @can('order-meals')
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card yellow summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-bar-chart fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{$sales}}</div>
                                                            <div class="sub-title">Total Expenditure</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endcan
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card green summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-birthday-cake fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{App\Meal::count()}}</div>
                                                            <div class="sub-title">On The Menu</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @can('order-meals')
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card blue summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-usd fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{Auth::user()->student->account ? Auth::user()->student->account->current_amount : 0}}</div>
                                                            <div class="sub-title">Account Balance</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endcan
                                    @cannot('order-meals')
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <div class="card blue summary-inline">
                                                    <div class="card-body">
                                                        <i class="icon fa fa-user fa-4x"></i>
                                                        <div class="content">
                                                            <div class="title">{{App\Student::count()}}</div>
                                                            <div class="sub-title">Students</div>
                                                        </div>
                                                        <div class="clear-both"></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endcannot
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
@endsection
