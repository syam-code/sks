<footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                        </div>
                </div>
        </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!-- Page Dashboard -->
<?php if ($this->uri->segment(1) == 'dashboard') { ?>
        <script src="<?= base_url(); ?>assets/js/chart-area-demo.js"></script>
        <script src="<?= base_url(); ?>assets/js/chart-bar-demo.js"></script>
<?php } ?>
<!-- Page Bph -->
<?php if ($this->uri->segment(1) == 'bph') { ?>
        <script src="<?= base_url(); ?>assets/js/pie-data-bph.js"></script>
        <script src="<?= base_url(); ?>assets/js/chart-bar-demo.js"></script>
<?php } ?>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/datatables.js"></script>

<!-- Page Kas -->
<?php if ($this->uri->segment(1) == 'kas') { ?>
        <!-- <script src="<?= base_url(); ?>node_modules/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(); ?>node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                        // Format mata uang.
                        $('.nominal').mask('000.000.000', {
                                reverse: true
                        });
                })
        </script> -->
        <!-- <script type="text/javascript">
                var nominal = document.getElementById('nominal');
                nominal.addEventListener('keyup', function(e) {
                        // tambahkan 'Rp.' pada saat form di ketik
                        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                        nominal.value = formatRupiah(this.value, 'Rp. ');
                });

                /* Fungsi formatRupiah */
                function formatRupiah(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                split = number_string.split(','),
                                sisa = split[0].length % 3,
                                nominal = split[0].substr(0, sisa),
                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        // tambahkan titik jika yang di input sudah menjadi angka ribuan
                        if (ribuan) {
                                separator = sisa ? '.' : '';
                                nominal += separator + ribuan.join('.');
                        }

                        nominal = split[1] != undefined ? nominal + ',' + split[1] : nominal;
                        return prefix == undefined ? nominal : (nominal ? 'Rp. ' + nominal : '');
                }
        </script> -->
        <script>
                $(document).ready(function() {
                        $('#editModal').on('show.bs.modal', function(event) {
                                var div = $(event.relatedTarget);
                                var modal = $(this);
                                modal.find('#id').attr("value", div.data('id'));
                                modal.find('#user').attr("value", div.data('user'));
                                modal.find('#bulan').attr("value", div.data('bulan'));
                                modal.find('#tahun').attr("value", div.data('tahun'));
                                modal.find('#nominal').attr("value", div.data('nominal'));
                        });
                });
        </script>
        <script>
                $(document).ready(function() {
                        $('#deleteModal').on('show.bs.modal', function(event) {
                                var div = $(event.relatedTarget);
                                var modal = $(this);
                                modal.find('#id').attr("value", div.data('id'));
                        });
                });
        </script>
<?php } ?>

<!-- Page Organisasi -->
<?php if ($this->uri->segment(1) == 'organisasi') { ?>
        <script>
                $(document).ready(function() {
                        $('#editModal').on('show.bs.modal', function(event) {
                                var div = $(event.relatedTarget);
                                var modal = $(this);
                                modal.find('#id').attr("value", div.data('id'));
                                modal.find('#divisi').attr("value", div.data('divisi'));
                                modal.find('#singkatan').attr("value", div.data('singkatan'));
                        });
                });
        </script>
        <script>
                $(document).ready(function() {
                        $('#deleteModal').on('show.bs.modal', function(event) {
                                var div = $(event.relatedTarget);
                                var modal = $(this);
                                modal.find('#id').attr("value", div.data('id'));
                        });
                });
        </script>
<?php } ?>

</body>

</html>