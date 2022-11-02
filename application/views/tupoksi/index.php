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
          <h4>Tugas Pokok dan Fungsi</h4>
        </div>
        <div class="card-body">
          <?php if (!empty($data->tupoksi)) {
            echo $data->tupoksi;
          } ?>
        </div>
      </div>
    </div>
  </section>
</div>