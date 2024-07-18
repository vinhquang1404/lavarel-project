     <!-- Page Sidebar Start-->
     <div class="sidebar-wrapper">
         <div>
             <div class="logo-wrapper logo-wrapper-center">
                 <a href="{{ route('dashboard') }}" data-bs-original-title="" title="">
                     <img class="img-fluid for-dark" src="{{ asset('admin/assets') }}/images/logo/logo-white.png"
                         alt="">
                 </a>
                 <div class="back-btn">
                     <i class="fa fa-angle-left"></i>
                 </div>
                 <div class="toggle-sidebar">
                     <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
                 </div>
             </div>
             <div class="logo-icon-wrapper">
                 <a href="index.html">
                     <img class="img-fluid main-logo" src="{{ asset('admin/assets') }}/images/logo/logo.png"
                         alt="logo">
                 </a>
             </div>
             <nav class="sidebar-main">
                 <div class="left-arrow" id="left-arrow">
                     <i data-feather="arrow-left"></i>
                 </div>

                 <div id="sidebar-menu">
                     <ul class="sidebar-links" id="simple-bar">
                         <li class="back-btn"></li>
                         <li class="sidebar-main-title sidebar-main-title-3">
                             <div>
                                 <h6 class="lan-1">General</h6>
                                 <p class="lan-2">Dashboards &amp; Users.</p>
                             </div>
                         </li>

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                 <i data-feather="home"></i>
                                 <span>Dashboard</span>
                             </a>
                         </li>
                         @can('show-user')
                             <li class="sidebar-list">
                                 <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="users"></i>
                                     <span>Users</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('users.index') }}">All users</a>
                                     </li>
                                     <li>
                                         <a href="{{ route('users.create') }}">Add new user</a>
                                     </li>
                                 </ul>
                             </li>
                         @endcan
                         <li class="sidebar-main-title sidebar-main-title-2">
                             <div>
                                 <h6 class="lan-1">Application</h6>
                                 <p class="lan-2">Ready To Use Apps</p>
                             </div>
                         </li>
                         {{-- @can('list-order') --}}
                             <li class="sidebar-list">
                                 <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="archive"></i>
                                     <span>Orders</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('admin.orders.index') }}">Order List</a>
                                     </li>
                                 </ul>
                             </li>
                         {{-- @endcan --}}
                         @can('show-category')
                             <li class="sidebar-list">
                                 <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="users"></i>
                                     <span>Category</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('categories.index') }}">Category List</a>
                                     </li>

                                     <li>
                                         <a href="{{ route('categories.create') }}">Create Category</a>
                                     </li>
                                 </ul>
                             </li>
                         @endcan
                         @hasrole('super-admin')
                             <li class="sidebar-list">
                                 <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="users"></i>
                                     <span>Roles</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('roles.index') }}">Roles List</a>
                                     </li>

                                     <li>
                                         <a href="{{ route('roles.create') }}">Add new roles</a>
                                     </li>
                                 </ul>
                             </li>
                         @endhasrole
                         @can('show-product')
                             <li class="sidebar-list">
                                 <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="box"></i>
                                     <span>Product</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('products.index') }}">Products List</a>
                                     </li>

                                     <li>
                                         <a href="{{ route('products.create') }}">Add New Products</a>
                                     </li>
                                 </ul>
                             </li>
                         @endcan
                         @can('show-coupon')
                             <li class="sidebar-list">
                                 <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                     <i data-feather="tag"></i>
                                     <span>Coupons</span>
                                 </a>
                                 <ul class="sidebar-submenu">
                                     <li>
                                         <a href="{{ route('coupons.index') }}">Coupon List</a>
                                     </li>
                                     <li>
                                         <a href="{{ route('coupons.create') }}">Create Coupon</a>
                                     </li>
                                 </ul>
                             </li>
                         @endcan
                     </ul>
                 </div>
                 <div class="right-arrow" id="right-arrow">
                     <i data-feather="arrow-right"></i>
                 </div>
             </nav>
         </div>
     </div>
     
     <!-- Page Sidebar Ends-->
