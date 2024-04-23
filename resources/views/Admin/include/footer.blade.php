<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>All Rights Reserved. © 2024 Ethics Design By : Tejas .</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>

<!-- Jquery JS-->
<script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}"></script>

<!-- Vendor JS       -->
<script src="{{asset('admin/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('admin/vendor/select2/select2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>


<!-- Main JS-->
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>






<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>

function generatedatatable()
    {
        
        $('#example').DataTable({
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
        $('#myTable').DataTable();
    }
    $(document).ready(function() {

        generatedatatable();
    });
</script>


   


</body>

</html>
<!-- end document-->