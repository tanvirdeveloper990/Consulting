@extends('layouts.app')

@section('css')
<style>
    .srv-banner {
        width: 100%;
        min-height: 180px;
        background: linear-gradient(135deg, #0A474C 0%, #0d6b72 50%, #00B8D4 100%);
        display: none;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .srv-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, .07) 1px, transparent 1px);
        background-size: 28px 28px;
        pointer-events: none;
    }

    .srv-banner .container {
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .srv-banner__title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0;
        letter-spacing: -.02em;
        text-align: center;
    }

    @media (min-width: 992px) {
        .srv-banner {
            display: flex;
        }
    }
</style>
@endsection

@section('content')

<!-- PAGE BANNER (desktop only) -->
<div class="srv-banner">
    <div class="container">
        <h1 class="srv-banner__title">All Destinations</h1>
    </div>
</div>

  <!--YOUR DESTINATION  -->
    <section class="py-5 px-3 mt-3">
        <div class="container-xl">

            <h2 class="section-title text-center mb-5">
                <span class="title-select">{{$overview->top_study_destination_title}}</span>
                <span class="title-your">{{$overview->top_study_destination_title1}}</span>
            </h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

            @foreach($country->take(9) as $item)
                <div class="col">
                    <div class="dest-wrapper">
                        <a href="{{ route('study.destination',$item->id) }}" class="dest-card">
                            <img class="card-photo"  src="{{Storage::url($item->thumbnail)}}"
                                alt="{{$item->country}}" />
                            <div class="dest-label">
                                <img class="flag" src="{{Storage::url($item->flag)}}" alt="{{$item->country}}" />
                                {{$item->country}}
                            </div>
                        </a>
                        <div class="dest-popup">
                            <h3> {{$item->title}}</h3>
                            <p>{{$item->description}}</p>
                            <a href="{{ route('study.destination',$item->id) }}" class="btn-discover">DISCOVER</a>
                        </div>
                    </div>
                </div>
            @endforeach    


            </div>
            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="#" class="btn-view-services">
                    <span class="sweep-bg"></span>
                    <span class="btn-text">View All</span>
                </a>
            </div>
        </div>
    </section>

@endsection