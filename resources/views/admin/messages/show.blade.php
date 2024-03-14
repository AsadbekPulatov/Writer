@extends('layouts.admin')
@section('title', 'Messages')
@section('content')
    <h1>{{ $message->title }}</h1>
    <p>{{ $message->message }}</p>
@endsection
