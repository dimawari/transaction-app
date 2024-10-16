<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER TRANSACTION PAGE</title>
</head>
<body>

<!-- Back button -->
<form action="{{ route('showAllUsers') }}" method="GET">
    <button type="submit">Back</button>
</form>

<h1>USER TRANSACTION PAGE</h1>

@foreach($users as $user)
    <div>
        <div>Name: {{$user->name}}</div>
        <div>Email: {{$user->email}}</div>
        <div>Transaction Title: {{$user->transaction_title}}</div>
        <div>Description: {{$user->description}}</div>
        <div>Status: {{$user->status}}</div>
        <div>Total Amount: {{$user->total_amount}}</div>
        <div>Transaction Number: {{$user->transaction_number}}</div>
        
        <!-- View and Edit buttons for each user -->
        <form action="{{ route('viewUser', ['id' => $user->id]) }}" method="GET" style="display:inline;">
            <button type="submit">View</button>
        </form>

        <form action="{{ route('editUser', ['id' => $user->id]) }}" method="GET" style="display:inline;">
            <button type="submit">Edit</button>
        </form>
    </div>
    <hr>
@endforeach

</body>
</html>
