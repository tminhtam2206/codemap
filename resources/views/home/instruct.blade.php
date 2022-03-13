@extends('layouts.home')
@section('title', 'Hướng dẫn websites')
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-section">
            <div class="my-card card shadow-sm">
                <h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh">
                    <i class="fas fa-chalkboard-teacher"></i> HƯỚNG DẪN WEBSITE
                    <small class="float-right hide-mobile">
                        <i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($instruct['updated_at'])) }}
                    </small>
                </h5>
                <div class="card-body pb-3">
                    {!! $instruct['content'] !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection