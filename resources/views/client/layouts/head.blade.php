<!-- Header Type 2 -->
<header id="header" class="header header-fullwidth header_sticky-bg_dark header-transparent-bg">
    <div class="header-desk header-desk_type_2">
        <nav class="navigation d-flex">
            <ul class="navigation__list list-unstyled d-flex">
                <li class="navigation__item">
                    <a href="{{ route('home') }}" class="navigation__link">Trang Chủ</a>
                </li>
                <li class="navigation__item">
                    <a href="{{ route('home') }}" class="navigation__link">Cửa Hàng</a>
                </li>
                <li class="navigation__item">
                    <a href="#" class="navigation__link">Bài Viết</a>
                </li>
                <li class="navigation__item">
                    <a href="about.html" class="navigation__link">Về chúng tôi</a>
                </li>
                <li class="navigation__item">
                    <a href="contact.html" class="navigation__link">Liên Hệ</a>
                </li>
            </ul><!-- /.navigation__list -->
        </nav><!-- /.navigation -->

        <div class="logo">
            <a href="index.html">
                <img src="{{ asset('client/assets/images/logo-wine.png') }}" alt="Uomo" class="logo__image d-block">
            </a>
        </div><!-- /.logo -->

        <div class="header-tools d-flex align-items-center">
            <div class="header-tools__item hover-container">
                <div class="js-hover__open position-relative">
                    <a class="js-search-popup search-field__actor" href="#">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_search" />
                        </svg>
                        <i class="btn-icon btn-close-lg"></i>
                    </a>
                </div>

                <div class="search-popup js-hidden-content">
                    <form action="https://uomo-html.flexkitux.com/Demo17/search_result.html" method="GET"
                        class="search-field container">
                        <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                        <div class="position-relative">
                            <input class="search-field__input search-popup__input w-100 fw-medium" type="text"
                                name="search-keyword" placeholder="Search products">
                            <button class="btn-icon search-popup__submit" type="submit">
                                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_search" />
                                </svg>
                            </button>
                            <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                        </div>
                    </form><!-- /.header-search -->
                </div><!-- /.search-popup -->
            </div><!-- /.header-tools__item hover-container -->

            <div class="header-tools__item hover-container">
                <a href="{{ route('profile') }}" data-aside="customerForms">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_user" />
                    </svg>
                </a>
            </div>

            <a class="header-tools__item" href="account_wishlist.html">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                </svg>
            </a>

            <a href="{{ route('user.cart.index') }}" class="header-tools__item header-tools__cart">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_cart" />
                </svg>
            </a>
        </div><!-- /.header__tools -->
    </div><!-- /.header-desk header-desk_type_2 -->
</header>
<!-- End Header Type 2 -->
