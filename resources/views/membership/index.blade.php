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
                <a class="btn btn-primary" href="{{ route('membership.create') }}"> Create New Membership</a>
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
                                <strong class="card-title">All Memberships</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">

        <thead>
        <tr>
        <th>No</th>
            <th>Number of Installments</th>
            <th>Healthpost</th>
            <th>Total Price</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach ($membership as $membership)
        <tbody>
        <tr>
        <td>{{ ++$i }}</td>

            <td>{{ $membership->no_of_installment }}</td>

            <td>{{ \App\Models\healthpost::where(['id' => $membership->healthpost_id])->pluck('name')->first() }}</td>


            <td> {{ $membership->total_price }} </td>
            <td>{{ $membership->start_date }}</td>
            <td>{{ $membership->end_date}}</td>
            <td> {{ $membership->status}}</td>

            <td>

            <form action="{{ route('membership.destroy', $membership->id) }}" method="POST">


                        <a class="btn btn-primary" href="{{ route('membership.edit',$membership->id) }}">Edit</a>

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
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var member = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/member.index',
            data: {'status': status, 'member_id': member},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
