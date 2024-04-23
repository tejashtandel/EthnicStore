@include('Admin.include.header')



<div class="container ">
    <div class="form-group">
        <input type="text" name="search" id="search1" class="form-control search" placeholder="Search product Data" />

    </div>
</div>
<div class="row">
    <div class="container products">
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Subcategory Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $dt)
                <tr>
                    <td>{{$dt->category_name}}</td>
                    <td>{{$dt->subcategoryname}}</td>
                    <td> {{$dt->product_name}}</td>
                    <td>{{$dt->quantity}}</td>
                    <td> {{$dt->size}}</td>
                    <td> {{$dt->price}}</td>
                    <td><img src="{{('admin/product/' . $dt->image)}}" class="img-thumbnail" alt="Responsive image" style="width: 200px;"></td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@include('Admin.include.footer')

<script>
    $('#search1').on('keyup', function() {
        var search = $(this).val();
        console.log(search);
        $.ajax({
            type: "get",
            url: "{{route('search')}}",
            data: {
                search: search,

            },

            success: function(response) {
                if (response.success) {

                    console.log(response);
                    $('.products').html(response.html);
                    generatedatatable();
                }

            }
        });
    })
</script>