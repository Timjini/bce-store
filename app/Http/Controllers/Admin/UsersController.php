<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use App\Models\User;

class UsersController extends Controller

{
    public $pageTitle = 'Users';

    function index(){
        $users = User::all();

        return view('admin.users.index', [ 'users' => $users]);
    }
}
