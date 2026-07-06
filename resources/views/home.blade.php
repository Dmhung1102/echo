@extends('layout.main')
@section('title')
    Home
@endsection
@section('content')
    @php
        $postLatest = $posts->first();
    @endphp
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="latest-content">
                        <div class="position-relative block-content-img">
                            <a href="{{route('detail', ['slug' => $postLatest->slug])}}" class="content-img">
                                <img
                                    src="{{$postLatest->featured_image}}"
                                    alt="" class="latest-news-img w-100">
                            </a>
                            <a href="{{route('category', ['slug' => $postLatest->category->first()->slug])}}" class="content-category">
                                <span>{{$postLatest->category->first()->title}}</span>
                            </a>
                        </div>
                        <div class="content">
                            <h1 class="latest-content-title text-center">
                                <a href="{{route('detail', ['slug' => $postLatest->slug])}}" class="title-hover text-capitalize text-content-black">
                                    {{$postLatest->title}}
                                </a>
                            </h1>
                            <div class="latest-news-time-views text-center">
                                <a href="#" class="pe-none"><i class="fa-solid fa-calendar me-2"></i>{{$postLatest->formatted_date}}</a>
                                <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05 Comments</a>
                                <a href="#" class="pe-none"><i class="fa-solid fa-pen me-2"></i> John Snow</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="banner-side">
                        <ul>
                            @foreach($posts->take(5)->skip(1) as $post)
                                <li>
                                    <div class="content p-0">
                                        <h3 class="title-latest">
                                            <a href="{{route('detail', ['slug' => $post->slug])}}" class="title text-white truncate-2-line">
                                                <span class="title-hover-white">{{$post->clean_title}}</span>
                                            </a>
                                        </h3>
                                        <p class="">
                                            <a href="#" class="desc"><i
                                                    class="fa-solid fa-calendar me-2"></i>{{$post->formatted_date}}</a>
                                        </p>
                                    </div>
                                    <div class="">
                                        <a href="{{route('detail', ['slug' => $post->slug])}}" class="latest-banner-img">
                                            <img
                                                src="{{$post->featured_image}}"
                                                alt="" class="latest-news-img" loading="lazy">
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="latest-section">
        <div class="container">
            <div class="title-area d-flex justify-content-between">
                <h2 class="text-capitalize fw-semibold text-theme-light header m-0">
                    <img src="https://html.themewant.com/echo/assets/images/icon/01.svg" alt="" loading="lazy">
                    Trending now
                </h2>
                <a href="{{route('category', ['slug' => 'news'])}}" class="rts-btn see-all-btn">
                    See All
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="content-area">
                <div class="row">
                    @php
                        $listTrending = $posts->filter(function ($post) {
                            return $post->category->contains('slug', 'news');
                        });
                    @endphp
                    @foreach($listTrending->take(3) as $postTrending)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="latest-content">
                                <div class="position-relative block-content-img">
                                    <a href="{{route('detail', ['slug' => $postTrending->slug])}}" class="content-img content-img-border">
                                        <img
                                            src="{{$postTrending->featured_image}}"
                                            alt="" class="latest-news-img img-height-260" loading="lazy">
                                    </a>
                                    <a href="{{route('category', ['slug' => $postTrending->category->first()->slug])}}" class="content-category">
                                        <span>{{$postTrending->category->first()->title}}</span>
                                    </a>
                                </div>
                                <div class="content pb-0">
                                    <h3 class="latest-content-title text-center">
                                        <a href="{{route('detail', ['slug' => $postTrending->slug])}}" class="black-light-dark-grey truncate-2-line">
                                            <span
                                                class="title-hover text-capitalize">{{$postTrending->clean_title}}</span>
                                        </a>
                                    </h3>
                                    <div class="latest-news-time-views text-center">
                                        <a href="#" class="pe-none"><i
                                                class="fa-solid fa-calendar me-2"></i>{{$postTrending->formatted_date}}
                                        </a>
                                        <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05 Comments</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-area mb-4">
                                <h2 class="text-capitalize fw-semibold header m-0 text-theme-dark">
                                    <img src="https://html.themewant.com/echo/assets/images/icon/01.svg" alt="" loading="lazy">
                                    Editorial
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="banner-side p-0">
                                <ul>
                                    @php
                                        $listEditorial = $posts->filter(function ($post) {
                                            return $post->category->contains('slug', 'editorial');
                                        });
                                    @endphp
                                    @foreach($listEditorial->take(5)->skip(1) as $postEditorial)
                                        <li>
                                            <div class="content p-0 order-2">
                                                <h4 class="title-latest">
                                                    <a href="{{route('detail', ['slug' => $postEditorial->slug])}}" class=" truncate-2-line">
                                                        <span class="title title-hover-white">
                                                            {{$postEditorial->clean_title}}
                                                        </span>
                                                    </a>
                                                </h4>
                                                <p class="">
                                                    <a href="#" class="desc"><i
                                                            class="fa-solid fa-calendar me-2"></i>{{$postEditorial->formattedDate}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="">
                                                <a href="{{route('detail', ['slug' => $postEditorial->slug])}}" class="latest-banner-img">
                                                    <img
                                                        src="{{$postEditorial->featured_image}}"
                                                        alt="" class="latest-news-img" loading="lazy">
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 my-lg-0 my-5">
                            @php
                                $postEditorialFirst = $listEditorial->first();
                            @endphp
                            <div class="position-relative block-content-img ">
                                <a href="{{route('detail', ['slug' => $postEditorialFirst->slug])}}" class="content-img img-border text-center">
                                    <img
                                        src="{{$postEditorialFirst->featured_image}}"
                                        alt="" class="latest-news-img" loading="lazy">
                                </a>
                                <a href="{{route('category', ['slug' => $postEditorialFirst->category->first()->slug])}}" class="content-category">
                                    <span>GAMING</span>
                                </a>
                            </div>
                            <div class="content pb-0">
                                <h3 class="latest-content-title text-center">
                                    <a href="{{route('detail', ['slug' => $postEditorialFirst->slug])}}" class="title-hover text-capitalize text-white">
                                        {{$postEditorialFirst->clean_title}}
                                    </a>
                                </h3>
                                <div class="latest-news-time-views text-center">
                                    <a href="#" class="pe-none"><i
                                            class="fa-solid fa-calendar me-2"></i>{{$postEditorialFirst->formatted_date}}
                                    </a>
                                    <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05 Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 social-area">
                    <div class="col-lg-12">
                        <div class="title-area right mb-5">
                            <h3>
                                follow us
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-facebook me-1"></i>
                                    20K Fans
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-twitterme-1"></i>
                                    10K Followers
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-instagram me-1"></i>
                                    50K Followers
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-linkedin me-1"></i>
                                    30K Followers
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-pinterest me-1"></i>
                                    30K Followers
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-follow">
                                    <i class="fa-brands fa-youtube me-1"></i>
                                    04K Subscriber
                                </a>
                            </li>
                        </ul>
                        <div class="feature-ad">
                            <img src="https://html.themewant.com/echo/assets/images/home-1/cta/ad-2.png" alt="" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="editor-section">
        <div class="container">
            <div class="row">
                @php
                    $listEditorPick = $posts->filter(function ($post) {
                        return $post->category->contains('slug', 'articles');
                    });
                    $postsMain = $listEditorPick->take(4);
                    $postsPopular = $listEditorPick->skip(4)->take(3);
                    $postsGallery = $listEditorPick->skip(7)->take(4);
                @endphp
                <div class="col-lg-8">
                    <div class="col-lg-12">
                        <div class="title-area mb-4">
                            <h2 class="text-capitalize fw-semibold header m-0 text-theme-light">
                                <img src="https://html.themewant.com/echo/assets/images/icon/01.svg" alt="" loading="lazy">
                                editor's pick
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach($postsMain as $postMain)
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="latest-content mb-4">
                                        <div class="position-relative block-content-img">
                                            <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="content-img img-border">
                                                <img
                                                    src="{{$postMain->featured_image}}"
                                                    alt="" class="latest-news-img img-height-260" loading="lazy">
                                            </a>
                                            <a href="{{route('category', ['slug' => $postMain->category->first()->slug])}}" class="content-category">
                                                <span>{{$postMain->category->first()->title}}</span>
                                            </a>
                                        </div>
                                        <div class="content pb-0">
                                            <h3 class="latest-content-title text-center">
                                                <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="truncate-2-line">
                                                    <span class="title-hover text-capitalize text-theme-light ">
                                                        {{$postMain->clean_title}}
                                                    </span>
                                                </a>
                                            </h3>
                                            <div class="latest-news-time-views text-center">
                                                <a href="#" class="pe-none"><i
                                                        class="fa-solid fa-calendar me-2"></i>{{$postMain->formatted_date}}
                                                </a>
                                                <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05
                                                    Comments</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-area right mb-4 text-theme-light">
                                <h3>
                                    most popular
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="banner-side p-0">
                                <ul>
                                    @foreach($postsPopular as $postPopular)
                                        <li>
                                            <div class="content p-0 order-2">
                                                <h3 class="">
                                                    <a href="{{route('detail', ['slug' => $postPopular->slug])}}" class=" truncate-2-line">
                                                        <span class="title-hover text-capitalize text-theme-light">
                                                            {{$postPopular->clean_title}}
                                                        </span>
                                                    </a>
                                                </h3>
                                                <p class="">
                                                    <a href="#" class="desc"><i
                                                            class="fa-solid fa-calendar me-2"></i>{{$postPopular->formatted_date}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="">
                                                <a href="{{route('detail', ['slug' => $postPopular->slug])}}" class="latest-banner-img">
                                                    <img
                                                        src="{{$postPopular->featured_image}}"
                                                        alt="" class="latest-news-img" loading="lazy">
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title-area right my-4 text-theme-light">
                                <h3 class="text-capitalize">
                                    gallery
                                </h3>
                            </div>
                            <div class="gallery-widget">
                                <div class="row g-3">
                                    @foreach($postsGallery as $postGallery)
                                        <div class="col-6">
                                            <a href="{{route('detail', ['slug' => $postGallery->slug])}}" class="gallery-item">
                                                <img src="{{$postGallery->featured_image}}" alt="" loading="lazy">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slide-section slide-seciton">
        <div class="slide-inner"
             style="background-image: url('https://html.themewant.com/echo/assets/images/home-1/video-left/video-bg2.png') ">
            <div class="container">
                <div class="inner-bottom">
                    @php
                        $postsSlide = $posts->take(4);
                    @endphp
                    <div id="slideContentCarousel" class="carousel slide" data-bs-ride="carousel"
                         data-bs-interval="5000">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            @foreach($postsSlide as $postSlide)
                                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                    <div class="slide-content-wrap">
                                        <a href="{{route('category', ['slug' => $postSlide->category->first()->slug])}}">
                                            <span class="badge-tag text-uppercase" style="margin: 0 auto;">{{$postSlide->category->first()?->title}}</span>
                                        </a>
                                        <h2 class="title-slide truncate-2-line">
                                            <a href="{{route('detail', ['slug' => $postSlide->slug])}}" class="text-white">
                                                {{$postSlide->clean_title}}
                                            </a>
                                        </h2>
                                        <div class="latest-news-time-views p-0 border-0 mb-4">
                                            <a href="#" class="pe-none"><i class="fa-solid fa-calendar me-2"></i>{{$postSlide->formatted_date}}</a>
                                            <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05 Comments</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Static Navigation Controls inside inner-bottom -->
                        <div class="carousel-controls-custom">
                            <button class="ctrl-btn prev" type="button" data-bs-target="#slideContentCarousel"
                                    data-bs-slide="prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="ctrl-btn next" type="button" data-bs-target="#slideContentCarousel"
                                    data-bs-slide="next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tip-section">
        <div class="container">
            <div class="row">
                <!-- Left Column: Tips & Guides -->
                <div class="col-lg-8">
                    <div class="title-area mb-4">
                        <h2 class="text-capitalize fw-semibold text-theme-light header m-0">
                            <span class="tip-title-icon"><i class="fa-solid fa-lightbulb"></i></span>
                            Tip's & Guides
                        </h2>
                    </div>
                    <div class="tip-list mt-4">
                        @php
                            $postsTip = $posts->filter(function ($post) {
                                return $post->category->contains('slug', 'mods');
                            });
                            $postsMain = $postsTip->take(3);
                            $postsSub = $postsTip->skip(3)->take(4);
                        @endphp
                        @foreach($postsMain as $postMain)
                            <div class="tip-item d-flex gap-4 mb-4">
                                <div class="tip-img-wrapper flex-shrink-0">
                                    <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="content-img h-100">
                                        <img
                                            src="{{$postMain->featured_image}}"
                                            alt="" class="tip-img" loading="lazy">
                                    </a>
                                </div>
                                <div class="tip-content d-flex flex-column justify-content-between py-2">
                                    <div>
                                        <a href="{{route('category', ['slug' => $postMain->category->first()->slug])}}">
                                            <span class="badge-tag text-uppercase">{{$postMain->category->first()->title}}</span>
                                        </a>
                                    </div>
                                    <h3 class="tip-title">
                                        <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="title-hover text-theme-light text-capitalize truncate-2-line">
                                            <span class="title-hover">{{$postMain->clean_title}}</span>
                                        </a>
                                    </h3>
                                    <div class="latest-news-time-views p-0 border-0">
                                        <a href="#" class="pe-none"><i class="fa-solid fa-calendar me-2"></i>{{$postMain->formatted_date}}</a>
                                        <a href="#" class="pe-none"><i class="fa-solid fa-comment me-2"></i> 05 Comments</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Column: Top Games -->
                <div class="col-lg-4">
                    <div class="title-area right mb-4 text-theme-light">
                        <h3 class="text-capitalize">
                            top games
                        </h3>
                    </div>
                    <div class="top-games-widget mt-4">
                        <!-- Large Card -->
                        <div class="top-game-large position-relative rounded-4 overflow-hidden mb-4">
                            <img src="{{$postsSub->first()->featured_image}}" alt=""
                                 class="top-game-large-bg w-100 h-100" loading="lazy">
                            <div class="top-game-large-overlay"></div>
                            <div
                                class="top-game-large-content d-flex flex-column justify-content-end p-4 position-absolute start-0 top-0 w-100 h-100">
                                <div>
                                    <a href="{{route('category', ['slug' => $postsSub->first()->category->first()->slug])}}">
                                        <span class="badge-tag text-uppercase">{{$postsSub->first()->category->first()->title}}</span>
                                    </a>
                                </div>
                                <h3 class="text-white fw-bold mb-2">
                                    <a href="{{route('detail', ['slug' => $postsSub->first()->slug])}}" class="title-hover-white text-white text-capitalize">
                                        {{$postsSub->first()->title}}
                                    </a>
                                </h3>
                                <div class="shares text-white-50 fs-7">
                                    <i class="fa-solid fa-share-nodes me-2"></i>100+K Shares
                                </div>
                            </div>
                        </div>
                        @foreach($postsSub->skip(1) as $post)
                            <div class="top-game-item d-flex align-items-center p-3 mb-3">
                                <span class="top-game-num">{{ sprintf('%02d', $loop->iteration + 1) }}</span>
                                <div class="top-game-info flex-grow-1">
                                    <h4 class="top-game-title mb-1">
                                        <a href="{{route('detail', ['slug' => $post->slug])}}" class="text-theme-light truncate-2-line">
                                            <span class="title-hover">{{$post->title}}</span>
                                        </a>
                                    </h4>
                                    <div class="shares text-muted fs-7">
                                        <i class="fa-solid fa-share-nodes me-2"></i>100+K Shares
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-center pt-4 btn-more-end">
                        <a href="{{route('category', ['slug' => 'mods'])}}" class="rts-btn see-all-btn">
                            Show More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="download-section py-5">
        <div class="container">
            <div class="download-banner position-relative overflow-hidden py-5 px-4 px-md-5">
                <div class="row align-items-center position-relative z-index-2">
                    <!-- Left Content -->
                    <div class="col-lg-6 col-md-7 text-white mb-4 mb-lg-0">
                        <h2 class="text-white fw-bold mb-3 display-6 text-capitalize">
                            Download Our Apps For Stay Update
                        </h2>
                        <p class="text-white-50 mb-4 pe-md-4">
                            Easy to update latest news, daily podcast and everything in your hand
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#" class="download-btn">
                                <i class="fa-brands fa-apple"></i>
                                <span>
                                    <small>Download on the</small>
                                    <strong>Apple Store</strong>
                                </span>
                            </a>
                            <a href="#" class="download-btn">
                                <i class="fa-brands fa-google-play"></i>
                                <span>
                                    <small>Get it on</small>
                                    <strong>Play Store</strong>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Mockup -->
                    <div class="col-lg-6 col-md-5 text-center text-md-end">
                        <div class="mockup-wrapper">
                            <img src="https://html.themewant.com/echo/assets/images/home-1/cta/phone.png" alt=""
                                 class="img-fluid mockup-img" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-section">
    </div>
@endsection
