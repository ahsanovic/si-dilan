<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- General JS Scripts -->
<script src="<?= base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/popper.js"></script>
<script src="<?= base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?= base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/js/stisla.js"></script>
<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<!-- sweet alert and toastr -->
<script src="<?= base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>

<!-- JS Libraries -->
<?php
if ($this->uri->segment(1) == "penanganan") $this->load->view('penanganan/ajax');
if ($this->uri->segment(1) == "setting") $this->load->view('setting/ajax'); ?>

<!-- Template JS File -->
<script src="<?= base_url(); ?>assets/js/page/features-post-create.js"></script>
<script src="<?= base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>