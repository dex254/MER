<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/dashboard-alternate.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 07:17:23 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('') }}assets/images/KSG Logo (1).png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('') }}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('') }}assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('') }}assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('') }}assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('') }}assets/css/app.css" rel="stylesheet">
	<link href="{{asset('') }}assets/css/icons.css" rel="stylesheet">
	
	<title>KSG->Mnager</title>
</head>

<body  class="bg-theme bg-theme1" >
    
    
	<!--wrapper-->
	<div  class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
                    <img src="{{asset('') }}assets/images/output-onlinepngtools (3).png" class="logo-icon" alt="logo icon" height = "66px" width = "70px">
                </div>

                <div>
                    <img src="{{asset('') }}assets/images/COA_Line__1.png" class="logo-icon" alt="logo icon" height = "66px" width = "5px">
                </div>

                <div>
                    <img src="{{asset('') }}assets/images/KSG Logo (1).png" class="logo-icon" alt="logo icon" height = "66px" width = "90px">
                </div>
				<div>
					<h4 class="logo-text"> {{ Auth::guard('staff')->user()->campus }}</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="/staff/Dashboard" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">{{ Auth::guard('staff')->user()->campus}}</div>
					</a>
					
				</li>

				<li class="menu-label">MONTHLY WORKLOAD</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-apartment"></i>
						</div>
						<div class="menu-title">Training</div>
					</a>
					<ul>
						<li> <a href="/room/index"><i class='bx bx-radio-circle'></i>Class Contact Hours</a>
						</li>
						<li> <a href="/room/veiw/{id}"><i class='bx bx-radio-circle'></i>Facilitator Evaluation</a>
						</li>
						<li> <a href="/room/veiwkob/{id}"><i class='bx bx-radio-circle'></i>Programs Coordinated</a>
						</li>
						<li> <a href="/room/veiwmeka/{id}"><i class='bx bx-radio-circle'></i>Coordinator Evaluation</a>
						</li>
						<li> <a href="/room/veiwwam/{id}"><i class='bx bx-radio-circle'></i>Curriculum Reviewed</a>
						</li>
						<li> <a href="/room/veiwsaw/{id}"><i class='bx bx-radio-circle'></i>New Curriculum Development and Rolled Out</a>
						</li>
						<li> <a href="/room/veiwgat/{id}"><i class='bx bx-radio-circle'></i>Assessment and Evaluation</a>
						</li>
						
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-hotel"></i>
						</div>
						<div class="menu-title">Research</div>
					</a>
					<ul>
						<li> <a href="/room/veiwgat/{id}"><i class='bx bx-radio-circle'></i>Quality Research Completed</a>
						</li>
						<li> <a href="/room/veiwgat/{id}"><i class='bx bx-radio-circle'></i>Advisory Briefs Submitted</a>
						</li>
						<li> <a href="/room/veiwgat/{id}"><i class='bx bx-radio-circle'></i>Participation/Organization of Symposia/Conferences</a>
						</li>
						
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-bed"></i>
						</div>
						<div class="menu-title">Consultancy </div>
					</a>
					<ul>
						<li> <a href="/transfer/datas"><i class='bx bx-radio-circle'></i>Successful and Completed Consultancy Projects</a>
						</li>
						
						
						<li> <a href="/transfer/accepted"><i class='bx bx-radio-circle'></i>Submission of Inception, Final Consultancy and Exit Reports</a>
						</li>
						<li> <a href="/transfer/caunceled"><i class='bx bx-radio-circle'></i>Revenue Remitted to KSG Account</a>
						</li>
						
						
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-bed"></i>
						</div>
						<div class="menu-title">Special Assignment</div>
					</a>
					<ul>
						<li> <a href="/transfer/datas"><i class='bx bx-radio-circle'></i>Special Assignment from Directorates, Campuses, Institutes and Departments</a>
						</li>
						
						
						<li> <a href="/transfer/accepted"><i class='bx bx-radio-circle'></i>Outreach Services</a>
						</li>
						<li> <a href="/transfer/caunceled"><i class='bx bx-radio-circle'></i>Any other activitys undertaken in the month under review</a>
						</li>
						
						
						
					</ul>
				</li>
				<li class="menu-label">Performance</li>
				<li>
					<a  class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="fadeIn animated bx bx-restaurant"></i>
						</div>
						<div class="menu-title">Performance Appraisal </div>
					</a>
					<ul>
						<li> <a href="/meals/newsn"><i class='bx bx-radio-circle'></i>Target Setting</a>
						</li>
						<li> <a href="/meals/newsn"><i class='bx bx-radio-circle'></i>Appraisal Report</a>
						</li>
						
						
					</ul>
				</li>
			
				
				
				
				
				
				
				<li class="menu-label"> Reports  </li>
				
			
				
				
				
				
				
				<li>
					<a href="/docs/index">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Monthly Workload Report</div>
					</a>
				</li>
				<li>
					<a href="/sapport/staff" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title"> Help</div>
					</a>
				</li>
				<li>
				<form method="POST" action="{{ route('staff.logout') }}">
					@csrf
					<button  class="btn btn-warning px-5 radius-30" type="submit">Logout</button>
				</form></li>
			</ul>
			
			<!--end navigation-->
		</div>
        <header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control"  id="searchInput" onkeyup="searchTable()" placeholder="Search for eny feild.."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							

							<li class="nav-item dropdown dropdown-app">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"><i class='bx bx-grid-alt'></i></a>
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
										
										
				
									  </div><!--end row-->
				
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-notifications-list">
									
										
										
										
										
										
										
										
										
									</div>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="user-status" style="width: 100px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 16px; background-color: {{ Auth::guard('staff')->user()->is_online ? '#28a745' : '#dc3545' }}; border-radius: 5px;">
									<p style="margin: 0;">
										{{ Auth::guard('staff')->user()->is_online ? 'Online' : 'Offline' }}
									</p>
								</div>
								
								
									
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
										
										
										
									
										
										
										
										
										
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-light w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
                    <div class="user-box dropdown px-3">
                        <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-img rounded-circle" style="width: 40px; height: 40px; background-color: #EF07BDFF; display: flex; align-items: center; justify-content: center; color: rgb(66, 58, 58); font-weight: bold; font-size: 18px;">
                                 {{ strtoupper(substr(Auth::guard('staff')->user()->email, 0, 1)) }}{{ strtoupper(substr(Auth::guard('staff')->user()->name, 0, 1)) }}
                            </div>
                            
                            <div class="user-info">
                                <p class="user-name mb-0"> {{ Auth::guard('staff')->user()->name}}, </p>
                                <p class="designattion mb-0">{{ Auth::guard('staff')->user()->dept}}: {{ Auth::guard('staff')->user()->des}} </p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item d-flex align-items-center" href="/staff/profile"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"> <i class="bx bx-cog fs-5"></i> <span>Settings</span>
                            </a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href=""><i class="bx bx-download fs-5"></i><span>Device Allocated pdfs</span></a>
                            </li>
                            <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('staff.logout') }}">
                                    @csrf
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="this.closest('form').submit();">
                                        <i class="bx bx-log-out-circle"></i><span>Logout</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</header>
