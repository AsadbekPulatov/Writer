@extends('layouts.admin')
@section('title', 'Category List')
@section('content')
    <h1 class="text-center">Category List</h1>
    <div class="d-flex justify-content-end align-items-center m-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <table class="table table-bordered table-hover text-center text-white">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th class="w-25">Command</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-info">
                        <i class="bi bi-eye-fill"></i> View
                    </a>
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@include('layouts.message')
