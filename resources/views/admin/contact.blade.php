@extends('layouts.admin')
@section('title', 'Liên Hệ')
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
                <h1 class="page-title mr-sm-auto">DANH SÁCH LIÊN HỆ <i class="fas fa-id-card"></i></h1>
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
                                    <th> ĐỊA CHỈ EMAIL</th>
                                    <th> NỘI DUNG</th>
                                    <th> THỜI GIAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- loop -->
                                @foreach($contact as $val)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td class="align-middle">{{ $val->email }}</td>
                                    <td class="align-middle"><textarea class="form-control" rows="1" style="width: 100%;" readonly>{{ $val->message }}</textarea></td>
                                    <td class="align-middle">{{ $val->created_at->diffForHumans() }}</td>
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