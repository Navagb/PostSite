<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('create');
    }

    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->with('user')->paginate(10);
        $recomendeds = Post::inRandomOrder()->take(10)->get();
        return view('post.index', [
            'posts' => $posts,
            'recomendeds' => $recomendeds,
            'categories' => Category::get(),
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', [
            'categories' => $categories,
        ]);
    }

    public function show(Post $post)
    {

        return view('post.show', [
            'post' => $post,
            'categories'=>Category::all(),
        ]);
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required|max:255',
            'meta_title' => 'required',
            'text' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'text' => $request->text,
            'user_id' => auth()->user()->id,
        ]);

        foreach ($request->categories as $category) {
            $post->categories()->attach($category);
        }
        return redirect()->route('home');
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
