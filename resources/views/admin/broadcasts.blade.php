@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<title>Broadcasts and Announcements || KSG LRS</title>
</head>

    <!--wrapper-->
    <div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Communication Management</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Broadcasts and Announcements</li>
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
                </div> <!--end breadcrumb-->
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
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center mb-4 gap-3">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Broadcast"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </div>
						  	<div class="ms-auto"><a href="#" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-message-square-x"></i>Remove all live broadcasts</a></div>
					    </div>
                            <div class="table-responsive">
                                <table   id="dataTable" class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Broadcast#</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Category</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($broadcast as $broadcasts)
                                                <tr>
                                                    <td>{{ $broadcasts->id }}</td>
                                                    <td>{{ $broadcasts->title }}</td>
                                                    <td>{{ $broadcasts->message }}</td>
                                                    <td>

                                                        @php
                                                            $badgeClass = 'bg-danger'; // Default class
                                                            $badgeText = 'Warning'; //Default Text
                                                            if ($broadcasts->category == 'Info') {
                                                                $badgeClass = 'bg-warning text-dark';
                                                                $badgeText = 'Informative';
                                                            }
                                                        @endphp

                                                        <span class="badge {{ $badgeClass }}">{{ $badgeText }}</span>

                                                    </td>
                                                    <td>
                                                        @if ($broadcasts->SD)
                                                            {{ $broadcasts->SD }}
                                                        @else
                                                            Unspecified
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($broadcasts->SD)
                                                            {{ $broadcasts->SD }}
                                                        @else
                                                            Unspecified
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex order-actions">
                                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Broadcast"><i class='bx bxs-megaphone'></i></a>
                                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete({{ $broadcasts->id }});"><i class='bx bxs-trash'></i></a>
                                                        <form id="delete-form-{{ $broadcasts->id }}" action="{{ route('broadcast.delete', $broadcasts->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>

                                                    <script>
                                                        function confirmDelete(id) {
                                                            if (confirm('Are you sure you want to delete this broadcast?')) {
                                                                document.getElementById('delete-form-' + id).submit();
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
                                            <th>Broadcast#</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Category</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--end page wrapper -->
    </div>
    <!--end wrapper-->

</body>

@include('admin.Layout.footer')
