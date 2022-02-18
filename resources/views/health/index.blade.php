@include('includes.aside')
@include('layouts.app')
@extends('member.layout')
@section('content') <br><br>
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

    <div class="row" style= "margin-left:10px";>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('health.create') }}"> Create New Healthcenter</a>
            </div>
        </div>
    </div> <br><br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Healthcenters</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
        <tr>
        <th>No</th>
            <th>Name</th>
            <th>Phone number</th>

            <th>Address</th>

            <th>Action</th>
        </tr>
        </thead>
        @foreach ($health as $health)
        <tbody>
            <tr>
                    <td>{{ ++$i }}</td>

                    <td>{{ $health->health_center_name }}</td>
                    <td> {{ $health->phone }} </td>

                    <td>{{ $health->address}}</td>

                    <td>

                        <form action="{{ route('health.destroy', $health->id) }}" method="POST">


                        <a class="btn btn-primary" href="{{ route('health.edit',$health->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
        <tbody>
        @endforeach
    </table>

</div>
</div>
@include('includes.footer')
</div></div>
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

      $(document).ready(function(){
$("#sidebarCollapse").on('click', function(){
$("#sidebar").toggleClass('active');
});
});

</script>
