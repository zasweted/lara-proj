<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Image;


class ProfilesController extends Controller
{
    public function appBlade(User $user)
    {
        return view('layouts.app', compact('user'));
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $postCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function() use ($user){
            return $user->posts->count();
        });
        $followerCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function() use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.followings.' . $user->id, now()->addSeconds(30), function() use ($user) {
            return $user->following->count();
        });
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
    }

    public function edit(\App\Models\User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if(request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image'=>$imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }
}