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


   
    <div class="row no-margin h-fullscreen" style="padding-top: 10%">

      <div class="col-12">
        <div class="card card-transparent center-h text-center">
          <h1 class="text-secondary lh-1" style="font-size: 200px"><i class="fa fa-gear"></i></h1>
          <hr class="w-30px">
          <h3 class="text-uppercase">Aplikasi CKP Dalam Perbaikan</h3>

          <p class="lead">We're sorry for the inconvenience.<br>Please check back later.</p>
        </div>
      </div>


      <footer class="col-12 align-self-end text-center fs-13">
       
      </footer>
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

