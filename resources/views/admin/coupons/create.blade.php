@extends('admin.layouts.app')
@section('title', 'Voxo - Add coupons')
@section('content')
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start -->
        <div class="page-body">
            <div class="title-header">
                <h5>Add New Coupons</h5>
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
                                                    action="{{ route('coupons.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-header-1">
                                                        <h5>Coupons Information</h5>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="form-label-title col-lg-2 col-md-3 mb-0">Name</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ old('name') }}" style="text-transform: uppercase">
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
                                                                    value="{{ old('value') }}">
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
                                                                    <option disabled>Select Type</option>
                                                                    <option value="money">money</option>
                                                                    <option value="freeship">free-ship</option>
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
                                                                value="{{ old('expery_date') }}">
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
            <!-- New User End -->

            <!-- footer start -->
            <div class="container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- footer end -->
        </div>
        <!-- Page Sidebar End -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endsection
