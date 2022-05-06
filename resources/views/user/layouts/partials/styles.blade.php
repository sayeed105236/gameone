<!-- <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" /> -->
<?php
$company =App\Models\Company::first();
 ?>
<link rel="shortcut icon" src="{{asset("storage/Company/$company->company_icon")}}"/>
<link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/coinex.css?v=1.0.0')}}">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
