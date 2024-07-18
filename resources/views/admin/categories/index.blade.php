@extends('admin.layouts.app')
@section('title', 'Voxo - List Categories')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>Categories List</h5>
            @if (session('massage'))
                <h2 class="text-bg-primary">{{ session('massage') }}</h2>
            @endif
            <form class="d-inline-flex">
                <a href="{{ route('categories.create') }}" class="align-items-center btn btn-theme">
                    <i data-feather="plus-square"></i>Add New
                </a>
            </form>
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Parent Name</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($categories as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->id }}
                                                    </td>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td>
                                                        {{ $item->parent_name }}
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('categories.edit', $item->id) }}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('categories.destroy', $item->id) }}"
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
                                    {{ $categories->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
      @section("script")
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-H+K7U5CnX+" crossorigin="anonymous"></script>
<script>
$(function() {
    $(document).on("click", ".btn-delete", function(e) {
        e.preventDefault();
        let id = $(this).data("id");
        if (confirm('Are you sure you want to delete it?')) {
            $("#form-delete-" + id).submit();
        }
    });
});
</script>
@endsection

@endsection
