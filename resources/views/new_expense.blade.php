<!DOCTYPE html>
<html>
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
</style>
<head>
<title>Add Expense</title>
</head>
<body>
<form method="POST" action="{{
action([App\Http\Controllers\ExpenseController::class, 'store']) }}">
@csrf
<label for="Name">Name: </label>
<input type="text" name="Name" id="Name">
<label for="Source">Source: </label>
<input type="text" name="Source" id="Source">
<label for="Amount">Amount: </label>
<input type="text" name="Amount" id="Amount">

<input type="submit" class="add" value="add">
</form>
</body>
</html>