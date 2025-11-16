<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use App\Models\User;

class DashboardController extends Controller

{
    function index(){
       
        $data = [];

        return view('admin.dashboard.index', [ 'data' => $data]);
    }
}
