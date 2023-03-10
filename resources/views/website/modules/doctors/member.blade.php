@extends('website.master')

@section('content')
<section class="page_breadcrumbs cs parallax section_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="highlight bold">
                    @switch($doctors->position)
                        @case(1)
                            Ts. 
                            @break
                        @case(2)
                            Ths. 
                            @break
                        @default
                            Bs. 
                    @endswitch
                    {{ $doctors->doctor_name }}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('website.index') }}">
                        Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('website.doctors') }}">Đội ngũ bác sĩ</a>
                    </li>
                    <li class="active">{{ $doctors->doctor_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_110">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 text-center">
                <article class="vertical-item bottommargin_30">
                    <div class="item-media team_member_photo">
                        @php
                                $avatar = !empty($doctors->avatar) ? $doctors->avatar : 'default.png';   
                            @endphp
                            <img src="{{ asset('avatar/'.$avatar) }}" alt="">
                    </div>
                    <header class="entry-header">
                        <div class="with_padding maintransp_bg_color">
                            <h5 class="margin_0 topmargin_1">
                                @switch($doctors->position)
                                    @case(1)
                                        Ts. 
                                        @break
                                    @case(2)
                                        Ths. 
                                        @break
                                    @default
                                        Bs. 
                                @endswitch
                                {{ $doctors->doctor_name }}</h5>
                            {{-- <p class="highlight margin_0">{{ $doctors->doctor_name }}</p> --}}
                        </div>
                    </header>
                </article>
            </div>
            <div class="col-md-7 col-sm-12">
                {{-- <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Biography</a></li>
                    <li><a href="#tab2" role="tab" data-toggle="tab">Skills</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content no-border maintransp_bg_color top-color-border bottommargin_30">
                    <div class="tab-pane fade in active" id="tab1">
                        <p class="fontsize_20 bottommargin_10 grey"><strong>Biography:</strong></p>
                        <p class="line_heght_2">
                            Aliquip shank kielbasa tenderloin filet mignon. Beef ribs frankfurter sciutto co excepteur nostrud, quis salami swine fatback aute non culpa. Ank kevin ball tip jerky veniam duis rump pork belly. Labore shoulder laboris hamburger proident. Cupidatat pork chop cow beef meatloaf pancetta. In ad kevin pork belly cetta landjaeger.
                        </p>
                        <p class="fontsize_20 bottommargin_10 grey"><strong>Professional Life:</strong></p>
                        <p class="line_heght_2 bottommargin_-10">
                            Salami spare ribs nisi labore, tail boudin sed id sausage fatback sunt urkey. Ut pork belly voluptate leberkas sirloin biltong strip steak pariatur alcatra beef ribs venison veniam labore.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <p>
                            <strong class="grey">Skill Name</strong> 
                            <span class="pull-right">90%</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="90">
                                <span>90%</span>
                            </div>
                        </div>
                        <p>
                            <strong class="grey">Skill Name</strong> 
                            <span class="pull-right">100%</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="100">
                                <span>100%</span>
                            </div>
                        </div>
                        <p>
                            <strong class="grey">Skill Name</strong> 
                            <span class="pull-right">75%</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="75">
                                <span>75%</span>
                            </div>
                        </div>
                        <p>
                            <strong class="grey">Skill Name</strong> 
                            <span class="pull-right">95%</span>
                        </p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="95">
                                <span>95%</span>
                            </div>
                        </div>
                    </div> --}}
                        
                </div>
                <!-- eof .tab-content -->
                {!! $doctors->decription !!}
            </div>
        </div>
    </div>
</section>
@endsection