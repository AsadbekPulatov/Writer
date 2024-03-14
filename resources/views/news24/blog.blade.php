@extends('layouts.view')
@section('title', 'Blog')
@section('content')
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('blog') }}">Blog <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('single', ['id' => $id]) }}">Single <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('contact') }}">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    @foreach($posts as $post)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{ asset('post/'.$post->image) }}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <br>
                                <a href="{{ route('single', ['id' => $post->id]) }}" class="fh5co_magna py-2"> {{ $post->title }} </a> <br>
                                <a href="#" class="fh5co_mini_time py-3"> {{ date_format($post->created_at, 'M d, Y') }} </a>
                                <div class="fh5co_consectetur">
                                    {{ \Illuminate\Support\Str::limit($post->description, $limit = 100, $end = ' ... ') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($categories as $category)
                            <a href="{{ route('blog', ['id' => $category->id]) }}" class="fh5co_tagg">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    @foreach($mosts as $most)
                        <a href="{{ route('single', ['id' => $most->id]) }}">
                            <div class="row pb-3">
                                <div class="col-5 align-self-center">
                                    <img src="{{ asset('post/'.$most->image) }}" alt="img" class="fh5co_most_trading"/>
                                </div>
                                <div class="col-7 paddding">
                                    <div class="most_fh5co_treding_font"> {{ \Illuminate\Support\Str::limit($most->title, $limit=50, $end='...')  }}</div>
                                    <div class="most_fh5co_treding_font_123"> {{ date_format($most->created_at, 'M d, Y') }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            {{ $posts->links('news24.pagination') }}
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($mosts as $most)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img">
                                <img src="{{ asset('post/'.$most->image) }}" alt="" class="fh5co_img_special_relative"/>
                            </div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{ route('single', ['id' => $most->id]) }}" class="text-white"> {{ $most->title }} </a>
                                <div class="fh5co_latest_trading_date_and_name_color">{{ date_format($most->created_at, 'M d, Y') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('category')
    @foreach($categories as $category)
        <li><a href="{{ route('blog', ['id' => $category->id]) }}" class="">
                <i class="fa fa-angle-right"></i>&nbsp;&nbsp; {{ $category->name }}</a></li>
    @endforeach
@endsection

@section('most')
    @foreach($mosts as $key => $most)
        <div class="footer_makes_sub_font"> {{ date_format($most->created_at, 'M d, Y') }}</div>
        <a href="{{ route('single', ['id'=>$most->id]) }}" class="footer_post pb-4">
            {{ \Illuminate\Support\Str::limit($most->title, $limit = 54, $end = '...')  }}
        </a>
        @if ($key == 2) @break @endif
    @endforeach
@endsection

@section('last')
    @foreach($lasts as $last)
        <a href="{{ route('single', ['id' => $last->id]) }}" class="footer_img_post_6">
            <img src="{{ asset('post/'.$last->image) }}" alt="img"/>
        </a>
    @endforeach
@endsection
