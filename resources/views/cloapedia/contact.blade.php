@extends('layouts.cloapedia')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-envelope-o"></i> Contact us</h2>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" action="{{ route('messages.store') }}" method="post">
                                    @csrf
                                    <h4>Contact form</h4>
                                    <input type="text" class="form-control" name="name" placeholder="Your name">
                                    <input type="text" class="form-control" name="email" placeholder="Email address">
                                    <input type="text" class="form-control" name="title" placeholder="Subject">
                                    <textarea class="form-control" name="message" placeholder="Your message"></textarea>
                                    <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
