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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    @stack('scripts')
