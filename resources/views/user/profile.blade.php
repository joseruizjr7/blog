@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="h5">{{ $user->username }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-3 text-center">
                                <!-- Profile Image -->
                                <img src="{{ $user->profile_image }}" class="rounded img-thumbnail" alt="" width="200px" height="200px">
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <h3 class="h3"><b>Name:</b> {{ $user->name }} {{ $user->last_name }}</h5>
                                </div>
                                <div class="row">
                                    <h3 class="h3"><b>Username:</b> {{ $user->username }}</h3>
                                </div>
                                <div class="row">
                                    <h3 class="h3"><b>Email:</b> {{ $user->email }}</h3>
                                </div>
                                @if ($user->username == auth()->user()->username)
                                    <div class="row">
                                        <a class="btn btn-outline-primary" href="{{ route('profile') }}">Edit Profile</a>
                                    </div>
                                @else
                                    
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection