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
                                    <a class="btn btn-primary" href="{{ route('member.create') }}"> Create New owner</a>
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
                                <strong class="card-title">All Owners</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>
                                           <th>No</th>
                                            <th>Full Name</th>
                                            <th>Phone number</th>
                                            <th>Email</th>
                                            <th>Address</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   @foreach ($member as $member)
                                    <tbody>
                                       <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $member->fullname }}</td>
                                            <td> {{ $member->phone }} </td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->address}}</td>
                                            <td>

                                               <form action="{{ route('member.destroy', $member->id) }}" method="POST">
                                                 <a class="btn btn-primary" href="{{ route('member.edit',$member->id) }}">Edit</a>

                                                                                @csrf
                                                                                @method('DELETE')

                                                 <button type="submit" class="btn btn-danger">Delete</button>
                                              </form>

                                            </td>
        <tbody>
        @endforeach
     </table>

   </div>
   @include('includes.footer')

  </div>

  </div>

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

      $(document).ready(function(){
$("#sidebarCollapse").on('click', function(){
$("#sidebar").toggleClass('active');
});
});

</script>
