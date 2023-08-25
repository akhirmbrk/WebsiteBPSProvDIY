<div id="master_pekerjaan" class="media-list media-list-hover media-list-divided">
  <?php 
  if (count($pekerjaan_fungsional_list)) {
		foreach ($pekerjaan_fungsional_list as $indeks => $list) {  ?>  
		
	<a class="media media-single" name="d_tambah_ckpt_fungsional" href="#">
	<span class="title" name="m_nama_kegiatan" ><?php echo $list['poin_pedoman_ak']; ?> <?php echo $list['nama']; ?> (angka kredit : <?php echo $list['angka_kredit']; ?>) </span>  
	<input type="hidden" name="id_pekerjaan" value="<?php echo $list['id_pekerjaan']; ?>"/>
	
	<input type="hidden" name="vol_keg" value="<?php echo $list['satuan']; ?>"/>
	
	<button class="btn btn-square btn-sm btn-primary" data-provide="tooltip" data-placement="top" title="Tambahkan Pekerjaan"><i class="ti-plus"></i></button>
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