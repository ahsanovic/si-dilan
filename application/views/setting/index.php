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
          <h4>Setting</h4>
        </div>
        <div class="card-body">
          <form id="form" enctype="multipart/form-data">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About</label>
              <div class="col-sm-12 col-md-7">
                <textarea name="about" class="summernote-simple"><?= !empty($data->about) ? $data->about : '' ?></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Struktur Organisasi</label>
              <div class="col-sm-12 col-md-7">
                <div class="custom-file">
                  <input type="file" name="sotk" class="custom-file-input" id="sotk">
                  <label class="custom-file-label" for="sotk">Choose file</label>
                </div>
                <span class="text-danger">*) biarkan kosong jika gambar tidak diganti</span>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tupoksi</label>
              <div class="col-sm-12 col-md-7">
                <textarea name="tupoksi" class="summernote-simple"><?= !empty($data->about) ? $data->tupoksi : '' ?></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wilayah Kerja</label>
              <div class="col-sm-12 col-md-7">
                <div class="custom-file">
                  <input type="file" name="wilker" class="custom-file-input" id="wilker">
                  <label class="custom-file-label" for="wilker">Choose file</label>
                </div>
                <span class="text-danger">*) biarkan kosong jika gambar tidak diganti</span>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button class="btn btn-primary" id="btn-save">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div> <!-- card -->

    </div>
  </section>
</div>