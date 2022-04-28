<!-- Backend Bundle JavaScript -->
<script src="{{asset('assets/js/libs.min.js')}}"></script>
<!-- widgetchart JavaScript -->
<script src="{{asset('assets/js/charts/widgetcharts.js')}}"></script>
<!-- fslightbox JavaScript -->
<script src="{{asset('assets/js/fslightbox.js')}}"></script>
<!-- app JavaScript -->
<script src="{{asset('assets/js/app.js')}}"></script>
<!-- apexchart JavaScript -->
<script src="{{asset('assets/js/charts/apexcharts.js')}}"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">

</script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@stack('scripts')
