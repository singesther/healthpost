@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content')
<br><br>

<div class="content">
            <div class="animated fadeIn">
                <div class="row">



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
                                    <th>Health_center</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($health as $health)
                            <tbody>

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $health->healthpost_name}}</td>
                                    <td>{{ \App\Models\member::where(['id' => $health->owner_id])->pluck('fullname')->first() }}</td>
                                    <td>{{ \App\Models\health::where(['id' => $health->healthcenter_id])->pluck('health_center_name')->first() }}</td>
                                    <td>{{ $health->address }}</td>
                                    <td>{{ $health->phone }}</td>
                                    <td>
                                        @if(in_array($health->id, $paid_mems))
                                            <form action=" {!! url('/healthpost_red',$health->id) !!}" method="POST">
                                                @csrf
                                            <input type="hidden" name="healthpost_id" value="$health->id">
                                            <button type="submit" class="btn btn-primary">Add Payment</button>
                                            </form>
                                        @else
                                             <form action=" {!! url('/healthpost_red',$health->id) !!}" method="POST">
                                                @csrf
                                            <input type="hidden" name="healthpost_id" value="$health->id">
                                            <button type="submit" class="btn btn-primary">Add Payment</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            <tbody>
                             @endforeach
                        </table>
@include('includes.footer')
</div>
@endsection
