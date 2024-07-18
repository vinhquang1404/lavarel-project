@extends('client.layouts.app')
@section('title', 'Profile')
@section('content')
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Account Details</h2>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="account-nav">
                        <li><a href="{{ route('dashboard') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
                        <li><a href="{{ route('client.orders.index') }}" class="menu-link menu-link_us-s">Order</a></li>
                        <li><a href="{{ route('logout') }}" class="menu-link menu-link_us-s">Logout</a></li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                            <form id="formAccountSettings" method="POST"
                                action="{{ route('profile.update', auth()->id()) }}" enctype="multipart/form-data"
                                class="needs-validation" role="form">
                                @csrf
                                @if (session()->has('success_message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success_message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="file" class="form-control" id="account_display_name"
                                                placeholder="Image" id="image" name="image"
                                                value="{{ auth()->user()->image }}">
                                            <label for="account_name">{{ trans('Image') }}</label>
                                            <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_display_name"
                                                placeholder="Name" id="name" name="name"
                                                value="{{ auth()->user()->name }}">
                                            <label for="account_name">{{ trans('Name') }}</label>
                                            <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_display_name"
                                                placeholder="Address" id="address" name="address"
                                                value="{{ auth()->user()->address }}">
                                            <label for="account_name">{{ trans('Address') }}</label>
                                            <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" id="account_display_name"
                                                placeholder="Phone" id="phone" name="phone"
                                                value="{{ auth()->user()->phone }}">
                                            <label for="account_name">{{ trans('Phone') }}</label>
                                            <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="email" class="form-control" id="account_email"
                                                placeholder="Email Address" id="email" name="email"
                                                value="{{ auth()->user()->email }}">
                                            <label for="account_email">Email Address</label>
                                            <div class="invalid-tooltip">{{ trans('sentence.required') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="male"
                                                {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female"
                                                {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>


                                    {{-- <div class="col-md-12">
                                        <div class="my-3">
                                            <h5 class="text-uppercase mb-0">Password Change</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control" id="account_current_password"
                                                placeholder="Current password" required>
                                            <label for="account_current_password">Current password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control" id="account_new_password"
                                                placeholder="New password" required>
                                            <label for="account_new_password">New password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control"
                                                data-cf-pwd="#account_new_password" id="account_confirm_password"
                                                placeholder="Confirm new password" required>
                                            <label for="account_confirm_password">Confirm new password</label>
                                            <div class="invalid-feedback">Passwords did not match!</div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button type="submit"
                                                class="btn btn-primary">{{ trans('Save Changes') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
