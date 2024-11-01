@include('staff.Dashboard.header')


<!--wrapper-->
<div class="wrapper">
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Account Management</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile </li>
                        </ol>
                    </nav>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @error('current_password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
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
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">Settings</button>
                        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" href="/staff/profile/edit">Edit Profile</a>
                            <a class="dropdown-item" href="/staff/pass/edit">Reset Password</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="index.php">User Activity</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="user-img rounded-circle" width="110" style="width: 200px; height: 200px; background-color: #05EA27FF; display: flex; align-items: center; justify-content: center; color: rgb(53, 12, 215); font-weight: bold; font-size: 100px;">
                                            {{ strtoupper(substr(Auth::guard('staff')->user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::guard('staff')->user()->email, 0, 1)) }}
                                        </div>
                                        <div class="mt-3">
                                            <h4> {{ Auth::guard('staff')->user()->name}} </h4>
                                            <p class="mb-1"> {{ Auth::guard('staff')->user()->email}} </p>
                                            <p class="mb-1"> {{ Auth::guard('staff')->user()->phone}} </p>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">User Details</h5>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->name}}" readonly />
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Campus</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->campus}}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">E-Mail</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->email}}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">ID or Passport No.</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->idnumber}}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone Contact</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->phone}}"; " readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Designation</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->designation}}" readonly />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Department</h6>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ Auth::guard('staff')->user()->department}}" readonly />
                                        </div>
                                        <form action="{{ route('staff.userupdate') }}" method="POST">
                                            @csrf
                                            
                                            <div class="mb-3">
                                              <label for="password" class="form-label">Crrent password Password</label>
                                              <input type="password" class="form-control" id="current_password" name="current_password">
                                              @error('current_password')
                                              <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                          </div>
          
                                    
                                            <div class="mb-3">
                                                <label for="password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                    
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                            </div>
                                    
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
</div>
<!--end wrapper-->

@include('staff.Dashboard.footer')
