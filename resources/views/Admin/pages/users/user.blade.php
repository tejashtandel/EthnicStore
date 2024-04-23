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
         
       
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Gender</th>
                            <th scope="col">House</th>
                            <th scope="col">Street</th>
                            <th scope="col">Landmark</th>
                            <th scope="col">State</th>
                            <th scope="col">City</th>
                            <th scope="col">Postcode</th>
                            {{-- <th scope="col">Edit Profile</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($userss as $user)
                        <tr>
                            <td> {{$user->firstname}}</td>
                            <td> {{$user->lastname}}</td>
                            <td> {{$user->mobile_no}}</td>
                            <td> {{$user->gender}}</td>
                            <td> {{$user->house}}</td>
                            <td> {{$user->street}}</td>
                            <td> {{$user->landmark}}</td>
                            <td> {{$user->state}}</td>
                            <td> {{$user->city}}</td>
                            <td> {{$user->postcode}}</td>
                            {{-- <td>
                                    <form method="POST">
                                    <a class="btn btn-primary" href="{{url('edit1',$user->id)}}">Edit</a>
                                    @csrf
                                  
                                </form> 
                            </td> --}}
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('Admin.include.footer')