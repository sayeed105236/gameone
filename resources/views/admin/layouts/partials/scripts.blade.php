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
<script src="{{ asset('backend') }}/lib/sweetalert/sweetalert.min.js"></script>


<script src="{{ asset('backend') }}/lib/sweetalert/code.js"></script>


<script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
	var type ="{{Session::get('alert-type','info')}}"
	switch(type){
		case 'info':
			toastr.info(" {{Session::get('message')}} ");
			break;
		case 'success':
			toastr.success(" {{Session::get('message')}} ");
			break;
		case 'warning':
			toastr.warning(" {{Session::get('message')}} ");
			break;
		case 'error':
			toastr.error(" {{Session::get('message')}} ");
			break;
	}
@endif
</script>
