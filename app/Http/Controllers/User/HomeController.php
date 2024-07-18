<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    protected $user;
    protected $product;
    protected $category;
    public function __construct(Product $product, Category $category, User $user)
    {
        $this->user = $user;
        $this->product = $product;
        $this->category = $category;

    }
    public function index()
    {
        $products = $this->product->latest()->paginate(10);
        return view('client.home.index', compact('products'));
    }
}
