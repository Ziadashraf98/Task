<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Products</h1>
            {{-- <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> --}}
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @foreach ($products as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{asset('images/products/'.$product->image)}}"><img class="card-img-top" src="{{asset('images/products/'.$product->image)}}" alt="..."></a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$product->title}}</h5>
                            <!-- Product price-->
                            {{$product->description}}
                        </div>
                    </div>
                    <!-- Product actions-->
                </div>
            </div>
            @endforeach
                
        </div>
    </div>
</section>