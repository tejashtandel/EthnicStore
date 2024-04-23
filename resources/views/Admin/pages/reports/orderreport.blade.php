@include('Admin.include.header')


<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
           

            <div class="container ">
                <div class="form-group">
                    <input type="text" name="search" id="search1" class="form-control search" placeholder="Search Order Data" />

                </div>
                <div class="row">
                    <div class="container order">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Product Name</th>

                                    <th scope="col">Total Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->id}}</td>
                                    <td> {{$order->product_name}}</td>
                                    <td>{{$order->totalprice}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.include.footer')

    <script>
        $('#search1').on('keyup', function() {
            var search = $(this).val();
            console.log(search);
            $.ajax({
                type: "get",
                url: "{{route('searcho')}}",
                data: {
                    search: search,
                },

                success: function(response) {
                    if (response.success) {

                        console.log(response);
                        $('.order').html(response.html);
                        generatedatatable();
                    }

                }
            });
        })
    </script>