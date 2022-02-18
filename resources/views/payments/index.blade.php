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

    <div class="row" style= "margin-left:10px";>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('payments.create') }}"> Create New Payment</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<h2>Payments</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
        <th>No</th>
            <th>FullName</th>
            <th>Membership plan</th>
            <th>Amount</th>
            <th>Healthpost Name</th>
            <th>Health Center</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        @foreach ($payments as $payments)
        <tbody>
        <tr>
        <td>{{ ++$i }}</td>

            <td>{{ $payments->fullname }}</td>
            <td>{{ \App\Models\Plans::where(['plans_id' => $payments->plans_id])->pluck('name')->first() }}</td>
            <td>{{ \App\Models\Health::where(['healthpost_id' => $payments->healthpost_id])->pluck('healthpost_name')->first() }}</td>

            <td>{{ $payments->amount }}</td>

            <td>{{ $payments->health_center}}</td>

            <td>
                <form action="{{ route('payments.destroy',$payments->id) }}" method="POST">

                     <a class="btn btn-primary" href="{{ route('payments.edit',$payments->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>






        <tbody>
        @endforeach
    </table>
</div>
@endsection

