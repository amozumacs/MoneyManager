@php
use App\Http\Controllers\NotesController;
@endphp

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
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Update Note data:</h2>
<form action="{{ action([NotesController::class, 'update'], $note->id ) }}" method="post">
    @csrf
    @method('PUT')
    <table>
         <tr>
            <th>New Title:</th>
            <td>
                <input type="text" name="Title" id="Title" value ="{{ $note->Title }}" />
            </td>
        </tr>
        <tr>
            <th>Information:</th>
            <td>
                <input type="text" name="Information" id="Information" value="{{ $note->Information }}" />
            </td>
        </tr>

      
        <tr>    
            <td>
                <input type="submit" class="update" value="add" />
            </td>
        </tr>



    </table>
</form>
