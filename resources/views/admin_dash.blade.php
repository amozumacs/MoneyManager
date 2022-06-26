<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('messages.Users') }}</title>
    </head>
    <style>
           body {
                font-family: 'Nunito', sans-serif;
                background-color:#1D1128;
                color:#E5D4ED;
            }
            a {
                text-decoration:none;
                color:#c7f5ff;
            }
            table {
              table-layout: fixed;
              width: 100%;
              border-collapse: collapse;
              border: 3px solid purple;
            }

            thead th:nth-child(1) {
              width: 30%;
            }

            thead th:nth-child(2) {
              width: 20%;
            }

            thead th:nth-child(3) {
              width: 15%;
            }

            thead th:nth-child(4) {
              width: 35%;
            }

            th, td {
              padding: 20px;
            }
            
            .amount{
              color:#DC143C;
            }
            .edit,a,input[type=button], input[type=submit], input[type=reset]{
              display: inline-block;
              outline: 0;
              border: none;
              cursor: pointer;
              font-weight: 600;
              border-radius: 4px;
              font-size: 13px;
              background-color: #1D1128;
              color: white;
              padding: 10px 20px;
              font-family: 'Nunito', sans-serif;
            }

        </style>
    <body>
        <h1>{{ __('messages.Users') }}</h1>
       
        @if(count($users)==0)
        <p color='red'> {{ __('messages.NoRecord') }}!</p> @else
        <table style="border: 1px solid black">
       
        <tr>
        <td> {{ __('messages.Name') }} </td>
        <td> {{ __('messages.Email') }} </td>
        <td> {{ __('messages.Role') }} </td>
        </tr>
        @foreach ($users as $user)
        <tr>
        <td> {{ $user->name }} </td>
        <td> {{ $user->email }} </td>
        <td> {{ $user->role }} </td>
        <td> <form method="POST" action="{{
            action([App\Http\Controllers\AdminController::class, 'destroy'], $user->id)
            }}">@csrf @method('DELETE')<input type="submit" value="{{ __('messages.Delete') }}"></form> 
            </td>
            @endforeach
        </table>
        @endif
      
      
    </body>
</html>