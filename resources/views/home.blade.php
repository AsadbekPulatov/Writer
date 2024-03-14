@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-evenly p-5 align-items-center">
        <div class="card-item">
            <p>Posts</p>
            <p>{{ $posts->count() }}</p>
        </div>
        <div class="card-item">
            <p>Views</p>
            <p>{{ $views }}</p>
        </div>
        <div class="card-item">
            <p>Categories</p>
            <p>{{ $categories->count() }}</p>
        </div>
        <div class="card-item">
            <p>Videos</p>
            <p>{{ $videos->count() }}</p>
        </div>
        <div class="card-item">
            <p>Messages</p>
            <p>{{ $messagess->count() }}</p>
        </div>
    </div>
@endsection

@include('layouts.message')

