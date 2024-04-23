@include('Admin.include.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="row">
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{route('product_detail.store') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h2>Add Product Details</h2>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="title">Select category:</label>
                                <select name="catid" id="catid" class="form-control">
                                    @foreach($subc as $sub)
                                    <option value="{{$sub->id}}">{{$sub->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="title">Select Sub category:</label>
                                <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                    @foreach($product as $pro)
                                    <option value="{{$pro->id}}">{{$pro->subcategoryname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="title">Select Product:</label>
                                <select name="productid" id="productid" class="form-control">
                                    @foreach($proddetails as $prod)
                                    <option value="{{$prod->id}}">{{$prod->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="title">Select Brand:</label>
                                <select class="form-control" id="brandid" name="brandid">
                                    <option selected disabled>--- Brand Name ---</option>
                                    @foreach($brand as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>pattern:</strong>
                                <input type="text" name="pattern" class="form-control" placeholder="Enter Pattern">
                                <!-- @error('pattern')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sleeve:</strong>
                                <input type="text" name="sleeve" class="form-control" placeholder="Enter Sleeve">
                                <!-- @error('sleeve')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Neck:</strong>
                                <input type="text" name="neck" class="form-control" placeholder="Enter Neck">
                                <!-- @error('type')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Febric:</strong>
                                <input type="text" name="fabric" class="form-control" placeholder="Enter Febric">
                                <!-- @error('fabric')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Length:</strong>
                                <input type="text" name="length" class="form-control" placeholder="Enter Length">
                                <!-- @error('length')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>style:</strong>
                                <input type="text" name="style" class="form-control" placeholder="Enter Style">
                                <!-- @error('style')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Occasion:</strong>
                                <input type="text" name="occasion" class="form-control" placeholder="Enter Occasion">
                                <!-- @error('occasion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Package Contain:</strong>
                                <input type="text" name="package_contain" class="form-control" placeholder="Enter Package Contain">
                                <!-- @error('package_contain')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Product Description:</strong>
                                <input type="text" name="product_description" class="form-control" placeholder="Enter Product Description">
                                <!-- @error('product_description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="dropdown">
                                    <strong>Size:</strong>

                                    <select name="size" id="size"  class="form-control">
                                        <option value="small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="dropdown" class="form-control"  class="form-control"  placeholder="Enter Quantity" >
                                    <strong>Quantity:</strong>
                                    <select name="quantity" id="quantity">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quantity:</strong>
                                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
                                <!-- @error('bottomtype')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bottom Type:</strong>
                                <input type="text" name="bottomtype" class="form-control" placeholder="Enter Bottom Type">
                                <!-- @error('bottomtype')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Multiple Images:</strong>
                                <input type="file" name="mulimages[]" class="form-control" placeholder="Enter photos" multiple>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-success ml-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('select[product_name="product_name"]').on('change', function() {
            var productid = $(this).val();
            if (productid) {
                $.ajax({
                    url: '/myform/ajax/' + productid,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {


                        $('select[product_name="product_name"]').empty();
                        $.each(data, function(key, value) {
                            $('select[product_name="product_name"]').append('<option value="' + key + '">' + value + '</option>');
                        });


                    }
                });
            } else {
                $('select[product_name="product_name"]').empty();
            }
        });
    });
</script> -->


@include('Admin.include.footer')