<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->load->view('dist/_partials/topbar') ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Wilayah Kerja</h4>
        </div>
        <div class="card-body">
          <?php if (!empty($data->wilker)) { ?>
            <div class="row mt-3 justify-content-center">
              <img src="<?= base_url('public/image/') . $data->wilker ?>" class="img-fluid" />
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</div>