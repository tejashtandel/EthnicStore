@include('Admin.include.header')

<!-- MAIN CONTENT-->
<div class="main-content">
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
            <a href="{{route('brand.create') }}" class="btn btn-success btn-lg float-right" type="submit">Add Brand</a>
        

                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>

                            <th scope="col">Brand Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $brd)
                        <tr>

                            <td>{{$brd->brand_name}}</td>

                            <td>
                                <form action="{{route('brand.destroy',$brd->id)}}" method="Post">
                                    <a class="btn btn-primary" href="{{route('brand.edit',$brd->id)}}">Edit</a>
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