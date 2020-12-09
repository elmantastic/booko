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
    <section class="popular-category mt-4">
        <div class="container row m-auto">
            @foreach($popular_categories as $category)
            <div class="col ">
                <div class="card border-0">
                    <div class="card-body text-center shadow">
                        {{$category->name}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>


    <section class="section-title mt-5"><h3>Our Product</h3></section>

    @livewire('post.product')
</div>
