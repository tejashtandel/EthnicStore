@include('Admin.include.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="container">
            <div class="row">


                <form action="{{route('category.update',$category->id)}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <h1>Edit Category</h1>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category Name:</strong>
                                <input type="text" name="category_name" class="form-control" placeholder="category Name" value="{{$category->category_name}}">
                                <!-- @error('category_name')
                                <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Size:</strong>
                                <input type="text" name="size" class="form-control" placeholder="Size" value="{{$category->size}}">
                                <!-- @error('category_name')
                                <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Type:</strong>
                                <input type="text" name="type" class="form-control" placeholder="Type" value="{{$category->type}}">
                                <!-- @error('type')
                                <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                @enderror -->
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success ml-3 " value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('Admin.include.footer')