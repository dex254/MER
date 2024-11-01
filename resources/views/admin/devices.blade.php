@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Devices || KSG LRS</title>
</head>
=
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Device Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Devices</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Outputs</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="javascript:;">Excel</a>
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
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Devices"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  	<div class="ms-auto"><a href="/admin/device" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Device</a></div>
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
							<table  id="dataTable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Device#</th>
                                        <th>Model</th>
                                        <th>Description</th>
                                        <th>Tag#</th>
                                        <th>Images</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Condition</th>
                                        <th>History</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        @foreach ($devices as $devices)
                                            <tr>

                                                <td>{{ $devices->sno }}</td>
                                                <td>{{ $devices->model }}</td>
                                                <td>{{ $devices->desc }}</td>
                                                <td>{{ $devices->tag }}</td>
                                                <td>{{ $devices->image_name1}}, {{ $devices->image_name2 }}, {{ $devices->image_name3 }}</td>

                                                <td>
                                                    @if ($devices->category === 'Desktop')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Desktop</div>
                                                    @elseif ($devices->category === 'Laptop')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Laptop</div>
                                                    @elseif ($devices->category === 'Printer')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Printer</div>
                                                    @elseif ($devices->category === 'IPPhone')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>IP-Phone</div>
                                                    @elseif ($devices->category === 'Smartphone')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Smart Phone</div>
                                                    @elseif ($devices->category === 'Tablet')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Tablet</div>
                                                    @elseif ($devices->category === 'Projector')
                                                        <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Projector</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($devices->status === 'Available')
                                                        <span class="badge bg-success">Available</span>
                                                    @elseif ($devices->status === 'Unavailable')
                                                        <span class="badge bg-danger">Unavailable</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($devices->con === 'VOld')
                                                        <span class="badge bg-dark">Very Old</span>
                                                    @elseif ($devices->con === 'Fair')
                                                        <span class="badge bg-info text-dark">Fair</span>
                                                    @elseif ($devices->con === 'New')
                                                        <span class="badge bg-secondary">New</span>
                                                    @elseif ($devices->con === 'Good')
                                                        <span class="badge bg-warning text-dark">Good</span>
                                                    @elseif ($devices->con === 'Old')
                                                        <span class="badge bg-light text-white">Old</span>
                                                    @elseif ($devices->con === 'BNew')
                                                        <span class="badge bg-primary">Brand New</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal">View History</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Modal title</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="{{ route ('admin.devedit', ['id'=> $devices->id]) }}" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class='bx bxs-edit'></i></a>
                                                        <a href="javascript:;" class="ms-3"data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete({{ $devices->id }});"><i class='bx bxs-trash'></i></a>
                                                        <form id="delete-form-{{ $devices->id }}" action="{{ route('devices.delete', $devices->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>

                                                    <script>
                                                        function confirmDelete(iden) {
                                                            if (confirm('Are you sure you want to delete this device?')) {
                                                                document.getElementById('delete-form-' + iden).submit();
                                                            }
                                                        }
                                                    </script>

                                                </td>
                                            </tr>
                                        @endforeach
									</tr>
								</tbody>
								<tfoot>
                                    <tr>
										<th>Device#</th>
                                        <th>Model</th>
                                        <th>Description</th>
                                        <th>Add-Ons</th>
                                        <th>Images</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Condition</th>
                                        <th>History</th>
                                        <th>Actions</th>
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
