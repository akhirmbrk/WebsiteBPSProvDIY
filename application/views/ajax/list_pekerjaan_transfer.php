<?php 
					  $nomor = 1;
					  if (count($pekerjaan_list)) {
							foreach ($pekerjaan_list as $indeks => $list) {  ?>  
							
						<tr>
						  <td width="6%">
								  <label class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="id_pekerjaan_transfer" value="<?php echo $list['id_pekerjaan']; ?>">
									<span class="custom-control-indicator"></span>
								  </label>
						  </td>
						  <td width="94%">
								<?php echo $list['nama']; ?> ( <?php echo $list['satuan']; ?> )
						  </td>

						</tr>				
						
						<?php 
							$nomor++;
							}
					  } else { ?>
						<tr>
						  <td width="6%">
						  </td>
						  <td width="94%">
								<em>belum ada master pekerjaan yang tersedia atau semua pekerjaan sudah terdaftar di CKP-T<em>
						  </td>
						</tr>	
						
						
						<?php } ?>