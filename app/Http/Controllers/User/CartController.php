<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;
    protected $product;
    protected $cartProduct;
    protected $coupon;
    protected $order;

    public function __construct(Product $product, Cart $cart, CartProduct $cartProduct, Coupon $coupon, Order $order)
    {
        $this->product = $product;
        $this->cart = $cart;
        $this->cartProduct = $cartProduct;
        $this->coupon = $coupon;
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            $cart = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');

            return view('client.cart.index', compact('cart'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->product->find($request->product_id);
        $cart = $this->cart->firstOrCreate(['user_id' => auth()->user()->id])->load('products');
        $cartProduct = $this->cartProduct->getBy($cart->id, $product->id);

        if ($cartProduct) {
            $quantity = $cartProduct->product_quantity;
            $cartProduct->update(['product_quantity' => $quantity + $request->product_quantity]);
        } else {
            $dataCreate = [
                'cart_id' => $cart->id,
                'product_quantity' => $request->product_quantity ?? 1,
                'product_price' => $request->product_price ?? $product->price,
                'product_id' => $request->product_id,
            ];
            $this->cartProduct->create($dataCreate);
        }

        return back()->with('message', 'Thêm sản phẩm vào giỏ hàng thành công');
    }
    public function updateQuantityProduct(Request $request, $id)
    {
        $cartProduct = $this->cartProduct->find($id);
        $dataUpdate = $request->all();
        if ($dataUpdate['product_quantity'] < 1) {
            $cartProduct->delete();
        } else {
            $cartProduct->update($dataUpdate);
        }

        $cart = $cartProduct->cart;

        return response()->json(
            [
                'product_cart_id' => $id,
                'cart' => new CartResource($cart),
                'remove_product' => $dataUpdate['product_quantity'] < 1,
                'cart_product_price' => $cartProduct->total_price,
            ],
            Response::HTTP_OK,
        );
    }
    public function removeProductInCart($id)
    {
        $cartProduct = $this->cartProduct->find($id);
        $cartProduct->delete();
        $cart = $cartProduct->cart;
        return response()->json(
            [
                'product_cart_id' => $id,
                'cart' => new CartResource($cart),
            ],
            Response::HTTP_OK,
        );
    }

    public function applyCoupon(Request $request)
    {
        $name = $request->input('coupon_code');
        $coupon = $this->coupon->firstWithExperyDate($name, auth()->user()->id);

        if ($coupon) {
            $message = 'Áp Mã giảm giá thành công !';
            Session::put('coupon_id', $coupon->id);
            Session::put('discount_amount_price', $coupon->value);
            Session::put('coupon_code', $coupon->name);
        } else {
            Session::forget(['coupon_id', 'discount_amount_price', 'coupon_code']);
            $message = 'Mã giảm giá không tồn tại hoặc hết hạn!';
        }

        return redirect()
            ->route('user.cart.index')
            ->with([
                'message' => $message,
            ]);
    }

    public function checkout()
    {
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');

        return view('client.cart.checkout', compact('cart'));
    }

    public function processCheckout(CreateOrderRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['user_id'] = auth()->user()->id;
        $dataCreate['status'] = 'pending';
        $this->order->create($dataCreate);
        $couponID = Session::get('coupon_id');
        if ($couponID) {
            $coupon = $this->coupon->find(Session::get('coupon_id'));
            $coupon->users()->attach(auth()->user()->id, ['value' => $coupon->value]);
        }
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id);
        $cart->products()->delete();
        Session::forget(['coupon_id', 'discount_amount_price', 'coupon_code']);

        $cart = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');
        return view('client.cart.finishcheckout', compact('cart'));
    }

}
