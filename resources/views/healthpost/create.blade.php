@include('includes.aside')
@include('layouts.app')


@extends('member.layout')

@section('content') <br><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Health Post</h2>
        </div>

    </div>
</div>



<form action="{{ route('healthpost.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-9 col-sm-8 col-md-8">
            <div class="form-group">
                <label>Heathpost</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Tin Number</label>
                <input type="text" name="tin_number" class="form-control  @error('tin_number') is-invalid @enderror">
                @error('tin_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">

                <input type="hidden" name="healthpost_id" class="form-control" value="{{$latest->id}}">
            </div>
            <div class="form-group">

                <input type="hidden" name="owner_id" class="form-control" value="{{$latestest->id}}">
            </div>







        <div class="pull-right">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
</div>
    </div>
    </div>

</form>
@endsection

