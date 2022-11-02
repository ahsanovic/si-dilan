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
          <h4>Penanganan Pemeliharaan Jalan</h4>
          <a class="btn btn-primary ml-auto" href="<?= base_url('penanganan/create') ?>">Tambah Data</a>
        </div>
        <div class="card-body">
          <div class="row mb-3 d-flex justify-content-center">
            <div class="col-md-3">
              <select class="form-control" id="year" name="year">
                <option selected value="">- semua tahun -</option>
                <?php foreach ($years as $year) : ?>
                  <option value="<?= $year->tahun ?>"><?= $year->tahun ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="table-responsive">
            <table id="table" class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Bulan</th>
                  <th>Jenis Pengadaan</th>
                  <th>Nama Paket</th>
                  <th>Penyedia Jasa</th>
                  <th>Nilai Kontrak</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>