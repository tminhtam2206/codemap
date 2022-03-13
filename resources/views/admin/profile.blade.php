@extends('layouts.admin')
@section('title', 'Hồ Sơ')
@section('content')
<div class="page">
    <div class="frame-header" style="background-image: url('http://codemap.atwebpages.com/public/images/background.jpg'); background-size: cover;">
        <header class="page-cover" style="background-color: rgba(0,0,0,0.8) !important;">
            <div class="text-center">
                <a href="{{ route('admin.profile') }}" class="user-avatar user-avatar-xl">
                    <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt="">
                </a>
                <h2 class="h4 mt-2 mb-0 text-light">{{ getName() }}</h2>
                <div class="my-1">
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                </div>
                <p class="text-muted">Developer <span>@</span><span class="text-capitalize">{{ getRole() }}</span></p>
                <p class="text-light"> Code Không ngại khó, hãy cố gắng để trở thành người thành công.</p>
            </div>
            <div class="cover-controls cover-controls-bottom">
                <span class="btn btn-light">0 Người theo dõi</span>
                <span class="btn btn-light">0 Đang theo dõi</span>
            </div>
            <button type="button" class="btn btn-success btn-floated" data-toggle="modal" data-target="#formEdit"><span class="fa fa-cog"></span></button>
        </header>
    </div>
    <div class="page-inner">
        <div class="page-section">
            <div class="section-block">
                <div class="metric-row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card-metric">
                            <div class="metric">
                                <p class="metric-value h3">
                                    <sub><i class="fas fa-user"></i></sub>
                                </p>
                                <h2 class="metric-label">{{ getName() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card-metric">
                            <div class="metric">
                                <p class="metric-value h3">
                                    <sub><i class="fas fa-envelope"></i></sub>
                                </p>
                                <h2 class="metric-label">{{ Auth::user()->email }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card-metric">
                            <div class="metric">
                                <p class="metric-value h3">
                                    <sub><i class="fas fa-user-shield"></i></sub>
                                </p>
                                <h2 class="metric-label">{{ getRole() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card-metric">
                            <div class="metric">
                                <p class="metric-value h3">
                                    <sub><i class="fas fa-calendar-plus"></i></sub>
                                </p>
                                <h2 class="metric-label">{{ Auth::user()->created_at }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-fluid">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <span class="mr-auto text-uppercase">bài đăng</span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach($post as $val)
                                    <tr>
                                        <td class="align-middle text-truncate">
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}" class="tile bg-blue text-white mr-2" target="_blank">
                                                <i class="fas fa-layer-group"></i>
                                            </a>
                                            <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}" target="_blank">{{ $val->title }}</a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span>{{ number_format($val->views) }}</span>
                                        </td>
                                        <td class="align-middle text-center">{{ $val->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card card-fluid">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <span class="mr-auto text-uppercase">bình luận</span>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach($comment as $val)
                                    <tr>
                                        <td class="align-middle text-truncate">
                                            <span href="#project" class="tile tile-circle bg-indigo text-white mr-1">
                                                <i class="fas fa-comment"></i>
                                            </span>
                                            <span>{{ $val->Post->title }}</span>
                                        </td>
                                        <td class="align-middle">{{ $val->User->username }}</td>
                                        <td class="align-middle">{{ $val->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_edit_account" action="{{ route('admin.profile.update') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formEditLabel">CHỈNH SỬA TÀI KHOẢN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Tên đăng nhập</label>
                        <input type="text" class="form-control" value="{{ getName() }}" name="username" maxlength="{{ fields['user']['username'] }}" autofocus required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Địa chỉ email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" maxlength="{{ fields['user']['email'] }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock-alt"></i> Mật khẩu mới</label>
                        <input type="password" class="form-control" minlength="8" name="newpassword" maxlength="255">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-lock-alt"></i> Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="password" maxlength="255" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Cập Nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection