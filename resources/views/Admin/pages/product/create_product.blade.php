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
                <form action="{{route('products.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <h2>Add Products</h2>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
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
                                <strong>Product Name:</strong>
                                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                                <!-- @error('product_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="dropdown">
                                    <strong>Size:</strong>

                                    <select name="size" id="size">
                                        <option value="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="dropdown">
                                    <strong>Colour:</strong>

                                    <select name="color" id="size">
                                        <option value="Red">Red</option>
                                        <option value="Black">Black</option>
                                        <option value="Green">Green</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Grey">Grey</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input type="text" name="price" class="form-control" placeholder="Enter Price">
                                <!-- @error('price')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>image:</strong>
                                <input type="file" name="image" class="form-control" placeholder="Enter Images">
                                <!-- @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success ml-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('Admin.include.footer')

