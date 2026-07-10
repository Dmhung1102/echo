@php use App\Models\Category;use App\Models\Post; @endphp
<div class="">
    <div class="detail-sidebar">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="black-light-dark-white text-center">
                    Popular Categories
                </h3>
            </div>
        </div>
        <div class="">
            <ul class="list-category">
                @foreach(Category::getCategoriesSideBar() as $category)
                    <li class="text-white text-center"
                        style="background-image: url('{{ $category->img_latest_post }}')">
                        <h4>
                            <a href="{{route('category', ['slug' => $category->slug])}}" class="text-white">
                                {{ $category->title }}
                            </a>
                        </h4>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="detail-sidebar">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="black-light-dark-white text-center">
                    Top Story
                </h3>
            </div>
        </div>
        <div class="">
            <div class="banner-side p-0" style="background: unset">
                <ul>
                    @foreach(Post::getLatestPosts(4) as $post)
                        <li>
                            <div class="content p-0 order-2">
                                <h4 class="">
                                    <a href="{{route('detail', ['slug' => $post->slug])}}"
                                       class=" truncate-2-line black-light-dark-white">
                                        <span class="hover-black-white text-capitalize ">
                                            {{$post->clean_title}}
                                        </span>
                                    </a>
                                </h4>
                                <p class="text-black">
                                    <i class="bi bi-clock-history"></i> {{$post->formatted_date}}
                                </p>
                            </div>
                            <div class="">
                                <a href="{{route('detail', ['slug' => $post->slug])}}"
                                   class="latest-banner-img rounded-0">
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
<div class="fl-us mt-3">
    <div class="detail-sidebar">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="black-light-dark-white text-center">
                    Follow Us
                </h3>
            </div>
        </div>
        <div class="col-lg-12">
            <ul class="social-list">
                <li>
                    <a href="" class="social-follow">
                        <i class="fa-brands fa-facebook me-1"></i>
                        20K Fans
                    </a>
                </li>
                <li>
                    <a href="" class="social-follow">
                        <i class="bi bi-twitter"></i>
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
                        4K Subscriber
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mt-3">
    <div class="feature-ad">
        <img src="https://html.themewant.com/echo/assets/images/category-style-1/item-10.png" alt="" class="rounded-0">
    </div>
</div>
