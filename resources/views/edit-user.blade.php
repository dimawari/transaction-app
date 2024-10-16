<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>
<body>
    <form action="{{route('updateUser', ['id'=>$user->id])}}" method="PUT">
        @method
        @csrf
        <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name= "email" required><br>

    <label for="transaction_title">Transaction Title:</label>
    <input type="text" id="transaction_title" name="transaction_title" required><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="authorized">Authorized</option>
        <option value="pending">Pending</option>
        <option value="posted">Posted</option>
        <option value="settled">Settled</option>
        <option value="cancelled">Cancelled</option>
        <option value="voided">Voided</option>
        <option value="refunded">Refunded</option>
        <option value="returned">Returned</option>
    </select><br>

    <label for="total amount">Total Amount:</label>
    <input type="text" id="total_amount" name="total_amount" required><br>

    <label for="transaction_number">Transaction Number:</label>
    <input type="text" id="transaction_number" name="transaction_number" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Submit</button>

</select>

<form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this one? Changes cannot be undone.');">
    @method('DELETE')
    @csrf
    <button type="submit">Delete</button>
</form>



    </form>
</body>
</html>