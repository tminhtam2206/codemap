@extends('layouts.home')
@section('title', 'Điều khoản dịch vụ')
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-section">
            <div class="my-card card shadow-sm">
                <h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh">
                    <i class="fas fa-pencil-ruler"></i> ĐIỀU KHOẢN DỊCH VỤ
                    <small class="float-right hide-mobile">
                        <i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($rules['updated_at'])) }}
                    </small>
                </h5>
                <div class="card-body pb-3">
                    {!! $rules['content'] !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection