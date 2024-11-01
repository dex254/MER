<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('') }}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('') }}assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('') }}assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('') }}assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('') }}assets/css/app.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/icons.css" rel="stylesheet">
	<title>Workload Registration</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="{{asset('') }}assets/images/KSG Logo (1).png" width="60" alt="" />
									</div>
									@if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
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

									<div class="text-center mb-4">
										<h5 class="">Workload Dashboard Registration</h5>
										<p class="mb-0">Please fill the below details to create your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" action="{{ route('staff.store') }}" method="POST">
                                            @csrf
                                           
                                            <div class="col-12">
												<label for="inputFirstname" class="form-label">Full  Name</label>
												<input type="text" class="form-control"  name="name" id="name" placeholder="Full name">
											</div>
											

                                            

                                            

											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control"  name="email" id="email" placeholder="example@user.com">
											</div>

                                            <div class="col-12">
												<label for="inputID" class="form-label">ID OR Passport No.</label>
												<input type="number" class="form-control"  name="idnumber" id="iden" placeholder="1234567">
											</div>

											<div class="col-12">
												<label for="inputNumber" class="form-label">Phone Number</label>
												<input type="text" class="form-control" name="phone" id="phone" placeholder="(+254)xxx xxx xxx">
											</div>

											<div class="col-12">
												<label for="inputDept" class="form-label">Department</label>
												<input type="text" class="form-control" name="department" id="dept" placeholder="Human Resources">
											</div>

											<div class="col-12">
												<label for="inputDes" class="form-label">Designation</label>
												<input type="text" class="form-control" name="designation" id="des" placeholder="Assistant Supervisor">
											</div>
											<div class="col-12">
												<label for="campus" class="form-label">Campus</label>
													<div id="campus">
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="LowerKabete" value="Lower Kabete" required>
															<label class="form-check-label" for="Nairobi">Lower Kabete</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="eLDi" value="eLDi">
															<label class="form-check-label" for="eLDi">eLDi</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="Mombasa" value="Mombasa">
															<label class="form-check-label" for="Mombasa">Mombasa</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="Matuga" value="Matuga">
															<label class="form-check-label" for="Matuga">Matuga</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="Embu" value="Embu">
															<label class="form-check-label" for="Embu">Embu</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="campus" id="Baringo" value="Baringo">
															<label class="form-check-label" for="Baringo">Baringo</label>
														</div>
													</div>
											</div>

											<div class="col-12">
												<label for="inputPassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password1">
													<input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password"> <a href="javascript:;"  class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-12">
												<label for="inputCPassword" class="form-label"> Confirm Password</label>
												<div class="input-group" id="show_hide_password2">
													<input type="password" class="form-control border-end-0" id="password" placeholder="Confirm Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
                                                <script>
                                                    function togglePasswordVisibility() {
                                                        var passwordInput = document.getElementById("password");
                                                        var togglePasswordIcon = document.getElementById("togglePasswordIcon");

                                                        if (passwordInput.type === "password") {
                                                            passwordInput.type = "text";
                                                            togglePasswordIcon.classList.remove("bi-eye");
                                                            togglePasswordIcon.classList.add("bi-eye-slash");
                                                        } else {
                                                            passwordInput.type = "password";
                                                            togglePasswordIcon.classList.remove("bi-eye-slash");
                                                            togglePasswordIcon.classList.add("bi-eye");
                                                        }
                                                    }
                                                </script>
											</div>

											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
												</div>
											</div>

											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Sign up</button>
												</div>
											</div>

											<div class="col-12">
												<div class="text-center ">
													<p class="mb-0">Already have an account? <a href="/">Sign in here</a></p>
												</div>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				 </div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<p class="mb-0">Gaussian Texture</p>
			  <hr>

			  <ul class="switcher">
				<li id="theme1"></li>
				<li id="theme2"></li>
				<li id="theme3"></li>
				<li id="theme4"></li>
				<li id="theme5"></li>
				<li id="theme6"></li>
			  </ul>
               <hr>
			  <p class="mb-0">Gradient Background</p>
			  <hr>

			  <ul class="switcher">
				<li id="theme7"></li>
				<li id="theme8"></li>
				<li id="theme9"></li>
				<li id="theme10"></li>
				<li id="theme11"></li>
				<li id="theme12"></li>
				<li id="theme13"></li>
				<li id="theme14"></li>
				<li id="theme15"></li>
			  </ul>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('') }}assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('') }}assets/js/jquery.min.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password1 a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password1 input').attr("type") == "text") {
					$('#show_hide_password1 input').attr('type', 'password');
					$('#show_hide_password1 i').addClass("bx-hide");
					$('#show_hide_password1 i').removeClass("bx-show");
				} else if ($('#show_hide_password1 input').attr("type") == "password") {
					$('#show_hide_password1 input').attr('type', 'text');
					$('#show_hide_password1 i').removeClass("bx-hide");
					$('#show_hide_password1 i').addClass("bx-show");
				}
			});
		});
	</script>

<script>
		$(document).ready(function () {
			$("#show_hide_password2 a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password2 input').attr("type") == "text") {
					$('#show_hide_password2 input').attr('type', 'password');
					$('#show_hide_password2 i').addClass("bx-hide");
					$('#show_hide_password2 i').removeClass("bx-show");
				} else if ($('#show_hide_password2 input').attr("type") == "password") {
					$('#show_hide_password2 input').attr('type', 'text');
					$('#show_hide_password2 i').removeClass("bx-hide");
					$('#show_hide_password2 i').addClass("bx-show");
				}
			});
		});
	</script>

	<script>
	$(".switcher-btn").on("click", function() {
		$(".switcher-wrapper").toggleClass("switcher-toggled")
	}), $(".close-switcher").on("click", function() {
		$(".switcher-wrapper").removeClass("switcher-toggled")
	}),


	$('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
      $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
      $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
      $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
      $('body').attr('class', 'bg-theme bg-theme4');
    }

	function theme5() {
      $('body').attr('class', 'bg-theme bg-theme5');
    }

	function theme6() {
      $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
      $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
      $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
      $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
      $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
      $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
      $('body').attr('class', 'bg-theme bg-theme12');
    }

	function theme13() {
		$('body').attr('class', 'bg-theme bg-theme13');
	  }

	  function theme14() {
		$('body').attr('class', 'bg-theme bg-theme14');
	  }

	  function theme15() {
		$('body').attr('class', 'bg-theme bg-theme15');
	  }

	</script>
</body>

</html>
