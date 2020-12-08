<?php

namespace App\Http\Controllers;

use App\Models\Comentary;
use App\Models\Post;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    public function store(Request $request, Post $post){
       

        $comment = Comentary::create([
            'user_id'=> auth()->user()->id, 
            'post_id' => $post->id, 
            'body' => $request->comment,

        ]);
        
        return back(); 

    }
}
