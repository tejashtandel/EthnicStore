


@include('Admin.include.header')

<!-- MAIN CONTENT-->
<div class="main-content">
<a href="{{route('abouts.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Add About Us</a>
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
           
            <div class="row">

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Photos</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($abouts as $about)
                        <tr>
                        <td>{{$about->description}}</td>
                            <td><img src="{{('admin/upload/' . $about->photo)}}" class="img-thumbnail" alt="Responsive image" style="width:250px"></td>
                        

                            <td>
                                <form action="{{route('abouts.destroy',$about->id)}}" method="Post">
                                    <a class="btn btn-primary" href="{{route('abouts.edit',$about->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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