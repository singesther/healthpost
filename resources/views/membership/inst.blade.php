
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



<form action="" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-9 col-sm-8 col-md-8">


            <div class="form-group">
                <label>Installment 1:</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label>Installement 2:</label>
                <input type="date" name="end_date" class="form-control">
            </div>

     <div class="pull-right">

        <div class="col-xs-6 col-sm-6 col-md-6" >
                <button type="submit" class="btn btn-primary">Next</button>
        </div>
        </div>
        @include('includes.footer')
            </div>
    </div></div>


@endsection
