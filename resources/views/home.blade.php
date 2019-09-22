@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="card mb-3">
                    @if ($post->post_image)
                    <img src="{{asset($post->post_image)}}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author: {{ $post->user->name }} {{ $post->user->last_name }}</h6>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
