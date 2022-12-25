@extends('layouts.app')
@section('content')
    <div class="container center">
        @include('layouts.messages')
        <br>
        <h1 align="center">Paper Edit</h1> <br>
        <form action="{{ route('journal.update',$journal->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal"
            id="journal_form">
            {{ csrf_field() }}

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Article title</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="title" value="{{ $journal->title }}" class="form-control" type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Abstract</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <textarea name="abstract" rows="6" cols="80" class="form-control"> {{ $journal->abstract}} </textarea>
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Key Words(Seperated by Comma (,))</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="keywords" value="{{ $journal->keywards }}" class="form-control"
                        type="text">
                </div>
            </div>
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Category</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">

                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option value="{{ $journal->category->id }}" selected>{{ $journal->category->title }}</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Publish Date</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="jdate" value="{{ $journal->jdate }}" class="form-control" type="date">
                </div>
            </div>

            <!-- Author 1-->
            <div class="form-group">
                <label class="col-md-8 col-md-offset-2 control-label"></label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <b>Student Details:</b>
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">First Name:</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="a1fname" value="{{ $journal->a1fname }}" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Last Name:</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="a1lname" value="{{ $journal->a1lname }}" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Student ID:</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="student_id" value="{{ $journal->student_id }}" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Department :</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="department" value="{{ $journal->department }}" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Session</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="session" value="{{ $journal->session }}" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Year</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="year" value="{{ $journal->year }}" class="form-control" type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Insert pdf file</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input type="file" value="{{ $pdf }}" name="pdf">
                </div>
            </div>

            <!-- Button -->
            <div class="pb-5 form-group">
                <label class="col-md-8 col-md-offset-2 control-label"></label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input type="submit" Value="Submit"  class="btn btn-primary bg-green-800">
                </div>
            </div>
        </form>
    </div>

    <br>
    <script src="{{ asset('js/journal.js') }}"></script>
@endsection
