@extends('admin.layouts.app')
@section('title', 'Voxo - List Roles')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
            <h5>Roles List</h5>
            @if (session('massage'))
                <h2 class="text-bg-primary">{{ session('massage') }}</h2>
            @endif
            <form class="d-inline-flex">
                <a href="{{ route('roles.create') }}" class="align-items-center btn btn-theme">
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
                                                <th>DisplayName</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        {{ $role->id }}
                                                    </td>
                                                    <td>
                                                        {{ $role->name }}
                                                    </td>
                                                    <td>
                                                        {{ $role->display_name }}
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('roles.edit', $role->id) }}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('roles.destroy', $role->id) }}"
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
                                    {{ $roles->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->    
    </div>
@endsection
