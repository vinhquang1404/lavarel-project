@extends('admin.layouts.app')

@section('content')
    <!-- Order section Start -->
    <div class="page-body">
        <div class="title-header">
            <h5>Order List</h5>
        </div>

        <!-- Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi">
                                    <table class="table table-striped all-package">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Phone</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Note</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($orders as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <div class="input-group input-group-static mb-4">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <select name="status" class="form-control select-status"
                                                                data-action="{{ route('admin.orders.update_status', $item->id) }}">
                                                                @foreach (config('order.status') as $status)
                                                                    <option value="{{ $status }}"
                                                                        {{ $status == $item->status ? 'selected' : '' }}>
                                                                        {{ $status }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>


                                                    <td>{{ $item->total }} đ</td>
                                                    <td>{{ $item->customer_phone }}</td>
                                                    <td>{{ $item->customer_name }}</td>
                                                    <td>{{ $item->customer_email }}</td>
                                                    <td>{{ $item->customer_address }}</td>
                                                    <td>{{ $item->note }}</td>
                                                    <td>{{ $item->payment }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination Box Start -->
                        <!-- Pagination Box End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Table End -->
    </div>
    <!-- Order section End -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $(document).on("change", ".select-status", function(e) {
            e.preventDefault();
            let url = $(this).data("action");
            let data = {
                status: $(this).val(),
                _token: $('input[name="_token"]').val()  // Include CSRF token in the data
            };

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(res) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Error",
                        text: xhr.responseText || 'Internal Server Error',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            });
        });
    });
</script>

@endsection
