<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
       // $user_id=Auth::user()->id;
      //  $reports = Income::where('user_id', '=', $user_id)->orderBy('created_at','asc')->paginate('6');
        //return view('report.index')->with(compact('reports'));
        $ExpCount = Expense::select('*')->count('Amount');
        $ExpMax = Expense::select('*')->sum('Amount');
        $IncCount = Income::select('*')->count('Amount');
        $IncMax = Income::select('*')->sum('Amount');
        $MExpCount = Expense::select('*')->whereMonth('created_at', Carbon::now()->month)->count('Amount');
        $MExpMax = Expense::select('*')->whereMonth('created_at', Carbon::now()->month)->sum('Amount');
        $MIncCount = Income::select('*')->whereMonth('created_at', Carbon::now()->month)->count('Amount');
        $MIncMax = Income::select('*')->whereMonth('created_at', Carbon::now()->month)->sum('Amount');
        $incomes = Income::select('*')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        $expenses = Expense::select('*')
        ->whereMonth('created_at', Carbon::now()->month)
        ->get();
        return view('menu', compact('incomes','expenses','ExpMax','ExpCount'
        ,'IncCount','IncMax','MExpMax','MExpCount','MIncCount','MIncMax'));
        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
