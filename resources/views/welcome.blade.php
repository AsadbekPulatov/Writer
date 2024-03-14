@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <section class="light">
        <div class="container py-2">
            <div class="h1 text-center text-dark" id="pageHeaderTitle">POSTS</div>
            @foreach($posts as $post)
                <article class="postcard light red">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="{{'/post/'.$post->image}}" alt="Image Title" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h1 class="postcard__title red"><a href="#">{{ $post->title }}</a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ date_format($post->created_at, 'l, M jS Y') }}
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt" style="white-space: pre-wrap">{{ $post->description }}</div>
                        <ul class="postcard__tagbox">
                            <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{ $post->category->category }}</li>
                            <li class="tag__item"><i class="fas fa-clock mr-2"></i>{{ $post->created_at->diffForHumans() }}</li>
                            <li class="tag__item play red">
                                <a href="#"><i class="fas fa-play mr-2"></i>{{ $post->user->name }}</a>
                            </li>
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    {{ $posts->links() }}
@endsection

