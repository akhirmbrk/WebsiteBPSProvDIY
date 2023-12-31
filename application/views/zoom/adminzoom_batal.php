    <!-- Main container -->
    <main>



    	<div class="main-content">
    		<div class="card card-body">

    			<h2 class="d-fiestletter">Permintaan Rapat Daring Batal </h2>

    			<div class="row">



    				<div class="col-12">
    					<div class="card card-bordered card-hover-shadow">


    						<div class="card-body">
    							<?php echo $this->session->flashdata('info_form');  ?>

    							<table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0">
    								<thead>
    									<tr>
    										<th width="5%" class="fw-600" style="vertical-align:middle;">No </th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;">Perihal Zoom</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;">Jadwal Mulai</th>
    										<th width="15%" class="fw-600" style="vertical-align:middle;">Jadwal Selesai</th>
    										<th width="20%" class="fw-600" style="vertical-align:middle;">Diajukan Oleh</th>
    										<th width="20%" class="fw-600" style="vertical-align:middle;">Ruangan</th>
    										<th width="10%" class="fw-600" style="vertical-align:middle;">Tanggal Pembatalan</th>
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