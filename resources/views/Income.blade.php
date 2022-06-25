<!DOCTYPE html>
<html>
    <head>
        <title>Income</title>
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
              color:#50C878
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
        <h1>Income</h1>
       
        @if(count($incomes)==0)
        <p color='red'> There are no records in the database!</p> @else
        <table style="border: 1px solid black">
        
        <tr>
        <td> Name </td>
        <td> Source </td>
        <td> Amount </td>
        <td> Date </td>
        </tr>
        @foreach ($incomes as $income)
        <tr>
        <td> {{ $income->Name }} </td>
        <td> {{ $income->Source }} </td>
        <td class="amount"> {{ $income->Amount }} </td>
        <td> {{ $income->created_at}} </td>
        <td> 
            <form method="POST" action="{{
            action([App\Http\Controllers\IncomeController::class, 'destroy'], $income->id)
            }}">@csrf @method('DELETE')<input type="submit" value="delete"></form> 
            </td>
            <td> 
                 
            <a href="{{ route('income.edit',$income->id)}}" class="return">Edit</a>
            </td>
            @endforeach
        </table>
        @endif
        <p> <input  type="button" class="gradient-border" value="New Income" onclick="newIncome()"> </p>
        <script>
        function newIncome() {
        window.location.href="/income/create";
        }
        </script>
         @can('user')
        <p> <input  type="button" class="button" class="search" value="Income Search" onclick="IncomeSearch()"> </p>
        @endcan
        <script>
        function IncomeSearch() {
        window.location.href="/IncomeSearch";
        }
        </script>
         <a href="{{ url('/menu') }}"class="return">Return</a> 
         
    </body>
</html>