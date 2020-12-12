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
            <h2 class="text-booko-primary font-weight-bold">Checkout</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row d-flex justify-content-between align-items-center pl-3 mb-3">
                <h4 class="text-booko-primary">Alamat Pengiriman</h4>
            </div>
            <input class="checkbox-tools" type="radio" name="tools" id="tool-1" checked>
            <label class="for-checkbox-tools" for="tool-1">
                <i class='uil uil-line-alt'></i>
                <h5 class="font-weight-bold">Another House</h5>
                <p>Sukosari, RT 01, RW 07, Kelurahan Kebonsari, Temanggung
Temanggung, Kab. Temanggung, 56223</p>
            </label><!--
            --><input class="checkbox-tools" type="radio" name="tools" id="tool-2">
            <label class="for-checkbox-tools" for="tool-2">
                <i class='uil uil-vector-square'></i>
                <h5 class="font-weight-bold">Lukman Haryanto</h5>
                <p>Kebonsari, RT 01, RW 07, Kelurahan Kebonsari, Temanggung
Temanggung, Kab. Temanggung, 56223</p>
            </label><!--
            --><input class="checkbox-tools" type="radio" name="tools" id="tool-3">
            <label class="for-checkbox-tools" for="tool-3">
                <i class='uil uil-ruler'></i>
                <h5 class="font-weight-bold">Elmantastic</h5>
                <p>Kebonsari, RT 01, RW 07, Kelurahan Kebonsari, Bandung
Bandung, Kab. Bandung, zdsa</p>
            </label>
            <hr>
            <button class="btn btn-block border text-secondary">Add Address</button>
        </div>
        <div class="col">
            <h4 class="mb-4">Metode Pembayaran</h4>
            <div class="card p-2">
                <div class="media align-items-center">
                    <img class="mr-3" src="{{asset('assets/images/Logo/bri.png')}}" alt="Bank BRI" width="60">
                    <div class="media-body">
                        <h5 class="mt-0">Bank Rakyat Indonesia</h5>
                    </div>
                </div>
            </div>
            
            <hr>
            <p>Silahkan transfer pada rekening diatas untuk menyelesaikan pembayaran</p>
            <div class="row">
                <div class="col-4">
                    <h6 class="font-weight-bold text-secondary">Total Bayar</h6>
                </div>
                <div class="col-md-auto">
                    <h4 class="font-weight-bold text-booko-primary">Rp {{number_format($order->price_total , 0, ',', '.')}}</h4>
                </div>
            </div>
            <a class="btn btn-block btn-success font-weight-bold mt-4 text-white" href="{{url('/checkout/finish')}}">Checkout Now</a>
        </div>
    </div>
    <div class="mt-5"></div>
</div>
