<!DOCTYPE html>
@include('User.include.header')
{{-- <div class="all-title-box"> --}}
{{-- <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Top Wear</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Top Wear</li>
                </ul>
            </div>
        </div>
    </div> --}}
{{-- </div> --}}


<div class="container mainheader">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div id="cheking">




                    <div class="cd-filter-block">



                        <ul style="list-style-type: none" class="cd-filter-content cd-filters list">
                          
                            <h4 class="catagory">Sub Catagory</h4>

                            @foreach($subcattop as $subt)
                            <li>
                                <label><input class="form-check-input common subcat" type="checkbox" id="inlineCheckbox1"
                                        value="{{$subt->subcategoryname}}"> {{$subt->subcategoryname}}</label>



                            </li>
                            @endforeach
                         
                            <hr>
                            <h4 class="catagory">Size</h4>
                            <li>
                                <label><input class="form-check-input common size" type="checkbox" id="inlineCheckbox1"
                                        value="small"> small</label>



                            </li>
                            <li>
                                <label><input class="form-check-input common size" type="checkbox" id="inlineCheckbox1"
                                        value="Medium">Medium</label>


                            </li>
                            <li>
                                <label><input class="form-check-input common size" type="checkbox" id="inlineCheckbox1"
                                        value="Large">Large </label>


                            </li>
                            <li>
                                <label><input class="form-check-input common size" type="checkbox" id="inlineCheckbox1"
                                        value="XL">XL </label>


                            </li>
                            <li>
                                <label><input class="form-check-input common size" type="checkbox" id="inlineCheckbox1"
                                        value="XXL">XXL </label>


                            </li>
                            <hr>
                            <h4 class="catagory">Price</h4>
                            <li>
                                <input class="form-check-input common price" name="price" id="price1" type="radio"
                                    min="0" max="500"><label for="price1">Below 500₹ </label>


                            </li>
                            {{-- <li>
                                <label><input class="form-check-input common" id="price1" type="checkbox" id="inlineCheckbox1"
                                        value="500">Below 500 </label>


                            </li> --}}
                            <li>
                                <label><input class="form-check-input common price" name="price" id="price2"
                                        type="radio" min="501" max="999">in Between 500₹
                                    - 1000₹ </label>


                            </li>
                            <li>
                                <label><input class="form-check-input common price" name="price" id="price3"
                                        type="radio" min="1000" max="5000">Above 1000₹ </label>


                            </li>

                        </ul>
                        <!-- cd-filter-content -->
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <img class="img" id="banner" src="User/images/banner.png" />
            </div>

            <div class="row sameproduct">
                @foreach ($product1 as $prod)
                    <div class="col-lg-4 col-md-6 col-sm-12 product all">

                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">

                                </div>
                                <img src="User/product/{{ $prod->image }}" class="img-fluid" alt="Image"
                                    style="display: flex">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{ url('/prod', ['id' => $prod->id]) }} " data-toggle="tooltip"
                                                data-placement="right" title="View"><i class="fas fa-eye"></i></a>
                                        </li>

                                        {{-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> --}}
                                    </ul>
                                    {{-- <a class="cart" href="#">Add to Cart</a> --}}
                                </div>
                            </div>
                            <div class="why-text">

                                <h5> {{ $prod->product_name }}</h5>
                                <h5> Rs. {{ $prod->price }} </h5>
                            </div>
                        </div>

                    </div>
                @endforeach





            </div>
        </div>
    </div>
</div>
</div>

<script>
    function clrfields() {
        document.getElementById("checkbox1").value = "";
    }
</script>
<script>
    $(document).ready(function() {
        $('.common').click(function() {
            filter_data();
        });
    });


    function filter_data() {

        var subcat = get_filter('subcat');
        var size = get_filter('size');
        var price = get_filterp('price');
        console.log(price + 'yash');
        $.ajax({
            url: "{{ route('filtertop') }}",
            type: 'get',
            data: {

                subcat: subcat,
                size: size,
                price: price,

            },



            dataType: 'json',
            success: function(response) {
                $('.sameproduct').html('');
                if (response.success) {
                    $.each(response.products, function(key, value) {
                        $('.sameproduct').append(
                            '<div class="col-lg-4 col-md-6 col-sm-12 product all"><div class="products-single fix"><div class="box-img-hover"><div class="type-lb"></div>  <img src="User/product/' +
                            value.image +
                            '"  class="img-fluid" alt="Image" style="display: flex"><div class="mask-icon"><ul><li><a href="/prod/' +
                            value.pid +
                            '" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li></ul></div></div><div class="why-text"><h5>' +
                            value.product_name +
                            '</h5><h5> Rs. ' + value.price +
                            '</h5></div></div></div>'
                        );

                    });
                } else {
                    $('.sameproduct').append(
                        '<div class="nodata"><h1>No Data Found Of Your Like</h1></div>');

                }




            },
        });


    }

    function get_filter(classname) {
        var filter = [];
        console.log(classname);
        $('.' + classname + ':checked').each(function() {
            filter.push($(this).val());
        });


        // console.log(filter);

        return filter;
    }

    function get_filterp(classname) {
        var filter = [];
        console.log(classname);


        console.log(classname);
        if ($('#price1').is(':checked')) {
            filter.push([$('#price1').attr('min'), $('#price1').attr('max')]);
        } else if ($('#price2').is(':checked')) {
            filter.push([$('#price2').attr('min'), $('#price2').attr('max')]);
        } else if ($('#price3').is(':checked')) {
            filter.push([$('#price3').attr('min'), $('#price3').attr('max')]);
        }








        console.log(filter);

        return filter;
    }
</script>









@include('User.include.footer')
