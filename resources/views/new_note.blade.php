<!DOCTYPE html>
<html>

<head>
  <title>{{ __('messages.AddNote') }}</title>
  <meta charset="UTF-8">
</head>
<body>
<form method="POST" action="{{
action([App\Http\Controllers\NotesController::class, 'store']) }}">
@csrf
    <label for="title">{{ __('messages.TitleNot') }}: </label>
    <input type="text" name="Title" id="Title">
    <label for="Information">{{ __('messages.InformationNot') }}: </label>
    <input type="text" name="Information" id="Information">
    <input type="submit" class="add" value="{{ __('messages.add') }}">
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
    .error{
        color:red;
    }
    body {
        font-family: 'Nunito', sans-serif;
        background-color:#333745;
        color:#E63462;
    }
    .add{
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