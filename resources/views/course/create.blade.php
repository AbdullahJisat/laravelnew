@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Course</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('Course.index') }}"> Back</a>
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
<form method="POST" action="{{url()->to('Course')}}">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name" class="">{{_('code')}}</label>
                <input type="text" name="code" class="form-control" placeholder="Code"
                @error('code') is-invalid @enderror">
                @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name" class="">{{_('name')}}</label>
                <input type="text" name="name" class="form-control" placeholder="Name"
                @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <select name="department_id" class="form-control">
                <option value="">--Select Department--</option>
                @foreach ($datas as $department => $value)
                <option value="{{ $department }}"> {{ $value }}</option>  
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{_('Submit')}}</button>
        </div>
    </div>
</form>
@endsection
