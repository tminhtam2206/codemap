@extends('layouts.home')
@section('title', 'Thẻ tag')
@section('content')
<div class="page-inner">
    <div class="container">
        <div class="page-inner">
            <div class="page-section">
                <div class="card">
                    <h5 class="card-header card-title2">
                        <i class="fas fa-tags"></i> THẺ TAG
                        <span class="float-right">({{  count($tags) }})</span>
                    </h5>
                    <div class="frame-new-update card-body">
                        <div class="row">
                            <!-- loop -->
                            @foreach($tags as $val)
                            <div class="col-6 col-xl-2 col-lg-3 col-md-4 col-sm-6 mt-2 tags">
                                <a href="{{ route('home.tags_post', ['name'=>$val->name]) }}"><i class="fas fa-tag"></i> {{ $val->name }}</a>
                            </div>
                            @endforeach
                            <!-- end loop -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection