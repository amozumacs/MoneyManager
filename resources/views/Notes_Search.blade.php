@php
use App\Http\Controllers\NotesController;
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
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
             .edit,a,input[type=button], input[type=submit], input[type=reset]{
                display: inline-block;
                text-decoration:none;
                outline: 0;
                border: none;
                cursor: pointer;
                font-weight: 600;
                border-radius: 4px;
                font-size: 13px;
                background-color:#333745;
                color: white;
                padding: 10px 20px;
                font-family: 'Nunito', sans-serif;
            }    
        </style>
<h1> {{ __('messages.Note Search') }} </h1>
<form method="GET" action="{{
action([App\Http\Controllers\NotesController::class, 'search']) }}">
    <input type="text" name="search" required/>
    <button type="submit" class="search">{{ __('messages.Search') }}</button>
</form>
<table style="border: 1px solid black">
<tr>
        <td> {{ __('messages.TitleNot') }} </td>
        <td> {{ __('messages.InformationNot') }} </td>
</tr>
@if($notes->isNotEmpty())
@foreach ($notes as $note)
        <tr>
        <td> {{ $note->Title }} </td>
        <td> {{ $note->Information }} </td>
</tr>
        @endforeach
</table>
@else 
    <div>
        <h2>{{ __('messages.NoNot') }}</h2>
    </div>
@endif
<a href="{{ url('/menu') }}"class="return">{{ __('messages.Return') }}</a> 
</html>