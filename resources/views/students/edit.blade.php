@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Edit Student Details</div>
                        </div>
                        <div class="pull-right card-action">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalListExample"><i class="fa fa-code"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('students.update', $student->id) }}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('patch')}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input  value="{{$student->name}}" type="text" class="form-control" name="name" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone Number</label>
                                            <input value="{{$student->phone_number}}" type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input name="email" value="{{$student->email}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Registration Number</label>
                                            <input value="{{$student->reg_no}}" type="text" class="form-control" name="reg_no" placeholder="Enter Registration Number">
                                        </div>
                                        <div class="checkbox">
                                          <div class="checkbox3 checkbox-round">
                                            <input name="account" type="checkbox" {{$student->user ? 'checked disabled' : ''}} id="checkbox-1">
                                            <label for="checkbox-1">
                                              Has User Account
                                            </label>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">UPDATE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection