<div>
    {{-- Hero --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('assets/images/Hero/Covers1.jpg')}}" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('assets/images/Hero/Covers2.jpg')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('assets/images/Hero/Covers3.jpg')}}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>

    {{-- Category Cards --}}
    <section class="section-title mt-5">
    <h3>Popular Categories</h3>
    </section>
    <section class="popular-category mt-4 mb-5">
        <div class="container row m-auto">
            @foreach($popular_categories as $category)
            <div class="col">
                <div class="card border-0">
                    <div class="card-body text-center shadow">
                        <h5>{{$category->name}}</h5>
                        <p class="m-0">{{$category->cc}} books</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>


    <!-- <section class="section-title mt-5"><h3>Best Seller</h3></section> -->
    <div class="section-post d-flex justify-content-between section-title">
        <h3>Best Seller</h3>
        <h6><a href="">Show all products</a></h6>
    </div>
    <div class="products-center">
        @foreach($products as $product)
        <div class="card border-0 product-custom">
            <article class="product">
                <a href="#">
                <div class="img-container">
                    <img 
                    class="product-img" 
                    src="{{ asset('assets/images/products')}}/{{$product->image}}"
                    alt="product">
                    </div>
                <h4 class="pt-2 pl-2">{{$product->title}}</h4>
                <p class="pl-2">{{$product->author}}</p>
                <h5 class="p-2">Rp {{number_format($product->price , 0, ',', '.')}}</h5>
                </a>
            </article>
        </div>
        @endforeach
    </div>
</div>
