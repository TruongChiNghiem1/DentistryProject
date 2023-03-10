@extends('website.master')

@section('content')

<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">{{ $service->services_name }}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('website.services') }}">Dịch vụ</a>
                    </li>
                    <li class="active">{{ $service->services_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @php
                    $images = !empty($service->images) ? $service->images : 'default.png';   
                @endphp
                <img src="{{ asset('images/'. $images) }}" alt="" class="alignleft">
                <h3 class="entry-title topmargin_5 bottommargin_30 entry-date">{{ $service->services_name }}</h3>
                <p>Giá chỉ từ: {{ number_format($service->price, 0, "", ".") }}VND</p>
                {!! $service->decription !!}
            </div>
        </div>
    </div>
</section>
@endsection