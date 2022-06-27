<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ __('messages.AddInc') }}</title>
</head>
<body>
<form method="POST" action="{{
action([App\Http\Controllers\IncomeController::class, 'store']) }}">
@csrf
<label for="name">{{ __('messages.Name') }}: </label>
<input type="text" name="Name" id="Name">
<label for="description">{{ __('messages.Source') }}: </label>
<input type="text" name="Source" id="Source">
<label for="duration">{{ __('messages.Amount') }}: </label>
<input type="text" name="Amount" id="Amount">

<input type="submit" class="add" value="{{ __('messages.add') }}">
</form>
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
</style>