<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Notes;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes=Notes::all();
        return view('Notes', compact('notes'));
    }
    
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $notes = Notes::query()
            ->where('Title', 'LIKE', "%{$search}%")
            ->orWhere('Information', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('Notes_Search', compact('notes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) return back(); 
        return view('new_note');
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
            'Title' => 'required|string|min:1|max:30',
            'Information' => 'required|string|min:1|max:1000',
        );

        
        $validated = $this->validate($request, $rules);

        $note = new Notes();
        $note->Title = $validated["Title"];
        $note->Information = $validated["Information"];
    
        $note->save();

        return redirect("/notes");
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
        $note = Notes::find($id);
        return view('Notes_Update', compact('note'));
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
        $note = Notes::where('id', $id)->firstOrFail();
        $rules = array(
            'Title' => 'required|string|min:1|max:30',
            'Information' => 'required|string|min:1|max:1000',
        );

        
        $validated = $this->validate($request, $rules);

 
        $note->Title = $request->Title;
        $note->Information = $request->Information;
        $note->save();

        return redirect("/notes");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notes::findOrFail($id)->delete();  
        return redirect('notes/');
    }
}
