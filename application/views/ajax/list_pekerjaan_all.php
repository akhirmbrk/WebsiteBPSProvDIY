<div id="master_pekerjaan" class="media-list media-list-hover media-list-divided">
  <?php 
  if (count($pekerjaan_list)) {
		foreach ($pekerjaan_list as $indeks => $list) {  ?>  
		
	<a class="media media-single" name="d_tambah_ckpt" href="#">
		<span class="title" name="m_nama_kegiatan" ><?php echo $list['nama']; ?> 
		<br/>
		<span class="fw-500 text-success">
			<?php echo $list['nama_jabatan']; ?> <?php echo $list['satker']; ?>
		</span>
		
		</span>  
		<input type="hidden" name="id_pekerjaan" value="<?php echo $list['id_pekerjaan']; ?>"/>
		<input type="hidden" name="vol_keg" value="<?php echo $list['satuan']; ?>"/>
		
		<button class="btn btn-square btn-sm btn-primary" data-provide="tooltip" data-placement="top" title="laporkan realisasi harian"><i class="ti-plus"></i></button>
	</a>				
	
	<?php 
		}
	} else { ?>
	<div class="media media-single">
			<span class="title fs-16 text-warning" >
				belum ada master pekerjaan yang tersedia atau semua pekerjaan sudah terdaftar di CKP-T
			</span>  
		</div>
	
	<?php } ?>
</div>