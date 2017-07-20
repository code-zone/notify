@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Update User profile</div>
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
                                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                                    @if(count($errors->all()) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input value="{{old('name', $user->name)}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input value="{{old('email', $user->email)}}" name="email" type="email" class="form-control" placeholder="Enter the email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User Role</label>
                                        <select name="role" style="width: 100%;">
                                            <optgroup label="User Roles">
                                                <option {{ucfirst($user->role) == 'Admin' ? 'selected' : ''}} value="admin">Admin</option>
                                                <option {{ucfirst($user->role) == 'Clerk' ? 'selected' : ''}} value="clerk">Clerk</option>
                                                <option {{ucfirst($user->role) == 'Student' ? 'selected' : ''}} value="student">Student</option>
                                             </optgroup>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection