@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perform a return || KSG LRS</title>
</head>

<body class="bg-theme bg-theme8">
    <!--wrapper-->
	<div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Returninga device</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Return  Device</li>
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
                        <h5 class="card-title">Device Returned Details</h5>
                        <hr/>
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Name: </strong>{{ $allocations->fullname }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff E-mail Address: </strong>{{ $allocations->email }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Contact: </strong>{{ $allocations->phone }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Department: </strong>{{ $allocations->dept }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Event: </strong>{{ $allocations->event }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Preferred allocations Date: </strong>{{ $allocations->PAD }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Suggested Return Date: </strong>{{ $allocations->SRD }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device Name </strong>{{ $allocations->devmodel }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device type: </strong>{{ $allocations->type }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device tag Number </strong>{{ $allocations->devtag }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Allocated  by: </strong>{{ $allocations->staff }}
                                </label>
                            </div>
                            





                            <form class="form-body mt-4" action="{{ route('admin.return', [$allocations->id]) }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <hr>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" name="type" class="form-label"><strong>Inspection Entry  Before  reciving:</strong> {{ $allocations->type_formatted}}</label>
                                    </div>

                                   

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductDescription" class="form-label">Condition Of  the Device</label>
											<textarea class="form-control" name="condition" id="inputProductDescription" rows="3" placeholder="Colour, Markings" required></textarea>
                                    </div>
                                    <br/>
                                  
                                    <hr>

                                   

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputVendor" class="form-label">Return  Date:</label>
                                        <input type="datetime" class="form-control" name="RDate" id="currentDateTime" value="" readonly />

                                            <script>
                                                function getCurrentDateTime() {
                                                    const now = new Date();
                                                    const year = now.getFullYear();
                                                    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-11
                                                    const day = String(now.getDate()).padStart(2, '0');
                                                    const hours = String(now.getHours()).padStart(2, '0');
                                                    const minutes = String(now.getMinutes()).padStart(2, '0');
                                                    const seconds = String(now.getSeconds()).padStart(2, '0');

                                                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                                                }

                                                document.getElementById('currentDateTime').value = getCurrentDateTime();
                                            </script>

                                    </div>

                                  
                                    
                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputCollection" class="form-label">Recived by</label>
                                        <input type="text" class="form-control"  value="{{ Auth::guard('admin')->user()->email}}" name="staff" readonly>
                                    </div>

                                    <br/>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-light">Recive  Device</button>
                                        </div>
                                    </div>
                                </div> <!--end row-->
                            </form>
                        <div>
                    </div>
                </div>
            </div>
        </div> <!--end page wrapper -->
    </div>
	<!--end wrapper-->

</body>


@include('admin.Layout.footer')
