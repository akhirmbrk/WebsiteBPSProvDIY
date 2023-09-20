	<!-- Main container -->
    <main>
    	<header class="header header-inverse" style="background-image: url(<?= base_url('assets/img/bg/redhead.png') ?>);">
    		<div class="container">
    			<div class="header-info">
    				<div class="left">
    					<br>
    					<h2 class="header-title"
						 style="font-family: 'Acme', sans-serif;
						 font-size: 55px;
						  color: #444448;
						  text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;
						  "><strong>Permintaan Rapat Daring Batal</strong> <small class="subtitle" style="color: black;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"></small>
    					</h2>
    				</div>
    			</div>
    		</div>
    	</header>



    	<div class="main-content">
    		<div class="card card-body">

    			<!-- <h2 class="d-fiestletter">Permintaan Rapat Daring Batal </h2> -->

    			<div class="row">



    				<div class="col-12">
    					<div class="card card-bordered card-hover-shadow">


    						<div class="card-body">
    							<?php echo $this->session->flashdata('info_form');  ?>

    							<table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0">
    								<thead>
    									<tr>
    										<th width="5%" class="fw-600" style="vertical-align:middle; text-align: center;">No </th>
    										<th width="15%" class="fw-600" style="vertical-align:middle; text-align: center;">Perihal Zoom</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Jadwal Mulai</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle; text-align: center;">Jadwal Selesai</th>
    										<th width="20%" class="fw-600" style="vertical-align:middle; text-align: center;">Diajukan Oleh</th>
    										<th width="20%" class="fw-600" style="vertical-align:middle; text-align: center;">Ruangan</th>
    										<th width="10%" class="fw-600" style="vertical-align:middle; text-align: center;">Tanggal Pembatalan</th>
    									</tr>
    								</thead>
    								<tbody>
    									<?php
										$nomor = 1;
										if (count($list_order)) {
											foreach ($list_order as $indeks => $list) {  ?>
    											<tr>
    												<td><?php echo $nomor; ?></td>
    												<td><?php echo $list['perihal']; ?></td>
    												<td><?php echo $list['jadwal_awal']; ?></td>
    												<td><?php echo $list['jadwal_akhir']; ?></td>
    												<td><span name="m_nama_kegiatan"><?php echo $list['namapengusul']; ?></span></td>
    												<td><?php echo $list['ruangan']; ?></td>
    												<td><span name="m_nama_kegiatan"><?php echo $list['tgl_pengajuan_ok']; ?></span></td>


    											</tr>
    										<?php
												$nomor++;
											}
										} else { ?>
    										<tr>
    											<td><?php echo $nomor; ?></td>
    											<td>tidak ada data</td>
    											<td></td>
    											<td></td>
    											<td></td>
    											<td></td>
    										</tr>

    									<?php } ?>
    								</tbody>
    							</table>
    						</div>


    					</div>
    				</div>



    			</div><!--/.row -->


    		</div>
    	</div><!--/.main-content -->



    </main>
    <!-- END Main container -->
