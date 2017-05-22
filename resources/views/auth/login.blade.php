@extends('layouts.auth')

@section('content')
<div class="app-block">
    <div class="app-form">
        <div class="form-header">
          <div class="app-brand"><span class="highlight">Welcome</span> Back</div>
        </div>
        <form action="{{route('login')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
                <div class="input-group ">
                    <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" value="{{old('username')}}" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="username">
                </div>
                {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">
                    <i class="fa fa-key" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" name="password">
                </div>
                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-submit"> 
                    Login
                </button>
            </div>
        </form>
      </div>
</div>
@endsection
