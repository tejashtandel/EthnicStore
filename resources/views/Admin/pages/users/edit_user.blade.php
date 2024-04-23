@include('Admin.include.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="row">
               
            <form action="{{url('update1',$user->id)}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <h1>Edit User Profile</h1>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                       

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Mobile No:</strong>
                                <input type="text" name="mobile_no" class="form-control" placeholder="Update Mobile No" value={{$user->mobile_no}}> 
                                <!-- @error('header_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                    @enderror -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address</strong>
                                <input type="text" name="street" class="form-control" placeholder="Update Address" value={{$user->street}}> 
                                <!-- @error('header_name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
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