@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resolve Fine Issues || KSG LRS</title>
</head>

<body class="bg-theme bg-theme8">
    <!--wrapper-->
	<div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Resove</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Fine clearance on overstay</li>
                            </ol>
                        </nav>
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

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Device Returned Details</h5>
                        <hr/>
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Name: </strong>{{ $devreturn->fullname }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff E-mail Address: </strong>{{ $devreturn->email }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Contact: </strong>{{ $devreturn->phone }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Department: </strong>{{ $devreturn->dept }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Event: </strong>{{ $devreturn->event }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Preferred devreturn Date: </strong>{{ $devreturn->PAD }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device type: </strong>{{ $devreturn->type }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device tag Number </strong>{{ $devreturn->devtag }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Allocated  by: </strong>{{ $devreturn->staff }}
                                </label>
                            </div>
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Device Name </strong>{{ $devreturn->devmodel }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Expected  Return Date: </strong><h2  style="color: blue">{{ $devreturn->ERD }}</h2>
                                </label>
                            </div>
                           
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Return Date </strong><h3  style="color: red"  >{{ $devreturn->RDate }}</h3>
                                </label>
                            </div>
                            
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Fine accumulated: </strong><h1  style="color: brown">{{ $devreturn->fine }}
                                </label>
                            </div>





                            <form class="form-body mt-4" action="{{ route('return.fine', [$devreturn->id]) }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <hr>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" name="type" class="form-label"><strong>Confermation Of proof  of  Payment:</strong> {{ $devreturn->type_formatted}}</label>
                                    </div>
                                    <div class="mb-3" style="margin-bottom: px;">
                                        
                                        <input type="hidden" class="form-control"  value="{{ $devreturn->id }}"   name="idfine" requred>
                                    </div>

                                   

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductDescription" class="form-label">Enter  the proof of Payment</label>
											<textarea class="form-control" name="proof" id="inputProductDescription" rows="3" placeholder="Colour, Markings" required></textarea>
                                    </div>
                                    <br/>
                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputCollection" class="form-label">Amount Paied</label>
                                        <input type="text" class="form-control"   name="cfine" requred>
                                    </div>
                                  
                                    <hr>

                                   

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputVendor" class="form-label">Clearing  date:</label>
                                        <input type="datetime" class="form-control" name="date" id="currentDateTime" value="" readonly />

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
                                            <button type="submit" class="btn btn-light">Resove the Fine</button>
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
