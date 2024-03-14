@extends('layouts.admin')
@section('title', 'News List')
@section('content')
    <h1 class="text-center">Post List</h1>
    <div class="d-flex justify-content-end align-items-center m-3">
        @can('post-create')
        <a href="{{ route('posts.create') }}" class="btn btn-success">Add News</a>
        @endcan
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-hover text-center text-white">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>View</th>
            <th>User</th>
            <th>Category</th>
            <th class="w-25">Command</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td style="white-space: pre-line">{{ $post->description }}</td>
                <td>
                    <img src="{{ 'post/'.$post->image}}" style="height: 100px; width: 100px; border-radius: 0%">
                </td>
                <td>{{ $post->view}}</td>
                <td>{{ $post->user->name }}</td>
{{--                <td>{{ $post->category_id}}</td>--}}
                <td>{{ $post->category->name}}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-info">
                        <i class="bi bi-eye-fill"></i> View
                    </a>
                    @can('post-edit')
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    @endcan
                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        @can('post-delete')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection



@include('layouts.message')
