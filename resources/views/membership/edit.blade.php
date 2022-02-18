@extends('member.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit membership</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('member.index') }}"> Back</a>
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

    <form action="{{ route('membership.update',$membership->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number of installments:</strong>
                    <input type="text" name="no_of_installment" value="{{ $membership->no_of_installment }}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Start date:</strong>
                    <input type="date" name="start_date" value="{{ $membership->start_date }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="end_date" value="{{ $membership->end_date }}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Total Price:</strong>
                    <input type="text" name="total_price" value="{{ $membership->total_price }}" class="form-control">
                </div>




            </div>


            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
