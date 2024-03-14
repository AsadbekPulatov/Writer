@extends('layouts.cloapedia')
@section('content')
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="single-post-media">
                            <img src="{{ asset('post/'.$post->image) }}" alt="" class="img-fluid">
                        </div>

                        <div class="blog-content">
                            <div class="pp">
                                <h3><strong>{{ $post->title }}</strong></h3>
                            </div><!-- end pp -->


                            <div class="pp">
                                <p>{{ $post->description }}</p>
                            </div><!-- end pp -->
                        </div>
                    </div>
                </div>
            </div>
        </div><
    </section>
@endsection
