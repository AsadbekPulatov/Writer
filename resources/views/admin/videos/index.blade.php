@extends('layouts.admin')
@section('title', 'Video List')
@section('content')
    <h1 class="text-center">Video List</h1>
    <div class="d-flex justify-content-end align-items-center m-3">
        <a href="{{ route('videos.create') }}" class="btn btn-success">Add Video</a>
    </div>
    <table class="table table-bordered table-hover text-center text-white">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Video</th>
            <th>User</th>
            <th class="w-25">Command</th>
        </tr>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->title }}</td>
                <td>{{ $video->video }}</td>
                <td>{{ $video->user_id }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('videos.show', ['video' => $video->id]) }}" class="btn btn-info">
                        <i class="bi bi-eye-fill"></i> View
                    </a>
                    <a href="{{ route('videos.edit', ['video' => $video->id]) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('videos.destroy', ['video' => $video->id]) }}" method="post">
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


