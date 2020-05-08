@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Course</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('course.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('Course.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name"
                @error('code') is-invalid @enderror" value="{{$data->code}}">
                @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email" class="">{{_('Name')}}</label>
                <input type="text" name="name" class="form-control" placeholder="Name"
                @error('name') is-invalid @enderror" value="{{$data->name}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <select name="department_id" id="dep_id" class="form-control">
                <option value="">--Select Department--</option>
                @foreach ($dep as $dep)
                <option value="{{$dep->id}}"> {{ $dep->code }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{_('Update')}}</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){

        document.getElementById("dep_id").value = '{{$data->department_id}}';

    });
</script>
@endsection
