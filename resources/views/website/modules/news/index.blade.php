@extends('website.master')

@section('content')
<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">Tin tức</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Tin tức</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110">
    <div class="container">
        <div class="row bottommargin_75">
            <div class="col-xs-12">
                <article id="blog-gallery-slider" class="carousel slide ds">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#blog-gallery-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#blog-gallery-slider" data-slide-to="1"></li>
                        <li data-target="#blog-gallery-slider" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @php
                            $i=0;
                        @endphp
                        @foreach($news as $new)
                        <div class="item {{ $i == 0 ? 'active' : '' }}">
                            <div class="vertical-item content-absolute vertical-center">
                                <div class="item-media">
                                    @php
                                        $images = !empty($new->images) ? $new->images : 'default.png';   
                                    @endphp
                                    <img class="media-object" src="{{ asset('images/'. $images) }}" alt="">
                                </div>
                                <div class="item-content">
                                    <div class="display_table">
                                        <div class="display_table_cell text-center">
                                            <a href="{{ route('website.newsdetail',['id' => $new->uuid]) }}"><h2 class="margin_0">{{ $new->intro }}</h2></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                            if( $i == 3 )
                                break;
                        @endphp
                        @endforeach
                    </div>
                </article>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4">
                
                <!-- .post --> 
                @foreach($news as $new)
                <article class="vertical-item with_border thick_border border_radius_4 post format-standart">
                    <div class="item-media entry-thumbnail">
                        @php
                            $images = !empty($new->images) ? $new->images : 'default.png';   
                        @endphp
                        <img src="{{ asset('images/'. $images) }}" alt="">
                    </div>
                    <header class="entry-header scheme_background">
                        <a href="{{ route('website.newsdetail',['id' => $new->uuid]) }}" class="with_padding">
                            <time datetime="2016-08-01T15:05:23+00:00" class="entry-date">
                            {{ $new->created_at }}
                            </time>
                            <h4 class="entry-title">{{ $new->intro }}</h4>
                        </a>
                    </header>

                    <div class="item-content short_text">
                        {!! $new->decription !!}
                        <hr>
                    </div>
                    <div class="post-meta">
                        <span class="views"><i class="fa fa-eye highlight"></i> <span class="semibold">4806</span></span>
                        <span class="likes"><i class="fa fa-heart-o highlight"></i> <span class="semibold">350</span></span>
                        <span class="comments"><i class="fa fa-comment-o highlight"></i> <span class="semibold">45</span></span>		
                    </div>
                </article>
                @endforeach
            </div>
            <!--eof .col-sm-8 (main content)-->
            <!-- sidebar -->
            <aside class="col-sm-5 col-md-4 col-lg-4 col-sm-pull-7 col-md-pull-8 col-lg-pull-8">
                <div class="widget widget_text margin-top40">
                    <h3 class="widget-title">Theo dõi tôi</h3>
                    <div class="text-center">
                        <a href="https://www.facebook.com/TruongChiNghiem3009/" class="social-icon big-icon color-bg-icon soc-twitter">
                        <span>34.5K</span>
                        <span>Friends</span>
                        </a>
                        <a href="https://www.facebook.com/TruongChiNghiem3009/" class="social-icon big-icon color-bg-icon soc-facebook">
                        <span>3.2K</span>
                        <span>Follows</span>
                        </a>
                        <a href="https://www.facebook.com/TruongChiNghiem3009/" class="social-icon big-icon color-bg-icon soc-google">
                        <span>15.7K</span>
                        <span>Friends</span>
                        </a>
                        <!--                     <a href="#" class="social-icon big-icon color-bg-icon block-icon">
                            <i class="rt-icon2-heart"></i>
                            <span>53.4K</span>
                            <span>People Loves Us</span>
                            </a> -->
                    </div>
                </div>
                <div class="widget widget_recent_entries">
                    <h3 class="widget-title">Tin mới nhất</h3>
                    <ul class="darklinks">
                        @php
                            $i=0;
                        @endphp
                        @foreach($news as $new)
                        <li class="media">
                            <a class="media-left" href="blog-single-right.html">
                                @php
                                        $images = !empty($new->images) ? $new->images : 'default.png';   
                                    @endphp
                            <img class="media-object" src="{{ asset('images/'. $images) }}" alt="">
                            </a>
                            <div class="media-body media-middle">
                                <a href="{{ route('website.newsdetail',['id' => $new->uuid]) }}" class="bold inline-block">{{ $new->intro }}</a><br>
                                <time datetime="2016-09-03T15:05:23+00:00" class="entry-date highlight small-text bold">{{ $new->created_at }}</time>
                            </div>
                        </li>
                        @php
                            $i++;
                            if( $i == 3 ) 
                                break;
                        @endphp
                        
                        @endforeach
                    </ul>
                </div>
            </aside>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>
@endsection