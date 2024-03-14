@extends('layouts.view')
@section('title', 'Contact')
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
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('blog') }}">Blog <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('single', ['id' => $id]) }}">Single <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('contact') }}">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid contact_us_bg_img">
        <div class="container">
            <div class="row">
                <a href="#" class="fh5co_con_123"><i class="fa fa-home"></i></a>
                <a href="#" class="fh5co_con pt-2"> Contact Us </a>
            </div>
        </div>
    </div>
    <div class="container-fluid  fh5co_fh5co_bg_contcat">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Call Us</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">+1 800 559 658</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Have any questions?</span>
                            <span class="d-block c_g fh5co_contact_us_no_text">News@example.com</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                        <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                            <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-map-marker"></i></span> </div>
                        </div>
                        <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                            <span class="c_g d-block">Address</span>
                            <span class="d-block c_g fh5co_contact_us_no_text"> 123 Some Street USA</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-4">
        <div class="container">
            <div class="col-12 text-center contact_margin_svnit ">
                <div class="text-center fh5co_heading py-2">Contact Us</div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form class="row" id="fh5co_contact_form" action="{{ route('messages.store') }}" method="post">
                        @csrf
                        <div class="col-12 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="name" placeholder="Enter Your Name" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="email" placeholder="E-mail" />
                        </div>
                        <div class="col-6 py-3">
                            <input type="text" class="form-control fh5co_contact_text_box" name="title" placeholder="Subject" />
                        </div>
                        <div class="col-12 py-3">
                            <textarea class="form-control fh5co_contacts_message" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12 py-3 text-center"> <button type="submit" class="btn contact_btn">Send Message</button> </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 align-self-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3168.639290621062!2d-122.08624618469247!3d37.421999879825215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1514861541665" class="map_sss" allowfullscreen></iframe>
                </div>
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
