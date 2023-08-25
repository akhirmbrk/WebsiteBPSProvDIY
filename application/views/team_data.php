    <?php 
        $nomor = 1;
        if (count($daftarteam)) {
        foreach ($daftarteam as $indeks => $team) {  
        ?>
            <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $team['id_team']; ?></td>
            <td><?php echo $team['nama_team']; ?></td>
            <td><?php echo $team['id_zperiode']; ?></td>
            </tr>
                <?php 
                    $nomor++;
                }
                } else { 
                ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td>Tidak ada data</td>
            <td></td>
            <td></td>
        </tr>
            <?php 
            }
            ?>
            </tbody>
                </table>
                    </div>
                        </div>
                            </div>
                                </div><!--/.row -->
                                    </div>
                                        </div><!--/.main-content -->

                                         <script>
                                              $(document).ready(function() {
                                                    // Tambahkan event listener klik pada tab tahun
                                                $('#menu-tabs .nav-link').click(function(e) {
                                                        e.preventDefault();

                                                        // Dapatkan id_zperiode yang dipilih dari atribut data
                                                    var id_zperiode = $(this).data('zperiode');

                                                        // Lakukan permintaan AJAX untuk mengambil data untuk tahun yang dipilih
                                                    $.ajax({
                                                        url: '<?php echo base_url("index.php/manajemenfile/load_team_data"); ?>',
                                                        type: 'POST',
                                                        data: { id_zperiode: id_zperiode },
                                                        success: function(response) {
                                                            // Ganti konten tabel dengan data yang diperbarui
                                                    $('#mp_tabel tbody').html(response);
                                                        },
                                                        error: function() {
                                                            console.log('Terjadi kesalahan saat permintaan AJAX');
                                                        }
                                                        });
                                                    });
                                                    });
                                                    </script>
                                                    </main>
                                                    <!-- END Main container -->
