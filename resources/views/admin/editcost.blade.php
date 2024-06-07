<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
	<!-- End plugin css for this page -->


	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		@include('admin.body.sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			@include('admin.body.header')
			<!-- partial -->

            @yield('admin')
            <div class="page-content">

				

				<div class="row">
					<div class="col-md-8 grid-margin stretch-card" style="padding-left: 25%">
                        <div class="card" >
                             <div class="card-body">

								<h6 class="card-title">Edit Cost</h6>

								<form class="forms-sample" method="POST" action="{{route('update_sale_confirm',$data->id)}}">
                                    @csrf
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Name</label>
										<input name="name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" value="{{$data->name}}">
									</div>
									
                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Product Type</label>
										<input name="types" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" required="" value="{{$data->types}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Details</label>
										<input name="datails" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" required="" value="{{$data->details}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Quantity</label>
										<input name="quantity" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" required="" value="{{$data->quantity}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Cost</label>
										<input name="cost" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" required="" value="{{$data->cost}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Pyment</label>
										<input name="pyment" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder=" Enter type name" required="" value="{{$data->pyment}}">
									</div>  
									
									<button type="submit" name="submit" class="btn btn-primary me-2">update</button>
                                    
                                    <button  class="btn btn-secondary">Cancel</button>
								</form>

              </div>
            </div>
					</div>
					
				</div>
				
				
				
				

			</div>

			<!-- partial:partials/_footer.html -->
			@include('admin.body.footer')
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
	<!-- End custom js for this page -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
	 @if(Session::has('message'))
	 var type = "{{ Session::get('alert-type','info') }}"
	 switch(type){
		case 'info':
		toastr.info(" {{ Session::get('message') }} ");
		break;
	
		case 'success':
		toastr.success(" {{ Session::get('message') }} ");
		break;
	
		case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
		break;
	
		case 'error':
		toastr.error(" {{ Session::get('message') }} ");
		break; 
	 }
	 @endif 
	</script>
	
	<!-- Plugin js for this page -->
	<script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
	<script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
	<script src="{{asset('backend/assets/js/data-table.js')}}"></script>
	  <!-- End plugin js for this page -->
  
</body>
</html>    