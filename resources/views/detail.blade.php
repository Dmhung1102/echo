@extends('layout.main')
@section('title')
    Detail
@endsection
@section('content')
    <div class="breadcrumb-section"
         style="background-image: url('https://html.themewant.com/echo/assets/images/breadcrumb/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="meta">
                        <a href="#" class="prev">ECHO /</a>
                        <a href="#" class="next">Single News</a>
                    </div>
                    <h1 class="text-theme-light">{{$fetchData->clean_title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="content-img">
                        <img class="latest-news-img w-100"
                             src="{{$fetchData->featured_image}}"
                             alt="">
                    </div>
                    <div class="content text-content-black">
                        <a href="#" class="my-4">
                            <h2 class="">
                           <span class="title-hover text-capitalize text-content-black title-detail">
                                {{$fetchData->clean_title}}
                           </span>
                            </h2>
                        </a>
                       <div class="fill-content">
                           {!! $fetchData->content !!}
                       </div>
                    </div>
                    <div class="more-news">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-content-black mb-4 fs-3">You Might Also Like</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($latestPosts->take(2) as $posts)
                                <div class="col-lg-6 {{$loop->first ? 'mb-3 mb-lg-0' : '' }}">
                                    <div class="more-news-item">
                                        <a href="{{route('detail',['slug' => $posts->slug] )}}" class="more-news-img">
                                            <img src="{{$posts->featured_image}}" alt="" style="width: 100px; object-fit: cover;">
                                        </a>
                                        <div class="more-news-content">
                                            <h4>
                                                <a href="#" class="title-hover text-content-black">
                                                    ChatGPT returns to Italy after ban
                                                </a>
                                            </h4>
                                            <span class="text-black">
                                            <i class="fa-regular fa-clock me-1"></i> 06 minute read
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    @include('layout.sidebar_right')
                </div>
            </div>
        </div>
    </div>
@endsection
