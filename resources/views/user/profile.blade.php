@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4 text-center">USER PROFILE</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center align-items-center">
                            @if (Storage::url($user->profile_image))
                                <div class="col-3 text-center">
                                    <!-- Profile Image -->
                                    <img src="{{ Storage::url($user->profile_image) }}" class="rounded-circle img-thumbnail" alt="Profile Image" width="300px" height="300px">
                                </div>
                            @else
                                
                            @endif
                            
                            <div class="col-9 align-middle">
                                <ul class="list-group">
                                    <li class="list-group-item">Name: {{ $user->name }} {{ $user->last_name }}</li>
                                    <li class="list-group-item">Username: {{ $user->username }}</li>
                                    <li class="list-group-item">Email: {{ $user->email }}</li>
                                    @if ($user->username == Auth::user()->username)
                                        <a class="list-group-item list-group-item-action list-group-item-primary" href="{{ route('profile') }}">Edit Profile</a>
                                    @else
                                    @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        @php
            $posts = $user->posts;
        @endphp
        <hr>
        <div class="row justify-content-center">
            <div class="col">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        @if ($post->post_image)
                            <img src="{{ Storage::url($post->post_image) }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Author: <a href="/user/{{ $post->user->id }}">{{ $post->user->name }} {{ $post->user->last_name }}</a></h6>
                            <hr>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection