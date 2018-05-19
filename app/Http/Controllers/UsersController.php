<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $id = /Auth::user()->id;
        $user = User::find($id);
        
        
        return view('users.index', [
            'user' => $user,
        ]);
    }
}
