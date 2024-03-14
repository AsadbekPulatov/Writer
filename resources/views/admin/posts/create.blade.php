@extends('layouts.admin')
@section('title', 'Create News')
@section('content')
    <h1 class="text-center">Create News</h1>
    @include('layouts.error')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user" value="{{ $id }}">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control mb-3 text-white" value="{{ old('title') }}">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control mb-3 text-white" style="height: 200px">{{ old('description') }}</textarea>
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" class="form-control-file mb-3"><br>
        <label for="category" class="form-label">Category</label>
        <select name="category" id="category" class="form-select mb-3">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

