@extends('website.master')

@section('content')
<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">Đội ngũ bác sĩ của chúng tôi</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Đội ngũ bác sĩ</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110 section_padding_bottom_70">
    <div class="container">
        <div class="row isotope_container masonry-layout">
            @foreach($doctors as $doctor)
                @if($doctor->hidden != 1)
                    <div class="isotope-item col-md-4 col-sm-6">
                        <article class="vertical-item with_border thick_border border_radius_4 text-center bottommargin_40">
                            <div class="item-media entry-thumbnail">
                                @php
                                    $avatar = !empty($doctor->avatar) ? $doctor->avatar : 'default.png';   
                                @endphp
                                <img src="{{ asset('avatar/'.$avatar) }}" style=" width: auto; height: 328px;" alt="">
                            </div>
                            <header class="entry-header scheme_background">
                                <a href="{{ route('website.member',['id'=>$doctor->uuid]) }}" class="with_padding">
                                    <h5 class="margin_0 topmargin_1">
                                        @switch($doctor->position)
                                            @case(1)
                                                Ts. 
                                                @break
                                            @case(2)
                                                Ths. 
                                                @break
                                            @default
                                                Bs. 
                                        @endswitch
                                        {{ $doctor->doctor_name }}</h5>
                                </a>
                            </header>
                            <div class="item-content short_text">
                                <p>
                                    {!! $doctor->decription !!}
                                </p>
                                <hr>
                            </div>
                            {{-- <div class="post-meta">
                                <a class="social-icon soc-facebook highlight" href="#" title="Facebook"></a>
                                <a class="social-icon soc-twitter highlight" href="#" title="Twitter"></a>
                                <a class="social-icon soc-google highlight" href="#" title="Google"></a>
                                <a class="social-icon soc-youtube highlight" href="#" title="Youtube"></a>
                            </div> --}}
                        </article>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

@endsection