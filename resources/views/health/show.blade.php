@extends('healthpost.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('healthpost.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $health->health_center }}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $health->district }}
            </div>
        </div>
        <div class="form-group">
                <strong>Name:</strong>
                {{ $health->sector }}

            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $health->cell }}

            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $health->helthpost_name }}

            </div>
    </div>
@endsection