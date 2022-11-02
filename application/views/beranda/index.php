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
          <h4>Tentang SI-DILAN</h4>
        </div>
        <div class="card-body">
          <?php if (!empty($data->about)) {
            echo $data->about;
          } ?>
        </div>
      </div>
    </div>
  </section>
</div>