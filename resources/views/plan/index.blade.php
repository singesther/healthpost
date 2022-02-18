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


@extends('plan.layout')

@section('content')

    <div class="row" style= "margin-left:10px";>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('plan.create') }}"> Create New plan</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<h2>Membership plan</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Details</th>
        <th>Amount</th>
        <th width="280px">Action</th>
        </tr>
        </thead>
        @foreach ($Plans as $Plans)
        <tbody>
        <tr>
        <td>{{ ++$i }}</td>
            <td>{{ $Plans->name }}</td>
            <td>{{ $Plans->detail }}</td>
            <td>{{ $Plans->amount}}</td>
            <td>
                <form action="{{ route('plan.destroy',$Plans->plans_id) }}" method="POST">

                     <a class="btn btn-primary" href="{{ route('plan.edit',$Plans->plans_id) }}">Edit</a>

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

