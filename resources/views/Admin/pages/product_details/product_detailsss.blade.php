@include('Admin.include.header')

<!-- MAIN CONTENT-->
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
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
       
            
            <!-- <a href="{{route('product_detail.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Add Product Details</a> -->
<div class="table-responsive">
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <!-- <th scope="col">category Name</th>
                <th scope="col">sub Category Name</th> -->
                <th scope="col">Product Name</th>
                <th scope="col">Sleeve</th>
                <th scope="col">Neck</th>
                <th scope="col">Febric</th>
                <th scope="col">Length</th>
                <th scope="col">Style</th>
                <th scope="col">Occasion</th>
                <th scope="col">Package Contain</th>
                <th scope="col">Product Description</th>
                <th scope="col">Size</th>
                <th scope="col">Quantity</th>
                <th scope="col">Bottom Type</th>
                <th scope="col">Image</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($proddetails as $proddetail)
            <tr>
                <!-- <td>{{$proddetail->category_name}}</td>
                <td>{{$proddetail->subcategoryname}}</td> -->
                <td>{{$proddetail->product_name}}</td>
                <td>{{$proddetail->sleeve}}</td>
                <td>{{$proddetail->neck}}</td>
                <td>{{$proddetail->fabric}}</td>
                <td>{{$proddetail->length}}</td>
                <td>{{$proddetail->style}}</td>
                <td>{{$proddetail->occasion}}</td>
                <td>{{$proddetail->package_contain}}</td>
                <td>{{$proddetail->product_description}}</td>
                <td>{{$proddetail->size}}</td>
                <td>{{$proddetail->quantity}}</td>
                <td>{{$proddetail->bottomtype}}</td>

                <td>
                    <?php
                    $images = explode('|', $proddetail->mulimages);
                    foreach ($images as $image) {  ?>
                        <img src="{{asset('upload/'.$image)}}" alt="Product images" style="width:70px" />
                    <?php
                    }
                    ?>
                </td>
                <!-- <td>
                    <form action="{{route('product_detail.destroy',$proddetail->id)}}" method="Post">
                        <a class="btn btn-primary" href="{{route('product_detail.edit',$proddetail->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td> -->
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>

@include('Admin.include.footer')