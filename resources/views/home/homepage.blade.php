@extends('layouts.home')
@section('title', 'Trang chủ')
@section('seo')
<!-- HTML Meta Tags -->
<meta name="description" content="Cộng đồng chia sẻ và download source code, mã nguồn, đồ án" />
<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="Code Map">
<meta itemprop="description" content="Cộng đồng chia sẻ và download source code, mã nguồn, đồ án">
<meta itemprop="image" content="{{ asset('public/images/home.png') }}">
<!-- Facebook Meta Tags -->
<link rel="canonical" href="{{ app_url }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Code Map" />
<meta property="og:description" content="Cộng đồng chia sẻ và download source code, mã nguồn, đồ án" />
<meta property="og:image" content="{{ asset('public/images/home.png') }}" />
<meta property="og:site_name" content="http://codemap.atwebpages.com" />
<meta property="og:locale" content="vi_VN" />
@endsection
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-inner">
            <div class="page-section">
                <div class="fream-silder">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <!-- loop -->
                                    @foreach($hot as $val)
                                    <div class="carousel-item @if($loop->index == 0) active @endif">
                                        <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                            <img src="{{ $val->cover }}" class="d-block w-100">
                                        </a>
                                    </div>
                                    @endforeach
                                    <!-- end loop -->
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 hidden">
                            <div class="card">
                                <h5 class="card-header card-title2 text-center">
                                    đã có tài khoản?
                                </h5>

                                <div class="card-body">
                                    <p>
                                        <small>
                                            Chúng tôi sẵn sàng hỗ trợ bạn bất cứ lúc nào. Hãy nhấn vào lựa chọn bên dưới.
                                        </small>
                                    </p>
                                    <a href="{{ route('home.register') }}" class="btn text-center" style="width: 100%;color: #fff;background-color: #28a745;border-color: #28a745;">
                                        <i class="fas fa-user-plus"></i> Tạo Tài Khoản
                                    </a>
                                    @if(getUserId() > 0)
                                    @if(Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="btn text-center mt-2" style="width: 100%;color: #fff;background-color: #007bff;border-color: #007bff;" target="_blank">
                                        Trung Tâm Bài Đăng
                                    </a>
                                    @elseif(Auth::user()->role == 'mod')
                                    <a href="#" class="btn text-center mt-2" style="width: 100%;color: #fff;background-color: #007bff;border-color: #007bff;" target="_blank">
                                        Trung Tâm Bài Đăng
                                    </a>
                                    @else
                                    <a href="{{ route('member.dashboard') }}" class="btn text-center mt-2" style="width: 100%;color: #fff;background-color: #007bff;border-color: #007bff;" target="_blank">
                                        Trung Tâm Bài Đăng
                                    </a>
                                    @endif
                                    @else
                                    <a href="#" class="btn text-center mt-2" style="width: 100%;color: #fff;background-color: #007bff;border-color: #007bff;">
                                        Trung Tâm Bài Đăng
                                    </a>
                                    @endif
                                    <a href="{{ route('home.instruct') }}" class="btn text-center mt-2" style="width: 100%;color: #fff;background-color: #007bff;border-color: #007bff;">
                                        Hướng Dẫn Websites
                                    </a>
                                </div>
                            </div>
                            <div class="card">
                                <h5 class="card-header card-title2 text-center">
                                    thông tin
                                </h5>
                                <div class="card-body">
                                    <a href="mailto: devnguhoc@gmail.com" class="link-contact text-muted"><i class="fas fa-envelope"></i> devnguhoc@gmail.com</a><br>
                                    <a href="tel: 0365319298" class="link-contact text-muted"><i class="fas fa-phone-alt"></i> 0365 319 298</a><br>
                                    <a href="https://www.youtube.com/channel/UC5FlP9-_oUfGHLfOcBfPu3w" class="link-contact text-muted" target="_blank"><i class="fab fa-youtube"></i> dev nguhoc</a><br>
                                    <span class="link-contact text-muted"><i class="fas fa-eye"></i> {{ getView() }} lượt xem</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9">
                        <div class="card">
                            <h5 class="card-header card-title2">
                                <i class="far fa-clock"></i> mới cập nhật
                                <a href="{{ route('home.new_post') }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                            </h5>
                            <div class="frame-new-update card-body">
                                <div class="row">
                                    <!-- loop -->
                                    @foreach($new as $val)
                                    <div class="col-md-4 card-{{ $loop->index+1 }}" onmouseover="fhover('{{ $loop->index+1 }}')">
                                        <div class="card card-thumb">
                                            <div class="card-header py-0 px-0 position-relative" style="border-bottom: 1px solid #a9a4a4;">
                                                <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                    <img class="my-thumb-post" src="{{ $val->thumb }}">
                                                    <div class="frame-info-thumb show-{{ $loop->index+1 }}">
                                                        <div class="my-mx-auto text-center">
                                                            <i class="fal fa-eye"></i> {{ number_format($val->views) }} lượt xem
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                    <h5 class="card-title my-thumb-title">{{ $val->title }}</h5>
                                                </a>
                                                <div class="frame-content-thumb-home text-muted mb-1">
                                                    <time><i class="far fa-clock"></i> {{ $val->created_at->diffForHumans() }}</time>&nbsp;
                                                    <time><i class="fas fa-user-edit"></i> {{ $val->User->username }}</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- end loop -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <h5 class="card-header card-title2">
                                <i class="fas fa-parachute-box"></i> tiện ích
                                <a href="{{ route('home.tags_post', ['name'=>'Tiện Ích']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                            </h5>
                            <div class="card-body">
                                <ul style="list-style: none;" class="p-0 m-0">
                                    <!-- loop -->
                                    @foreach($utilities as $val)
                                    <li class="hide-text mb-2">
                                        <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                            <i class="far fa-lightbulb"></i> {{ $val->title }}
                                        </a>
                                        <a class="d-block text-muted" href="">
                                            <small><i class="fal fa-user fa-fw"></i> {{ $val->User->username }}</small>
                                            <small><i class="fal fa-clock"></i> {{ $val->created_at->diffForHumans() }}</small>
                                        </a>
                                    </li>
                                    @endforeach
                                    <!-- end loop -->
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header card-title2">
                                <i class="far fa-lightbulb"></i> thủ thuật
                                <a href="{{ route('home.tags_post', ['name'=>'Thủ Thuật']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                            </h5>
                            <div class="card-body">
                                <ul style="list-style: none;" class="p-0 m-0">
                                    <!-- loop -->
                                    @foreach($tips as $val)
                                    <li class="hide-text mb-2">
                                        <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                            <i class="far fa-lightbulb"></i> {{ $val->title }}
                                        </a>
                                        <a class="d-block text-muted" href="">
                                            <small><i class="fal fa-user fa-fw"></i> {{ $val->User->username }}</small>
                                            <small><i class="fal fa-clock"></i> {{ $val->created_at->diffForHumans() }}</small>
                                        </a>
                                    </li>
                                    @endforeach
                                    <!-- end loop -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="frame-semester-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header card-title2">
                                    <i class="fas fa-project-diagram"></i> đồ án
                                    <a href="{{ route('home.tags_post', ['name'=>'Đồ Án']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                                </h5>
                                <div class="frame-new-update card-body">
                                    <ul style="list-style: none;" class="p-0 m-0">
                                        @foreach($project as $val)
                                        <li class="hide-text mb-2">
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                <span class="num{{ $loop->index+1 }}">{{ $loop->index+1 }}</span>
                                                {{ $val->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header card-title2">
                                    <i class="fas fa-disc-drive"></i> phần mềm
                                    <a href="{{ route('home.tags_post', ['name'=>'Phần Mềm']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                                </h5>
                                <div class="frame-new-update card-body">
                                    <ul style="list-style: none;" class="p-0 m-0">
                                        @foreach($software as $val)
                                        <li class="hide-text mb-2">
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                <span class="num{{ $loop->index+1 }}">{{ $loop->index+1 }}</span>
                                                {{ $val->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header card-title2">
                                    <i class="fas fa-chart-pie"></i> đồ họa
                                    <a href="{{ route('home.tags_post', ['name'=>'Đồ Họa']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                                </h5>
                                <div class="frame-new-update card-body">
                                    <ul style="list-style: none;" class="p-0 m-0">
                                        @foreach($graphic as $val)
                                        <li class="hide-text mb-2">
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                <span class="num{{ $loop->index+1 }}">{{ $loop->index+1 }}</span>
                                                {{ $val->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header card-title2">
                                    <i class="fas fa-briefcase"></i> bài tập
                                    <a href="{{ route('home.tags_post', ['name'=>'Bài Tập']) }}" class="icon-view-more"><i class="fad fa-arrow-alt-circle-right"></i></a>
                                </h5>
                                <div class="frame-new-update card-body">
                                    <ul style="list-style: none;" class="p-0 m-0">
                                        @foreach($homework as $val)
                                        <li class="hide-text mb-2">
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}">
                                                <span class="num{{ $loop->index+1 }}">{{ $loop->index+1 }}</span>
                                                {{ $val->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection