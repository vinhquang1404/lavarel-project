<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;

class DashboardController extends Controller
{
    protected $user, $category, $order, $product, $coupon;
    protected $role;
    public function __construct(User $user, Role $role, Order $order, Category $category, Product $product, Coupon $coupon)
    {
        $this->category = $category;
        $this->order = $order;
        $this->product = $product;
        $this->coupon = $coupon;
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userCount = $this->user->count();
        $categoryCount = $this->category->count();
        $orderCount = $this->order->count();
        $productCount = $this->product->count();
        $couponCount = $this->coupon->count();
        $roleCount = $this->role->count();

        $users = $this->user->find(auth()->user()->id);
        $roles = $this->role->find(auth()->user()->id);
        return response()->view('admin.dashboard.index', compact('users', 'roles', 'userCount', 'categoryCount', 'productCount', 'orderCount', 'couponCount', 'roleCount'));
    }
}
