@extends('admin.layouts.app')
@section('title', 'Edit Products')
@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Edit Product</h5>
        </div>

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Product Information</h5>
                                    </div>

                                    <form class="theme-form theme-form-2 mega-form"
                                        action="{{ route('products.update', $product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Product
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" placeholder="Product Name"
                                                        name="name" value="{{ old('name') ?? $product->name }}">
                                                </div>
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Product
                                                    Price</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" placeholder="Product Price"
                                                        name="price" value="{{ old('price') ?? $product->price }}">
                                                </div>
                                                @error('price')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Product
                                                    Sale</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" placeholder="Product Sale"
                                                        name="sale" value="{{ old('sale') ?? $product->sale }}">

                                                </div>
                                                @error('sale')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4 row align-items-center">
                                                <label class="col-sm-2 col-form-label form-label-title"
                                                    name="group">Category </label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-basic-single w-100" name="category_ids[]">
                                                        @foreach ($categories as $item)
                                                            <option value="{{ $item->id }}" {{ $product->categories->contains('id', $item->id) ? 'selected' : '' }} >{{ $item->name }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('category_ids')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-header-2">
                                                        <h5>Description</h5>
                                                    </div>

                                                    <form class="theme-form theme-form-2 mega-form">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <label class="form-label-title col-sm-2 mb-0">Product
                                                                        Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea id="editor" name="description" {{ old('description') ?? $product->description }}></textarea>
                                                                    </div>
                                                                </div>
                                                                @error('description')
                                                                    <span class="text-danger"> {{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-header-2">
                                                        <h5>Product Image</h5>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                Image</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input type="file" accept="image/*" name="image"
                                                                    id="image-input" class="form-control">
                                                            </div>

                                                            @error('image')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                            <div class="col-5" style="text-align: center;">
                                                                <img src="" id="show-image" alt=""
                                                                    style="max-width: 100%; max-height: 200px; display: inline-block; margin-top: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="align-items-center btn btn-theme">
                                                        <i data-feather="plus-square"></i>Add New
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Product Add End -->
        </div>
        <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/assets/js/ckeditor-custom.js') }}"></script>
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
