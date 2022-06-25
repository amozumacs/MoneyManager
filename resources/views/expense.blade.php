<!DOCTYPE html>
<html>
    <head>
        <title>Expenses</title>
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
        <h1>Expense</h1>
       
        @if(count($expenses)==0)
        <p color='red'> There are no records in the database!</p> @else
        <table style="border: 1px solid black">
        
        <tr>
        <td> Name </td>
        <td> Source </td>
        <td> Amount </td>
        <td> Date </td>
        </tr>
        @foreach ($expenses as $expense)
        <tr>
        <td> {{ $expense->Name }} </td>
        <td> {{ $expense->Source }} </td>
        <td class="amount"> {{ $expense->Amount }} </td>
        <td> {{ $expense->created_at }} </td>
        <td> 
            <form method="POST" action="{{
            action([App\Http\Controllers\ExpenseController::class, 'destroy'], $expense->id)
            }}">@csrf @method('DELETE')<input type="submit" value="delete"></form> 
            </td>
            <td> 
                 
            <a href="{{ route('expense.edit',$expense->id)}}" class="return">Edit</a>
            </td>
            @endforeach
        </table>
        @endif
        <p> <input  type="button" value="New Expense" onclick="newExpense()"> </p>
        <script>
        function newExpense() {
        window.location.href="/expense/create";
        }
        </script>
         @can('user')
        <p> <input  type="button" class="button" class="search" value="Expense Search" onclick="ExpenseSearch()"> </p>
        @endcan
        <script>
        function ExpenseSearch() {
        window.location.href="/ExpenseSearch";
        }
        </script>
         <a href="{{ url('/menu') }}"class="return">Return</a> 
    </body>
</html>