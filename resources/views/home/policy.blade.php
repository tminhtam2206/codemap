@extends('layouts.home')
@section('title', 'Chính sách bảo mật')
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-section">
            <div class="my-card card shadow-sm">
                <h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh">
                    <i class="fas fa-user-shield"></i> CHÍNH SÁCH BẢO MẬT
                    <small class="float-right hide-mobile">
                        <i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($policy['updated_at'])) }}
                    </small>
                </h5>
                <div class="card-body pb-3">
                    {!! $policy['content'] !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection