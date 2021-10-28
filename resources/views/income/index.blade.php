@extends('dashboard1')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Income</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('income.create') }}"> Create New income</a>
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
            <th>Date</th>
            <th>Amount</th>
            <th>Handled By
            <th>Salary</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($income as $incomes)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $incomes->date }}</td>
            <td>{{ $incomes->amount }}</td>
            <td>{{ $incomes->handled_by }}</td>
            <td>{{ $incomes->salary }}</td>
            <td>
                <form action="{{ route('income.destroy',$incomes->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('income.show',$incomes->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('income.edit',$incomes->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $income->links() !!}
      
@endsection