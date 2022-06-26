<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('messages.Notes') }}</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>{{ __('messages.Notes') }}</h1>
        @if(count($notes)==0)
        <p color='red'> {{ __('messages.NoRecord') }}</p> @else
        @foreach ($notes as $note)
        <table style="border: 1px solid black">
        
        <tr>
        <td> {{ __('messages.TitleNot') }} </td>
        <td> {{ __('messages.InformationNot') }} </td>
        </tr>
        
        <tr>
        <td> {{ $note->Title }} </td>
        <td> {{ $note->Information }} </td>
        <td> 
            <form method="POST" action="{{
            action([App\Http\Controllers\NotesController::class, 'destroy'], $note->id)
            }}">@csrf @method('DELETE')<input type="submit" value="{{ __('messages.Delete') }}"></form> 
            </td>
            <td> 
                 
            <a href="{{ route('notes.edit',$note->id)}}" class="edit" >{{ __('messages.Edit') }}</a>
            </td>
            @endforeach
        </table>
        @endif
        @can('user')
        <p> <input  type="button" value="{{ __('messages.NewNot') }}" onclick="newNote()"> </p>
        @endcan
        <script>
        function newNote() {
        window.location.href="/notes/create";
        }
        </script>
         @can('user')
          <p> <input  type="button" value="{{ __('messages.Note Search') }}" onclick="NoteSearch()"> </p>
          @endcan
        <script>
        function NoteSearch() {
        window.location.href="/NotesSearch";
        }
        </script>
         <a href="{{ url('/menu') }}"class="return">{{ __('messages.Return') }}</a> 
    </body>
</html>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color:#333745;
        color:#E63462;
    }
    .edit,a,input[type=button], input[type=submit], input[type=reset]{
        text-decoration:none;
        color:#E63462;
        border: none;
        background:none;
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