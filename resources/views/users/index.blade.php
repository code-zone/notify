@extends('layouts.app')
	@section('content')
		<div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Users</div>
                        </div>
                        <div class="pull-right card-action">
                            <div class="btn-group" role="group">
                                <a class="btn btn-link" href="{{ route('users.create') }}"><i class="fa fa-plus fa-lg"></i></a>
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
                        @if(session('messages'))
                        <div class="row">
                            <div class="alert alert-{{session('messages.type')}} fresh-color alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-close"></span></button>
                                <strong>{{session('messages.title')}}!</strong> {{session('messages.message')}}.
                            </div>
                        </div>
                        @endif
						<div class="row text-center">
							@foreach($users as $user)
				            <div class="col-md-3 col-sm-4">
				                <span class="fa-stack fa-lg fa-5x">
				                  <i class="fa fa-circle-thin fa-stack-2x"></i>
				                  <i class="fa fa-user fa-stack-1x"></i>
				                </span>
				                <h3>{{$user->name}}</h3>
				                <p><i class="fa fa-envelope-o"></i> {{$user->email}}</p>
				                <p><i class="fa fa-wrench"></i> {{$user->role}}</p>
				                <div class="row">
				                	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil fa-lg"></i></a>
				                	@if($user->active)
				                	<a href="{{ route('users.block', $user->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-ban fa-lg"></i></a>
				                	@else
				                	<a href="{{ route('users.unblock', $user->id) }}" class="btn btn-sm btn-success"><i class="fa fa-check fa-lg"></i></a>
				                	@endif
				                </div>
				                
				            </div>
				           @endforeach
				            <!-- /.col-lg-4 -->
				        </div>
				        <div class="row text-center">
				        	{!! $users->render() !!}
				        </div>
                   	</div>
               	</div>
           	</div>
       	</div>
	@endsection