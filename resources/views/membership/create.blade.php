@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content') <br><br>
<style>
    select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;




}
</style>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Membership</h2>
        </div>

    </div>
</div>



<form action="{{ route('membership.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-9 col-sm-8 col-md-8">
            <div class="form-group">
                <label>Number of installments</label>

                <input type="text" name="no_of_installment" class="form-control @error('no_of_installment') is-invalid @enderror">
                @error('no_of_installment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Total</label>
                <input type="text" name="total_price" class="form-control @error('total_price') is-invalid @enderror">
                @error('total_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <strong >Healthpost_name</strong>

                <select classs="form-control" name="healthpost_id">

                   @foreach ($health as $health)
                   <option value="{{$health->id}}">{{$health->name}}

                     </option>
                   @endforeach


            </select>



     <div class="pull-right">

        <div class="col-xs-6 col-sm-6 col-md-6" >
                <button type="submit" class="btn btn-primary">Next</button>
        </div>
        </div>
        @include('includes.footer')
            </div>
    </div></div>


@endsection
