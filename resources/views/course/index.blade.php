@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 5.7 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('Course.create') }}"> Create New Department</a>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
            <th>Action Date</th>
            <th>Action By</th>
            <th>Is Delete</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($datas as $course)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->crs_name }}</td>
                <td>{{ $course->dep_name }}</td>
                <td>
                    <form action="{{ route('Course.destroy',$course->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('Course.edit',$course->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection