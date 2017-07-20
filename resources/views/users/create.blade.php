@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Add A new User</div>
                        </div>
                        <div class="pull-right card-action hidden-xs">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalListExample"><i class="fa fa-code"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @if(count($errors->all()) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input value="{{old('name')}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input value="{{old('email')}}" name="email" type="email" class="form-control" placeholder="Enter the email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Role</label>
                                        <select name="role" style="width: 100%;">
                                            <optgroup label="User Roles">
                                                <option value="admin">Admin</option>
                                                <option value="clerk">Clerk</option>
                                             </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input value="{{old('password')}}" type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm Password</label>
                                        <input value="{{old('name')}}" type="password" name="password_confirmation" class="form-control" placeholder="Enter Password again">
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection