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
            <div class="container">
                <div class="form-group">
                    <input type="text" name="search" id="search1" class="form-control search" placeholder="Search Users Data" />

                </div>
               
                    <div class="container users">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Total Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userss as $user)
                                <tr>
                                    <td> {{$user->firstname}}</td>
                                    <td>{{$user->id}}</td>
                                    <td> {{$user->product_name}}</td>
                                    <td> {{$user->totalprice}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Admin.include.footer')
    <script>
        $('#search1').on('keyup', function() {
            var search = $(this).val();
            console.log(search);
            $.ajax({
                type: "get",
                url: "{{route('searchu')}}",
                data: {
                    search: search,
                },

                success: function(response) {
                    if (response.success) {
                        console.log(response);
                      $('.users').html(response.html);
                        generatedatatable();
                    }

                }
            });
        })
    </script>