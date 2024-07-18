@extends('client.layouts.app')
@section('title', 'Đăng ký')

@section('content')
    <section class="login-register container">
        <h2 class="d-none">{{ __('Đăng ký') }}</h2>
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                    role="tab" aria-controls="tab-item-login" aria-selected="true">{{ __('Đăng ký') }}</a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
            <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                <div class="login-form">
                    <form name="login-form" class="needs-validation" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="name" type="text"
                                class="form-control form-control_gray  @error('name') is-invalid @enderror"
                                id="customerNameEmailInput1" placeholder="Họ tên *" name="name" autofocus>
                            <label for="customerNameEmailInput1">{{ __('Họ tên *') }}</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email"
                                class="form-control form-control_gray @error('email') is-invalid @enderror" id="email"
                                placeholder="Địa chỉ Email *" value="{{ old('email') }}" autocomplete="email"
                                name="email">
                            <label for="customerNameEmailInput1 email">{{ __('Địa chỉ Email') }} *</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="phone" type="text"
                                class="form-control form-control_gray @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Số điện thoại *" value="{{ old('phone') }}" autocomplete="phone"
                                name="phone" autofocus>
                            <label for="customerNameEmailInput1 email">{{ __('Số điện thoại') }} *</label>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <div class="search-field my-3">
                                <div class="form-label-fixed hover-container">
                                    <label for="search-dropdown" class="form-label">{{ __('Giới tính') }}*</label>
                                    <div class="js-hover__open">
                                        <select
                                            class="form-control form-control-lg search-field__actor search-field__arrow-down"
                                            id="search-dropdown" name="gender">
                                            <option value="" selected disabled>Giới tính của bạn...</option>
                                            <option value="male">Nam</option>
                                            <option value="fe-male">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-floating mb-3">
                            <input name="password" type="password"
                                class="form-control form-control_gray @error('password') is-invalid @enderror"
                                id="customerPasswodInput" placeholder="Mật khẩu *" required>
                            <label for="customerPasswodInput">{{ __('Mật khẩu') }} *</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password_confirmation" type="password"
                                class="form-control form-control_gray"
                                id="customerPasswodInput password-confirm" placeholder="Xác nhận mật khẩu *" required>
                            <label for="customerPasswodInput">{{ __('Xác nhận mật khẩu') }} *</label>
                        </div>
                        <div class="pb-3"></div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit"> {{ __('Đăng ký') }}</button>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">Đã có tài khoản?</span>
                            <a href="{{ route('login') }}" class="btn-text js-show-register">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
