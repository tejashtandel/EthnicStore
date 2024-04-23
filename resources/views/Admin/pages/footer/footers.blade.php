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
            <a href="{{route('footers.create') }}" class="btn btn-success btn-lg float-right" type="submit">Add footer</a>
    
                    <table class="table table-bordered" id="myTable">
                             <thead>
                                 <tr>
                                        
                                            <th >About</th>
                                            <th >Address</th>
                                            <th >Phone</th>
                                            <th >Email</th>
                                            <th >Action</th>
                                     </tr>
                             </thead>
                             <tbody>
                             @foreach($footer as $foot)
                             <tr>
                                
                                 <td>{{$foot->about}}</td>
                                 <td>{{$foot->address}}</td>
                                 <td>{{$foot->phone}}</td>
                                 <td>{{$foot->email}}</td>
                                 <td>
                                 <form action="{{route('footers.destroy',$foot->id)}}" method="Post">
<a class="btn btn-primary"  href="{{route('footers.edit',$foot->id)}}">Edit</a>
@csrf
 @method('DELETE')
<!-- <button type="submit" class="btn btn-danger">Delete</button> -->
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