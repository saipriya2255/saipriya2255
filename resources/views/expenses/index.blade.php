@extends('dashboard1')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>EXPENSES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('expenses.create') }}"> Create New Expenses</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
             <th>No</th>
            <th>Employee Name</th>
            <th>Amount</th>
            <th>Pay by</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=0; ?>

        @foreach ($expenses as $expense)
        <tr>
            <td>{{ ++$i }}</td>  
            <td>{{ $expense->employee_name }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->pay_by }}</td>
            <td>{{ $expense->date }}</td>
            <td>
                <form action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('expenses.show',$expense->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('expenses.edit',$expense->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $expenses->links() !!}
      
@endsection