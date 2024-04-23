@include('Admin.include.header')


<div class="main-content">

    <div class="section__content section__content--p100">
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
                        <a href="{{route('category.create') }}" class="btn btn-success btn-lg float-right" type="submit"> Create Category</a>
           
         
                <table class="table table-bordered" id="myTable">
             
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cat as $ct)
                        <tr>

                            <td>{{$ct->category_name}}</td>
                            <td>{{$ct->size}}</td>
                            <td>{{$ct->type}}</td>
                            <td>
                                <form action="{{route('category.destroy',$ct->id)}}" method="Post" id="form">
                                    <a class="btn btn-primary" href="{{route('category.edit',$ct->id)}}">Edit</a>
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
