@extends('layouts.admin')
@section('title', 'Cấu Hình Hệ Thống')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>BẢNG ĐIỀU KHIỂN</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">CẤU HÌNH HỆ THỐNG <i class="fas fa-cogs"></i></h1>
            </div>
        </header>
        <div class="page-section">
            <div id="switcher" class="card card-fluid">
                <div class="card-body">
                    <div class="list-group list-group-flush list-group-bordered">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Bảo trì hệ thống</span>
                            <label class="switcher-control switcher-control-lg">
                                <input id="maintenance" type="checkbox" class="switcher-input" @if($config->maintenance == 'Y') checked @endif>
                                <span class="switcher-indicator"></span>
                                <span class="switcher-label-on">BẬT</span>
                                <span class="switcher-label-off">TẮT</span>
                            </label>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Khóa Bình Luận Website</span>
                            <label class="switcher-control switcher-control-lg">
                                <input id="lock-comment" type="checkbox" class="switcher-input" @if($config->lock_comment == 'Y') checked @endif>
                                <span class="switcher-indicator"></span>
                                <span class="switcher-label-on">BẬT</span>
                                <span class="switcher-label-off">TẮT</span>
                            </label>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Đăng Nhập Với Google</span>
                            <label class="switcher-control switcher-control-lg">
                                <input id="google-login" type="checkbox" class="switcher-input" @if($config->google_login == 'Y') checked @endif>
                                <span class="switcher-indicator"></span>
                                <span class="switcher-label-on">BẬT</span>
                                <span class="switcher-label-off">TẮT</span>
                            </label>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Đăng Nhập Với Facebook</span>
                            <label class="switcher-control switcher-control-lg">
                                <input id="facebook-login" type="checkbox" class="switcher-input" @if($config->facebook_login == 'Y') checked @endif>
                                <span class="switcher-indicator"></span>
                                <span class="switcher-label-on">BẬT</span>
                                <span class="switcher-label-off">TẮT</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var _mytoken = '{{ csrf_token() }}';

    $('#maintenance').on('input', function() {
        $.ajax({
            url: "{{ route('admin.config_system.maintenance') }}",
            data: {
                _token: _mytoken
            },
            type: 'post',
            success: function() {}
        });
    });

    $('#lock-comment').on('input', function() {
        $.ajax({
            url: "{{ route('admin.config_system.lock_comment') }}",
            data: {
                _token: _mytoken
            },
            type: 'post',
            success: function() {}
        });
    });

    $('#google-login').on('input', function() {
        $.ajax({
            url: "{{ route('admin.config_system.google_login') }}",
            data: {
                _token: _mytoken
            },
            type: 'post',
            success: function() {}
        });
    });

    $('#facebook-login').on('input', function() {
        $.ajax({
            url: "{{ route('admin.config_system.facebook_login') }}",
            data: {
                _token: _mytoken
            },
            type: 'post',
            success: function() {}
        });
    });
</script>
@endsection