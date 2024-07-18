@extends('client.layouts.app')
@section('title' , 'Đăng Nhập')

@section('content')
    <section class="login-register container">
        <h2 class="d-none">{{ __('Đăng nhập') }}</h2>
        <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                    role="tab" aria-controls="tab-item-login" aria-selected="true">{{ __('Đăng nhập') }}</a>
            </li>
        </ul>
        <div class="tab-content pt-2" id="login_register_tab_content">
            <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                <div class="login-form">
                    <form name="login-form" class="needs-validation" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="email" type="email"
                                class="form-control form-control_gray @error('email') is-invalid @enderror" id="email"
                                placeholder="Email address *" value="{{ old('email') }}" autocomplete="email" name="email" autofocus>
                            <label for="customerNameEmailInput1 email">{{ __('Địa chỉ Email') }} *</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="form-floating mb-3">
                            <input name="password" type="password"
                                class="form-control form-control_gray @error('password') is-invalid @enderror"
                                id="customerPasswodInput" placeholder="Password *" autocomplete="current-password">
                            <label for="customerPasswodInput password">{{ __('Mật khẩu') }} *</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center mb-3 pb-2">
                            <div class="form-check mb-0">
                                <input name="remember" class="form-check-input form-check-input_fill" type="checkbox"
                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                                    id="flexCheckDefault1">
                                <label class="form-check-label text-secondary" for="flexCheckDefault1">
                                    {{ __('Ghi nhớ đăng nhập') }}</label>
                            </div>
                            @if (Route::has('forget.password.get'))
                                <a class="btn-text ms-auto" href="{{ route('forget.password.get') }}">
                                    {{ __('Quên mật khẩu') }}
                                </a>
                            @endif
                        </div>

                        <button class="btn btn-primary w-100 text-uppercase" type="submit">Đăng Nhập</button>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">Chưa có tài khoản?</span>
                            <a href="{{ route('register') }}" class="btn-text js-show-register">Tạo tài khoản</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
