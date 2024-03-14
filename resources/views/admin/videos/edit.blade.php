@extends('layouts.admin')
@section('title', 'Edit Video')
@section('content')
    <h1 class="text-center">Edit Video</h1>
    @include('layouts.error')
    <form action="{{ route('videos.update', ['video' => $video->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $video->user_id }}" name="user">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control mb-3" value="{{ $video->title }}">
        <label for="video" class="form-label">Video</label>
        <input type="text" id="video" name="video" class="form-control mb-3" value="{{ $video->video }}">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

