@include('user.include.header')


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="carddetails">
                @if(session('success'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('success') }}
                </div>
                @endif
                <div class="headcart">
                    <h1>My Cart</h1>
                </div>

                <div class="details">


                    <div class="container cart">
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th>Product Image</th>
                                    <th>Product name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $val = 0;
                                $j = 1;
                                
                                ?>
                                @if ($cart->count() == 0)



                                    <td colspan="6" class="emptycart">Your Cart Is Empty</td>
                                @else
                                    @foreach ($cart as $cat)
                                        <tr>
                                            {{-- <input type="hidden" value="{{$cat->product_id}}" id="productid"> --}}

                                            <td><img src="{{ asset('User/product/' . $cat->image) }}"></td>
                                            <td>{{ $cat->product_name }}</td>

                                            <td id="productprice" data-label="Price_<?php echo $j; ?>">
                                                {{ $cat->price }}
                                            </td>

                                            <td data-label="Quantity">
                                                <?php
                                                $amount = $cat->totalprice * $cat->quantity;
                                                $amount1 = $cat->totalprice;
                                                $val = $val + $amount;
                                                ?>

                                                <input type="number" value="{{ $cat->quantity }}" min="1"
                                                    onchange="quantitys(this.value,{{ $cat->price }},<?php echo $j; ?>,{{ $cat->product_id }},{{ Auth::user()->id }})"
                                                    name="quantity" id="quantity_<?php echo $j; ?>"
                                                    class="quantity"  max="5" required />

                                                <input type="hidden" id="quantityfinal">


                                            </td>
                                            <td data-label="Total">
                                                <span class="amount" name="totalprice"
                                                    id="totalprice_<?php echo $j; ?>">
                                                    <?php echo $amount1 * $cat->quantity; ?>
                                                </span>
                                            </td>



                                            <td data-label="Delete">

                                                <div class="delete1">
                                                    <form action="{{ route('cart.destroy', ['cart' => $cat->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')


                                                        <button type="submit" value="Delete" class="fa-solid fa-trash"
                                                            style="color:red"></button>


                                                    </form>

                                            </td>

                                        </tr>

                                        <?php
                                        $j++;
                                        ?>
                                    @endforeach
                                @endif



                                {{-- <td><a href="{{ route('cart.destroy', ['cart' =>  Auth::user()->id ])}}"><i class="fa-solid fa-trash-can"></i></a></td> --}}
                            </tbody>

                            {{-- <tr>
                                    <td colspan="4" style="font-weight: bold; font-size: 24px;">Total:</td>
                                    <td><span id="totalsum" class="totalsum" readonly></span></td>
                                    <td></td>
                                </tr> --}}
                            {{-- </table> --}}
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                <tr>
                                    <td colspan="4" style="font-weight: bold; font-size: 24px;">Total:</td>
                                    <td><span id="totalsum" class="totalsum" readonly><?php echo $val; ?></span>
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="6">
                                        <input type="hidden" id="grandtotal" name="totalamount"
                                            value="<?php echo $val; ?>">
                                        @if ($cart->count() == 0)
                                            <button type="submit" class="btn btn-warning" id="checkout" name="checkout"
                                                disabled>Proceed to
                                                checkout</button>
                                        @else
                                            <button type="submit" class="btn btn-warning" id="checkout"
                                                name="checkout">Proceed to
                                                checkout</button>
                                        @endif
                                    </td>
                                </tr>
                            </form>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function quantitys(value, amount, i, id, userid) {

        //  var q =$(this).val();
        //     console.log(q);
        document.getElementById("quantityfinal").value = value;

        var total_price = value * amount;
        $('#totalprice_' + i).text(total_price);
        console.log(total_price);
        var grand_total = totalSum();
        $('#totalsum').val(grand_total);

        document.getElementById('totalsum').innerHTML = grand_total;
        document.getElementById('grandtotal').value = grand_total;

        $.ajax({
            type: "post",
            url: "{{ route('cartu') }}",
            data: {
                id: id,
                q: value,
                userid: userid,
                _token: '{{ csrf_token() }}'
            },
            datatype: "json",
            success: function(response) {

            }
        });



    


        // return false;


    }


    function totalSum() {
        var grand_total = 0;
        jQuery('.amount').each(function() {
            var currentElement = $(this).text();
            grand_total += parseInt(currentElement);
            $('.totalsum').val(grand_total);

            // document.getElementById('totalsum').innerHTML = grand_total;


        });
        return grand_total;
    }
</script>



<script>
    var t = document.getElementById('totalsum').value;
    console.log(t);
</script>

  
<script>
    $(document).ready(function() {
        function disableBack() {
            window.history.forward()
        }
        window.onload = disableBack();
        window.onpageshow = function(e) {
            if (e.persisted)
                disableBack();
        }
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>


@include('User.include.footer')
