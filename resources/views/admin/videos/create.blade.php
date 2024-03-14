@extends('layouts.admin')
@section('title', 'Create Video')
@section('content')
    <h1 class="text-center">Create Video</h1>
    @include('layouts.error')
    <form action="{{ route('videos.store') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $id }}" name="user">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control mb-3">
        <label for="video" class="form-label">Video</label>
        <input type="text" id="video" name="video" class="form-control mb-3">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

