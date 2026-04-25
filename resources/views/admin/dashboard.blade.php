@extends('admin.layouts.app')

@section('title','Dashboard')

@section('css')
<style>
    .gradient-card {
        background: linear-gradient(135deg, #4b79ff, #7a5cff);
        color: #fff;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .gradient-card h5 {
        margin: 0;
        font-size: 16px;
        opacity: 0.9;
    }

    .gradient-card h1 {
        margin: 5px 0 0;
        font-size: 36px;
        font-weight: 700;
    }
</style>
@endsection

@section('content')

<div class="container my-4">
    <div class="row g-4">

        <!-- Applied Card -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="gradient-card p-3 text-white d-flex align-items-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border-radius: 12px;">
                <div class="me-3">
                    <i class="fa fa-check-circle fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-1">Applied</h5>
                    <h1 class="mb-0">{{ $applied }}</h1>
                </div>
            </div>
        </div>

        <!-- Country Card -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="gradient-card p-3 text-white d-flex align-items-center" style="background: linear-gradient(135deg, #ff512f, #dd2476); border-radius: 12px;">
                <div class="me-3">
                    <i class="fa fa-globe fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-1">Country</h5>
                    <h1 class="mb-0">{{ $countries }}</h1>
                </div>
            </div>
        </div>

        <!-- Blogs Card -->
        <div class="col-lg-3 col-md-6 col-12">
            <div class="gradient-card p-3 text-white d-flex align-items-center" style="background: linear-gradient(135deg, #f7971e, #ffd200); border-radius: 12px;">
                <div class="me-3">
                    <i class="fa fa-newspaper fa-2x"></i>
                </div>
                <div>
                    <h5 class="mb-1">Blogs</h5>
                    <h1 class="mb-0">{{ $blogs }}</h1>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection