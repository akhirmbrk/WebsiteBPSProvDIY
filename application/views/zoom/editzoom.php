<!-- Main container -->
<div class="main-content">
    <div class="card card-body">


        <div class="row">


            <div class="col-12">
                <?php echo $this->session->flashdata('info_form');  ?>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">


                            <!-- Jika harus menampilkan halaman baru pake ini -->
                            <?php if ($editzoom['idm'] != 0) { ?>


                                <form class="" method="post" action="<?php echo base_url('zoom/zoomorder/editzoom/' . $idm); ?>">



                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-4">
                                            <label>Perihal Rapat Dalam Jaringan (Daring) </label>
                                            <input name="perihal" class="form-control" type="text" value="<?php echo $editzoom['perihal']; ?>" autocomplete="off" autofocus required>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-lg-12 col-md-4">
                                            <label>Waktu Mulai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_start" class="form-control" data-provide="datepicker" value="<?php echo $editzoom['tgl_start_tgl']; ?>" autocomplete="off" required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>



                                                <input type="text" name="time_start" class="form-control" value="<?php echo $editzoom['tgl_start_time']; ?>" autocomplete="off" data-provide="clockpicker" required>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>




                                    </div>


                                    <div class="row">

                                        <div class="form-group col-lg-12 col-md-4">
                                            <label>Waktu Selesai</label>
                                            <div class="input-group">

                                            </div>
                                            <div class="input-group">

                                                <input type="text" name="tgl_end" class="form-control" data-provide="datepicker" value="<?php echo $editzoom['tgl_end_tgl']; ?>" autocomplete="off" required>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>

                                                <input type="text" name="time_end" class="form-control" value="<?php echo $editzoom['tgl_end_time']; ?>" data-provide="clockpicker" autocomplete="off" required>
                                                <span class="input-group-addon"><i class="ti-timer"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-4">
                                            <label>Jumlah Peserta </label>
                                            <input type="number" class="form-control" name="jumlah_peserta" value="<?php echo $editzoom['jumlah_peserta']; ?>" placeholder="Max = 100" max="100" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 col-lg-12 col-md-4">
                                            <label>Keterangan Rapat</label>

                                            <div class="form-check">
                                                <input class="form-check-input" onchange="showRuangan()" type="radio" name="keterangan" id="ketOnline" value="0" <?php if ($editzoom['keterangan'] == 0) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="ketOnline">Online</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" onchange="showRuangan()" type="radio" name="keterangan" id="ketOffline" value="1" <?php if ($editzoom['keterangan'] == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="ketOffline">Offline</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="ruangRapat" class="row" <?php if ($editzoom['keterangan'] == 0) {
                                                                            echo 'style="display: none;"';
                                                                        } ?>>
                                        <div class="form-group col-lg-12 col-md-4">
                                            <label class="require">Ruangan</label>
                                            <select name="ruangan" class="form-control" data-provide="selectpicker">
                                                <?php foreach ($ruangan as $key => $item) { ?>
                                                    <option value="<?= $item['id_ruangan'] ?>" <?php if ($editzoom['ruangan'] == $item['id_ruangan']) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $item['nama_ruangan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-md-4">
                                            <label>Perlengkapan</label>
                                            <?php if (count($perlengkapan)) {
                                                foreach ($perlengkapan as $item) {
                                                    $checked = ''; // Inisialisasi variabel checked
                                                    foreach ($perleng_rapat as $value) {
                                                        if ($value['id_perlengkapan'] == $item['id_perlengkapan']) {
                                                            $checked = 'checked'; // Jika ada cocok, tandai sebagai checked
                                                            break; // Keluar dari loop saat sudah ada yang cocok
                                                        }
                                                    }
                                            ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="perlengkapan[]" value="<?= $item['id_perlengkapan'] ?>" id="perlengkapan<?= $item['id_perlengkapan'] ?>" <?= $checked ?>>
                                                        <label class="form-check-label" for="perlengkapan<?= $item['id_perlengkapan'] ?>">
                                                            <?= $item['nama_perlengkapan'] ?>
                                                        </label>
                                                    </div>
                                            <?php
                                                }
                                            } ?>
                                        </div>

                                    </div>


                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-lg-5 col-md-3 mx-auto">
                                            <button class="btn btn-primary btn-block">Simpan Perubahan</button>
                                        </div>
                                    </div>



                                </form>


                            <?php } else { ?>




                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-3">
                                        <h1> Anda tidak mempunyai akses ini </h1>
                                    </div>
                                </div>


                            <?php } ?>





                        </div>

                    </div>
                </div>



            </div>


        </div>
        <!--/.row -->






    </div>
</div>
<!--/.main-content -->
<script>
    function showRuangan() {
        var ruang = document.getElementById("ruangRapat");
        var onlineOption = document.getElementById("ketOnline");
        var offlineOption = document.getElementById("ketOffline");

        if (onlineOption.checked) {
            console.log(onlineOption.checked);
            ruang.style.display = "none";
        } else {
            ruang.style.display = "block";
        }
    }
</script>


<!-- END Main container -->