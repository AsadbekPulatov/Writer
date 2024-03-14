@extends('layouts.admin')
@section('title', 'Edit News')
@section('content')
    <h1 class="text-center">Edit News</h1>
    @include('layouts.error')
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user" value="{{ $post->user_id }}">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control mb-3 text-white" value="{{ $post->title }}">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control mb-3 text-white" style="height: 200px;">{{ $post->description }}</textarea>
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" class="form-control-file mb-3"><br>
        <label for="category" class="form-label">Category</label>
        <select name="category" id="category" class="form-select mb-3">
            @foreach($categories as $category)
                @if($category->id == $post->category_id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

