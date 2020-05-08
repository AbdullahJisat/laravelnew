@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 5.7 CRUD Example from scratch - ItSolutionStuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('department.create') }}"> Create New Department</a>
        </div>
    </div>
</div>
<!-- if ($message = Session::get('success'))
<div class="alert alert-success">
<p> $message }}</p>
</div>
endif -->
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
            <th>Action</th>
            <th>Action Date</th>
            <th>Action By</th>
            <th>Is Delete</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php ($i = 1)
        @foreach ($datas as $department)
            @if($department->is_delete != 1)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $department->code }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->action }}</td>
                <td>{{ $department->actionTime }}</td>
                <td>{{ $department->actionBy }}</td>
                <td>{{ $department->is_delete }}</td>
                <td>
                    <form action="{{ route('department.destroy',$department->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('department.edit',$department->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection
