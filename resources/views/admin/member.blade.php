@extends('layouts.admin')
@section('title', 'Thành Viên')
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
                <h1 class="page-title mr-sm-auto">DANH SÁCH THÀNH VIÊN <i class="fas fa-users"></i></h1>
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i><span class="ml-1">Nhập</span></button>
                    <a href="{{ route('admin.list_member.export') }}" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i><span class="ml-1">Xuất</span></a>
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
                                    <th> TÊN THÀNH VIÊN</th>
                                    <th> ĐỊA CHỈ EMAIL</th>
                                    <th> MẬT KHẨU</th>
                                    <th> CẤP QUYỀN</th>
                                    <th style="width:100px; min-width:100px;">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop -->
                                @foreach($user as $val)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset('public/assets/images/avatars/team4.jpg') }}" alt="Card image cap">
                                        </a>
                                        <a href="#">{{ $val->username }}</a>
                                    </td>
                                    <td class="align-middle">{{ $val->email }}</td>
                                    <td class="align-middle">*********</td>
                                    <td class="align-middle">
                                        <span class="badge badge-primary">@if($val->role == 'member') Thành Viên @elseif($val->role == 'mod') Quản Trị @else Tay To @endif</span>
                                    </td>
                                    <td class="align-middle text-right">
                                        <button class="btn btn-sm btn-icon btn-secondary" onclick="fillForm('{{ $val->id }}', '{{ $val->role }}')" data-toggle="modal" data-target="#formEdit">
                                            <i class="fa fa-pencil-alt"></i><span class="sr-only">Edit</span>
                                        </button>
                                        @if($val->lock == 'N')
                                        <a href="{{ route('admin.list_member.lock_unlock', ['id'=>$val->id]) }}" class="btn btn-sm btn-icon btn-secondary" onclick="return lockUser('{{ $val->username }}')">
                                            <i class="fas fa-user-lock"></i><span class="sr-only">Lock</span>
                                        </a>
                                        @else
                                        <a href="{{ route('admin.list_member.lock_unlock', ['id'=>$val->id]) }}" class="btn btn-sm btn-icon btn-secondary" onclick="return unlockUser('{{ $val->username }}')">
                                            <i class="fas fa-user-unlock"></i><span class="sr-only">Unlock</span>
                                        </a>
                                        @endif
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
<div class="modal fade" id="formEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_edit_account" action="{{ route('admin.list_member.update_role') }}" method="post">
                @csrf
                <input id="user-id" type="text" value="" name="id" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="formEditLabel">CHỈNH SỬA TÀI KHOẢN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select id="role-user" class="form-control" name="role" required>
                            <option value="member">Thành Viên</option>
                            <option value="mod">Quản Trị</option>
                            <option value="admin">Tay To</option>
                        </select>
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
@section('script')
<script>
    function fillForm(id, role) {
        $('#user-id').val(id);
        $("#role-user option[value='" + role + "']").attr("selected", "selected");
        $('#formEdit').modal('show');
    }

    function lockUser(name) {
        if (confirm('Bạn có muốn khóa tài khoản [' + name + '] không?')) {
            return true;
        }
        return false;
    }

    function unlockUser(name) {
        if (confirm('Bạn có muốn mở tài khoản [' + name + '] không?')) {
            return true;
        }
        return false;
    }
</script>
@endsection