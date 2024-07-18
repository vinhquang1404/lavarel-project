@extends('admin.layouts.app')
@section('title', 'Voxo - New Users')
@section('content')
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start -->
        <div class="page-body">
            <div class="title-header">
                <h5>Add New User</h5>
            </div>
            <!-- New User start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-home" type="button">Account</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                <form class="theme-form theme-form-2 mega-form"
                                                    action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-header-1">
                                                        <h5>Users Information</h5>
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

                                                        <div class="mb-4 row align-items-center">
                                                            <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                                Name</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" value="{{ old('name') }}"
                                                                    type="text" name="name">
                                                            </div>
                                                            @error('name')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                                Address</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="email"
                                                                    value="{{ old('email') }}" name="email">
                                                            </div>
                                                            @error('email')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="text"
                                                                    value="{{ old('phone') }}" name="phone">
                                                            </div>
                                                            @error('phone')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <input class="form-control" type="password"
                                                                    value="{{ old('password') }}" name="password">
                                                            </div>
                                                            @error('password')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label
                                                                class="col-lg-2 col-md-3 col-form-label form-label-title">Address</label>
                                                            <div class="col-md-9 col-lg-10">
                                                                <textarea class="form-control" type="text" value="{{ old('address') }}" name="address"> </textarea>
                                                            </div>
                                                            @error('address')
                                                                <span class="text-danger"> {{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4 row align-items-center">
                                                            <label class="col-sm-2 col-form-label form-label-title"
                                                                name="group">Gender</label>
                                                            <div class="col-sm-10">
                                                                <select class="js-example-basic-single w-100"
                                                                    name="gender">
                                                                    <option disabled>Gender</option>
                                                                    <option value="male">Male</option>
                                                                    <option value="fe-male">Fe-male</option>
                                                                </select>
                                                                @error('group')
                                                                    <span class="text-danger"> {{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <label
                                                                class="form-label-title col-lg-2 col-md-3 mb-0">Roles</label>
                                                            <div class="row">
                                                                @foreach ($roles as $groupName => $role)
                                                                    <div class="col-lg-4 col-md-6 mb-4">
                                                                        <h4>{{ $groupName }}</h4>
                                                                        <div>
                                                                            @foreach ($role as $item)
                                                                                <div class="form-check user-checkbox ps-0">
                                                                                    <input
                                                                                        class="checkbox_animated check-it"
                                                                                        type="checkbox"
                                                                                        value="{{ $item->id }}"
                                                                                        name="role_ids[]">
                                                                                    <label
                                                                                        class="form-label-title col-md-10">{{ $item->display_name }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <br>
                                                    <button type="submit" class="align-items-center btn btn-theme">
                                                        <i data-feather="plus-square"></i>Add New
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User End -->
        </div>
        <!-- Page Sidebar End -->
    </div>
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
