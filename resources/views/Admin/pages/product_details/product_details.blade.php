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

            <a href="{{route('product_detail.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Add Product Details</a>
          
            
            <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">category Name</th>
                            <th scope="col">sub Category Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <!-- <th scope="col">Sleeve</th>
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
                            <th scope="col">Image</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proddetails as $proddetail)
                        <tr>
                            <td>{{$proddetail->category_name}}</td>
                            <td>{{$proddetail->subcategoryname}}</td>
                            <td>{{$proddetail->product_name}}</td>
                            <td>{{$proddetail->brand_name}}</td>

                            <!-- <td>
                                <?php
                                $images = explode('|', $proddetail->mulimages);
                                foreach ($images as $image) {  ?>
                                    <img src="{{asset('upload/'.$image)}}" alt="Product images" style="width:50px" />
                                <?php
                                }
                                ?>
                            </td>  -->
                            <td>
                                <form action="{{route('product_detail.destroy',$proddetail->id)}}" method="Post">
                                <a class="btn btn-secondary" href="{{route('product_detail.show',$proddetail->id)}}">Show</a>
                                    <a class="btn btn-primary" href="{{route('product_detail.edit',$proddetail->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
             
            </div>
        </div>
    </div>

@include('Admin.include.footer')