<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::all();
        return view('income', compact('incomes'));
        /*$income = Income::latest()->get();
        $total = Income::sum('Amount');

    return view('index', ['total' => $total,'income' => $income,]);
    */
    }
     
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $incomes = Income::query()
            ->where('Name', 'LIKE', "%{$search}%")
            ->orWhere('Amount', 'LIKE', "%{$search}%")
            ->orWhere('Source', 'LIKE', "%{$search}%")
            ->orWhere('created_at', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('Income_Search', compact('incomes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_income');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  if (!Auth::check()) return "You are not welcome here!";

        $rules = array(
            'Name' => 'required|string|min:2|max:50',
            'Source' => 'required|string|min:0|max:50',
            'Amount' => 'required|integer|min:0'
        );

        
        $validated = $this->validate($request, $rules);

        $income = new Income();
        $income->Name = $validated["Name"];
        $income->Source = $validated["Source"];
        $income->Amount = $validated["Amount"];

        $income->save();

        return redirect("/income");
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
        $income = Income::find($id);
        return view('Income_Update', compact('income'));
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
        $income = Income::where('id', $id)->firstOrFail();
        $rules = array(
            'Name' => 'required|string|min:2|max:50',
            'Source' => 'required|string|min:0|max:50',
            'Amount' => 'required|integer|min:0'
        );
        $this->validate($request, $rules);
        

        $income->Name = $request->Name;
        $income->Source = $request->Source;
        $income->Amount=$request->Amount;
        $income->save();

        return redirect("/income");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Income::findOrFail($id)->delete(); 
        return redirect('income/'); 
    }
   
}
