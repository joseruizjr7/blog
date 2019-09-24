@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                            <div class="col-md-6">
                                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', auth()->user()->username) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>
                                            <div class="col-md-6">
                                                <input id="profile_image" type="file" class="form-control" name="profile_image">
                                                @if (auth()->user()->image)
                                                    <code>{{ auth()->user()->image }}</code>
                                                @endif
                                            </div>
                                            @if ($user->profile_image)
                                                <img class="mr-1" src="{{ asset(Auth::user()->profile_image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                                            @endif
                                        </div>

                                        

                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                <a href="/home" class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection