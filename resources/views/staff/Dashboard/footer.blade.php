<footer class="page-footer"  id="footer">
	<p class="mb-0">Copyright © <span id="year"></span>. All rights reserved. <span id="datetime"></span></p>

<script>
    function updateDateTime() {
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
        const dateTimeString = now.toLocaleString('en-US', options);

        document.getElementById('year').textContent = now.getFullYear();
        document.getElementById('datetime').textContent = dateTimeString;
    }

    // Update date and time on page load
    updateDateTime();
</script>
</footer>
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
<script>
	function searchTable() {
	  // Declare variables
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("searchInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("dataTable");
	  tr = table.getElementsByTagName("tr");
	
	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td");
		for (var j = 0; j < td.length; j++) {
		  var cell = td[j];
		  if (cell) {
			txtValue = cell.textContent || cell.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
			  tr[i].style.display = "";
			  break;
			} else {
			  tr[i].style.display = "none";
			}
		  }
		}
	  }
	}
	</script>
<!-- Bootstrap JS -->
<script src="{{asset('') }}assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('') }}assets/js/jquery.min.js"></script>
<script src="{{asset('') }}assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('') }}assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('') }}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/highcharts.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/exporting.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/export-data.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/accessibility.js"></script>
<script src="{{asset('') }}assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script>
new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="{{asset('') }}assets/js/dashboard-alternate.js"></script>
<!--app JS-->
<script src="{{asset('') }}assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/dashtreme/demo/vertical/dashboard-alternate.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 07:17:28 GMT -->
</html>