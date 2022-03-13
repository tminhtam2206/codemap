@extends('layouts.admin')
@section('title', 'Đồ Án')
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
                <h1 class="page-title mr-sm-auto">DANH SÁCH ĐỒ ÁN <i class="fas fa-project-diagram"></i></h1>
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#formAdd">
                        <i class="fas fa-plus"></i>
                        <span class="ml-1">Thêm</span>
                    </button>
                    <button type="button" class="btn btn-light">
                        <i class="oi oi-data-transfer-download"></i>
                        <span class="ml-1">Nhập</span>
                    </button>
                    <a href="{{ route('admin.project.export') }}" class="btn btn-light">
                        <i class="oi oi-data-transfer-upload"></i>
                        <span class="ml-1">Xuất</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th width="15"> #</th>
                                    <th> BÀI ĐĂNG</th>
                                    <th> NGƯỜI MUA</th>
                                    <th> MẬT KHẨU</th>
                                    <th> NGÀY MUA</th>
                                    <th style="width:100px; min-width:100px;">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop -->
                                @foreach($project as $val)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <i class="fas fa-project-diagram"></i>
                                        </a>
                                        <a href="#">{{ $val->Post->title }}</a>
                                    </td>
                                    <td class="align-middle">{{ $val->User->username }}</td>
                                    <td class="align-middle">{{ $val->pass }}</td>
                                    <td class="align-middle">{{ date('d/m/Y', strtotime($val->created_at)) }}</td>
                                    <td class="align-middle text-right">
                                        <a class="btn btn-sm btn-icon btn-secondary" href="{{ route('admin.project.delete', ['id'=>$val->id]) }}" onclick="return check('{{ $val->Post->title }}', '{{ $val->User->username }}')">
                                            <i class="far fa-trash-alt"></i>
                                            <span class="sr-only">Remove</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- end loop -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_edit_account" action="{{ route('admin.project.add') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formAddLabel">THÊM LINK ĐỒ ÁN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="where-post">Đồ án</label>
                        <select id="where-post" class="form-control" data-toggle="select2" name="post_id" required>
                            @foreach($post as $val)
                            <option value="{{ $val->id }}">{{ $val->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="where-user">Khách hàng</label>
                        <select id="where-user" class="form-control" data-toggle="select2" name="user_id" required>
                            @foreach($user as $val)
                            <option value="{{ $val->id }}">{{ $val->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="link-tai">Link tải</label>
                        <input id="link-tai" type="text" class="form-control" name="link" maxlength="255" placeholder="http://" required autocomplete="off">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function check(name, user) {
        if (confirm('Bạn có muốn xóa link đồ án [' + name + '] của khách hàng [' + user + ']?')) {
            return true;
        }

        return false;
    }
</script>
@endsection