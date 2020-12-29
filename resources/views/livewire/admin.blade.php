<div class="row menu-displayed" id="wrapper">
    <!-- sidebar -->

    <div id="sidebar-wrapper">
        <div class="sidebar-header-booko">
            <div class="text-center mt-4">
                <img src="{{ asset('/storage/images/users')}}/{{$currentUser->avatar}}?{{rand()}}" height="100" alt="Porto Admin" class="img-admin-profile"/>
            </div>
            <div class="sidebar-title text-center text-white mt-2 mb-3">
                {{$currentUser->name}}
            </div>
        </div>
        <ul class="nav sidebar-nav-booko me-3 flex-column" id="myTab" role="tablist">
            <li class="nav-item nav-li-booko" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home mr-3"></i>Dashboard</a>
            </li>
            <li class="nav-item nav-li-booko" role="presentation">
                <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false"><i class="fas fa-book mr-3"></i>Products</a>
            </li>
            <li class="nav-item nav-li-booko" role="presentation">
                <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false"><i class="fas fa-user mr-3"></i>Users</a>
            </li>
            <li class="nav-item nav-li-booko" role="presentation">
                <a class="nav-link" id="transactions-tab" data-toggle="tab" href="#transactions" role="tab" aria-controls="transactions" aria-selected="false"><i class="fas fa-chart-line mr-3"></i>Transactions</a>
            </li>
        </ul>
    </div>

    <!-- main content -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="tab-content w-100" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@livewire('admin.dashboard')</div>
                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                        @livewire('admin.products')
                    </div>
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        @livewire('admin.users')
                    </div>
                    <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
                        @livewire('admin.transactions')
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
