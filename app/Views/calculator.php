<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Calculator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url();?>/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url();?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url();?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= base_url();?>/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">User Cal</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>/calculator">
          <i class="bi bi-grid"></i>
          <span>Calculator</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Calculator</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>/calculator">calculation</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Calculator Input</h5>

              <!-- Horizontal Form -->
              <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter First Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputText1">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Second Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputText2">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Result</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="result" readonly>
                  </div>
                </div>                
                <div class="text-center">
                  <button type="button" class="btn btn-primary" onclick="add()">Add</button>
                  <button type="button" class="btn btn-primary" onclick="sub()">Subtract</button>
                  <button type="button" class="btn btn-primary" onclick="mul()">Multiple</button>
                  <button type="button" class="btn btn-primary" onclick="div()">Divide</button>
                  <button type="button" class="btn btn-primary" onclick="reset()">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

          
        </div>

       </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Calculator</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://linkedin.com/in/abdul-basid-98810b112">Abdul Basid</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="<?= base_url();?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url();?>/assets/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url();?>/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url();?>/assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url();?>/assets/js/main.js"></script>
  
  <script>
  function add(){
	  var input1=document.getElementById("inputText1").value;
	  var input2=document.getElementById("inputText2").value;
	  if(input1!="" && input1!=""){
		  var result=Number(input1)+Number(input2);
		  //alert(result);
		  document.getElementById("result").value=result;
		}else{
			alert("Please enter both number");
		}
  }

  function sub(){
	  var input1=document.getElementById("inputText1").value;
	  var input2=document.getElementById("inputText2").value;
	  if(input1!="" && input1!=""){
		  var result=Number(input1)-Number(input2);
		  //alert(result);
		  document.getElementById("result").value=result;
		}else{
			alert("Please enter both number");
		}
  }  
  
  function mul(){
	  var input1=document.getElementById("inputText1").value;
	  var input2=document.getElementById("inputText2").value;
	  if(input1!="" && input1!=""){
		  var result=Number(input1)*Number(input2);
		  //alert(result);
		  document.getElementById("result").value=result;
		}else{
			alert("Please enter both number");
		}
  }  
  
  function div(){
	  var input1=document.getElementById("inputText1").value;
	  var input2=document.getElementById("inputText2").value;
	  if(Number(input2)==0){
		  document.getElementById("result").value="Infinite";
	  }else if(input1!="" && input1!=""){
		  var result=Number(input1)/Number(input2);
		  //alert(result);
		  document.getElementById("result").value=result;
		}else{
			alert("Please enter both number");
		}
  }  
  
  function reset(){
		document.getElementById("inputText1").value="";
		document.getElementById("inputText2").value="";
		document.getElementById("result").value="";
  }
  </script>

</body>

</html>