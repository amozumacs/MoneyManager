<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin_dash', compact('users'));
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete(); 
        return redirect('admin_dash'); 
    }

}
