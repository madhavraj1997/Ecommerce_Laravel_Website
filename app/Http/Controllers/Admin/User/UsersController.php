<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('Admin.User.users', compact('users'));

    }
    public function viewUser($id){
        $users = User::find($id);
        return view('Admin.User.viewUsers', compact('users')); 
    }

}
