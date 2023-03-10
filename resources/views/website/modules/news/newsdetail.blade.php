@extends('website.master')

@section('content')

<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">{{ $news->intro }}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang Chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('website.news') }}">Tin tức</a>
                    </li>
                    <li class="active">{{ $news->intro }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls ms">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="embed-responsive embed-responsive-16by9">
                        @php
                            $images = !empty($news->images) ? $news->images : 'default.png';   
                        @endphp
                        <img class="media-object" src="{{ asset('images/'. $images) }}" alt="">
                        {{-- <a href="https://www.youtube.com/embed/9PLNeLNRbKc" class="embed-placeholder"> --}}
                            {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/9PLNeLNRbKc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        {{-- <img src="{{ asset('website/images/gallery/02.jpg') }}" alt=""> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8 col-lg-8">
                <div class="with_border thick_border">
                    <article>
                        <header class="entry-header scheme_background">
                            <div class="with_padding">
                                <time datetime="2016-08-01T15:05:23+00:00" class="entry-date">
                                    {{ $news->created_at }}
                                </time>
                                <h4 class="entry-title">{{ $news->intro }}</h4>
                            </div>
                        </header>
                        <!-- .entry-header -->
                        <div class="with_padding">
                            <div class="with_background post-adds">
                                <a href="#" class="theme_button color1">
                                <i class="fa fa-mail-forward"></i>
                                </a><a href="#" class="theme_button inverse">
                                <i class="fa fa-heart-o"></i>
                                </a>
                                <span class="item-likes">
                                35 likes
                                </span>
                                <span class="views-count main_bg_color pull-right">
                                <strong>23573</strong> views
                                </span>
                            </div>
                            <div class="entry-content ">
                                {!! $news->decription !!}
                            </div>
                            <!-- .entry-content -->
                            
                        </div>
                    </article>
                </div>
                {{-- <div class="row blog-buttons columns_padding_5">
                    <div class="col-md-6">
                        <a class="vertical-item content-absolute vertical-center text-center ds inline-block" href="#">
                            <div class="item-media">
                                <img src="{{ asset('website/images/blog-prev.jpg') }}" alt="">
                                <div class="media-links">
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="display_table">
                                    <div class="display_table_cell">
                                        <h6 class="highlight fontsize_13">prev</h6>
                                        <p class="fontsize_18 semibold grey">Fatback short ribs pork belly sausage andouille </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="vertical-item content-absolute vertical-center text-center ds inline-block" href="#">
                            <div class="item-media">
                                <img src="{{ asset('website/images/blog-next.jpg') }}" alt="">
                                <div class="media-links">
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="display_table">
                                    <div class="display_table_cell">
                                        <h6 class="highlight fontsize_13">next</h6>
                                        <p class="fontsize_18 semibold grey">Frankfurter beef ribs turducken landjaeger ground round</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!--eof .col-sm-8 (main content)-->
            <!-- sidebar -->
            <aside class="col-sm-5 col-md-4 col-lg-4">
                <div class="widget widget_text">
                    <h3 class="widget-title">Get in touch</h3>
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
                        {{-- {{ $i=1 }} --}}
                        
                        @foreach($news2 as $new)
                        <li class="media">
                            <a class="media-left" href="{{ route('website.newsdetail',['id' => $new->uuid]) }}">
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
                        @if( $new->id == 4 ) 
                            @break
                        @endif
                        @endforeach
                    </ul>
                </div>
            </aside>
            <!-- eof aside sidebar -->
        </div>
    </div>
</section>
@endsection