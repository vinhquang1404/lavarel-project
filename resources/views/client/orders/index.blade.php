 @extends('client.layouts.app')
 @section('title', 'Order Detail')
 @section('content')
     <main>
         <div class="mb-4 pb-4"></div>
         <section class="my-account container">
             <h2 class="page-title">Orders</h2>
             <div class="row">
                 <div class="col-lg-3">
                     <ul class="account-nav">
                         <li><a href="{{ route('dashboard') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
                         <li><a href="{{ route('client.orders.index') }}" class="menu-link menu-link_us-s">Order</a></li>
                         <li><a href="{{ route('logout') }}" class="menu-link menu-link_us-s">Logout</a></li>
                     </ul>
                 </div>
                 <div class="col-lg-9">
                     <div class="page-content my-account__orders-list">
                         <table class="orders-table">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Status</th>
                                     <th>Total</th>
                                     <th>Name</th>
                                     <th>Phone</th>
                                     <th>Address</th>
                                     <th>Payment</th>
                                     <th>Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($orders as $item)
                                     <tr>
                                         <td>#{{ $item->id }}</td>
                                         <td>{{ $item->status }}</td>
                                         <td>{{ $item->total }} đ</td>
                                         <td>{{ $item->customer_name }}</td>
                                         <td>{{ $item->customer_phone }}</td>
                                         <td>{{ $item->customer_address }}</td>
                                         <td>{{ $item->payment }}</td>
                                         <td>
                                             @if ($item->status === 'pending')
                                                 <form action="{{ route('client.orders.cancel', $item->id) }}"
                                                     id="form-cancel{{ $item->id }}" method="post">
                                                     @csrf
                                                     <button class="btn btn-cancel btn-primary"
                                                         data-id={{ $item->id }}>Cancel</button>
                                                 </form>
                                             @endif
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </section>
     </main>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $(function() {

             $(document).on("click", ".btn-cancel", function(e) {
                 e.preventDefault();
                 let id = $(this).data("id");
                 confirmDelete()
                     .then(function() {
                         $(`#form-cancel${id}`).submit();
                     })
                     .catch();
             });
         });
     </script>
 @endsection
