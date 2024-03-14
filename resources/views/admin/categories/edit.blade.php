@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
    <h1 class="text-center">Edit Category</h1>
    @include('layouts.error')
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control mb-3 text-white" value="{{ $category->name }}">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

