@include('Admin.include.header')





<div class="container">
    <div class="form-group">
        <input type="text" name="search" id="search1" class="form-control search" placeholder="Search Feedback Data" />

    </div>
</div>


<div class="container feedback">
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subjects</th>
                <th scope="col">message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedback as $fb)
            <tr>
                <td> {{$fb->name}}</td>
                <td> {{$fb->email}}</td>
                <td> {{$fb->subject}}</td>
                <td> {{$fb->message}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@include('Admin.include.footer')
<script>
    $('#search1').on('keyup', function() {
        var search = $(this).val();
        console.log(search);
        $.ajax({
            type: "get",
            url: "{{route('searchf')}}",
            data: {
                search: search,

            },

            success: function(response) {
                if (response.success) {

                    $("#message").show();
                    $('.feedback').html(response.html);

                    $('#feedbackr').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdf',
                                className: 'btn-secondary'
                            },
                            {
                                extend: 'print',
                                className: 'btn-secondary'
                            },
                            {
                                extend: 'csv',
                                className: 'btn-secondary'
                            },
                            {
                                extend: 'excel',
                                className: 'btn-secondary'
                            }
                        ],

                    });

                }

            }
        });
    })
</script>