<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<!-- Title -->
		<title>Mamurbeta - @yield('title')</title>
        <meta name="description" content="DoppCall - @yield('title')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Favicon -->
		<link rel="icon" href="{{asset('backend/img')}}/brand/favicon.png" type="image/x-icon"/>
		<!-- Icons css -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link href="{{ asset('/') }}backend/css/icon/boxicons.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/cryptofont.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/feather.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/flag-icon.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/ionicons-core.min.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/line-awesome.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/materialdesignicons.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/simple-line-icons.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/themify.css" rel="stylesheet">
        <link href="{{ asset('/') }}backend/css/icon/typicons.css" rel="stylesheet">
        <!-- toastr notification -->
        @toastr_css
		<!--  Owl-carousel css-->
		<link href="{{ asset('/') }}backend/css/owl.carousel.css" rel="stylesheet" />
		<!--  Custom Scroll bar-->
		<link href="{{ asset('/') }}backend/css/jquery.mCustomScrollbar.css" rel="stylesheet"/>
		<!--  Right-sidemenu css -->
		<link href="{{ asset('/') }}backend/css/sidebar.css" rel="stylesheet">
        <!-- Select 2  -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
		<!-- Sidemenu css -->
		<link rel="stylesheet" href="{{ asset('/') }}backend/css/sidemenu.css">
		<!-- Maps css -->
		<link href="{{ asset('/') }}backend/css/jqvmap.min.css" rel="stylesheet">
        <!-- Skinmodes css -->
		<link href="{{ asset('/') }}backend/css/skin-modes.css" rel="stylesheet" />
		<!-- style css -->
		<link href="{{ asset('/') }}backend/css/style.css" rel="stylesheet">
		<link href="{{ asset('/') }}backend/css/main.css" rel="stylesheet">
		<link href="{{ asset('/') }}backend/css/style-dark.css" rel="stylesheet">
        <style>
            .checkbox-wrapper label{
                margin-bottom: 10px;
                line-height: 1.5;
            }
            .checkbox-wrapper label:last-child{
                margin-bottom: 0;
            }
            .vertical-scrolling{
                overflow-x: auto;
                height: 300px;
            }
        </style>
        {{-- internal css --}}
        @stack('styles')
	</head>

	<body class="main-body app sidebar-mini">

		<!-- Page -->
		<div class="page">
            <!-- main header -->
            @include('backend.include.header')

			<!-- main-sidebar -->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			@include('backend.include.sidebar')
			<!-- main-sidebar -->

			<!-- main-content -->
			<div class="main-content app-content">
                <div class="container-fluid">
                    <!-- breadcrumb -->
                    <x-breadcrumb :breadcrumb='$breadcrumb'/>

                    <!-- body content -->
                    @yield('main-content')

                </div>
				<!-- container -->
			</div>
			<!-- /main-content -->

            {{-- footer --}}
            @include('backend.include.footer')
		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQuery min js -->
		<script src="{{ asset('/') }}backend/js/jquery.min.js"></script>
		<!-- Bootstrap Bundle js -->
		<script src="{{ asset('/') }}backend/js/bootstrap.bundle.min.js"></script>
		<!--Internal  Chart.bundle js -->
		<script src="{{ asset('/') }}backend/js/Chart.bundle.min.js"></script>
        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
		<!-- Ionicons js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/esm/ionicons.min.js" integrity="sha512-EmbXlzmS4lTfNxBz7xWacOcWYBw42KAzHTbtuVQvCPrR+fTeHHMB2dnxKqxhwqSqrK8foPW/LZOnHof4DCDHMw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!-- Moment js -->
		<script src="{{ asset('/') }}backend/js/moment.js"></script>
		<!--Internal Sparkline js -->
		<script src="{{ asset('/') }}backend/js/jquery.sparkline.min.js"></script>
        <!-- datatables -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
		<!-- Moment js -->
		<script src="{{ asset('/') }}backend/js/raphael.min.js"></script>
        <!-- Select 2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<!--Internal  Flot js-->
		<script src="{{ asset('/') }}backend/js/jquery.flot.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.flot.pie.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.flot.resize.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.flot.categories.js"></script>
		<script src="{{ asset('/') }}backend/js/dashboard.sampledata.js"></script>
		<script src="{{ asset('/') }}backend/js/chart.flot.sampledata.js"></script>
		<!-- Custom Scroll bar Js-->
		<script src="{{ asset('/') }}backend/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<!--Internal Apexchart js-->
		<script src="{{ asset('/') }}backend/js/apexcharts.js"></script>
		<!-- Rating js-->
		<script src="{{ asset('/') }}backend/js/jquery.rating-stars.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.barrating.js"></script>
		<!--Internal  Perfect-scrollbar js -->
		<script src="{{ asset('/') }}backend/js/perfect-scrollbar.min.js"></script>
		<script src="{{ asset('/') }}backend/js/p-scroll.js"></script>
		<!-- Eva-icons js -->
		<script src="{{ asset('/') }}backend/js/eva-icons.min.js"></script>
		<!-- right-sidebar js -->
		<script src="{{ asset('/') }}backend/js/sidebar.js"></script>
		<script src="{{ asset('/') }}backend/js/sidebar-custom.js"></script>
		<!-- Sticky js -->
		<script src="{{ asset('/') }}backend/js/sticky.js"></script>
		<script src="{{ asset('/') }}backend/js/modal-popup.js"></script>
		<!-- Left-menu js-->
		<script src="{{ asset('/') }}backend/js/sidemenu.js"></script>
		<!-- Internal Map -->
		<script src="{{ asset('/') }}backend/js/jquery.vmap.min.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.vmap.usa.js"></script>
		<!--Internal  index js -->
		<script src="{{ asset('/') }}backend/js/index.js"></script>
		<!-- Apexchart js-->
		<script src="{{ asset('/') }}backend/js/apexcharts.js"></script>
		<!-- toastr js -->
        @toastr_js
        @toastr_render
        <!-- vendor js -->
		<script src="{{ asset('/') }}backend/js/custom.js"></script>
		<script src="{{ asset('/') }}backend/js/jquery.vmap.sampledata.js"></script>
        <script src="{{ asset('/') }}js/package.js"></script>
        <script src="{{ asset('/') }}js/alert.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let _token = "{{ csrf_token() }}";

            // toastr message
            function flashMessage(status, message){
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                switch (status) {
                    case 'success':
                    toastr.success(message, 'Success');
                    break;

                    case 'error':
                    toastr.error(message, 'Error');
                    break;

                    case 'warning':
                    toastr.warning(message, 'Warning');
                    break;

                    case 'info':
                    toastr.info(message, 'Info');
                    break;
                }
            }

            $(document).ready(function() {
                $('.select').select2({
                    placeholder: "Select a state",
                    minimumResultsForSearch: -1,

                });
            })

            // datatables
            $('#data-tables').DataTable({
                responsive: true
            });


            // ajax request global function
            function datatableAction(data,url,method,tableName,alertTitle,alertSuccessTitle,actionType){
                if (data) {
                    Swal.fire({
                    title: alertTitle,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: url,
                                type: method,
                                data:{ _token:_token,data:data,actionType:actionType},
                                dataType: 'JSON',
                                cache: false,
                                success: function(data){
                                    $(tableName).DataTable().ajax.reload();
                                },
                                error: function(error){
                                    console.log(error);
                                }
                            });
                            Swal.fire(alertSuccessTitle,'', 'success')
                        }
                    })
                }
            }

            // action function
            function datatableAlertAction(url,method,data,email,tableName,alertTitle,actionType=null){
                if (data) {
                    $('textarea#note').val('');
                    // modal
                    $('.modal-title').text(alertTitle)
                    $('#action-modal').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });

                    // action submit
                    $(document).on('click','button.action-submit-btn', function(){
                        // note value
                        let note = $('textarea#note').val();

                        $.ajax({
                            url: url,
                            type: method,
                            data:{ _token:_token,data:data,action_type:actionType,email:email,note:note},
                            dataType: 'JSON',
                            cache: false,
                            beforeSend: function(){
                                $('.modal-loader').removeClass('d-none');
                            },
                            complete: function(){
                                $('.modal-loader').addClass('d-none');
                            },
                            success: function(data){
                                $('#action-modal').modal('hide');

                                $(tableName).DataTable().ajax.reload();
                                flashMessage(data.status,data.message);
                            },
                            error: function(error){
                                console.log(error);
                            }
                        });

                    })
                }
            }
        </script>
        {{-- internal js --}}
        @stack('scripts')

	</body>
</html>

{{-- contact view --}}
@include('backend.modals.contact-view')
