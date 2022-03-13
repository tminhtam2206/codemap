@extends('layouts.home')
@section('title', $post->title)
@section('seo')
<!-- HTML Meta Tags -->
<meta name="description" content="{{ $post->title }}" />
<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="{{ $post->title }}">
<meta itemprop="description" content="{{ $post->title }}">
<meta itemprop="image" content="{{ $post->thumb }}">
<!-- Facebook Meta Tags -->
<link rel="canonical" href="{{ app_url }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ $post->title }}" />
<meta property="og:image" content="{{ $post->thumb }}" />
<meta property="og:site_name" content="http://codemap.atwebpages.com" />
<meta property="og:locale" content="vi_VN" />
@endsection
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb rounded-top">
                    <li class="breadcrumb-item first-item">
                        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('home.list_post') }}">Bài đăng</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>
            <div class="my-card card shadow-sm">
                <div class="card-body">
                    <div class="frame-title mb-3">
                        <div class="frame-title-img">
                            <img src="{{ $post->thumb }}" alt="">
                        </div>
                        <div class="frame-title-content">
                            <h1>{{ $post->title }}</h1>
                            <small><i class="far fa-clock"></i> {{ date('d/m/Y H:m:i', strtotime($post['updated_at'])) }}</small><br>
                            <small><i class="fas fa-user"></i> {{ $post->User->username }}&nbsp;&nbsp;
                                <i class="fas fa-eye"></i> {{ number_format($post->views) }}&nbsp;&nbsp;
                                <i class="fas fa-comments-alt"></i> {{ count($comment) }}
                                @if($check_link)
                                &nbsp;&nbsp;<i class="fas fa-cloud-download"></i> {{ $post->downloads }}
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="cls"></div>
                    @if($post->video != '')
                    <div data-toggle="plyr" data-plyr-provider="youtube" data-plyr-embed-id="{{ $post->video }}"></div><br>
                    @endif
                    {!! $post->content !!}
                    @if($check_link)
                    <div class="download-link">
                        @if($link_download != null)
                        <div class="text-center">
                            <div class="alert alert-warning" role="alert">
                                Mật khẩu giải nén của bạn là: <b>{{ $link_download->pass }}</b><br>
                                <button id="download-file" class="btn text-light mt-2" style="background-color: #df0f0f;"><i class="fas fa-file-download"></i> Download Now</button>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-warning" role="alert">
                            1. Nếu bạn <b>chưa có</b> tài khoản, hãy <b>tạo tài khoản</b>. <br>
                            2. Nếu <b>đã có</b> tài khoản, vui lòng liên hệ zalo: <b>0365 319 298</b> và gửi kèm [tên đăng nhập] của bạn.<br>
                            3. Khi đã liên hệ qua zalo, vui lòng <b>trở lại đây để tải đồ án</b>.
                        </div>
                        @endif
                    </div>
                    @endif
                    <b>TAG</b>: @foreach($tags as $val) <a href="{{ route('home.tags_post', ['name'=>$val->name]) }}" class="badge badge-info">{{ $val->name }}</a> @endforeach
                </div>
            </div>
            @if($config->lock_comment == 'N')
            <div class="card">
                <h5 class="card-header card-title2 bg-xanh">
                    <i class="fas fa-comments"></i> bình luận ({{ count($comment) }})
                </h5>
                <div class="frame-comment card-body overflow-auto py-0 my-0" style="max-height: 500px;">
                    <div class="page-section">
                        <div class="section-block">
                            @guest
                            <div class="text-center">
                                <a href="{{ route('home.login') }}" class="btn btn-primary">Đăng nhập để bình luận</a>
                            </div>
                            @else
                            <div class="feed-publisher rounded">
                                <div class="media">
                                    <figure class="user-avatar user-avatar-md">
                                        <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}">
                                    </figure>
                                    <div class="media-body">
                                        <form action="{{ route('home.post_comment') }}" method="post">
                                            @csrf
                                            <input type="text" value="{{ getUserId() }}" name="user_id" hidden>
                                            <input type="text" value="{{ $post->id }}" name="post_id" hidden>
                                            <input type="text" value="{{ $post->title_slug }}" name="title_slug" hidden>
                                            <div class="publisher">
                                                <div class="publisher-input">
                                                    <textarea class="form-control" name="content" maxlength="{{ fields['post_comments']['content'] }}" placeholder="Bình luận của bạn..." required></textarea>
                                                </div>
                                                <div class="publisher-actions">
                                                    <div class="publisher-tools mr-auto">
                                                        <div class="btn btn-light btn-icon fileinput-button">
                                                            <i class="fa fa-paperclip"></i><input type="file" id="pfAttachment" name="pfAttachment[]" multiple>
                                                        </div>
                                                        <button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
                                                    </div>
                                                    <button id="btn-post-comment" type="submit" class="btn btn-primary">Đăng</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endguest
                            <!-- loop -->
                            @foreach($comment as $val)
                            <div class="feed">
                                <div class="feed-post card">
                                    <div class="card-header card-header-fluid">
                                        <a href="#" class="btn-account" role="button">
                                            <div class="user-avatar user-avatar-lg">
                                                <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}">
                                            </div>
                                            <div class="account-summary">
                                                <p class="account-name">{{ $val->User->username }}</p>
                                                <p class="account-description">{{ $val->User->role }} · {{ $val->created_at->diffForHumans() }}</p>
                                            </div>
                                        </a>
                                        <div class="dropdown align-self-start ml-auto">
                                            <button class="btn btn-icon btn-light text-muted" data-toggle="dropdown"><i class="fa fa-fw fa-ellipsis-v"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="dropdown-arrow"></div>
                                                <a href="#" class="dropdown-item"><i class="fas fa-user-shield"></i> Xem hồ sơ</a>
                                                <a href="#" class="dropdown-item"><i class="fas fa-user-lock"></i> Khóa tài khoản</a>
                                                <a href="#" class="dropdown-item"><i class="fas fa-trash"></i> Xóa bình luận</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-2">{{ $val->content }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- end loop -->
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
@section('script')
<script>
    var token = '{{ csrf_token() }}';
    var _post_id = '{{ $post->id }}';
    var count_down = parseInt(5);

    $('#download-file').click(function() {
        @if($check_link)
        @if($link_download != null)
        var link = '{{ $link_download->link }}';
        @endif
        @endif

        setInterval(function() {
            if (count_down >= 0) {
                $('#download-file').text('Chuyển hướng sau (' + count_down + 's)');
                count_down--;
                return false;
            } else {
                $.ajax({
                    url: "{{ route('member.ajax_download') }}",
                    data: {
                        id: _post_id,
                        _token: token
                    },
                    type: 'post',
                    success: function() {
                        window.location.href = link;
                    }
                });

            }
        }, 1000);

    });

    function countdown() {

    }
</script>
@endsection