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
                <form action="{{route('stocks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h2>Add Stocks</h2>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
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
                                <div class="dropdown">
                                    <strong>Size:</strong>

                                    <select name="size" id="size"  class="form-control"  placeholder="Enter Size">
                                        <option value="small">Small</option>
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
                                <strong>Quantity:</strong>
                                <input type="number" name="quantity" step="1" class="form-control" placeholder="Enter  Quantity">
                                <!-- @error('header_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                    @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                <input type="text" name="price"  class="form-control" placeholder="Enter price">
                                <!-- @error('header_name')
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