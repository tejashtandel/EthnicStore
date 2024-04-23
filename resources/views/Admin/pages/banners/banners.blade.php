@include('Admin.include.header')

<!-- MAIN CONTENT-->
<div class="main-content">
    <a href="{{route('banners.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Add Banners</a>
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

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>

                            <th scope="col">Banner Images</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bann as $ban)
                        <tr>
                            <td><img src="{{('admin/upload/' . $ban->banner_image)}}" class="img-thumbnail" alt="Responsive image" style="width:250px"></td>
                            <td>{{$ban->description}}</td>

                            <td>
                                <form action="{{route('banners.destroy',$ban->id)}}" method="Post">
                                    <a class="btn btn-primary" href="{{route('banners.edit',$ban->id)}}">Edit</a>
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

@include('Admin.include.footer')