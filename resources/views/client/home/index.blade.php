@extends('client.layouts.app')
@section('title', 'Trang Chủ')
@section('content')

    {{-- FEATURED PRODUCTS --}}
    <section class="products-carousel full-width_padding">
        <h2 class="section-title text-uppercase fs-40 fw-bold text-center mb-2">Sản Phẩm Tiêu Biểu</h2>
        <p class="fs-13 mb-3 pb-2 pb-xl-3 text-secondary text-center">Mang nó đến một bữa tiệc, tặng nó cho bạn bè và dự trữ trong tủ lạnh của bạn.</p>

        <div id="products_1" class="position-relative">
            <div class="swiper-container js-swiper-slider"
                data-settings='{
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": 5,
            "slidesPerGroup": 1,
            "effect": "none",
            "loop": true,
            "pagination": false,
            "navigation": {
              "nextEl": "#products_1 .products-carousel__next",
              "prevEl": "#products_1 .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 1,
                "spaceBetween": 30,
                "pagination": false
              },
              "1200": {
                "slidesPerView": 5,
                "slidesPerGroup": 1,
                "spaceBetween": 30,
                "pagination": false
              }
            }
          }'>
                <div class="swiper-wrapper">
                    @foreach ($products as $item)
                        <div class="swiper-slide product-card">
                            <div class="pc__img-wrapper">
                                <a href="{{ route('client.products.show' , $item->id) }}">
                                    <img loading="lazy" src="{{ $item->image }}"
                                        width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img">
                                </a>
                            </div>

                            <div class="pc__info position-relative text-center">
                                <h6 class="pc__title text-uppercase fw-bold mb-2"><a href="#">{{ $item->name }}</a></h6>
                                <div class="product-card__price d-flex align-items-center justify-content-center mb-2">
                                    <span class="money price fw-semi-bold">{{ $item->price }} VND</span>
                                </div>
                                <div class="product-card__review d-flex align-items-center justify-content-center">
                                    <div class="reviews-group d-flex theme-color-secondary">
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_star"></use>
                                        </svg>
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_star"></use>
                                        </svg>
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_star"></use>
                                        </svg>
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_star"></use>
                                        </svg>
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_star"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- /.swiper-wrapper -->
            </div><!-- /.swiper-container js-swiper-slider -->
        </div><!-- /.position-relative -->

        <div class="mb-3 mb-xl-4 pb-3 pt-1"></div>

        <div class="text-center">
            <button class="btn btn-secondary fw-medium theme-bg-color text-white text-uppercase border-0">See All Our
                Wines</button>
        </div>
    </section>

    <div class="mb-3 mb-xl-5 pb-3 pt-1 pb-xl-5"></div>

    <section class="banner">
        <div class="row mx-0">
            <div class="col-lg-7 px-0">
                <img loading="lazy" src="{{ asset('client/assets/images/home/demo17/banner-1.jpg') }}" width="1065"
                    height="700" alt="Pattern" class="w-100 h-auto">
            </div>
            <div class="col-lg-5 col-xl-4 px-0 py-5 d-flex flex-column align-items-center justify-content-center">
                <div class="px-4 px-xl-5">
                    <h2 class="fs-40 fw-bold text-uppercase mb-4">CÔNG VIỆC CỦA MỘT CUỘC SỐNG TRONG<br>THUNG LŨNG PHÁP</h2>
                    <p class="fs-13 text-secondary mb-4">Khi nói đến việc kiểm soát hàng trăm bài viết, trang sản phẩm cho các cửa hàng trực tuyến hoặc hồ sơ người dùng trên mạng xã hội, tất cả chúng đều có thể có kích thước, định dạng, quy tắc khác nhau cho các yếu tố khác nhau.</p>
                    <p class="mb-0"><a href="shop1.html"
                            class="btn-link btn-link_md default-underline text-uppercase fw-semi-bold fs-13 theme-color-secondary">XEM THÊM</a></p>
                </div>
            </div>
        </div>
    </section>
    {{-- NEW WINES --}}

@endsection
