@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<title>Admins || KSG Device Request System</title>
</head>

<body class="bg-theme bg-theme8">
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admins</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Settings</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div>
						</div>
					</div>
				<div><!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Admin"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Admin#</th>
										<th>Full Name</th>
										<th>E-Mail</th>
                                        <th>Contact</th>
                                        <th>Department</th>
										<th>Designation</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($admin as $admin)
                                        <tr>

                                            <td>{{ $admin->iden }}</td>
                                            <td>{{ $admin->fname }} {{ $admin->mname }} {{ $admin->sname }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->phone }}</td>
                                            <td>{{ $admin->dept }}</td>
                                            <td>{{ $admin->des }}</td>

                                        </tr>
                                    @endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Admin#</th>
										<th>Full Name</th>
										<th>E-Mail</th>
                                        <th>Contact</th>
                                        <th>Department</th>
										<th>Designation</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!--end page wrapper -->
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{asset('') }}assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('') }}assets/js/jquery.min.js"></script>
	<script src="{{asset('') }}assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('') }}assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('') }}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="{{asset('') }}assets/js/app.js"></script>

</body>

@include('admin.Layout.footer')
