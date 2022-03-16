
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
@if (session()->has('nof'))
    <h1> {{ session('nof') }} </h1>
@endif
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Membership</h2>
        </div>

    </div>
</div>



<form action=" {!! url('/update_installment',session('nof')) !!}" id="myform" method="POST">
       @csrf
     <div class="row">
        <div class="col-xs-9 col-sm-8 col-md-8">
        @foreach(explode('_', session('nof')) as $noff)
        @endforeach
        @for ($i = 1; $i <= $noff; $i++)
        <div class="row">
            <div class="col-md-6">
                <label>Installment {{ $i }}:</label>
                <input type="text" name="amount{{ $i }}" placeholder="Amount.." class="form-control">
            </div>
            <div class="col-md-6">
                <label>&nbsp;</label>
                <input type="date" name="field{{ $i }}" class="form-control">
            </div>
        </div>
            
        @endfor
        
     <div class="pull-right">

        <div class="col-xs-6 col-sm-6 col-md-6" >
            <br>
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
        </div>
</form>
        @include('includes.footer')
            </div>
    </div></div>


@endsection
