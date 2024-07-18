@section('title', 'Giỏ Hàng')
@extends('client.layouts.app')

@section('content')
    <main>
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Cart</h2>
            <div class="checkout-steps">
                <a href="{{ route('user.cart.index') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Giỏ Hàng Của Bạn</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="{{ route('client.checkout.index') }}" class="checkout-steps__item">
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
            <div class="shopping-cart">
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->products as $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>
                                        <div class="shopping-cart__product-item">
                                            <a href="product1_simple.html">
                                                <img loading="lazy" src="{{ $item->product->image }}" width="120"
                                                    height="120" alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="shopping-cart__product-item__detail">
                                            <h4><a href="product1_simple.html"> {{ $item->product->name }}</a></h4>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="shopping-cart__product-price">
                                            <p style="{{ $item->product->sale ? 'text-decoration: line-through;' : '' }}">
                                                {{ $item->product->price }} đ
                                            </p>

                                            @if ($item->product->sale)
                                                <p>
                                                    ${{ $item->product->sale_price }} đ
                                                </p>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="qty-control position-relative">
                                            <input type="number" id="productQuantityInput-{{ $item->id }}"
                                                value="{{ $item->product_quantity }}"
                                                class="qty-control__number text-center" min="1">
                                            <button class="qty-control__reduce btn-minus btn-update-quantity" type="button"
                                                style="background: none; border: none;" data-id="{{ $item->id }}"
                                                data-action="{{ route('client.carts.update_product_quantity', $item->id) }}">-</button>
                                            <button class="qty-control__increase btn-plus btn-update-quantity"
                                                type="button" style="background: none; border: none;"
                                                data-action="{{ route('client.carts.update_product_quantity', $item->id) }}"
                                                data-id="{{ $item->id }}">+</button>
                                        </div><!-- .qty-control -->
                                    </td>

                                    <td>
                                            <span class="shopping-cart__subtotal"
                                                id="cartProductPrice-{{ $item->id }}">{{ $item->product->sale ? $item->product->sale_price * $item->product_quantity : $item->product->price * $item->product_quantity }}
                                                đ</span>
                                    </td>
                                    <td>
                                        <button class="btn-remove-product" type="button"
                                            data-action="{{ route('client.carts.remove_product', $item->id) }}"
                                            style="background: none; border: none;">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                                <path
                                                    d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                            </svg>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="cart-table-footer">
                        <form action="{{ route('client.carts.apply_coupon') }}" method="POST"
                            class="position-relative bg-body">
                            @csrf
                            <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
                            <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                                value="APPLY COUPON">

                        </form>
                        <div>
                            @if (session('message'))
                                <div class="row">
                                    <h4 class="text-danger">{{ session('message') }}</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="total-price" data-price="{{ $cart->total_price }}">
                                            {{ $cart->total_price }} đ</td>
                                    </tr>
                                    @if (session('discount_amount_price'))
                                        <tr>
                                            <th>Coupon</th>
                                            <td class="total-price coupon-div"
                                                data-price="{{ session('discount_amount_price') }}">
                                                {{ session('discount_amount_price') }} đ
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Total</th>
                                        <td class="total-price-all"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <button class="btn btn-primary btn-checkout" data-href="{{ route('client.checkout.index') }}">PROCEED TO CHECKOUT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            $(function() {
        getTotalValue()

        function getTotalValue() {
          let total = $(".total-price").data("price");
          let couponPrice = $(".coupon-div")?.data("price") ?? 0;
          $(".total-price-all").text(`${total - couponPrice} đ`);
        }


        $(document).on("click", ".btn-remove-product", function(e) {
          e.preventDefault();
          let url = $(this).data("action");
          confirmDelete()
            .then(function() {
              let data = {
                _token: "{{ csrf_token() }}"
              };
              $.post(url, data, function(res) {
                let cart = res.cart;
                let cartProductId = res.product_cart_id;
                $("#productCountCart").text(cart.product_count);
                $(".total-price")
                  .text(`${cart.total_price} đ`)
                  .data("price", cart.product_count);
                $(`#row-${cartProductId}`).remove();
                getTotalValue();
              });
            })
            .catch(function() {});
        });


        const TIME_TO_UPDATE = 1000;
        $(document).on("click", ".btn-update-quantity", function(e) {
          e.preventDefault();

          let url = $(this).data("action");
          let id = $(this).data("id");
          let productQuantity = $(`#productQuantityInput-${id}`).val();

          let data = {
            product_quantity: productQuantity,
            _token: "{{ csrf_token() }}",
          };

          $.post(url, data, function(response) {
            let cartProductId = response.product_cart_id;
            let cart = response.cart;
            $("#productCountCart").text(cart.product_count);
            $(".total-price")
              .text(`${cart.total_price} đ`)
            if (response.remove_product) {
              $(`#row-${cartProductId}`).remove();
            } else {
              $(`#cartProductPrice${cartProductId}`).html(
                `${response.cart_product_price} đ`);
              location.reload()
            }
            getTotalValue()
            cartProductPrice;
            $(".total-price").text(`${cart.total_price} đ`);
          })
        });
      });
    </script>
@endsection
