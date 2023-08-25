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
  
  
   <!-- <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(<?php echo base_url(); ?>assets/img/bg.jpg);" >

    <div class="card card-round px-50 py-30 w-400px" id="bgisdilogin" > -->
	
	
	<body class=" bg-img p-20" style="background-image: url(<?php echo base_url(); ?>assets/img/bg.jpg);" >
    <div class="row min-h-fullscreen center-vh p-20 m-0" >
	
	<div class="col-12">
        <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%" id="bgisdilogin-">
	
      <h5 class="text-uppercase">CKP ONLINE BPS D.I. YOGYAKARTA</h5>
		<br>
		<span class="fs-11 text-primary">Versi 1.0</span>
		<p></p>
		
   
	<form method="post" action="<?php echo base_url('index.php/home/masuk');?>">
		<div class="form-group">
		  <label class="text-dark">Nama Pengguna</label>
		  <input class="form-control" type="text" name="usenama"  style="background:none;">
		</div>

        <div class="form-group">
           <label class="text-dark">Kata Sandi <?php echo $this->session->flashdata('info_form'); ?></label>
		  <input class="form-control" type="password" name="paswod" style="background:none" >
        </div>
		 <hr class="w-20px">
        <div class="form-group">
          <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
        </div>
      </form>

      <p class="text-center text-muted fs-13 mt-20">Copyright © 2017 BPS Provinsi Daerah Istimewa Yogyakarta</p>
    </div>
   </div>   </div>



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

