@extends('health.layout')
@include('includes.aside')
@include('layouts.app')



@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit H.C</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('member.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('health.update',$health->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="health_center_name" value="{{ $health->health_center_name  }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="address" value="{{ $health->address }}" class="form-control" >
                </div>
                <div class="form-group">
                    <strong>Phone number:</strong>
                    <input type="text" name="phone" value="{{ $health->phone }}" class="form-control">
                </div>





            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
