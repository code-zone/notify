@extends('layouts.app')
	@section('content')
		<div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Students</div>
                        </div>
                        <div class="pull-right card-action">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalListExample"><i class="fa fa-code"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    	@if(count($errors->all()) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
						<div class="row text-center">
							@foreach($students as $student)
				            <div class="col-md-3 col-sm-4">
				                <span class="fa-stack fa-lg fa-5x">
				                  <i class="fa fa-circle-thin fa-stack-2x"></i>
				                  <i class="fa fa-user fa-stack-1x"></i>
				                </span>
				                <h3>{{$student->name}}</h3>
				                <p><i class="fa fa-envelope-o"></i> {{$student->email}}</p>
				                <p> <i class="fa fa-phone"></i> {{$student->phone_number}}</p>
				                <div class="row">
				                	@can('manage-students')
				                	<a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil fa-lg"></i></a>
				                	@if($student->account)
				                		@if($student->account->active)
				                		<a title="Block account and prevent any transactions" href="{{ route('block-account', $student->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-ban fa-lg"></i></a>
				                		@else
				                		<a data-toggle="tooltip" title="Unblock account and allow transactions" href="{{ route('unblock-account', $student->id) }}" class="btn btn-sm btn-info"><i class="fa fa-check fa-lg"></i></a>
				                		@endif
				                	@endif
				                	@endcan
				                	@can('create-payments')
				                	<a href="{{ route('payments.create', $student->id) }}" class="btn btn-sm btn-success ajaxModal"><i class="fa fa-credit-card fa-lg"></i></a>
				                	@endcan
				                </div>
				                
				            </div>
				           @endforeach
				            <!-- /.col-lg-4 -->
				        </div>
				        <div class="row text-center">
				        	{!! $students->render() !!}
				        </div>
                   	</div>
               	</div>
           	</div>
       	</div>
	@endsection