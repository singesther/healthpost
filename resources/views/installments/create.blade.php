@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content') <br><br>
<style>
    .column {
  float: left;
  width: 69%;
  /* padding: 0 10px; */
  margin-bottom: 10px;
}
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: adjust;
  background-color: #f1f1f1;
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New  installment</h2>
        </div>
        <div class="pull-right">

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
<div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
<div class="row">

  <div class="column">
    <div class="card">
        <h6>Status</h6>
      <p>Paid Amount: {{ $article["paid_amount"] }} Rwf (Remaining: {{ $article["total_amount"]-$article["paid_amount"] }} Rwf)</p>
      <p> Installments: {{ $article["total_installments"] }} (Remaining: {{ $article["total_installments"]-$article["paid_installments"] }})</p>

    </div>
  </div> <br><br><br>
      <form action=" {!! url('/insert_installment',$article['membership_id']) !!}" id="myform" method="POST" onsubmit="validateMyForm();">
       @csrf

       <div>

            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>

                        <th>Healthpost Name</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Due date</th>
                        <th>Pay date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($article["all_payments"] as $insts)
                    <tr>
                        <td> {{ $i }}</td>

                        <td> {{ $article["healthpost_name"] }} </td>
                        <td> {{ $insts->amount }} </td>
                        <th> <?php if ($insts->paid == 0) { echo "No"; }else{echo "Yes";}?> </th>
                        <td> {{ $insts->pay_date }} </td>
                        <td> {{ $insts->payment }} </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            </div>


            <div class="form-group">
                <strong>Amount:</strong>
                <input type="text" name="amount" id="amount_field" class="form-control" placeholder="Add amount to pay">
                {{ Form::hidden('membership_id', $article["membership_id"]) }}
                {{ Form::hidden('healthpost_id', $article["healthpost_id"]) }}
            </div>


            <div id="message_div"></div>




         <div class="pull-right">


            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" id="submit_form" class="btn btn-primary">Submit</button>
            </div>

            <script>

                function validateMyForm(){
                    var amount = document.getElementById('amount_field').value;
                    var total_amount = '{{ $article['total_amount'] }}';
                    var paid_amount =  '{{ $article['paid_amount'] }}';
                    var remaining_amount = total_amount - paid_amount;

                    console.log(amount + total_amount + paid_amount + remaining_amount);

                    if (amount > remaining_amount) {
                        document.getElementById('message_div').innerHTML = "Amount is greater than the Remaining!";
                        //console.log("Amount invalid!" + amount);
                        event.preventDefault();
                        return false;
                    }else{
                        //console.log("Amount is valid now!" + amount);

                        return true;
                        document.getElementById("myform").submit();
                    }
                };


                </script>





        </div>
</form>


@endsection
