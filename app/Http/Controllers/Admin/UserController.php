<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        //count how many transactions are made by user
        // $usersTransaction = User::with('transactions')->get();
        //data user and transaction
        $users = User::with('transaction')->get();
        // dd($users);
        return view('admin.user.users', [
            'users' => $users
        ]);
    }
}
