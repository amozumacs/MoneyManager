@php
use App\Http\Controllers\ExpenseController;
@endphp
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ __('messages.Expense Search') }}</title>
</head>
<body>
<h1> {{ __('messages.Expense Search') }} </h1>
<form method="GET" action="{{
action([App\Http\Controllers\ExpenseController::class, 'search']) }}">
    <input type="text" name="search" required/>
    <button type="submit"  class="search"> {{ __('messages.Search') }}</button>
</form>
<table style="border: 1px solid black">
<tr>
        <td>  {{ __('messages.Name') }} </td>
        <td>  {{ __('messages.Source') }} </td>
        <td>  {{ __('messages.Amount') }} </td>
        <td>  {{ __('messages.Date') }} </td>
        <td> </td>
        </tr>
@if($expenses->isNotEmpty())
@foreach ($expenses as $expense)
        <tr>
        <td> {{ $expense->Name }} </td>
        <td> {{ $expense->Source }} </td>
        <td> {{ $expense->Amount }} </td>
        <td> {{ $expense->created_at }} </td>
</tr>
        @endforeach
</table>
@else 
    <div>
        <h2> {{ __('messages.NoExpense') }}</h2>
    </div>
@endif 
<a href="{{ url('/menu') }}"class="return">{{ __('messages.Return') }}</a> 
</body>
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
            
 </style>