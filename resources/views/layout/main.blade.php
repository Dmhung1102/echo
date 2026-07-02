<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @yield('style')
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/lazy.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchBtn = document.querySelector('.header-search-btn');
        const searchArea = document.querySelector('.search-btn-area');
        const closeBtn = document.querySelector('.search-close-icon');
        const themeToggle = document.getElementById('rts-data-toggle');

        if (searchBtn && searchArea) {
            searchBtn.addEventListener('click', function (e) {
                e.preventDefault();
                searchArea.classList.add('show');
            });
        }

        if (closeBtn && searchArea) {
            closeBtn.addEventListener('click', function () {
                searchArea.classList.remove('show');
            });
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', function (e) {
                e.preventDefault();
                document.body.classList.toggle('dark-theme');
            });
        }

        // Sticky Header on Scroll
        const header = document.querySelector('header');
        const headerTop = document.querySelector('.header-top');

        if (header && headerTop) {
            const stickyOffset = headerTop.offsetHeight;

            window.addEventListener('scroll', function () {
                if (window.scrollY > stickyOffset) {
                    header.classList.add('header-sticky');
                } else {
                    header.classList.remove('header-sticky');
                }
            });
        }
        // Back to Top Button Scroll and Click
        const backToTopBtn = document.getElementById('back-to-top');
        if (backToTopBtn) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });

            backToTopBtn.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    });
</script>
@yield('script')
</body>
</html>
