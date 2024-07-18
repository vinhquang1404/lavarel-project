@extends("admin.layouts.app")
@section('title', 'Voxo - Dashboard')
@section("content")
       <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- chart caard section start -->
                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class="custome-1-bg b-r-4 card-body">
                                    <div class="media align-items-center static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Category</span>
                                            <h4 class="mb-0 counter">{{ $categoryCount }}
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="database"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-danger border-5 border-0 card o-hidden">
                                <div class=" custome-2-bg  b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Order</span>
                                            <h4 class="mb-0 counter">{{ $orderCount }}
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="shopping-bag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-secondary border-5 border-0  card o-hidden">
                                <div class=" custome-3-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Product</span>
                                            <h4 class="mb-0 counter">{{ $productCount }}
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="box"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-success border-5 border-0 card o-hidden">
                                <div class=" custome-4-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total User</span>
                                            <h4 class="mb-0 counter">{{ $userCount }}
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-success border-5 border-0 card o-hidden">
                                <div class=" custome-4-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Role</span>
                                            <h4 class="mb-0 counter">{{ $roleCount }}
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-success border-5 border-0 card o-hidden">
                                <div class="custome-4-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Coupon</span>
                                            <h4 class="mb-0 counter">{{ $couponCount }}
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="tag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chart caard section End -->
                
            </div>
            <!-- index body end -->
@endsection