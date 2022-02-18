@include('includes.aside')
@include('layouts.app')


@section('content')


@extends('member.layout') <br><br>
<div class="col-lg-9">

<div class="row">
    <div class="col-lg-9 margin-tb">
        <div class="pull-left">
            <h2>Add New Healthcenter</h2>
        </div>

    </div>
</div>

<form action="{{ route('health_create')}}" method="POST">
<strong >choose from existing</strong>

<select classs="form-control" name="id">

   @foreach ($health as $health)
   <option value="{{$health->id}}">{{$health->health_center_name}}

     </option>
   @endforeach


</select>
<button type="submit" class="btn btn-primary">Next</button>
</form>

<form action="{{ route('health.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-9 col-sm-8 col-md-8">

            <div class="form-group">
                <label>Heath Center:</label>
                <input type="text" name="health_center_name" class="form-control @error('health_center_name') is-invalid @enderror">
                @error('health_center_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
            <label>Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



        <div class="pull-right">

        <div class="col-xs-6 col-sm-6 col-md-6" >
                <button type="submit" class="btn btn-primary">Next</button>
        </div>
            </div>
            @include('includes.footer')
                </div>
    </div>


</form>
@endsection
