@extends('layouts.app')
    @section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="title">Update Meal on the Menu</div>
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
                                <form method="post" action="{{ route('meals.update', $meal->id) }}" enctype="multipart/form-data">
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
                                        <label for="exampleInputEmail1">Meal Title</label>
                                        <input value="{{$meal->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input value="{{$meal->price}}" name="price" type="text" class="form-control" placeholder="Enter the Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="category" style="width: 100%;">
                                            <optgroup label="Meal Categories">
                                                <option {{$meal->category == 'soups' ? 'selected' : ''}} value="Soups">Soups</option>
                                                <option {{$meal->category == 'Snacks' ? 'selected' : ''}} value="Snacks">Snacks</option>
                                                <option {{$meal->category == 'Drinks' ? 'selected' : ''}} value="Drinks">Drinks</option>
                                                <option {{$meal->category == 'Pasta' ? 'selected' : ''}} value="Pasta">Pasta</option>
                                                <option {{$meal->category == 'Cakes' ? 'selected' : ''}} value="Cakes">Cakes</option>
                                                <option {{$meal->category == 'Main Course' ? 'selected' : ''}} value="Main Course">Main Course</option>
                                             </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Additional Details</label>
                                        <textarea class="form-control" name="details" rows="3">{{$meal->details}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image to Display</label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
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