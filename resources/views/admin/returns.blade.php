@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Returns || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Request Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Returns</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Download Returns</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="{{ route('devreturns.export') }}">Excel</a>
								<a class="dropdown-item" href="javascript:;">PDF</a>
                                <a class="dropdown-item" href="javascript:;">Print</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Returns"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						@if ($errors->any() || session('success'))
						<div class="alert alert-{{ $errors->any() ? 'danger' : 'success' }}" role="alert">
							@if ($errors->any())
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@else
								{{ session('success') }}
							@endif
						</div>
					@endif
											@if (session('status'))
			<div class="alert alert-success" id="success-message">
				{{ session('status') }}
			</div>
		@endif
		
		<!-- General Error Message (For form errors or custom validation errors) -->
		@if ($errors->any())
			<div class="alert alert-danger" id="error-message">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<!-- Style for alert boxes -->
		<style>
			.alert {
				padding: 15px; /* Add some padding */
				border-radius: 5px; /* Round corners */
				margin-bottom: 20px; /* Space between messages */
				display: block; /* Ensure the message is displayed as a block element */
			}
		
			.alert-success {
				background-color: yellow; /* Yellow background for success */
				color: #333; /* Dark text color */
				border: 1px solid #ccc; /* Border for the alert */
			}
		
			.alert-danger {
				background-color: #f8d7da; /* Light red background for errors */
				color: #721c24; /* Dark red text color */
				border: 1px solid #f5c6cb; /* Border for the alert */
			}
		</style>
		
		<!-- Flickering effect using JavaScript -->
		<script>
			// Function to add flicker effect
			function flickerEffect(elementId) {
				const element = document.getElementById(elementId);
				if (element) {
					let visible = true;
					setInterval(() => {
						element.style.visibility = visible ? 'hidden' : 'visible';
						visible = !visible;
					}, 470); // 500ms flicker interval
				}
			}
		
			// Apply flicker effect to success or error messages
			if (document.getElementById('success-message')) {
				flickerEffect('success-message');
			}
		
			if (document.getElementById('error-message')) {
				flickerEffect('error-message');
			}
		</script>
						<div class="table-responsive">
							<table id="dataTable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Return#</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Department</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Return Date</th>
										<th>Recived By</th>
										<th>Return condition</th>
										
										<th>Fine</th>
										<th>Send  mail</th>
                                        <th>More Details</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        @foreach ($devreturn as $devreturns)
                                            <tr>
                                                <td>{{ $devreturns->id }}</td>
                                                <td>{{ $devreturns->iden }}</td>
                                                <td>{{ $devreturns->fullname }}</td>
                                                <td>{{ $devreturns->email }}</td>
                                                <td>{{ $devreturns->phone }}</td>
                                                <td>{{ $devreturns->dept }}</td>
                                                <td>{{ $devreturns->devmodel}}: {{ $devreturns->sno }}</td>
                                                <td>{{ $devreturns->ADate }}</td>
                                                <td>{{ $devreturns->RDate }}</td>
												<td>{{ $devreturns->staff }}</td>
												<td>{{ $devreturns->condition }}</td>
												
												<td>{{ $devreturns->fine}}</td>
												<td><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $devreturns->email }}&su=Your%20fine%20is%20Ksh%20{{ $devreturns->fine }}&body=Subject:%20Important%20Notice%20Regarding%20Your%20Device%20Return%0D%0A%0D%0ADear%20{{ $devreturns->fullname }},%0D%0A%0D%0AI%20hope%20this%20message%20finds%20you%20well.%0D%0A%0D%0AI%20am%20writing%20to%20inform%20you%20that,%20unfortunately,%20we%20have%20not%20received%20the%20timely%20return%20of%20your%20device.%20As%20a%20result,%20you%20have%20accumulated%20a%20fine%20of%20Ksh%20{{ $devreturns->fine }}.%20We%20understand%20that%20unforeseen%20circumstances%20can%20occur,%20but%20it’s%20important%20to%20address%20this%20matter%20promptly.%0D%0A%0D%0APlease%20be%20aware%20that%20failure%20to%20clear%20this%20fine%20may%20result%20in%20additional%20penalties,%20including%20the%20potential%20inability%20to%20allocate%20a%20device%20to%20you%20in%20the%20future.%20We%20value%20your%20participation%20and%20want%20to%20ensure%20you%20have%20access%20to%20our%20resources.%0D%0A%0D%0AIf%20you%20have%20any%20questions%20or%20if%20there’s%20anything%20we%20can%20assist%20you%20with,%20please%20do%20not%20hesitate%20to%20reach%20out.%0D%0A%0D%0AThank%20you%20for%20your%20attention%20to%20this%20matter.%0D%0A%0D%0ABest%20regards,%0D%0A%0D%0A{{ $devreturns->staff }}%0D%0A{{ $devreturns->dept }}%0D%0AKenya%20School%20Of%20Government%0D%0AICT%20Department" 
													style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">
													Inform via Gmail
												 </a></td>
												
                                                <td>
                                                    <div class="col">
                                                        <!-- Button trigger modal -->
														<a  href="{{ route('return.fine', ['id' => $devreturns->id]) }}">
                                                        <button type="button" class="btn btn-light" >Clear  Fine</button>
														</a><!-- Modal -->
                                                        <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
									</tr>
								</tbody>
								<tfoot>
                                    <tr>
										<th>Return#</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Department</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Return Date</th>
                                        <th>More Details</th>
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

</body>

@include('admin.Layout.footer')
