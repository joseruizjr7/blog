
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
