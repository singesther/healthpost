<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add new payment</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="main-menu">
            <ul>
                <li>
                <a href="{{ route('member.index') }}">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{ route('health.index') }}">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            Health Post
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                <a href="{{ route('plan.index') }}">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Membership Plan
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="{{ route('payments.index') }}">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Payments
                        </span>
                    </a>

                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                           Quotes
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Tables
                        </span>
                    </a>
                </li>
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>

                   <a class="nav-link" href="{{ route('signout') }}">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
        @extends('payments.layout')

         @section('content')
         <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New member</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
        </div>
    </div>
</div>




    <div class="container mt-4">
        <div class="row justify-content">
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

            <div class="col-md-12">
                <h2 class="mb-4">New payment</h2>
                <form action="{{ route('payments.store') }}" method="POST">
    @csrf
                    <div class="form-group mb-3">
                        <select  id="plans-dd" class="form-control" name="membership_plan">
                            <option value="">Select Plan</option>
                            @foreach ($Plans as $data)
                            <option value="{{$data->plans_id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select id="name-dd" class="form-control" name="fullname">
                        </select>
                    </div>
                    <select classs="form-group" name="healthpost_name">

                @foreach ($health as $health)
                   <option value="{{$health->healthpost_id}}">{{$health->healthpost_name}}

                   </option>
                   @endforeach


               </select>
               <div class="form-group">
                <strong>Amount:</strong>
                <input type="text" name="amount" class="form-control" placeholder="amount">
            </div>
            <div class="form-group">
                <strong>health_center:</strong>
                <input type="text" name="health_center" class="form-control" placeholder="Healthcenter">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
                </form>
            </div>
        </div>

    </div>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#plans-dd').on('change', function () {
                var idPlans = $("#plans-dd").val();
                console.log("plan id is = ",idPlans);

                $("#name-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-members')}}",
                    type: "POST",
                    data: {
                        plans_id: idPlans,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#name-dd').html('<option value="">Select Member</option>');
                        console.log(result);
                        $.each(result.members, function (key, value) {
                            $("#name-dd").append('<option value="' + value
                                .plans_id + '">' + value.fullname + '</option>');
                        });
                        $('#health-dd').html('<option value="">Select Healthpost</option>');
                    }
                });
            });
            $('#name-dd').on('change', function () {
                var idMember = $("#name-dd").val();

                $("#health-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-healths')}}",
                    type: "POST",
                    data: {
                        plans_id: idMember,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#health-dd').html('<option value="">Select Healthpost</option>');
                        $.each(result.members, function (key, value) {
                            $("#health-dd").append('<option value="' + value
                                .plans_id + '">' + value.fullname + '</option>');
                        });
                    }
                });
            });
        });

    </script>
</body>

</html>
