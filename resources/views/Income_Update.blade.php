@php
use App\Http\Controllers\IncomeController;
@endphp
<!DOCTYPE html>
<html>
<head>
  <title>{{ __('messages.Update Income') }}</title>
  <meta charset="UTF-8">
</head>
<h2>{{ __('messages.Update Income') }}:</h2>
<form action="{{ action([IncomeController::class, 'update'], $income->id ) }}" method="post">
    @csrf
    @method('PUT')
    <table>
         <tr>
            <th>{{ __('messages.New Name') }}:</th>
            <td>
                <input type="text" name="Name" id="Name" value ="{{ $income->Name }}" />
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.New Source') }}:</th>
            <td>
                <input type="text" name="Source" id="Source" value="{{ $income->Source }}" />
            </td>
        </tr>

        <tr>
            <th>{{ __('messages.New Amount') }}:</th>
            <td>
                <input type="text" name="Amount" id="Amount" value ="{{ $income->Amount }}" />
            </td>
        </tr>
        <tr>    
            <td>
                <input type="submit" class="submit" value="{{ __('messages.add') }}" />
            </td>
        </tr>
    </table>
    @if (count($errors) > 0)
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</form>
</html>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color:#1D1128;
        color:#E5D4ED;
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
            }
            .submit{
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
