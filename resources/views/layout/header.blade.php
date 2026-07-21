@php use App\Models\Category;use App\Models\Post; @endphp
<header>
    <div class="header-top py-4">
        <div class="container">
            <div class="full-header-top">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                        <div class="d-flex align-items-center gap-3 align-items-center">
                            <div class="header-meta-icon">
                                <img
                                    src="https://html.themewant.com/echo/assets/images/home-1/header-top/home-4-header-top.svg"
                                    alt="icon">
                            </div>
                            <div class="header-meta-text">
                                <div class="fw-bold text-truncate-custom">
                                    Elevate your office style to a whole new level.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-8">
                        <div class="d-flex gap-3 justify-content-center">
                            <div class="header-day">
                                <span>
                                    <i class="fa-solid fa-cloud me-2"></i>
                                </span>
                                <span><strong>{{ now()->format('l') }},</strong> {{ now('UTC')->format(' d M y') }}</span>
                            </div>
{{--                            <div class="header-time">--}}
{{--                                <span><i class="fa-regular fa-calendar me-2"></i></span>--}}
{{--                                <span><strong>31°C,</strong> New York </span>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-5 col-4">
                        <div class="header-social d-flex align-items-center justify-content-end gap-3">
                            <div class="header-subscribe">
                                <a href="#" class="btn-subscribe">
                                    <i class="fa-regular fa-envelope me-2"></i>
                                    Subscribe
                                </a>
                            </div>
                            <div class="rts-darkmode ms-2">
                                <a id="rts-data-toggle" class="rts-dark-light" href="#">
                                    <i class="rts-go-dark far fa-moon"></i>
                                    <i class="rts-go-light far fa-sun"></i>
                                </a>
                            </div>
                            <a href="#" class="header-search-btn">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.11556 16.431C13.3485 16.431 16.78 12.9996 16.78 8.76665C16.78 4.53373 13.3485 1.10226 9.11556 1.10226C4.88264 1.10226 1.45117 4.53373 1.45117 8.76665C1.45117 12.9996 4.88264 16.431 9.11556 16.431Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M14.4463 14.4954L17.4512 17.4925" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <span class="header-separator"></span>
                            <a href="#" class="header-menu-btn" data-bs-toggle="offcanvas"
                               data-bs-target="#echoOffcanvas" aria-controls="echoOffcanvas">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.526001 0.953461H20V3.11724H0.526001V0.953461ZM7.01733 8.52668H20V10.6905H7.01733V8.52668ZM0.526001 16.0999H20V18.2637H0.526001V16.0999Z"
                                        fill="#FFFFFF"></path>
                                </svg>
                            </a>
                            <div class="search-btn-area">
                                <div class="container">
                                    <div class="search-input-inner">
                                        <div class="input-div">
                                            <input id="searchInput" class="search-input" type="text"
                                                   placeholder="Search by keyword or #">
                                        </div>
                                        <div class="search-close-icon"><i class="fa-solid fa-xmark"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-7 col-sm-7 col-7">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="https://html.themewant.com/echo/assets/images/home-1/site-logo/site-logo4.svg"
                                 alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                    <ul class="d-flex align-items-center gap-4 justify-content-center menu-list">
                        <li class="has-dropdown">
                            <a href="{{route('home')}}">Home
                                {{--                                <i class="fa-solid fa-angle-down"></i>--}}
                            </a>
                            {{--                            <ul class="dropdown-menu-list">--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 01 - Main</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 02 - Fashion</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 03 - Technology</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 04 - Gamming</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 05 - Sports</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 06 - Travel</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 07 - AI</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 08 - Politics</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 09 - Food</a></li>--}}
                            {{--                                <li class="menu-item"><a href="#" class="menu-item-link">Home 10 - Photography</a></li>--}}
                            {{--                            </ul>--}}
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Pages
                                {{--                                <i class="fa-solid fa-angle-down"></i>--}}
                            </a>
                            <ul class="dropdown-menu-list">
                                <li class="menu-item"><a href="{{route('about')}}" class="menu-item-link">About</a></li>
                                <li class="menu-item"><a href="{{route('contact')}}" class="menu-item-link">Contact</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="{{route('explore')}}">Category
                                {{--                                <i class="fa-solid fa-angle-down"></i>--}}
                            </a>
                            <ul class="dropdown-menu-list">
                                @foreach(Category::getCategories() as $category)
                                <li class="menu-item"><a href="{{route('category',['slug' => $category->slug])}}" class="menu-item-link">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="#">News
                                {{--                                <i class="fa-solid fa-angle-down"></i>--}}
                            </a>
                            <ul class="dropdown-menu-list d-flex gap-3 menu-center p-3">
                                @foreach(Post::getLatestPosts(4) as $post)
                                    <li class="news-card">
                                        <a href="{{route('detail', ['slug' => $post->slug])}}" class="news-card-link">
                                            <div class="news-card-img">
                                                <img
                                                    src="{{$post->featured_image}}"
                                                    alt="{{$post->slug}}">
                                            </div>
                                            <div class="news-card-title truncate-2-line">
                                                {{$post->clean_title}}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        {{--                        <li class="has-dropdown">--}}
                        {{--                            <a href="#">Post--}}
                        {{--                                <i class="fa-solid fa-angle-down"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="#">Contact</a>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-5 text-end">
                    <div class="" id="social-header">
                        <ul class="d-flex gap-4">
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-pinterest-p"></i>
                                </a>
                            </li>
                            <li>
                                <a href="" class="social-desktop">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="header-menu-btn-mobile" data-bs-toggle="offcanvas"
                       data-bs-target="#offCanvasMobile" aria-controls="offCanvasMobile">
                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.526001 0.953461H20V3.11724H0.526001V0.953461ZM7.01733 8.52668H20V10.6905H7.01733V8.52668ZM0.526001 16.0999H20V18.2637H0.526001V16.0999Z"
                                fill="#FFFFFF"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end echo-header-top-menu-bar" tabindex="-1" id="echoOffcanvas"
     aria-labelledby="echoOffcanvasLabel">
    <div class="offcanvas-header p-0">
        <button type="button" class="btn-close-icon close-canvas-desktop" data-bs-dismiss="offcanvas"
                style="color: white">
            <i class="bi bi-x-lg x-icon"></i>
        </button>
    </div>
    <div class="offcanvas-body canvas-body-desktop">
        <div class="inner">
            <div class="logo">
                <div class="img w-50">
                    <img src="assets/img/site-logo4-w.svg" alt="">
                </div>
            </div>
            <div class="content">
                <ul class="menu-list">
                    <li class="my-4">
                        <a href="#" class="item d-flex gap-4 social-desktop">
                            <img src="assets/img/content/1.png" alt="">
                            <div class="detail">
                                <div class="title mb-1">The incident began as an argument among.</div>
                                <div class="author d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                    </svg>
                                    Asley Graham
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="my-4">
                        <a href="#" class="item d-flex gap-4">
                            <img src="assets/img/content/2.png" alt="">
                            <div class="detail">
                                <div class="title mb-1">The incident began as an argument among.</div>
                                <div class="author d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                    </svg>
                                    Asley Graham
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="newsletter-form text-center">
                <div class="form-newsletter">
                    <img src="assets/img/content/news-item-1.png" alt="">
                    <h3>Get Newsletter</h3>
                    <p>Notification products, updates</p>
                    <form action="#">
                        <div class="input-div">
                            <input type="email" placeholder="Your email..." required="">
                        </div>
                        <button type="submit" class="subscribe-btn">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offcanvas Menu Mobile-->
<div class="offcanvas offcanvas-end echo-header-top-menu-bar" tabindex="-1" id="offCanvasMobile"
     aria-labelledby="offCanvasMobileLabel">
    <div class="offcanvas-header p-0">
        <button type="button" class="btn-close-icon close-canvas-desktop" data-bs-dismiss="offcanvas"
                style="color: white">
            <i class="bi bi-x-lg x-icon"></i>
        </button>
    </div>
    <div class="offcanvas-body canvas-body-desktop">
        <div class="inner">
            <ul class="mobile-menu-list">
                <li class="mobile-menu-item">
                    <div class="menu-item-main d-flex align-items-center justify-content-between py-2">
                        <a href="{{route('home')}}" class="text-white fw-semibold">Home</a>
                        {{--                        <button class="submenu-toggle-btn" type="button" data-bs-toggle="collapse"--}}
                        {{--                                data-bs-target="#mobileHomeSub" aria-expanded="true">--}}
                        {{--                            <i class="fa-solid fa-chevron-down"></i>--}}
                        {{--                        </button>--}}
                    </div>
                    <div class="collapse show" id="mobileHomeSub">
                        {{--                        <ul class="submenu-list">--}}
                        {{--                            <li><a href="#">Home 01 - Main</a></li>--}}
                        {{--                            <li><a href="#">Home 02 - Fashion</a></li>--}}
                        {{--                            <li><a href="#">Home 03 - Technology</a></li>--}}
                        {{--                            <li><a href="#">Home 04 - Gamming</a></li>--}}
                        {{--                            <li><a href="#">Home 05 - Sports</a></li>--}}
                        {{--                            <li><a href="#">Home 06 - Travel</a></li>--}}
                        {{--                            <li><a href="#">Home 07 - AI</a></li>--}}
                        {{--                            <li><a href="#">Home 08 - Politics</a></li>--}}
                        {{--                            <li><a href="#">Home 09 - Food</a></li>--}}
                        {{--                            <li><a href="#">Home 10 - Photography</a></li>--}}
                        {{--                        </ul>--}}
                    </div>
                </li>
                <li class="mobile-menu-item">
                    <div class="menu-item-main d-flex align-items-center justify-content-between py-2">
                        <a href="#" class="text-white fw-semibold">Category</a>
                        <button class="submenu-toggle-btn collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#mobileCategorySub" aria-expanded="false">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="collapse" id="mobileCategorySub">
                        <ul class="submenu-list">
                            @foreach(Category::getCategories() as $category)
                                <li><a href="{{route('category', ['slug' => $category->slug])}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="mobile-menu-item">
                    <div class="menu-item-main py-3">
                        <a href="#" class="text-white fw-semibold">About</a>
                    </div>
                </li>
                <li class="mobile-menu-item">
                    <div class="menu-item-main d-flex align-items-center justify-content-between py-2">
                        <a href="#" class="text-white fw-semibold">Post</a>
                        <button class="submenu-toggle-btn collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#mobilePostSub" aria-expanded="false">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    <div class="collapse" id="mobilePostSub">
                        <ul class="submenu-list">
                            <li><a href="#">Post 01</a></li>
                            <li><a href="#">Post 02</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-menu-item">
                    <div class="menu-item-main py-3">
                        <a href="#" class="text-white fw-semibold">Contact</a>
                    </div>
                </li>
            </ul>
            <div class="mobile-social-row d-flex align-items-center gap-2 mt-5">
                <a href="#" class="social-circle-btn"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="social-circle-btn"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="social-circle-btn"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="social-circle-btn"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-circle-btn"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</div>
