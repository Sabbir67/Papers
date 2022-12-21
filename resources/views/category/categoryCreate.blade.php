@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.messages')
    <br>
    @if(!$category == '')
    <h1 align="center">Category Edit Form</h1> <br>
    <form action="{{url('admin/category/'.$category->id)}}" method="POST"  class="form-horizontal" id="category_form">
        {{ csrf_field() }}
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label" >Category Name</label>
              <div class="col-md-4 inputGroupContainer">
            <input name="title" placeholder="{{$category->title}}" class="form-control"  type="text">
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
    <input type="submit" Value="Submit" class="btn btn-primary bg-green-700">
            </div>
    </form>
    @else
    <h1 align="center">Create Category</h1> <br>
    <form action="{{url('admin/category')}}" method="POST"  class="form-horizontal" id="category_form">
        {{ csrf_field() }}
         <!-- Text input-->
         <div class="form-group">
            <label class="col-md-4 control-label pt-2" >Category Name</label>
              <div class="col-md-4 inputGroupContainer">
            <input name="title" placeholder="Cateogroy Name" class="form-control"  type="text">
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 inputGroupContainer">
    <input type="submit" Value="Submit" class="btn btn-primary bg-green-700">
            </div>
    </form>
    @endif
@endsection
