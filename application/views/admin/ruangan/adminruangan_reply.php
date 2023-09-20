    <!-- Main container -->
    <main>
    	<header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/redhead.png') ?>);">
    		<div class="container">
    			<div class="header-info">
    				<div class="left">
    					<br>
    					<h2 class="header-title" , style="font-family: 'Acme', sans-serif; font-size: 55px; color: #444448;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Permintaan Rapat Daring</strong> <small class="subtitle" style="color: black;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"></small>
    					</h2>
    				</div>
    			</div>
    		</div>
    	</header>



    	<div class="main-content">
    		<div class="card card-body">

    			<!-- <h2 class="d-fiestletter">Permintaan Rapat Daring </h2> -->

    			<div class="row">



    				<div class="col-12">
    					<div class="card card-bordered card-hover-shadow">

    						<?php echo $this->session->flashdata('info_form');  ?>
    						<div class="card-body">
    							<div class="row">

    								<div class="col-md-12">
    									<form class="" method="post" action="<?php echo base_url('zoom/adminbidang/replyzoom/' . $idm); ?>">

    										<div class="form-group">
    											<label>Jawaban Permintaan Rapat Daring </label>
    											<?php echo form_error('reply', '<p class="text-danger">', '</p>'); ?>
    											<textarea data-provide="summernote" name="reply" class="form-control" data-min-height="250" required> </textarea>
    										</div>


    										<hr>

    										<div class="row">
    											<div class="form-group col-md-3">
    												<button class="btn btn-primary btn-block">Simpan Perubahan</button>
    											</div>
    										</div>



    									</form>
    								</div>

    							</div>
    						</div>


    					</div>
    				</div>



    			</div>
    			<!--/.row -->


    		</div>
    	</div>
    	<!--/.main-content -->



    </main>
    <!-- END Main container -->