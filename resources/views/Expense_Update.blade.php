@php
use App\Http\Controllers\ExpenseController;
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ __('messages.Update Income') }}</title>
</head>
<body>
<h2>{{ __('messages.Update Income') }}:</h2>
<form action="{{ action([ExpenseController::class, 'update'], $expense->id ) }}" method="post">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <th>{{ __('messages.New Name') }}:</th>
            <td>
                <input type="text" name="Name" id="Name" value ="{{ $expense->Name }}" />
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.New Source') }}:</th>
            <td>
                <input type="text" name="Source" id="Source" value="{{ $expense->Source }}" />
            </td>
        </tr>

        <tr>
            <th>{{ __('messages.New Amount') }}:</th>
            <td>
                <input type="text" name="Amount" id="Amount" value ="{{ $expense->Amount }}" />
            </td>
        </tr>
        <tr>    
            <td>
                <input type="submit" class="add" value="{{ __('messages.add') }}" />
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
        background-color:#1D1128;
        color:#E5D4ED;
    }
    .add{
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
            .error{
                color:red;
            } 
</style>