@extends('layouts.auth')

@section('content')
<div class="app-block">
    <div class="app-right-section">
        <div class="app-brand"><strong>{{config('app.name')}}</strong></div>
            <div class="app-info">
                <ul class="list">
                    <li>
                        <div class="icon">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                        </div>
                        <div class="title">Create Account</div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                        </div>
                        <div class="title">Get Verified</div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                        <div class="title">Start Ordering</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-form">
            <div class="form-suggestion">
                Create an account for free.
            </div>
            <form action="{{ route('register') }}" method="POST">
                {{csrf_field()}}
                <div class="form-group {{error($errors, 'name')}}">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </span>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Fullname" aria-describedby="basic-addon1">
                    </div>
                    {!!error_msg($errors, 'name')!!}
                </div>
                <div class="form-group {{error($errors, 'reg_no')}}">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" value="{{old('reg_no')}}" class="form-control" placeholder="Registration Number" aria-describedby="basic-addon2" name="reg_no">
                    </div>
                    {!!error_msg($errors, 'reg_no')!!}
                </div>
                <div class="form-group {{error($errors, 'email')}}">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <input type="text" value="{{old('email')}}" class="form-control" placeholder="Email Address" aria-describedby="basic-addon2" name="email">
                    </div>
                    {!!error_msg($errors, 'email')!!}
                </div>
                <div class="form-group {{error($errors, 'phone_number')}}">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <input type="text" value="{{old('phone_number')}}" class="form-control" placeholder="Phone Number" aria-describedby="basic-addon2" name="phone_number">
                    </div>
                    {!!error_msg($errors, 'phone_number')!!}
                </div>
                <div class="form-group {{error($errors, 'password')}}">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon3">
                    </div>
                {!!error_msg($errors, 'password')!!}
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon4">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" aria-describedby="basic-addon4">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-submit" value="Register">
            </div>
        </form>
    </div>
</div>
@endsection
