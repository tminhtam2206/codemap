@extends('layouts.admin')
@section('title', 'Bài Đăng')
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
                <h1 class="page-title mr-sm-auto">DANH SÁCH BÀI ĐĂNG <i class="fas fa-layer-group"></i></h1>
                <div class="btn-toolbar">
                    <a href="{{ route('admin.post') }}" class="btn btn-light"><i class="fas fa-plus"></i><span class="ml-1">Thêm</span></a>
                    <button type="button" class="btn btn-light"><i class="oi oi-data-transfer-download"></i><span class="ml-1">Nhập</span></button>
                    <a href="{{ route('admin.list_post.export') }}" class="btn btn-light"><i class="oi oi-data-transfer-upload"></i><span class="ml-1">Xuất</span></a>
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
                                    <th> TIÊU ĐỀ BÀI ĐĂNG</th>
                                    <th> TÁC GIẢ</th>
                                    <th> LƯỢT XEM</th>
                                    <th style="width:100px; min-width:100px;">CHỨC NĂNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop -->
                                @foreach($post as $val)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}" class="tile tile-img mr-1" target="_blank">
                                            <img class="img-fluid" src="{{ $val->thumb }}" alt="Card image cap">
                                        </a>
                                        <a href="{{ route('home.post', ['title'=>$val->title_slug]) }}" target="_blank">{{ $val->title }}</a>
                                    </td>
                                    <td class="align-middle">{{ $val->User->username }}</td>
                                    <td class="align-middle">{{ number_format($val->views) }}</td>
                                    <td class="align-middle text-right">
                                        <a href="{{ route('admin.post.edit', ['title'=>$val->title_slug]) }}" class="btn btn-sm btn-icon btn-secondary">
                                            <i class="fa fa-pencil-alt"></i><span class="sr-only">Edit</span>
                                        </a>
                                        @if($val->delete == 'N')
                                        <a class="btn btn-sm btn-icon btn-secondary" href="{{ route('admin.list_post.delete', ['id'=>$val->id]) }}" onclick="return check('{{ $val->title }}')">
                                            <i class="fas fa-trash"></i>
                                            <span class="sr-only">Remove</span>
                                        </a>
                                        @else
                                        <a class="btn btn-sm btn-icon btn-secondary" href="{{ route('admin.list_post.delete_restore', ['id'=>$val->id]) }}" onclick="return checkResotre('{{ $val->title }}')">
                                            <i class="fas fa-trash-restore-alt"></i>
                                            <span class="sr-only">Remove</span>
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
@endsection
@section('script')
<script>
    function check(name){
        if(confirm('Bạn có muốn xóa bài ['+name+']?')){
            return true;
        }

        return false;
    }

    function checkResotre(name){
        if(confirm('Bạn có muốn khôi phục bài ['+name+']?')){
            return true;
        }

        return false;
    }
</script>
@endsection