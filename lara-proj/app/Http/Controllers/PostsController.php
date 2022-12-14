<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as P;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = P::whereIn('user_id', $users)->with('user')->latest()->paginate(5); //or use  latest()

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('/profile/' . auth()->user()->id);
        
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);

        // return view('posts.show', compact('post')); alternativa
    }
}
