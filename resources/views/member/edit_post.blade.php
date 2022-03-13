@extends('layouts.member')
@section('title', 'Chỉnh Sửa Bài Đăng')
@section('content')
<div class="container">
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('member.dashboard') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>HỒ SƠ CÁ NHÂN</a>
                        </li>
                    </ol>
                </nav>
                <div class="text-center">
                    <h1 class="page-title mr-sm-auto">CHỈNH SỬA BÀI ĐĂNG <i class="fas fa-paper-plane"></i></h1>
                </div>
            </header>
            <div class="page-section">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('member.edit_post.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{ $post->id }}" name="id" hidden>
                            <input type="text" value="{{ $post->title_slug }}" name="title_slug" hidden>
                            <div class="form-group">
                                <label>Tiêu Đề (*)</label>
                                <input type="text" class="form-control" maxlength="{{ fields['post']['title'] }}" value="{{ $post->title }}" name="title" placeholder="Lập Trình C#" autocomplete="off" autofocus required>
                                <small class="form-text text-muted">Tiêu đề không nên trùng nhau, để dễ dàng tìm kiếm.</small>
                            </div>
                            <div class="form-group">
                                <label for="thumb">Ảnh Poster (*)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="thumb" name="thumb" accept=".png, .jpg, .web, .jpeg, .gif">
                                    <label class="custom-file-label" for="thumb">Chọn file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cover">Ảnh Cover</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cover" name="cover" accept=".png, .jpg, .web, .jpeg, .gif">
                                    <label class="custom-file-label" for="cover">Chọn file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Video Demo</label>
                                <input type="text" class="form-control" maxlength="255" name="video" @if($post->video != '') value="https://www.youtube.com/watch?v={{ $post->video }}" @endif placeholder="https://www.youtube.com/watch?v=3ix92975nN8" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="select2-tagging">Thẻ Tag</label>
                                <select id="select2-tagging" class="form-control" data-toggle="select2" name="tags[]" multiple>
                                    @foreach($tag as $val)
                                    @if(count($tag_post) > 0)
                                    @foreach($tag_post as $tags)
                                    <option value="{{ $val->name }}" @if($tags->name == $val->name) selected @endif>{{ $val->name }}</option>
                                    @endforeach
                                    @else
                                    <option value="{{ $val->name }}">{{ $val->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="content" name="content" class="form-control ckeditor">{{ $post->content }}</textarea>
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
</div>

@endsection