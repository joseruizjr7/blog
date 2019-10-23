@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#createPostModal">New Post</button>
        </div>
    </div>
    @if ($posts)
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
                
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        @if ($post->post_image)
                        <img src="{{ asset($post->post_image) }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Author: <a href="{{ url('/user/'.$post->user->id) }}">{{ $post->user->name }} {{ $post->user->last_name }}</a></h6>
                            <hr>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="#" class="btn btn-primary">View More</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at->isoFormat('LLLL') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        Nothing here :(
    @endif
        
</div>

<!-- Modal -->
<div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalTitle">Create a new post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_image">Image</label>
                            <input id="post_image" type="file" class="form-control" name="post_image" role="form" enctype="multipart/form-data">
                        </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Done</button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
