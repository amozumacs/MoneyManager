
@php
use App\Http\Controllers\IncomeController;
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ __('messages.Income Search') }}</title>
</head>
<h1> {{ __('messages.Income Search') }} </h1>
<form method="GET" action="{{
action([App\Http\Controllers\IncomeController::class, 'search']) }}">
    <input type="text" name="search" required/>
    <button type="submit" class="search">{{ __('messages.Search') }}</button>
</form>
<table style="border: 1px solid black">
<tr>
        <td> {{ __('messages.Name') }} </td>
        <td> {{ __('messages.Source') }} </td>
        <td> {{ __('messages.Amount') }} </td>
        <td> {{ __('messages.Date') }} </td>
        <td> </td>
        </tr>
@if($incomes->isNotEmpty())
@foreach ($incomes as $income)
        <tr>
        <td> {{ $income->Name }} </td>
        <td> {{ $income->Source }} </td>
        <td> {{ $income->Amount }} </td>
        <td> {{ $income->created_at }} </td>
</tr>
        @endforeach
</table>
@else 
    <div>
        <h2>{{ __('messages.NoIncome') }}</h2>
    </div>
@endif
<a href="{{ url('/menu') }}"class="return">{{ __('messages.Return') }}</a> 
</html>
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
            .search{
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
 </style>