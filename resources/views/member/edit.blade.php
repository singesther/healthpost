@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Owner</h2>
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

    <form action="{{ route('member.update',$member->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fullname" value="{{ $member->fullname }}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Phone number:</strong>
                    <input type="text" name="phone" value="{{ $member->phone }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $member->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{ $member->address }}" class="form-control">
                </div>




            </div>


            </div>
            <div class="pull-right">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
            @include('includes.footer')
        </div>

   </div>
 </div>
    </form>
@endsection
