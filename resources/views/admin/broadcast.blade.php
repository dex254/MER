@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<title>New Broadcast || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Broadcast Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New Broadcast</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Settings</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Remove All Broadcasts</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
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

              	<div class="card">
				  	<div class="card-body p-4">
					  	<h5 class="card-title">Add New Broadcast</h5>
					  	<hr/>
                       	<form class="form-body mt-4" action="{{ route('broadcast.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
					    	<div class="row">
						   		<div class="col-lg-8">
                           			<div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
											<label for="inputProductTitle" class="form-label">Title</label>
											<input type="text" class="form-control" name="title" id="inputProductTitle" placeholder="Enter broadcast title" required>
							  			</div>
							  			<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Message:</label>
											<textarea class="form-control" name="message" id="inputProductDescription" rows="3" required></textarea>
							  			</div>
                                        <div class="mb-3">
											<label for="inputProductDescription" class="form-label">Broadcast Category:</label>
											<select class="form-select" name="category" id="inputProductType" required>
													<option></option>
													<option value="Warning">Warning</option>
													<option value="Info">Informative</option>
                                            </select>
							  			</div>
                            		</div>
						   		</div>
						   		<div class="col-lg-4">
									<div class="border border-3 p-4 rounded">
                              			<div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Start Date:</label>
                                                <input type="date" class="form-control" name="SD" id="inputProductTitle">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">End Date:</label>
                                                <input type="date" class="form-control" name="ED" id="inputProductTitle">
                                            </div>
								  			<div class="col-12">
									  			<div class="d-grid">
                                         			<button type="submit" class="btn btn-light">Set Broadcast</button>
									  			</div>
								  			</div>
							  			</div>
						  			</div>
						  		</div>
					   		</div><!--end row-->
						</form>
				  	</div>
			  	</div>
			</div>
		</div> <!--end page wrapper -->
	</div>
	<!--end wrapper-->

</body>

@include('admin.Layout.footer')
