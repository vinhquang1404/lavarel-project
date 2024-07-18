@extends('admin.layouts.app')
@section('title', $product->name)
@section('content')
    <div class="page-body">
        <div class="title-header title-header-block package-card">
            <div>
                <h5>Product #{{ $product->id }}</h5>
            </div>

            <!-- tracking table start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="bg-inner cart-section order-details-table">
                                    <div class="row g-4">
                                        <div class="col-xl-8">
                                            <div class="table-responsive table-details">
                                                <table class="table cart-table table-borderless">
                                                    <tbody>
                                                        <img src="{{ $product->image }}" class="img-fluid" alt="">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="order-success">
                                                <div class="row g-4">
                                                    <h4>Product name</h4>
                                                    <ul class="order-details">
                                                        <li>{{ $product->name }}</li>
                                                    </ul>

                                                    <h4>Price</h4>
                                                    <ul class="order-details">
                                                        <li>{{ $product->price }}</li>
                                                    </ul>


                                                    <h4>Sale</h4>
                                                    <ul class="order-details">
                                                        <li>{{ $product->sale }}</li>
                                                    </ul>

                                                    <div class="delivery-sec">
                                                        <h4>Category</h4>
                                                        @foreach ($product->categories as $item)
                                                            <p>{{ $item->name }}</p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tracking table end -->
        </div>
    @endsection
