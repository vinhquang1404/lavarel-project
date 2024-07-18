@extends('admin.layouts.app')
@section('title', 'Voxo - List Users')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="title-header title-header-1">
             @if (session('massage'))
                <h2 class="text-bg-primary">{{ session('massage') }}</h2>
            @endif
            <h5>All Users</h5>
            <form class="d-inline-flex">
                <a href="{{ route('users.create') }}" class="align-items-center btn btn-theme">
                    <i data-feather="plus-square"></i>Add New
                </a>
            </form>
        </div>
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi">
                                    <table class="user-table table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>Gender</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>
                                                        <span>
                                                            <img src="{{ asset($item->image) }}" alt="users">
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="d-block ">{{ $item->name }}</span>
                                                    </td>

                                                    <td>{{ $item->phone }}</td>

                                                    <td>{{ $item->email }}</td>

                                                    <td class="font-primary">{{ $item->address }}</td>

                                                    <td>{{ $item->gender }}</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('users.edit',$item->id) }}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>

                                                              <li>
                                                                <form action="{{ route('users.destroy', $item->id) }}"
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
                                {{ $users->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All User Table Ends-->
        <!-- Page Body End -->
    @endsection
