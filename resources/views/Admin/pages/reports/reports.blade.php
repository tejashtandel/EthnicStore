@include('Admin.include.header')


<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                        <th scope="col">Product Name</th>
                         <th scope="col">Colour</th>
                         <th scope="col">Price</th>
                         <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $pro)
                        <tr>
                            <td>{{$pro->product_name}}</td>
                            <td>{{$pro->color}}</td>
                            <td>{{$pro->price}}</td>
                            <td><img src="{{('admin/product/' . $pro->image)}}" class="img-thumbnail" alt="Responsive image" style="width: 200px;"></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('Admin.include.footer')