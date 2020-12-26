<div class="section-post mt-5">
    <div class="col p-0">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/')}}" class="font-weight-normal" >Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/cart')}}" class="font-weight-normal" >Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
        </nav>
    </div>
    <div class="row mt-3">
        <div class="col">
            <h2 class="text-booko-primary font-weight-bold">Finishing</h2>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="media">
                <img class="mr-3" src="{{asset('storage/images/Logo/bri.png')}}" alt="Bank BRI" width="60">
                <div class="media-body">
                    <h5 class="mt-0">Bank Rakyat Indonesia</h5>
                    <p class="mb-1">No. Rekening 012345-888-888</p>
                    <p class="mb-1">An. <strong>Booko Store</strong></p>
                </div>
            </div>
            <hr>
            <p>Silahkan transfer pada rekening diatas untuk menyelesaikan pembayaran</p>
            <div class="row">
                <div class="col-4">
                    <h6 class="font-weight-bold text-secondary">Total Pay</h6>
                </div>
                <div class="col-md-auto">
                    <h4 class="font-weight-bold text-booko-primary">Rp {{number_format($totalPay , 0, ',', '.')}}</h4>
                </div>
            </div>

            <a href="{{url('/user')}}" class="btn btn-block btn-success mt-5 text-white">Check Transaction History</a>
        </div>
        <div class="col">
            
        </div>
    </div>
    <div class="mt-5"></div>
</div>
