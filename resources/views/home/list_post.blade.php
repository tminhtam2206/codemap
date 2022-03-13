@extends('layouts.home')
@section('title', 'Bài đăng')
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-inner">
            <div class="page-section">
                <div class="card">
                    <h5 class="card-header card-title2">
                        <i class="fas fa-layer-group"></i> bài đăng
                    </h5>
                    <div class="frame-new-update card-body">
                        <div class="row">
                            <!-- loop -->
                            @foreach($post as $val)
                            <div class="col-md-3 card-{{ $loop->index+1 }}" onmouseover="fhover('{{ $loop->index+1 }}')">
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
                {!! $post->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection