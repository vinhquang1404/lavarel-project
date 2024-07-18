<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $category, $product, $productDetail;

    public function __construct(Category $category, Product $product, ProductDetail $productDetail)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productDetail = $productDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->latest('id')->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $dataCreate = $request->all();  
        
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('image', $fileName, 'public');
        $dataCreate['image'] = '/storage/' . $path;
        $product = $this->product->create($dataCreate);
        $product->categories()->attach($dataCreate['category_ids']);
        // dd($product);
        return redirect()->route('products.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with('details')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with('details')->findOrFail($id);
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $dataUpdate = $request->all();

        $product = $this->product->findOrFail($id);
        $currentImage = $product->image;

        if ($request->hasFile('image')) {
            if ($currentImage) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $currentImage));
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $dataUpdate['image'] = '/storage/' . $path;
        } else {
            $dataUpdate['image'] = $currentImage;
        }
        $product->update($dataUpdate);
        $product->categories()->attach($dataUpdate['category_ids']);
        // dd($product);
        return redirect()->route('products.index')->with('success', 'Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa thành công');
    }
}
