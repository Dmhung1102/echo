<!doctype html>
<html lang="en">
<head>
    <script>
        if (localStorage.getItem('theme') === 'dark-theme') {
            document.documentElement.classList.add('dark-theme');
        }
    </script>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    @yield('style')
</head>
<body>
@include('layout.header')
@yield('content')
@include('layout.footer')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchBtn = document.querySelector('.header-search-btn');
        const searchArea = document.querySelector('.search-btn-area');
        const closeBtn = document.querySelector('.search-close-icon');

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

        const themeToggle = document.querySelector('#rts-data-toggle'); // ID của nút bấm

        if (themeToggle) {
            themeToggle.addEventListener('click', function (e) {
                e.preventDefault();

                // Thay vì body, ta toggle trên thẻ <html>
                document.documentElement.classList.toggle('dark-theme');

                // Lưu trạng thái
                if (document.documentElement.classList.contains('dark-theme')) {
                    localStorage.setItem('theme', 'dark-theme');
                } else {
                    localStorage.setItem('theme', 'light-theme');
                }
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
    document.querySelectorAll('.fill-content p').forEach(p => {
        const count = p.querySelectorAll('img').length;

        if (count === 1) {
            p.classList.add('single-image');
        } else if (count > 1 && count < 4) {
            p.classList.add('center-image');
        }
    });
</script>
@yield('script')
</body>
</html>
