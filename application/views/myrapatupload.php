
    <!-- Main container -->
    <main>

      <header class="header header- bg-img" style="background-image: url(../assets/img/gallery/1.jpg)">
        <div class="header-info">
          <div class="left">
            <h1 class="header-title">ORDER RAPAT SAYA</h1>
          </div>

          <div class="right flex-middle">
            
          </div>
        </div>

        <div class="header-action">
          <div class="flexbox align-items-center gap-items-4">
          
          </div>

          <nav class="nav">

          </nav>
        </div>
      </header>

      <div class="main-content">
        <div class="card card-body">
         
		 <div class="row">	
  
	
	
	<div class="col-12">
	<div class="card card-bordered card-hover-shadow">

	
		<div class="card-body">
		<?php echo $this->session->flashdata('info_form');  ?>
		
			 <table id="mp_tabel" class="table table-hover table-bordered table-responsive" data-provide="datatables" cellspacing="0" >			  
				  <thead>
					<tr>
					  <th width="5%" class="fw-600"  style="vertical-align:middle;" >No </th>
					  <th width="20%" class="fw-600"  style="vertical-align:middle;" >Topik Rapat</th>
					  <th width="15%" class="fw-600"  style="vertical-align:middle;" >Nama Pengusul</th>
					  <th width="15%" class="fw-600"  style="vertical-align:middle;" >Mulai Rapat</th>
					  <th width="15%" class="fw-600"  style="vertical-align:middle;" >Akhir Rapat</th>
					  <th width="5%" class="fw-600"  style="vertical-align:middle;" >Rapat tutup</th>
					  <th width="15%" colspan="2" class="fw-600"  style="vertical-align:middle;" >Notulen</th>					  
					</tr>
				  </thead>
				  <tbody>
				
				  <?php 
$nomor = 1; // Inisialisasi variabel nomor di luar perulangan
if (count($listrapat) > 0) {
    foreach ($listrapat as $indeks => $rapat) {  
        ?>  
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $rapat['topik']; ?></td>
            <td><?php echo $rapat['nama_pengusul']; ?></td>
            <td><?php echo $rapat['mulai_rapat']; ?></td>
            <td><?php echo $rapat['akhir_rapat']; ?></td>
            <td><?php echo $rapat['jml_peserta']; ?></td>
            
            <?php if ($rapat['notulen'] == NULL) { ?>
                <td>
                    <span class="badge badge-warning">Belum Upload</span>
                </td>
                <td>
                    <a name="d_edit_bagi_team" class="btn btn-square btn-outline btn-xs btn-dark" href="<?php echo base_url('index.php/manajemenfile/uploadnotulenrapat/'.$rapat['idr']);?>" data-provide="tooltip" data-placement="top" title="Upload Notulen"><i class="ti-upload"></i></a>
                </td>
                
            <?php } else { ?>
                <td>
                    <span class="badge badge-success">Sudah Upload</span>
                </td>
                <td>
                    <a name="d_edit_bagi_team" class="btn btn-square btn-outline btn-xs btn-dark" href="<?php echo base_url('notulen/'.$rapat['notulen'].'.pdf');?>" data-provide="tooltip" data-placement="top" title="Download Notulen"><i class="ti-download"></i></a>
                </td>
            <?php } ?>

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
							  <td></td>
							  <td></td>
							</tr>	
			
					<?php }?>
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
	
	
	
	
	
	