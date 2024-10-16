<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    <h1>User Page</h1>

    <div>Name: {{$user->name}}</div>
    <div>Email: {{$user->email}}</div>
    <div>Status: {{$user->status}}</div>
    <div>Total Amount: {{$user->total_amount}}</div>
    <div>Transaction Number: {{$user->transaction_number}}</div>

    <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST"
          onsubmit="return confirm('Are you sure you want to delete this one? Changes cannot be undone.');">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>
</body>
</html>
