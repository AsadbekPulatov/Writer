@extends('layouts.admin')
@section('title', 'Messages')
@section('content')
    <h1 class="text-center">Message List</h1>
    <table class="table table-bordered table-hover text-center text-white">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Message</th>
            <th>Activity</th>
            <th class="w-25">Command</th>
        </tr>
        @foreach($messagess as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->name}}</td>
                <td>{{ $message->email  }}</td>
                <td>{{ $message->title }}</td>
                <td>{{ \Illuminate\Support\Str::limit($message->message, $limit=30, $end=' ... ') }}</td>
                <td>
                    @if($message->activity == true)
                    <button class="btn bg-success">New</button>
                    @else
                        <button class="btn bg-danger">Old</button>
                    @endif
                </td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('messages.show', ['message' => $message->id]) }}" class="btn btn-info">
                        <i class="bi bi-eye-fill"></i> View
                    </a>
{{--                    <a href="{{ route('messages.edit', ['message' => $message->id]) }}" class="btn btn-warning">--}}
{{--                        <i class="bi bi-pencil-square"></i> Edit--}}
{{--                    </a>--}}
                    <form action="{{ route('messages.destroy', ['message' => $message->id]) }}" method="post">
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


