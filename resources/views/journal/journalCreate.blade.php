@extends('layouts.app')
@section('content')
    <div class="container center">
        @include('layouts.messages')
        <br>
        <h1 align="center">JOURNAL FORM</h1> <br>
        <form action="{{ route('journal.create') }}" method="POST" enctype="multipart/form-data" class="form-horizontal"
            id="journal_form">
            {{ csrf_field() }}

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Article title</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="title" placeholder="Journal title" class="form-control" type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Abstract</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <textarea name="abstract" rows="6" cols="80" class="form-control"></textarea>
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Key Words(Seperated by Comma (,))</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="keywords" placeholder="Ex. Machine Learning, Networking, etc" class="form-control"
                        type="text">
                </div>
            </div>
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Category</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">

                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Publish Date</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="jdate" class="form-control" type="date">
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
                    <input name="a1fname" placeholder="First Name" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Last Name:</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="a1lname" placeholder="Last Name" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Student ID:</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="student_id" placeholder="Student ID" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Department :</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="department" placeholder="Department" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Session</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="session" placeholder="Session" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Year</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input name="year" placeholder="Year" class="form-control" type="text">
                </div>
            </div>

            <!-- Text input-->
            <div class="mt-3 form-group">
                <label class="col-md-8 col-md-offset-2 control-label">Insert pdf file</label>
                <div class="col-md-8 col-md-offset-2 inputGroupContainer">
                    <input type="file" name="pdf">
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
