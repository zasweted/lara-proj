@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img class=" w-100 p-5 rounded-circle" src="/storage/{{ $user->profile->image }}" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class=" d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                @can('update', $user->profile)
                <a href="/post/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
                
            <div class="d-flex">
                <div class="pe-5"><strong>{{ $user->posts->count() }}</strong>Posts</div>
                <div class="pe-5"><strong>23k</strong>Followers</div>
                <div class="pe-5"><strong>212</strong>Following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title}}
            </div>
            <div>
                {{ $user->profile->description}}
            </div>
            <div>
                <a href="#">{{ $user->profile->url}}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">

        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="">
            </a>
        </div>
        @endforeach


    </div>
</div>
@endsection
