  <section class="login-register container">
      <h2 class="d-none">{{ __('Đặt lại mật khẩu') }}</h2>
      <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
          <li class="nav-item" role="presentation">
              <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                  role="tab" aria-controls="tab-item-login" aria-selected="true">{{ __('Đặt lại mật khẩu') }}</a>
          </li>
      </ul>
      <div class="tab-content pt-2" id="login_register_tab_content">
          <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
              <div class="login-form">
                  @if (Session::has('message'))
                      <div class="alert alert-success" role="alert">
                          {{ Session::get('message') }}
                      </div>
                  @endif
                  <form name="login-form" class="needs-validation" method="POST"
                      action="{{ route('forget.password.post') }}">
                      @csrf
                      <div class="form-floating mb-3">
                          <input name="email" type="email" class="form-control form-control_gray" id="email"
                              placeholder="Email address *" autocomplete="email" name="email" autofocus>
                          <label for="customerNameEmailInput1 email">{{ __('Địa chỉ Email') }} *</label>

                          @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                      </div>

                      <button class="btn btn-primary w-100 text-uppercase" type="submit">Đặt lại mật khẩu</button>
                  </form>
              </div>
          </div>
      </div>
  </section>
