@php
use App\Http\Controllers\NotesController;
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ __('messages.UpdateNot') }}:</title>
</head>
<body>
<h2>{{ __('messages.UpdateNot') }}:</h2>
<form action="{{ action([NotesController::class, 'update'], $note->id ) }}" method="post">
    @csrf
    @method('PUT')
    <table>
         <tr>
            <th>{{ __('messages.NewNotTitle') }}:</th>
            <td>
                <input type="text" name="Title" id="Title" value ="{{ $note->Title }}" />
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.NewNotInformation') }}:</th>
            <td>
                <input type="text" name="Information" id="Information" value="{{ $note->Information }}" />
            </td>
        </tr>

      
        <tr>    
            <td>
                <input type="submit" class="update" value="{{ __('messages.add')}}" />
            </td>
        </tr>
    </table>
</form>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</body>
</html>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color:#333745;
        color:#E63462;
    }
    .update{
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
    .error{color:red;}
</style>