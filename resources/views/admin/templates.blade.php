@extends('layouts.admin')
@section('title', 'Templates')
@section('content')
    <h1 class="text-center">Templates</h1>
    <form action="{{ route('save_temp') }}" method="post">
        @php $temp = \Illuminate\Support\Facades\Session::get('temp', 'news24') @endphp
        @csrf
        <label for="news24" class="form-label">
            <input type="radio" id="news24" name="temp" value="news24" @if($temp=='news24') checked @endif>
            News24</label>

        <br>
        <label for="cloapedia" class="form-label">
            <input type="radio" id="cloapedia" name="temp" value="cloapedia" @if($temp=='cloapedia') checked @endif>
            Cloapedia</label>

        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-info" style="width: 15%">Save</button>
        </div>
    </form>
@endsection
