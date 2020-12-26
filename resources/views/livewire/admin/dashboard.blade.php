<div class="container-fluid">
    <div class="row">
        <div class="col">
        <div class="card border-0">
            <div class="card-body">
            <h2 class="font-weight-bold">Dashboard</h2>
            </div>
        </div>
        </div>
    </div>
    <div class="row pl-4">
        <div class="col mr-3">
            <div class="card border-0 mb-3">
                <div class="card-body row card-admin-booko align-content-center">
                    <div class="col-3">
                        <div class="img-wrapper bg-primary">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="col ml-4 align-self-center">
                            <h5 class="card-title">Total Orders</h5>
                            <h3 class="card-text font-weight-bold text-white">{{$countTransactions}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mr-3">
            <div class="card border-0 mb-3">
                <div class="card-body row card-admin-booko align-content-center">
                    <div class="col-3">
                        <div class="img-wrapper bg-secondary">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="col ml-4 align-self-center">
                            <h5 class="card-title">Products</h5>
                            <h3 class="card-text font-weight-bold text-white">{{$countProducts}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mr-3">
            <div class="card border-0 mb-3">
                <div class="card-body row card-admin-booko align-content-center">
                    <div class="col-3">
                        <div class="img-wrapper bg-danger">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col ml-4 align-self-center">
                            <h5 class="card-title">Users</h5>
                            <h3 class="card-text font-weight-bold text-white">{{$countUsers}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mr-3">
            <div class="card border-0 mb-3">
                <div class="card-body row card-admin-booko align-content-center">
                    <div class="col-3">
                        <div class="img-wrapper bg-success">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                    </div>
                    <div class="col ml-4 align-self-center">
                            <h5 class="card-title">Earnings</h5>
                            <h3 class="card-text font-weight-bold text-white">Rp {{number_format($countEarnings , 0, ',', '.')}}</h3>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- <div class="row">
        <div class="col-6">
        <div class="card">
            <div class="card-body d-flex popular-category">
                <img src="{{asset('images/elmantastic.jpg')}}" height="75" alt="Porto Admin" class="rounded-circle"/>
                <div class="ml-4">
                    <h5 class="card-title">Total Orders</h5>
                    <h1 class="card-text font-weight-bold text-white">10</h1>
                </div>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card">
            <div class="card-body d-flex popular-category">
                <img src="{{asset('images/elmantastic.jpg')}}" height="75" alt="Porto Admin" class="rounded-circle"/>
                <div class="ml-4">
                    <h5 class="card-title">Products</h5>
                    <h1 class="card-text font-weight-bold text-white">10</h1>
                </div>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card">
            <div class="card-body d-flex popular-category">
                <img src="{{asset('images/elmantastic.jpg')}}" height="75" alt="Porto Admin" class="rounded-circle"/>
                <div class="ml-4">
                    <h5 class="card-title">Users</h5>
                    <h1 class="card-text font-weight-bold text-white">10</h1>
                </div>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card">
            <div class="card-body d-flex popular-category">
                <img src="{{asset('images/elmantastic.jpg')}}" height="75" alt="Porto Admin" class="rounded-circle"/>
                <div class="ml-4">
                    <h5 class="card-title">Earnings</h5>
                    <h1 class="card-text font-weight-bold text-white">10</h1>
                </div>
            </div>
        </div>
        </div>
    </div> -->