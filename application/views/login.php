<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="login, signin">

   <title>BPS DI Yogyakarta</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
  </head>

  <body>


    <div class="row no-gutters min-h-fullscreen bg-white">
      <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-block bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg.jpg);" >

        <div class="row h-100 pl-50">
          <div class="col-md-10 col-lg-8 align-self-end">
           
            <br><br><br>
          
            <br><br>
          </div>
        </div>

      </div>



      <div class="col-md-6 col-lg-5 col-xl-4 bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg1.jpg);">
        <div class="px-80 py-80">
          <h1 class="text-center fw-500">Sistem Login</h1>
         
		
		 
          <br>


         <a class="btn btn-block btn-info btn-label"  title="BPS SINGLE SIGN ON" href="http://localhost/ckponline/" ><label><i class="ti-user"></i></label>BPS SINGLE SIGN ON</a>

          <hr class="w-30px">

        <p class="text-center text-muted fs-13 mt-20">Copyright © 2017 BPS Provinsi Daerah Istimewa Yogyakarta</p>
        </div>
      </div>
    </div>




   
    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/core.min.js" data-provide="sweetalert"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.min.js"></script>
	<script>
	
	app.ready(function(){
		
		<?php if($this->session->flashdata('info_form')=="logout"){?>
		
		swal({
			title: 'Berhasil Keluar',
			type: "success",
			timer: 5000
		  })
		
		
		<?php  } else if($this->session->flashdata('info_form')=="empty"){  ?>
		
		swal({
			title: 'Lengkapi Isian',
			type: "warning",
			timer: 5000
		  })
		
		
		<?php  } else if($this->session->flashdata('info_form')=="notfound"){  ?>
		
		swal({
			title: 'Akun Tidak Ditemukan',
			type: "warning",
			timer: 5000
		  })
		
		
		<?php  }   ?>
		
	})
	
	
	
	</script>

  </body>
</html>

