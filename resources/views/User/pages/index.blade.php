<!DOCTYPE html>

@include('User.include.header')

<!-- Start Top Search -->

<!-- End Top Search -->

<!-- Start Slider -->
@if (session('success'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('success') }}
</div>
@endif
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @foreach ($banner as $bann)
        <li class="text-left">
            <img src="{{ asset('User/upload/' . $bann->banner_image) }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>{{ $bann->description }}</strong></h1>
                        <p><a class="btn hvr-hover" href="{{ route('top.index') }}">Shop Now</a></p>
                    </div>
                </div>
            </div>
        </li>
        @endforeach

    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->



<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">ALL</button>
                        <button data-filter=".topwear">Top Wear</button>
                        <button data-filter=".ethicset">Ethic Set</button>
                        <button data-filter=".bottomwear">Bottom Wear</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            @foreach ($product1 as $prod)
            <div class="col-lg-3 col-md-6 special-grid topwear">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">

                        </div>
                        <img src="User/product/{{ $prod->image }}" class="img-fluid" alt="Image" style="display: flex">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="{{ url('/prod', ['id' => $prod->id]) }} " data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                {{-- <li><a href="#" data-toggle="tooltip" data-placement="right" class="wishlist" title="Add to Wishlist" value="$prod->id"><i class="far fa-heart"></i></a></li> --}}
                            </ul>
                            {{-- <a class="cart" href="#">Add to Cart</a> --}}
                        </div>
                    </div>
                    <div class="why-text">

                        <h5> {{ $prod->product_name }}</h5>
                        <h5> Rs. {{ $prod->price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($product2 as $prod)
                <div class="col-lg-3 col-md-6 special-grid bottomwear">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">

                            </div>
                       
                     
                        <img src="User/product/{{ $prod->image }}" class="img-fluid" alt="Image" style="display: flex">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="{{ url('/prod', ['id' => $prod->id]) }} " data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                            </ul>
                           
                        </div>
                    </div>
                    <div class="why-text">

                        <h5> {{ $prod->product_name }}</h5>
                        <h5> Rs. {{ $prod->price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($product3 as $prod)
                <div class="col-lg-3 col-md-6 special-grid ethicset">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">

                            </div>
                      
                           
                        <img src="User/product/{{ $prod->image }}" class="img-fluid" alt="Image" style="display: flex">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="{{ url('/prod', ['id' => $prod->id]) }} " data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                <!-- {{-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> --}}
                            </ul>
                            {{-- <a class="cart" href="#">Add to Cart</a> --}} -->
                        </div>
                    </div>
                    <div class="why-text">

                        <h5> {{ $prod->product_name }}</h5>
                        <h5>Rs. {{ $prod->price }}</h5>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>About Us</h1>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="User/images/about-img.jpg" alt="" />
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="blog-box">
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>Ethics Beauty</h3>
                            <p>Our main goal is to furnish exceptionally popular items with best quality at extremely
                                serious costs. We expect to contact purchasers searching for style across globe through
                                retail and internet business.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Blog  -->



<script>
    $(".wishlist").click(function() {

        var id = $(this).val();
        console.log(id);


        $.ajax({
            type: "get",
            url: "{{ route('cartd') }}",
            data: {
                id: id,
            },
            datatype: "json",
            success: function(response) {

            }
        });


    });
</script>


<!-- Start Instagram Feed  -->

<!-- End Instagram Feed  -->


<!-- Start Footer  -->
@include('User.include.footer')
<!-- End Footer  -->