<!DOCTYPE html>
@include('User.include.header')


{{-- <div class="container-fluid">
        <nav class="breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb" id="try">
                <li class="breadcrumb-item"><a href="#">HOME</a></li>
                <li class="breadcrumb-item"><a href="#">ETHIC SET</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Product Details
                </li>
            </ol>
        </nav>
    </div> --}}

<div class="container-fluid imagec">
    <div class="row">
        @foreach ($details as $det)
        
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <?php
                            $images = explode('|', $det->mulimages);
                            
                            ?>
                            @foreach ($images as $image)
                                <img src="{{ asset('mulimages/' . $image) }}" alt="shoe image">
                            @endforeach


                        </div>
                    </div>
                    <div class="img-select d-flex justify-content-center">
                        @foreach ($images as $image)
                            <div class="img-item">
                                <a href="#" data-id="{{ $loop->iteration }}">
                                    <img src="{{ asset('mulimages/' . $image) }}" alt="shoe image">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        



            <div class="col-lg-6 col-md-6 col-sm-12 product-text-detail">
                <h3 class="name">
                    {{ $det->product_name }}
                </h3>

                <h3 class="mprice">
                    Price:
                    {{ $det->price }} ₹
                </h3>

                <div>
                    <h3 class="size">
                        Size:<span>

                            <span class="deatails">{{ $det->size }}</span>


                        </span>
                    </h3>
                </div>

                {{-- <div >
            <h3 class="mainheading">Quantity:</h3>
            <a href="#" id="decrement" class="btn btn-primary"  style="text-decoration: none;">&#8722</a>
            <span class="px-3 quantityShow">1</span>
            <a href="#" id="increment"  class="btn btn-primary" style="text-decoration: none;">&#43</a>
        </div> --}}
                {{-- @php
        print_r($det->pID );
        @endphp --}}

                <!-- <div class="img">
                  <img src="hear.jpg" height="45px"; weight="35px";>
              </div> -->

                @if ($det->quantity < 5)
                    <div class="alert alert-danger">
                        <strong>OOps!!!</strong>Currently Not in Stock
                    </div>
                @else
                    @auth
                        @if (Auth::check())
                            <div>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="product_id" value="{{ $det->pID }}">
                                    <input type="hidden" name="totalprice" value="{{ $det->price }}">
                                    <input type="hidden" name="quantity" id="" value="1">


                                    <button type="submit" class="btn btn-primary my-2">Add to Cart</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                @endif
                <hr>

                <h3 class="mdetails">Product Details</h3>
                <ul class="details">
                    <table>
                        <tr>
                            <td class="dh1">Pattern:</td>
                            <td></td>
                            <td class="dh2">{{ $det->pattern }}</td>
                        </tr>

                        <tr>
                            <td class="dh1">Sleeve:</td>
                            <td></td>
                            <td class="dh2">{{ $det->sleeve }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Neck Type:</td>
                            <td></td>
                            <td class="dh2">{{ $det->neck }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Fabric type:</td>
                            <td></td>
                            <td class="dh2">{{ $det->fabric }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Length:</td>
                            <td></td>
                            <td class="dh2">{{ $det->length }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Style:</td>
                            <td></td>
                            <td class="dh2">{{ $det->style }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Occasion:</td>
                            <td></td>
                            <td class="dh2">{{ $det->occasion }}</td>
                        </tr>
                        <tr>
                            <td class="dh1">Package Contain :</td>
                            <td></td>
                            <td class="dh2">{{ $det->package_contain }} product</td>
                        </tr>

                    </table>

                </ul>
                <hr />
                <h3 class="brand">Brand</h3>
                <ul class="details">
                    <table>
                        <tr>
                            <td>{{ $det->brand_name }}
                            </td>
                        </tr>
                    </table>
                </ul>
                <hr />
                <h3 class="description">Product Description</h3>
                <ul class="details">
                    <table>
                        <tr>
                            <td><textarea class="details" readonly> {{ $det->product_description }}</textarea>
                            </td>
                        </tr>
                    </table>
                </ul>
                <ul class="pay">
                    <li>Cash on delivery</li>
                    <li>Free delivery</li>
                    <li>Easy 15 Days Exchange And Return</li>
                </ul>
            </div>
    </div>
</div>
@endforeach

<hr />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>
    $(document).ready(function() {

        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform =
                `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);



    });
</script>
@include('User.include.footer')
