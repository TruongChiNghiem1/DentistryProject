@extends('website.master')

@section('content')
<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">Dịch vụ đang có tại nha khoa</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="#">Dịch vụ</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110 columns_padding_0 columns_margin_0" id="services">
    <div class="container">
        <div class="row services-container topmargin_10 bottommargin_10">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 service-item service-item-color text-center">
                <div class="with_padding">
                    {{-- <div class="service-icon service-icon-color service-protection"></div> --}}
                    @php
                        $images = !empty($service->images) ? $service->images : 'default.png';   
                    @endphp
                    <img src="{{ asset('images/'. $images) }}" alt="" class="width2-2 service-protection">
                    <p class="fontsize_18 semibold bottommargin_5">{{ $service->services_name }}</p>
                    <div class="margin_0 short_text2">
                        <p>
                            {!! $service->decription !!}
                        </p>
                    </div>
                    <div class="media-links">
                        <a class="abs-link" href="{{ route('website.detail',['id' => $service->uuid]) }}"></a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
@endsection