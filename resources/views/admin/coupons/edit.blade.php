@extends('admin.layouts.app')
@section('title', 'Voxo - Edit Coupons')
@section('content')
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start -->
        <div class="page-body">
            <div class="title-header">
                <h5>Edit Coupon</h5>
            </div>
            <!-- New User start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-home" type="button">New Coupon</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                <form class="theme-form theme-form-2 mega-form"
                                                    action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-header-1">
                                                        <h5>Coupons Information</h5>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="form-label-title col-lg-2 col-md-3 mb-0">Value</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ old('name') ?? $coupon->name }}"
                                                                    style="text-transform: uppercase">
                                                            </div>
                                                            @error('name')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="form-label-title col-lg-2 col-md-3 mb-0">Value</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="text" name="value"
                                                                    value="{{ old('value') ?? $coupon->value }}">
                                                            </div>
                                                            @error('value')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label class="col-sm-2 col-form-label form-label-title"
                                                                name="group">Type</label>
                                                            <div class="col-sm-10">
                                                                <select class="js-example-basic-single w-100"
                                                                    name="type">
                                                                    <option>Select Type</option>
                                                                    <option value="money"
                                                                        {{ (old('type') ?? $coupon->type) == 'money' ? 'selected' : '' }}>
                                                                        Money</option>
                                                                    <option value="freeship"
                                                                        {{ (old('type') ?? $coupon->type) == 'freeship' ? 'selected' : '' }}>
                                                                        Free-ship</option>
                                                                </select>
                                                            </div>
                                                            @error('value')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="form-label-title col-lg-2 col-md-3 mb-0">Experydate</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control" type="date" name="expery_date"
                                                                value="{{ old('expery_date') ?? $coupon->expery_date }}">
                                                        </div>
                                                        @error('expery_date')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="align-items-center btn btn-theme">
                                                        <i data-feather="plus-square"></i>Add New
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User End -->
    </div>
    <!-- Page Sidebar End -->
    </div>

@endsection
