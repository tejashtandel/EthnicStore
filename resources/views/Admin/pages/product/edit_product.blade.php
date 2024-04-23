@include('Admin.include.header')
<div class="main-content">
                        <div class="section__content section__content--p30">
                             <div class="container">
                                    <div class="row">

                         <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="row">
                              <h1>Edit Products</h1>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                   <strong>Product Name:</strong>
                                        <input type="text" name="product_name" class="form-control" placeholder="product Name" value={{$product->product_name}}>
                                              <!-- @error('product_name')
                                                   <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                              @enderror -->
                                   </div>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                   <strong>Price:</strong>
                                        <input type="text" name="price" class="form-control" placeholder="Price" value={{$product->price}}>
                                              <!-- @error('price')
                                                   <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                              @enderror -->
                                   </div>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                   <strong>Image:</strong>
                                        <input type="file" name="image" class="form-control" placeholder="Image" >
                                   
                                              <!-- @error('image')
                                                   <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                              @enderror -->
                                   </div>
                              </div>


                              <input type="submit" class="btn btn-success ml-3 " value="Submit" >
                              </div> 
                         </form>
                    </div>
               </div>
          </div>
     </div>
@include('Admin.include.footer')