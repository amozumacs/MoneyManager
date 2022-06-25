@php
use App\Http\Controllers\NotesController;
@endphp
<!DOCTYPE html>
<html>
<style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color:#333745;
                color:#E63462;
            }
            .search{
              display: inline-block;
              outline: 0;
              border: none;
              cursor: pointer;
              font-weight: 600;
              border-radius: 4px;
              font-size: 13px;
              background-color: #333745;
              color: white;
              padding: 10px 20px;
              font-family: 'Nunito', sans-serif;
            }
            table
             {
               	border: 1px solid;
             	  border-radius: 5px;
               	padding: 10px;
	              margin: 10px 0;
              	width: 300px;
                border-color: #E76F51;
	              background-color:#2F3061; 
             }
             
        </style>
<h1> Notes Search </h1>
<form method="GET" action="{{
action([App\Http\Controllers\NotesController::class, 'search']) }}">
    <input type="text" name="search" required/>
    <button type="submit" class="search">Search</button>
</form>
<table style="border: 1px solid black">
<tr>
        <td> Title </td>
        <td> Information </td>
</tr>
@if($notes->isNotEmpty())
@foreach ($notes as $note)
        <tr>
        <td> {{ $note->title }} </td>
        <td> {{ $note->information }} </td>
</tr>
        @endforeach
</table>
@else 
    <div>
        <h2>No notes found</h2>
    </div>
@endif
</html>