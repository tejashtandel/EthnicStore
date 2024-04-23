@include('Admin.include.header')
<div class="main-content">
     <div class="section__content section__content--p30">
          <div class="container">
               <div class="row">

                    <form action="{{route('footers.update',$footer->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="row">
                              <h1>Edit Footer</h1>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        @if($errors->any())
                                        {!! implode('', $errors->all('<div class="alert alert-danger mt-1 mb-1">:message</div>')) !!}
                                        @endif
                                   </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        <strong>About:</strong>
                                        <input type="text" name="about" class="form-control" placeholder="About" value="{{$footer->about}}">
                                        <!-- @error('about')
                                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                        @enderror -->
                                   </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        <strong>Address:</strong>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{$footer->address}}">
                                        <!-- @error('address')
                                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                                        @enderror -->
                                   </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        <strong>phone:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="phone number" value="{{$footer->phone}}">
                                        <!-- @error('phone')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                        @enderror -->
                                   </div>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$footer->email}}">
                                        <!-- @error('email')
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