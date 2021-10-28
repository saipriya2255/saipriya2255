<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Validator;
use App\Http\Resources\Expense as ExpenseResource;

class ExpensesController extends BaseController
{
    public function index()
    {
        $expenses = Expenses::all();
    
        return $this->sendResponse(ExpenseResource::collection($expenses), 'Expense retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'employee_name' => 'required',
            'amount' => 'required',
            'pay_by' => 'required',
            'date'=> 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $expense = Expenses::create($input);
   
        return $this->sendResponse(new ExpenseResource($expense), 'Expense created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expenses::find($id);
  
        if (is_null($expense)) {
            return $this->sendError('Expense not found.');
        }
   
        return $this->sendResponse(new ExpenseResource($expense), 'Expense retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expense)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'employee_name' => 'required',
            'amount' => 'required',
            'pay_by' => 'required',
            'date'=> 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $expense->employee_name = $input['employee_name'];
        $expense->amount = $input['amount'];
        $expense->pay_by = $input['pay_by'];
        $expense->date = $input['date'];
        $expense->save();
   
        return $this->sendResponse(new ExpenseResource($expense), 'exenses updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expense)
    {
        $expense->delete();
   
        return $this->sendResponse([], 'exenses deleted successfully.');
    }
    
}
