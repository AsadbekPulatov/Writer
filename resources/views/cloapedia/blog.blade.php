@extends('layouts.cloapedia')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-newspaper-o"></i> Blog</h2>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('single', ['id' => $post->id]) }}" title="">
                                                    <img src="{{ asset('post/'.$post->image) }}" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <h4><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ $post->title }}</a></h4>
                                                <p>
                                                    {{ \Illuminate\Support\Str::limit($post->description, $limit = 100, $end = ' ... ') }}
                                                </p>
                                                <small><a href="{{ route('blog', ['id' => $post->category->id]) }}" title="">{{ $post->category->name }}</a></small>
                                                <small><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ date_format($post->created_at, 'M d, Y') }}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
