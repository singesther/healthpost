@extends('member.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show members</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('member.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $member->fname }}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Lastname:</strong>
                {{ $member->lname }}
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>email:</strong>
                {{ $member->email }}
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Phone-number:</strong>
                {{ $member->phone-number }}
            </div>
        </div>
    </div>
@endsection