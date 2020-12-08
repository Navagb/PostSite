<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostcontroller extends Controller
{
    public function index(User $user)
    {

        return view('user.index', [
            'user' => $user,
            'posts' => $user->posts()->paginate(5),
            'categories'=>Category::all()
        ]);
    }
}
