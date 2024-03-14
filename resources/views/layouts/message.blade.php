@section('message')
    @if($count > 0)
        {{ $count }}
    @endif
@endsection

@section('message_item')
    @if($count > 0)
        @foreach($messages as $message)
            <div class="dropdown-divider"></div>
            <a href="{{ route('messages.show', ['message' => $message->id]) }}" class="dropdown-item preview-item">
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">{{ $message->name }} send you a message</p>
                    <p class="text-muted mb-0"> {{ $message->created_at->diffForHumans() }} </p>
                </div>
            </a>
        @endforeach
    @endif
@endsection

@section('message_status')
    @if($count > 0)
        <span class="count bg-success"></span>
    @endif
@endsection

@section('search')
    <form action="" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
        <input type="search" class="form-control text-white" placeholder="Search products" name="search">
    </form>
@endsection
