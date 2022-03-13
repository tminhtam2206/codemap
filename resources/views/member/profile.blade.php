@extends('layouts.member')
@section('title', 'Hồ Sơ')
@section('content')
<div class="container">
    <header class="page-cover">
        <div class="text-center">
            <a href="{{ route('member.dashboard') }}" class="user-avatar user-avatar-xl">
                <img src="{{ asset('public/assets/images/avatars/team4.jpg') }}">
            </a>
            <h2 class="h4 mt-2 mb-0">{{ getName() }}</h2>
            <div class="my-1">
                <i class="fa fa-star text-yellow"></i>
                <i class="fa fa-star text-yellow"></i>
                <i class="fa fa-star text-yellow"></i>
                <i class="fa fa-star text-yellow"></i>
                <i class="far fa-star text-yellow"></i>
            </div>
            <p class="text-muted">Developer @<span class="text-capitalize">{{ getRole() }}</span></p>
        </div>
        <div class="cover-controls cover-controls-bottom">
            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#show-detail"><i class="fas fa-user-shield"></i> Chi tiết</a>
            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#editProfile"><i class="fas fa-user-edit"></i> Thiết lập</a>
        </div>
    </header>
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
                                <sub><i class="fa fa-tasks"></i></sub>
                            </p>
                            <h2 class="metric-label">{{ getRole() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card-metric">
                        <div class="metric">
                            <p class="metric-value h3">
                                <sub><i class="oi oi-timer"></i></sub>
                            </p>
                            <h2 class="metric-label">Active</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-fluid overflow-auto" style="max-height: 374px;">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <span class="mr-auto">Đồ Án Đã Mua</span>
                    <span>({{ count($project) }})</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> ĐỒ ÁN</th>
                            <th> LINK DOWNLOAD</th>
                            <th> MẬT KHẨU NÉN</th>
                            <th> NGÀY MUA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- loop -->
                        @foreach($project as $val)
                        <tr>
                            <td class="align-middle font-weight-bold">{{ $loop->index+1 }}</td>
                            <td class="align-middle"><a href="{{ route('home.post', ['title'=>$val->Post->title_slug]) }}" target="_blank">{{ $val->Post->title }}</a></td>
                            <td class="align-middle"><a href="{{ $val->link }}" target="_blank">Nhấn vào đây</a></td>
                            <td class="align-middle">{{ $val->pass }}</td>
                            <td class="align-middle">{{ date('d/m/Y', strtotime($val->created_at)) }}</td>
                        </tr>
                        @endforeach
                        <!-- end loop -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="show-detail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="show-detailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show-detailLabel">CHI TIẾT TÀI KHOẢN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->id }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
                </div>
                <div class="form-group">
                    <label>Địa chỉ email</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Loại tài khoản</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->role }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editProfile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_edit_account" action="{{ route('member.update_account') }}" method="post">
                @csrf
                <input type="text" value="" name="id" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">THIẾT LẬP TÀI KHOẢN</h5>
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