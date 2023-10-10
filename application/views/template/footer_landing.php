<!-- Footer -->
<!-- <footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="text-center text-sm-left">Designed using <a href="http://thetheme.io/theadmin"><strong>TheAdmin</strong></a></p>
            </div>

            <div class="col-md-6">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer> -->
<!-- END Footer -->


</main>






<!-- Scripts -->
<script src="<?= base_url(''); ?>assets/js/core.min.js" data-provide="typeahead"></script>
<script src="<?= base_url(''); ?>assets/js/app.min.js"></script>
<script src="<?= base_url(''); ?>assets/js/script.min.js"></script>
<script src="<?= base_url(''); ?>assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?= base_url(''); ?>assets/vendor/i8-icon/jquery-i8-icon.min.js"></script>
<script src="<?= base_url('') ?>assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script type="module" src="<?= base_url('') ?>assets/src/main.ts"></script>
<!-- <script src="<?= base_url('') ?>/assets/data/json/countries.json"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    app.ready(function() {

        $('button[name="copiesdi"]').click(function(event) {

            var r = document.createRange();
            r.selectNode(document.getElementById("okeee"));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();



        })



    });


    <?php
    if (isset($tabUser)) {
        $this->load->view('monitoring/livesearch/userSearch');
    } elseif (isset($tabKegiatan)) {
        $this->load->view('monitoring/livesearch/kegiatanSearch');
    } elseif (isset($tabTim)) {
        $this->load->view('monitoring/livesearch/timSearch');
    } elseif (isset($tabUserKabkota)) {
        $this->load->view('monitoring/livesearch/userKabkotaSearch');
    }
    ?>
</script>



</body>


</html>