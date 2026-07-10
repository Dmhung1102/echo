@extends('layout.main')
@section('title')
    Categories
@endsection
@section('content')
    <div class="breadcrumb-section"
         style="background-image: url('https://html.themewant.com/echo/assets/images/breadcrumb/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="meta">
                        <a href="#" class="prev">ECHO /</a>
                        <a href="#" class="next">Layout 03</a>
                    </div>
                    <h1 class="text-theme-light">{{$getArchive->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-section">
     <div class="container">
         <div class="row">
             <div class="col-xl-8 order-xl-1 order-1">
                <div class="row">
                    @foreach($newPosts->take(4) as $posts)
                        @include('partials.single_post_card')
                    @endforeach
                    @if(isset($newPosts[4]))
                        <div class="col-12" style="padding: 12px">
                            <div class="post-card">
                                <a href="{{route('detail', ['slug' => $newPosts[4]->slug])}}" class="post-card-img">
                                    <img src="{{$newPosts[4]->featured_image}}" alt="" class=" hover-post-img w-100">
                                </a>
                                <div class="p-4">
                                    <h2 class="fs-50-hover black-light-dark-white">
                                        <a href="{{route('detail', ['slug' => $newPosts[4]->slug])}}" class="">
                                    <span class="black-light-dark-white hover-black-white text-capitalize">
                                        {{$newPosts[4]->clean_title}} {{$newPosts[4]->id}}
                                    </span>
                                        </a>
                                    </h2>
                                    <div class="post-date-view d-flex flex-wrap my-4 gap-4 gray-light-dark-white">
                                        <div class="fw-semibold">
                                            <i class="bi bi-clock-history"></i>
                                            {{$newPosts[4]->formatted_date}}
                                        </div>
                                        @if(optional($newPosts[4])->tag->isNotEmpty())
                                            <div class="fw-semibold">
                                                <i class="bi bi-tag-fill"></i>
                                                {{$newPosts[4]->tag->first()->title}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="gray-light-dark-white post-card-excerpt">
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui ut. Quam vulputate dignissim over suspendisse in est ante in nibh mauris. Sociis natoque penatibus et magnis parturient.
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
             </div>
             <div class="col-xl-4 order-xl-2 order-3" style="padding: 12px">
                 @include('layout.sidebar_right')
             </div>
             <div class="col-xl-8 order-xl-3 order-2">
                 <div class="row" id="posts-container">
                      @foreach($fetchData as $posts)
                          @include('partials.single_post_card')
                      @endforeach
                      @if($fetchData->hasMorePages())
                          <div class="text-center my-3 mb-5 w-100" id="showmore-wrapper">
                              <a href="#" class="btn-showmore">
                                  show more
                              </a>
                          </div>
                      @endif
                 </div>
             </div>
          </div>
      </div>
    </div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnShowMore = document.querySelector('.btn-showmore');
        const showmoreWrapper = document.getElementById('showmore-wrapper');
        const postsContainer = document.getElementById('posts-container');
        let page = 1;

        if (btnShowMore && postsContainer) {
            btnShowMore.addEventListener('click', function (e) {
                e.preventDefault();
                page++;
                btnShowMore.innerText = 'Loading...';
                btnShowMore.style.pointerEvents = 'none';

                fetch(`?page=${page}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(html => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;

                    // Tìm tất cả các cột bài viết trong phản hồi và chèn vào
                    const newCards = tempDiv.querySelectorAll('.col-lg-6');
                    newCards.forEach(card => {
                        postsContainer.insertBefore(card, showmoreWrapper);
                    });

                    // Kiểm tra xem còn trang tiếp theo hay không
                    const hasMoreIndicator = tempDiv.querySelector('#ajax-has-more');
                    if (hasMoreIndicator && hasMoreIndicator.getAttribute('data-has-more') === 'true') {
                        btnShowMore.innerText = 'show more';
                        btnShowMore.style.pointerEvents = 'auto';
                    } else {
                        showmoreWrapper.remove();
                    }
                })
                .catch(error => {
                    console.error('Error fetching more posts:', error);
                    btnShowMore.innerText = 'show more';
                    btnShowMore.style.pointerEvents = 'auto';
                });
            });
        }
    });
</script>
@endsection
