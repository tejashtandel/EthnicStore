@include('Admin.include.header')


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
            <a href="{{route('subcategory.create') }}" class="btn btn-success btn-lg float-right" type="submit">Add Sub Category</a>
          

                <table class="table table-bordered" id="myTable">

                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subc as $sub)
                        <tr>


                            <td> {{ $sub->category_name}}</td>
                            <td>{{$sub->subcategoryname}}</td>

                            <td>
                                <form action="{{route('subcategory.destroy',$sub->id)}}" method="Post">
                                    <a class="btn btn-primary" href="{{route('subcategory.edit',$sub->id)}}">Edit</a>
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