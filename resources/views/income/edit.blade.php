@extends('dashboard1')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Income</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('income.index') }}"> Back</a>
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
  
    <form action="{{ route('income.update',$income->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $income->date }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" value="{{ $income->amount }}" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Handled By:</strong>
                    <input type="text" name="handled_by" value="{{ $income->handled_by }}" class="form-control" placeholder="Handled By">
                </div>
            </div>
            <div class="container">
           <form>
            <div class="form-group">
           <label for="sel1">Salary:</label>
           <select class="form-control" name="salary" value="{{ $income->salary }}" id="sel1">
           <option>10000</option>
           <option>20000</option>
           <option>30000</option>
           <option>40000</option>
           </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection