<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            @foreach($mainposts as $key => $post)
                @if ($key > 2) @continue @endif
                <div class="left-side">
                    <div class="masonry-box post-media">
                        <img src="{{ 'post/'.$post->image }}" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-aqua"><a href="{{ route('blog', ['id' => $post->category->id]) }}" title="">{{ $post->category->name }}</a></span>
                                    <h4><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ $post->title }}    </a></h4>
                                    <small><a href="{{ route('single', ['id' => $post->id]) }}" title="">{{ date_format($post->created_at, 'M d, Y') }}</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div>
            @endforeach
        </div>
    </div>
</section>
