@extends('layouts.admin')
@section('title', 'Hướng Dẫn Websites')
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
                <h1 class="page-title mr-sm-auto">HƯỚNG DẪN WEBSITES <i class="fas fa-chalkboard-teacher"></i></h1>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-body">
                    <form action="{{ route('admin.instruct.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="content" name="instruct" class="form-control ckeditor">{{ $instruct['content'] }}</textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Cập Nhật</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection