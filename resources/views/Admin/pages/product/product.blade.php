@include('Admin.include.header')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger text-center">
                {{Session::get('error')}}
            </div>
            @endif
            <a href="{{route('products.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Add Product</a>
       

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Product Name</th>
                         
                            <th scope="col">Colour</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $pro)
                        <tr>
                            <td>{{$pro->subcategoryname}}</td>
                            <td>{{$pro->product_name}}</td>

                           
                            <td>{{$pro->color}}</td>
                            <td>{{$pro->price}}</td>
                            <td><img src="{{('admin/product/' . $pro->image)}}" class="img-thumbnail" alt="Responsive image" style="width: 200px;"></td>

                            <td>
                                <form action="{{route('products.destroy',$pro->id)}}" method="Post">
                                    <a class="btn btn-primary" href="{{route('products.edit',$pro->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('Admin.include.footer')