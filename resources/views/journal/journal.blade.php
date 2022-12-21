@extends('layouts.app')
    @section('content')
      <div class="container">
<br>

      <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <li class="breadcrumb-item active">Dashboard</li>
          </li>
        </ol>


  @if(count($journals) > 0)
    <div class="card-header" align="center"><b>Journals</b></div>
    <div class="table-responsive">
    <table class="table table-striped" width="100%" cellspacing="0">
      <tr>
        <th>Title</th>
        <th>Details</th>
        <th>Date</th>
    

      </tr>
    @foreach ($journals as $journal)
      <tr>
        <td>
          <p><b>{{$journal->title}}</b></p>
        </td>
        <td>
          <b><a href="/admin/journals/{{$journal->id}}">content</a></b>
        </td>

        <td>
          <b>{{$journal->created_at}}</b>
        </td>

    @endforeach
    </tr>
    </table>
    </div>
    @else
      <div class="col-md-8 col-md-offset-2">
        <div class="panel-heading"><h3>You don't have any Journal yet.</h3>
        <a href="journals/create" class="btn btn-primary bg-green-700">create now</a>
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
