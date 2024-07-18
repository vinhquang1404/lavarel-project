@extends('client.layouts.app')
@section('title', 'Checkout')
@section('content')
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <div class="checkout-steps">
                <a href="{{ route('user.cart.index') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="shop_checkout.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="shop_order_complete.html" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <form name="checkout-form" action="{{ route('client.checkout.process') }}" method="POST">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <h4>BILLING DETAILS</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="checkout_company_name" placeholder="Name"
                                        value="{{ old('customer_name') }}" name="customer_name">
                                    <label>Name</label>
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror ()

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="checkout_company_name"
                                        placeholder="E-mail" name="customer_email" value="{{ old('customer_email') }}">
                                    <label>E-mail</label>
                                    @error('customer_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror ()

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="checkout_company_name"
                                        placeholder="Phone" name="customer_phone" value="{{ old('customer_phone') }}">
                                    <label>Phone</label>
                                    @error('customer_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror ()

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="checkout_company_name"
                                        placeholder="Address" name="customer_address" value="{{ old('customer_address') }}">
                                    <label>Address</label>
                                    @error('customer_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror ()

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mt-3">
                                <textarea class="form-control form-control_gray" name="note" value={{ old('note') }}
                                    placeholder="Order Notes (optional)" cols="30" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->products as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->product_quantity }} x {{ $item->product->name }}
                                                </td>
                                                <td>
                                                    {{ $item->product_quantity * $item->product->price }} đ
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td class="total-price" data-price="{{ $cart->total_price }}">
                                                {{ $cart->total_price }} đ</td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td class="shipping" data-price="42000">42000 đ</td>
                                            <input type="hidden" value="42000" name="ship">
                                        </tr>
                                        @if (session('discount_amount_price'))
                                            <tr>
                                                <th>Coupons</th>
                                                <td class="coupon-div" data-price="{{ session('discount_amount_price') }}">
                                                    {{ session('discount_amount_price') }} đ</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>TOTAL</th>
                                            <td class="total-price-all"></td>
                                            <input type="hidden" id="total" value="" name="total">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="payment" id="checkout_payment_method_1"
                                        value="Pay on delivery" checked>
                                    <label class="form-check-label" for="checkout_payment_method_1">
                                        Thanh toán khi giao hàng
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio"
                                        name="payment" id="checkout_payment_method_3" value="Bank Transfer">
                                    <label class="form-check-label" for="checkout_payment_method_3">
                                        Chuyển khoản trực tiếp
                                    </label>
                                </div>
                                <div class="policy-text">
                                    Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của
                                    bạn trên trang web này và cho các mục đích khác được mô tả trong <a href="terms.html"
                                        target="_blank">chính sách bảo mật của chúng tôi</a>.
                                </div>
                            </div>
                            <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {


            getTotalValue()

            function getTotalValue() {
                let total = $('.total-price').data('price')
                let couponPrice = $('.coupon-div')?.data('price') ?? 0;
                let shiping = $('.shipping').data('price')
                $('.total-price-all').text(`${total + shiping - couponPrice} đ`)
                $('#total').val(total + shiping - couponPrice)
            }

        });
    </script>
@endsection
