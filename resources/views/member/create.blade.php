@include('includes.aside')
@include('layouts.app')
@extends('member.layout')

@section('content')

<br><br>
<div class="row">
    <div class="col-lg-9">
        <div class="pull-left">
            <h2>Add New member</h2>
        </div>

    </div>
</div>




<form action="{{ route('member.store') }}" method="POST" >
    @csrf

     <div class="row">

        <div class="col-xs-9 col-sm-8 col-md-8" style{ item-align:center;}>

            <div class="form-group">
                <label>Full Name</label>

                <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror">
                @error('health_center_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label>Phone_number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="pull-right">
            <button type="submit" class="btn btn-primary">Next</button>
</div>
      </div>

   </div>
   @include('includes.footer')
    </div>

</div>

</form>


@endsection
