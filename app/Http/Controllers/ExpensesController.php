<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expenses::latest()->paginate(5);
    
        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required',
             'amount' => 'required',
             'pay_by' => 'required',
             'date' => 'required',       
            
 
         ]);
     
         Expenses::create($request->all());
      
         return redirect()->route('expenses.index')
                         ->with('success','Expenses created successfully.');
     }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenses = Expenses::where('id',$id)->first();
        return view('expenses.show',compact('expenses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenses = Expenses::where('id',$id)->first();
        return view('expenses.edit',compact('expenses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'employee_name' => 'required',
            'amount' => 'required',
            'pay_by' => 'required',
            'date' => 'required',
        ]);
        $input=$request->all();
    
       $expenses = Expenses::where('id',$id)->update([
        'employee_name' =>$input['employee_name'],
        'amount' =>$input['amount'],
        'pay_by' =>$input['pay_by'],
        'date' =>$input['date'],
        
        ]);

      

       
    
        return redirect()->route('expenses.index')
                        ->with('success','expenses updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expenses::where('id',$id)->delete();
    
        return redirect()->route('expenses.index')
                        ->with('success','expenses deleted successfully');
    }
}
