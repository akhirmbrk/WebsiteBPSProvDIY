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
<!-- <script src="<?= base_url('') ?>/assets/data/json/countries.json"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
    app.ready(function() {
        //
        //
        var userapp = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace(['id_pegawai', 'nip_lama', 'nama_peg']),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
                url: '<?= base_url('Monitoring/TimKerja/AllUserProv') ?>',
                filter: function(list) {
                    return $.map(list, function(user) {
                        return {
                            id_pegawai: user.id_pegawai,
                            nip_lama: user.nip_lama,
                            nama_peg: user.nama_peg.replace(/,/g, ' ')
                        };
                    });
                },
                ttl: 300
            }
        });

        userapp.initialize();

        $('#sample-typeahead').tagsinput({
            typeaheadjs: {
                name: 'userapp',
                displayKey: function(item) {
                    return item.nama_peg + ' - ' + item.nip_lama;
                },
                valueKey: 'nama_peg',
                source: userapp.ttAdapter()
            }
        });



    });
</script>



</body>


</html>