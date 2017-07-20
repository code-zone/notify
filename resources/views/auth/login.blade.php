@extends('layouts.auth')

@section('content')
<div class="app-block">
    <div class="app-form">
        <div class="form-header">
          <div class="app-brand"><span class="highlight">Welcome</span> Back</div>
        </div>
        <form action="{{route('login')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <div class="input-group ">
                    <span class="input-group-addon" id="basic-addon1">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <input type="text" value="{{old('email')}}" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1" name="email">
                </div>
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
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
            <div class="form-line">
                 <div class="title">OR</div>
            </div>
            <div class="text-center">
                <a href="{{ route('register') }}" class="btn btn-primary btn-submit"> 
                    Create Account
                </a>
            </div>
        </form>
      </div>
</div>
@endsection
