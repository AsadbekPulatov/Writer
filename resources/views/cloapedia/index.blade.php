@extends('layouts.cloapedia')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-home"></i> Home</h2>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    @include('cloapedia.main_post')
    <section class="section">
        <div class="container">
            <hr class="invis1">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-list clearfix">
                        @foreach($posts as $post)
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="{{ route('single', ['id' => $post->id]) }}" title="">
                                            <img src="{{ 'post/'.$post->image }}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ $post->title }}</a></h4>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($post->description, $limit = 100, $end = ' ... ') }}
                                    </p>
                                    <small><a href="{{ route('blog', ['id' => $post->category->id]) }}" title="">{{ $post->category->name }}</a></small>
                                    <small><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ date_format($post->created_at, 'M d, Y') }}</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">
                        @endforeach
                    </div><!-- end blog-list -->
                </div><!-- end col -->
            </div>
        </div>
    </section>
@endsection
