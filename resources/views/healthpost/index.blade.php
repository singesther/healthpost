@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content')



<div class="content">
            <div class="animated fadeIn">
                <div class="row">

    <div class="row" style= "margin-left:10px";>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('healthpost.create') }}"> Create New Healthpost</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Healthpost</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
        <tr>
            <th>No</th>
            <th>Healthpost name</th>
            <th>Owner</th>
            <th>Health Center</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Tin Number</th>

            <th>Action</th>

        </tr>
            </thead>
            @foreach ($health as $health)
            <tbody>

            <tr>
            <td>{{ ++$i }}</td>
                <td>{{ $health->name}}</td>
                <td>{{ \App\Models\member::where(['id' => $health->owner_id])->pluck('fullname')->first() }}</td>
                <td>{{ \App\Models\health::where(['id' => $health->healthpost_id])->pluck('health_center_name')->first() }}</td>

                <td>{{ $health->address }}</td>
                <td>{{ $health->phone }}</td>
                <td>{{ $health->tin_number }}</td>
                <td>

                <form action="{{ route('healthpost.destroy', $health->id) }}" method="POST">
                       <a class="btn btn-primary" href="{{ route('healthpost.edit',$health->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>


        </tr>






        <tbody>
        @endforeach
    </table>
    @include('includes.footer')

</div>
@endsection
