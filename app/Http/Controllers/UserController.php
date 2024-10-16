<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAllUsers(){
        $users = User::orderBy( 'total_amount', 'asc')->get();
        return view('users', ['users' => $users]);
    }

    public function run(): void
    {
        User::factory(10)->create();
    }

    public function createUser(){
        return view('createUser');
    }

    public function storeUser(Request $request) 
    {
        $validatedData = $request->validate([
            'name'=> 'required|string|max:225',
            'email'=> 'required|string:max:225',
            'transaction_title'=> 'required|string|max:20',
            'description' => 'required|string|max:150',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|numeric|min:0',
            'transaction_number' => 'required|max:8',
            'password' => 'required|string|min:9|max:255|confirmed',

        ]);

        $user =new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $transaction_title = $validatedData['transaction_title'];
        $description = $validatedData['description'];
        $user->status = $validatedData['status'];
        $total_amount = $validatedData['total_amount'];
        $transaction_number = $validatedData['transaction_number'];
        $user->password = Hash::make($validatedData['password']);

        $user->save();

        return redirect()->route('showAllUsers')->with('success', 'User created succesfully!');
    }

    public function viewUser(Request $request){
        $user = User::find($request->id);
        return view('user', ['user' => $user]);
    }

    public function editUser(Request $request){
        $user = User::find($request->id);
        return view('edit-user', ['user' => $user]);
    }

    public function updateUser(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|string|max:225',
            'email'=> 'required|string:max:225',
            'transaction_title'=> 'required|string|max:20',
            'description' => 'required|string|max:150',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|numeric|min:0',
            'transaction_number' => 'required|max:8',
            'password' => 'required|string|min:9|max:255|confirmed',

        ]);

        $user = User::find($request->id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $transaction_title = $validatedData['transaction_title'];
        $description = $validatedData['description'];
        $user->status = $validatedData['status'];
        $total_amount = $validatedData['total_amount'];
        $transaction_number = $validatedData['transaction_number'];
        $user->password = Hash::make($validatedData['password']);

        $user->save();

        return redirect()->route('viewUser', ['id'=>$user->id])->with('success', 'User updated successfully!');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        if ($user){
            $user->delete;
        }
        return redirect()->route('showAllUsers')->with('success', 'User deleted successfully!');
    }


}
