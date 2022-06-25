@php
use App\Http\Controllers\ExpenseController;
@endphp
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h2>Update Income data:</h2>
<form action="{{ action([ExpenseController::class, 'update'], $expense->id ) }}" method="post">
    @csrf
    @method('PUT')
    <table>
         <tr>
            <th>New Name:</th>
            <td>
                <input type="text" name="Name" id="Name" value ="{{ $expense->Name }}" />
            </td>
        </tr>
        <tr>
            <th>New Source:</th>
            <td>
                <input type="text" name="Source" id="Source" value="{{ $expense->Source }}" />
            </td>
        </tr>

        <tr>
            <th>New Amount:</th>
            <td>
                <input type="text" name="Amount" id="Amount" value ="{{ $expense->Amount }}" />
            </td>
        </tr>
        <tr>    
            <td>
                <input type="submit" class="add" value="add" />
            </td>
        </tr>



    </table>
</form>
