<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Income;
use Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Income as IncomeResource;

class IncomeController extends BaseController
{
    public function index()
    {
        $income = Income::all();
    
        return $this->sendResponse(IncomeResource::collection($income), 'income retrieved successfully.');
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
            'date' => 'required',
            'amount' => 'required',
            'handled_by'=>'required',
            'salary'=> 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $income = Income::create($input);
   
        return $this->sendResponse(new IncomeResource($income), 'income created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::find($id);
  
        if (is_null($income)) {
            return $this->sendError('Income not found.');
        }
   
        return $this->sendResponse(new IncomeResource($income), 'Income retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'amount' => 'required',
            'handled_by'=>'required',
            'salary'=> 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $income->date = $input['date'];
        $income->amount = $input['amount'];
        $income->handled_by = $input['handled_by'];
        $income->salary = $input['salary'];
        $income->save();
   
        return $this->sendResponse(new IncomeResource($income), 'Income updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
   
        return $this->sendResponse([], 'Income deleted successfully.');
    }
}

