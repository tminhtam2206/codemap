@extends('layouts.admin')
@section('title', 'Tags')
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
                <h1 class="page-title mr-sm-auto">DANH SÁCH THẺ TAG <i class="fas fa-tags"></i></h1>
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#formAdd">
                        <i class="fas fa-plus"></i>
                        <span class="ml-1">Thêm</span>
                    </button>
                    <button type="button" class="btn btn-light">
                        <i class="oi oi-data-transfer-download"></i>
                        <span class="ml-1">Nhập</span>
                    </button>
                    <a href="{{ route('admin.list_tags.export') }}" class="btn btn-light">
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
                                    <th> TÊN THẺ TAG</th>
                                    <th> TẠO LÚC</th>
                                    <th> CẬP NHẬT</th>
                                    <th style="width:100px; min-width:100px;">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop -->
                                @foreach($tag as $val)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <i class="fas fa-tags"></i>
                                        </a>
                                        <a href="#">{{ $val->name }}</a>
                                    </td>
                                    <td class="align-middle">{{ $val->created_at->diffForHumans() }}</td>
                                    <td class="align-middle">{{ $val->updated_at->diffForHumans() }}</td>
                                    <td class="align-middle text-right">
                                        <button href="#" class="btn btn-sm btn-icon btn-secondary" data-toggle="modal" data-target="#formEdit" onclick="fillForm('{{ $val->id }}', '{{ $val->name }}')">
                                            <i class="fa fa-pencil-alt"></i><span class="sr-only">Edit</span>
                                        </button>
                                        <a class="btn btn-sm btn-icon btn-secondary" href="{{ route('admin.list_tags.delete', ['id'=>$val->id]) }}" onclick="return check('{{ $val->name }}')">
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
            <form id="form_edit_account" action="{{ route('admin.list_tags.add') }}" method="post">
                @csrf
                <input id="user-id" type="text" value="" name="id" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="formAddLabel">THÊM THẺ TAG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" maxlength="{{ fields['tags']['name'] }}" placeholder="Tên Tag" autofocus required autocomplete="off">
                        <small class="form-text text-muted">Tên [thẻ tag] không được trùng.</small>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="formEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_edit_account" action="{{ route('admin.list_tags.update') }}" method="post">
                @csrf
                <input id="tag-id" type="text" value="" name="id" hidden>
                <div class="modal-header">
                    <h5 class="modal-title" id="formEditLabel">CHỈNH SỬA THẺ TAG</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="name_foc" type="text" class="form-control" name="name" maxlength="{{ fields['tags']['name'] }}" placeholder="Tên Tag" autofocus required autocomplete="off">
                        <small class="form-text text-muted">Tên [thẻ tag] không được trùng.</small>
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
    function fillForm(id, name) {
        $('#tag-id').val(id);
        $('#name_foc').val(name);
        $('#formEdit').modal('show');
    }

    function check(name) {
        if (confirm('Bạn có muốn xóa tag [' + name + ']?')) {
            return true;
        }

        return false;
    }
</script>
@endsection