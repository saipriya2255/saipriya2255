@extends('dashboard1')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit expenses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
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
  
    <form action="{{ route('expenses.update',$expenses->id) }}" method="post">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Employee Name:</strong>
                    <input type="text" name="employee_name" value="{{ $expenses->date }}" class="form-control" placeholder="Employee Name">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" value="{{ $expenses->amount }}" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Pay_by:</strong>
                    <input type="text" name="pay_by" value="{{ $expenses->pay_by }}" class="form-control" placeholder="Pay_by">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $expenses->Date }}" class="form-control" placeholder="Date">
                </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection