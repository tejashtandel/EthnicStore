@include('Admin.include.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="row">
               
            <form action="{{route('subcategory.update',$subcategory->id)}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <h1>Edit Subcategory</h1>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sub Category Name:</strong>
                                <input type="text" name="subcategoryname" class="form-control" placeholder="subcategory Name" value={{$subcategory->subcategoryname}}>
                                <!-- @error('subcategoryname')
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