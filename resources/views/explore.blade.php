@extends('layout.main')
@section('title')
    Explore
@endsection
@section('content')
    <div class="breadcrumb-section"
         style="background-image: url('https://html.themewant.com/echo/assets/images/breadcrumb/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="meta">
                        <a href="#" class="prev">ECHO /</a>
                        <a href="#" class="next">Explore</a>
                    </div>
                    <h1 class="text-theme-light">All categories</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-section">
        <div class="container">
            <div class="row">
                @foreach($categories as $posts)
                    @if($posts->latest_post)
                        <div class="col-lg-4 col-md-6 col-sm-12" style="padding: 12px">
                            <div class="post-card">
                                <div class="position-relative">
                                    <a href="{{route('category', ['slug' => $posts->slug])}}" class="post-card-img">
                                        <img src="{{$posts->latest_post->featured_image}}" alt="" class="img-height-260 hover-post-img" loading="lazy">
                                    </a>
                                    <a href="{{route('category', ['slug' => $posts->slug])}}" class="post-card-category">
                                        <span class="truncate-1-line">{{$posts->title}}</span>
                                    </a>
                                </div>
                                <div class="post-card-content">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
