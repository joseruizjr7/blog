@extends('layouts.app')

@section('content')
 <div class="container">
    <form action="/posts" method="POST" enctype="multipart/form-data">
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
    <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
 </div>
@endsection