@extends('layouts.member')
@section('title', 'Bài Đăng Của Tôi')
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
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto">DANH SÁCH BÀI ĐĂNG <i class="fas fa-layer-group"></i></h1>
                    <div class="btn-toolbar">
                        <a href="{{ route('member.post') }}" class="btn btn-warning"><i class="fas fa-plus"></i><span class="ml-1">Thêm</span></a>
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
                                        <td class="align-middle text-center">
                                            <a href="{{ route('member.edit_post', ['title'=>$val->title_slug]) }}">
                                                <i class="fas fa-edit"></i>
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
</div>
@endsection