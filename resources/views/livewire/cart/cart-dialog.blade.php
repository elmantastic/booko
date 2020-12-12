<div class="cart-booko">
    <a class="cart-booko-btn text-booko-primary" href="{{ url('/cart')}}">
        <i class="fas fa-shopping-cart"></i>
        @if($countCart != 0)
        <span class="badge-booko">{{$countCart}}</span>
        @endif
    </a>
</div>
