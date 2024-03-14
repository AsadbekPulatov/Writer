@extends('layouts.admin')
@section('title', 'Create Category')
@section('content')
    <h1 class="text-center">Create Category</h1>
    @include('layouts.error')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name" class="form-label">Name</label>
        <input type="text" id="name" name="name" class="form-control mb-3 text-white">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection

