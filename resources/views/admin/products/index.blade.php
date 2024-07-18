@extends('admin.layouts.app')
@section('title', 'List Product')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header">
            <h5>Products List</h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi table-product">
                                    <table class="table table-1d all-package">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Sale</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $item->image }}" class="img-fluid" alt="">
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0)">{{ $item->name }}</a>
                                                    </td>

                                                    <td>{{ $item->price }}</td>

                                                    <td>{{ $item->sale }}</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('products.show', $item->id) }}">
                                                                    <span class="lnr lnr-eye"></span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('products.edit', $item->id) }}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                             <form action="{{ route('products.destroy', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn border-0">
                                                                        <span class="lnr lnr-trash text-danger"></span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pagination-box">
                            <nav class="ms-auto me-auto " aria-label="...">
                                <ul class="pagination pagination-primary">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
