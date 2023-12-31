    <!-- Main container -->
    <main>

    	<header class="header header-inverse mb-0" style="background:rgba(243,243,243,255);">
    		<div class="container">
    			<div class="header-info">
    				<div class="left">
    					<br>
    					<h2 class="header-title" , style="font-family: 'Acme', sans-serif; font-size: 55px; color: #444448;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"><strong>Permintaan Rapat Daring Disetujui</strong> <small class="subtitle" style="color: black;text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;"></small>
    					</h2>
    				</div>
    			</div>
    		</div>
    	</header>

    	<div class="main-content">

    		<div class="card card-body">

    			<!-- <h2 class="d-fiestletter">Permintaan Rapat Daring Disetujui </h2> -->

    			<div class="row">



    				<div class="col-12">
    					<div class="card card-bordered card-hover-shadow">


    						<div class="card-body">
    							<?php echo $this->session->flashdata('info_form');  ?>

    							<table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0">
    								<thead>
    									<tr>
    										<th width="5%" class="fw-600" style="vertical-align:middle;text-align: center;">No </th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Perihal Zoom
    										</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Jadwal Mulai
    										</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Jadwal Selesai
    										</th>
    										<th width="20%" class="fw-600" style="vertical-align:middle;text-align: center;">Diajukan Oleh
    										</th>
    										<th width="10%" class="fw-600" style="vertical-align:middle;text-align: center;">Ruangan</th>
    										<th width="10%" class="fw-600" style="vertical-align:middle;text-align: center;">Tanggal</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;text-align: center;">Action</th>
    									</tr>
    								</thead>
    								<tbody>
    									<?php
										$nomor = 1;
										if (count($list_order)) {
											foreach ($list_order as $indeks => $list) {  ?>
    											<tr>
    												<td style="vertical-align:middle;text-align: center;"><?php echo $nomor; ?></td>
    												<td style="vertical-align:middle;"><?php echo $list['perihal']; ?></td>
    												<td style="vertical-align:middle;text-align: center;"><?php echo $list['jadwal_awal']; ?></td>
    												<td style="vertical-align:middle;text-align: center;"><?php echo $list['jadwal_akhir']; ?></td>
    												<td style="vertical-align:middle;text-align: center;"><span name="m_nama_kegiatan"><?php echo $list['namapengusul']; ?></span>
    												</td>
    												<td style="vertical-align:middle;text-align: center;"><?php echo $list['nama_ruangan']; ?></td>
    												<td style="vertical-align:middle;text-align: center;"><span name="m_nama_kegiatan"><?php echo $list['tgl_pengajuan_ok']; ?></span>
    												</td>
    												<td style="vertical-align:middle;text-align: center;">
    													<nav class="nav gap-2 fs-16" style="justify-content: center;">
    														<a name="d_edit_bagi_pegawai" class="nav-link hover-info cat-info" href="<?php echo base_url('admin/ruangan/adminruangan/lookzoom/' . $list['idm']); ?>" data-provide="tooltip" data-placement="top" title="Lihat Detail"><i class="fa fa-eye"></i></a>
    														&nbsp

    														<a name="d_edit_bagi_pegawai" class="nav-link hover-danger cat-info" onclick="$('#btnDelete').attr('href','<?php echo base_url('Admin/Ruangan/Adminruangan/hapusmeet/' . $list['idm']); ?>')" data-provide="tooltip" data-placement="top" title="Batalkan Rapat" data-toggle="modal" data-target="#modal-sqduh"><i class="fa fa-trash"></i></a>
    													</nav>
    												</td>

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



    			</div>
    			<!--/.row -->


    		</div>
    	</div>

    	<!--/.main-content -->


    	<!-- modal  -->
    	<div class="modal fade modal-top" id="modal-sqduh" tabindex="-1" role="dialog" aria-labelledby="modal-sqduh-label" aria-hidden="true">
    		<div class="modal-dialog modal-sm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title" id="modal-sqduh-label">Konfirmasi</h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				<div class="modal-body">Apakah Anda yakin untuk membatalkan meeting ini?</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
    					<a id="btnDelete" href="" class="btn btn-danger">Ya</a>
    				</div>
    			</div>
    		</div>
    	</div>




    </main>
    <!-- END Main container -->