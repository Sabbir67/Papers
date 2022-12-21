@extends('layouts.app')
    @section('content')
      <div class="container">
<br>
@include('layouts.messages')
      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <li class="breadcrumb-item active">Dashboard</li>
          </li>
        </ol>


  @if(count($category) > 0)
    <div class="card-header" align="center"><b>Categories</b></div>
    <div class="table-responsive">
    <table class="table table-striped" width="100%" cellspacing="0">
      <tr>
        <th>Title</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Date</th>
      </tr>
    @foreach ($category as $categories)
      <tr>
        <td>
          <p><b>{{$categories->title}}</b></p>
        </td>
        <td>
          <b><a class="btn btn-warning" href="/admin/category/{{$categories->id}}">Edit</a></b>
        </td>
        <td>
        <b>
            <form action="{{ route('delete.destroy', $categories->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-success bg-red-500">Delete</button>
            </form>
        </b>
        </td>
        <td>
          <b>{{$categories->created_at}}</b>
        </td>
    @endforeach
    </tr>
    </table>
    </div>
    @else
      <div class="col-md-8 col-md-offset-2">
        <div class="panel-heading"><h3>You don't have any Category yet.</h3>
        <a href="category/create" class="btn btn-primary bg-green-700">create now</a>
        </div>
      </div>
  @endif

        </div>

        <style>
        td {
          background-color: white;
        }
        </style>
    @endsection
