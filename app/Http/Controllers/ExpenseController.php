<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expense', compact('expenses'));
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $expenses = Expense::query()
            ->where('Name', 'LIKE', "%{$search}%")
            ->orWhere('Amount', 'LIKE', "%{$search}%")
            ->orWhere('Source', 'LIKE', "%{$search}%")
            ->orWhere('created_at', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('Expense_Search', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_expense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if (!Auth::check()) return "You are not welcome here!";

        $rules = array(
            'Name' => 'required|string|min:2|max:50',
            'Source' => 'required|string|min:0|max:50',
            'Amount' => 'required|integer|min:0'
        );

        
        $validated = $this->validate($request, $rules);

        $expense = new Expense();
        $expense->Name = $validated["Name"];
        $expense->Source = $validated["Source"];
        $expense->Amount = $validated["Amount"];

        $expense->save();

        return redirect("/expense");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('Expense_Update', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::where('id', $id)->firstOrFail();
        $rules = array(
            'Name' => 'required|string|min:2|max:50',
            'Source' => 'required|string|min:0|max:50',
            'Amount' => 'required|integer|min:0'
        );
        $this->validate($request, $rules);
        

        $expense->Name = $request->Name;
        $expense->Source = $request->Source;
        $expense->Amount=$request->Amount;
   
        $expense->save();

        return redirect("/expense");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::findOrFail($id)->delete(); 
        return redirect('expense/'); 
    }
}
