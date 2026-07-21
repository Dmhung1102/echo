@extends('layout.main')
@section('title')
    Home
@endsection
@section('content')
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="latest-content">
                        <div class="position-relative block-content-img">
                            <a href="{{route('detail', ['slug' => $postsHero->first()->slug])}}" class="content-img">
                                <img
                                    src="{{$postsHero->first()->featured_image}}"
                                    alt="" class="latest-news-img w-100">
                            </a>
                            <a href="{{route('category', ['slug' => $postsHero->first()->category->first()->slug])}}" class="content-category">
                                <span>{{$postsHero->first()->category->first()->title}}</span>
                            </a>
                        </div>
                        <div class="content">
                            <h1 class="latest-content-title text-center">
                                <a href="{{route('detail', ['slug' => $postsHero->first()->slug])}}" class="title-hover text-capitalize text-black">
                                    {{$postsHero->first()->clean_title}}
                                </a>
                            </h1>
                            <div class="latest-news-time-views text-center">
                                <a href="#" class="pe-none" style="color: #5E5E5E"><i class="bi bi-calendar-fill me-2"></i>{{$postsHero->first()->formatted_date}}</a>
                                @if($postsHero->first()->tag)
                                    <a href="{{route('tag', ['slug' => $postsHero->first()->tag->first()->slug])}}" class="" style="color: #5E5E5E">
                                        <i class="bi bi-tag-fill me-2"></i>{{$postsHero->first()->tag->first()->title}}
                                    </a>
                                @endif
{{--                                <a href="#" class="pe-none"><i class="fa-solid fa-pen me-2"></i> John Snow</a>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="banner-side">
                        <ul>
                            @foreach($postsHero->skip(1) as $post)
                                <li>
                                    <div class="content p-0">
                                        <h3 class="title-latest">
                                            <a href="{{route('detail', ['slug' => $post->slug])}}" class="title text-white truncate-2-line">
                                                <span class="title-hover-white">{{$post->clean_title}}</span>
                                            </a>
                                        </h3>
                                        <p class="">
                                            <i class="bi bi-calendar-fill me-2"></i>{{$post->formatted_date}}
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
                    @foreach($postsTrending->take(3) as $postTrending)
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
                                        <a href="{{route('detail', ['slug' => $postTrending->slug])}}" class="black-light-dark-white truncate-2-line">
                                            <span
                                                class="hover-black-white text-capitalize">{{$postTrending->clean_title}}</span>
                                        </a>
                                    </h3>
                                    <div class="latest-news-time-views d-flex justify-content-center px-3">
                                        <a href="#" class="pe-none gray-light-dark-white flex-shrink-0"><i class="bi bi-calendar-fill me-2"></i>{{$postTrending->formatted_date}}
                                        </a>
                                        @if($postTrending->tag)
                                            <a href="{{route('tag', ['slug' => $postTrending->tag->first()->slug])}}" class="gray-light-dark-white text-truncate"> <i class="bi bi-tag-fill me-2"></i>{{$postTrending->tag->first()->title}}
                                            </a>
                                        @endif
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
                                    @foreach($postsFeature->skip(1) as $posts)
                                        <li>
                                            <div class="content p-0 order-2">
                                                <h4 class="title-latest">
                                                    <a href="{{route('detail', ['slug' => $posts->slug])}}" class=" truncate-2-line">
                                                        <span class="title title-hover-white">
                                                            {{$posts->clean_title}}
                                                        </span>
                                                    </a>
                                                </h4>
                                                <p class="">
                                                    <a href="#" class="desc"><i class="bi bi-calendar-fill me-2"></i>{{$posts->formattedDate}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="">
                                                <a href="{{route('detail', ['slug' => $posts->slug])}}" class="latest-banner-img">
                                                    <img
                                                        src="{{$posts->featured_image}}"
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
                                $postFeatureLatest = $postsFeature->first();
                            @endphp
                            <div class="position-relative block-content-img ">
                                <a href="{{route('detail', ['slug' => $postFeatureLatest->slug])}}" class="content-img img-border text-center">
                                    <img
                                        src="{{$postFeatureLatest->featured_image}}"
                                        alt="" class="latest-news-img" loading="lazy">
                                </a>
                                <a href="{{route('category', ['slug' => $postFeatureLatest->category->first()->slug])}}" class="content-category">
                                    <span> {{$postFeatureLatest->category->first()->title}}</span>
                                </a>
                            </div>
                            <div class="content pb-0">
                                <h3 class="latest-content-title text-center">
                                    <a href="{{route('detail', ['slug' => $postFeatureLatest->slug])}}" class="title-hover-white text-capitalize text-white">
                                        {{$postFeatureLatest->clean_title}}
                                    </a>
                                </h3>
                                <div class="latest-news-time-views text-center">
                                    <a href="#" class="pe-none"><i class="bi bi-calendar-fill me-2"></i>{{$postFeatureLatest->formatted_date}}
                                    </a>
                                    @if($postFeatureLatest->tag->isNotEmpty())
                                        <a href="{{route('tag', ['slug' => $postFeatureLatest->tag->first()->slug])}}" class=""><i class="bi bi-tag-fill me-2"></i>{{$postFeatureLatest->tag->first()?->title}}</a>
                                    @endif
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
                            <img src="https://html.themewant.com/echo/assets/images/home-1/cta/ad-2.png" alt="" loading="lazy" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="editor-section">
        <div class="container">
            <div class="row">
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
                            @foreach($postsEditor->take(4) as $postMain)
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
                                                <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="truncate-2-line black-light-dark-white">
                                                    <span class="hover-black-white text-capitalize">
                                                        {{$postMain->clean_title}}
                                                    </span>
                                                </a>
                                            </h3>
                                            <div class="latest-news-time-views text-center d-flex justify-content-center px-3">
                                                <a href="#" class="pe-none gray-light-dark-white flex-shrink-0"><i class="bi bi-calendar-fill me-2"></i>{{$postMain->formatted_date}}
                                                </a>
                                                @if($postMain->tag->isNotEmpty())
                                                    <a href="{{route('tag', ['slug' => $postMain->tag->first()->slug])}}" class="gray-light-dark-white text-truncate"><i class="bi bi-tag-fill me-2"></i>{{$postMain->tag->first()->title}}</a>
                                                @endif
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
                                    @foreach($postsEditor->skip(4)->take(3) as $postPopular)
                                        <li>
                                            <div class="content p-0 order-2">
                                                <h3 class="">
                                                    <a href="{{route('detail', ['slug' => $postPopular->slug])}}" class=" truncate-2-line black-light-dark-white ">
                                                        <span class="text-capitalize hover-black-white">
                                                            {{$postPopular->clean_title}}
                                                        </span>
                                                    </a>
                                                </h3>
                                                <p class="gray-light-dark-white">
                                                    <i
                                                        class="fa-solid fa-calendar me-2"></i>{{$postPopular->formatted_date}}
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
                                    @foreach($postsEditor->skip(7) as $postGallery)
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
                    <div id="slideContentCarousel" class="carousel slide" data-bs-ride="carousel"
                         data-bs-interval="5000">
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            @foreach($postsHero as $postSlide)
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
                                            <a href="#" class="pe-none gray-light-dark-white"><i class="bi bi-calendar-fill me-2"></i>{{$postSlide->formatted_date}}</a>
                                            @if($postSlide->tag->isNotEmpty())
                                                <a href="{{route('tag', ['slug' => $postSlide->tag->first()->slug])}}" class="gray-light-dark-white"><i class="bi bi-tag-fill me-2"></i>{{$postSlide->tag->first()?->title}}</a>
                                            @endif
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
                                        <a href="{{route('detail', ['slug' => $postMain->slug])}}" class="black-light-dark-white text-capitalize truncate-2-line">
                                            <span class="title-hover hover-black-white">{{$postMain->clean_title}}</span>
                                        </a>
                                    </h3>
                                    <div class="latest-news-time-views p-0 border-0">
                                        <a href="#" class="pe-none gray-light-dark-white"><i class="bi bi-calendar-fill me-2"></i>{{$postMain->formatted_date}}</a>
                                        @if($postMain->tag)
                                            <a href="{{route('tag', ['slug' => $postMain->tag->first()->slug])}}" class="gray-light-dark-white"><i class="bi bi-tag-fill me-2"></i>{{$postMain->tag->first()->title}}</a>
                                        @endif
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
                                    <a href="{{route('category', ['slug' => $postsSub->first()->category->first()->slug])}}" class="position-absolute" style="top: 2rem">
                                        <span class="badge-tag text-uppercase">{{$postsSub->first()->category->first()->title}}</span>
                                    </a>
                                </div>
                                <h3 class="text-white fw-bold mb-2">
                                    <a href="{{route('detail', ['slug' => $postsSub->first()->slug])}}" class="title-hover-white text-white text-capitalize">
                                        {{$postsSub->first()->clean_title}}
                                    </a>
                                </h3>
{{--                                <div class="shares text-white-50 fs-7">--}}
{{--                                    <i class="fa-solid fa-share-nodes me-2"></i>100+K Shares--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        @foreach($postsSub->skip(1) as $post)
                            <div class="top-game-item d-flex align-items-center p-3 mb-3">
                               <h3>
                                   <span class="top-game-num">{{ sprintf('%02d', $loop->iteration + 1) }}</span>
                               </h3>
                                <div class="top-game-info flex-grow-1">
                                    <h4 class="top-game-title mb-1">
                                        <a href="{{route('detail', ['slug' => $post->slug])}}" class="black-light-dark-semi-white truncate-2-line">
                                            <span class="title-hover hover-black-white">{{$post->clean_title}}</span>
                                        </a>
                                    </h4>
{{--                                    <div class="shares fs-7 gray-light-dark-white">--}}
{{--                                        <i class="fa-solid fa-share-nodes me-2 "></i>100+K Shares--}}
{{--                                    </div>--}}
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
