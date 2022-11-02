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
          <h4><strong><?= $data->nama_paket ?></strong></h4>
        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-6">
              <h6>Dokumen</h6>
              <div class="row mt-4">
                <div class="col-12">
                  <p><strong>Perencanaan</strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <p>Hasil Survey Lapangan</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->hasil_survey)) { ?>
                    <a href="<?= base_url('public/hasil_survey/') . $data->hasil_survey ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>Gambar Perencanaan</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->gambar_perencanaan)) { ?>
                    <a href="<?= base_url('public/gambar_perencanaan/') . $data->gambar_perencanaan ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>KAK Pekerjaan</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->kak)) { ?>
                    <a href="<?= base_url('public/kak/') . $data->kak ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>HPS/OE</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->hps_oe)) { ?>
                    <a href="<?= base_url('public/hps_oe/') . $data->hps_oe ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <p><strong>Pengawasan</strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <p>Berita Hasil Pengawasan</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->berita_hasil)) { ?>
                    <a href="<?= base_url('public/berita_hasil/') . $data->berita_hasil ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <p><strong>Pelaksanaan</strong></p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <p>Shop Drawing</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->shop_drawing)) { ?>
                    <a href="<?= base_url('public/shop_drawing/') . $data->shop_drawing ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>As Built Drawing</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->as_built_drawing)) { ?>
                    <a href="<?= base_url('public/as_built_drawing/') . $data->as_built_drawing ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>Backup Volume</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->backup_volume)) { ?>
                    <a href="<?= base_url('public/backup_volume/') . $data->backup_volume ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>Dokumentasi</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->dokumentasi)) { ?>
                    <a href="<?= base_url('public/dokumentasi/') . $data->dokumentasi ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>Buku Harian Standar</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->buku_harian)) { ?>
                    <a href="<?= base_url('public/buku_harian/') . $data->buku_harian ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <p>BAST Hasil Pekerjaan PPK ke KPA</p>
                </div>
                <div class="col-4">
                  <?php if (!empty($data->bast)) { ?>
                    <a href="<?= base_url('public/bast/') . $data->bast ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                  <?php } ?>
                </div>
              </div>
            </div> <!-- col -->

            <div class="col-6">
              <h6>Keterangan</h6>
              <div class="row mt-4">
                <div class="col-12">
                  <p class="text-white">Perencanaan</p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <?php if (!empty($data->hasil_survey)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->gambar_perencanaan)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->kak)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->hps_oe)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <p class="text-white">Pengawasan</p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <?php if (!empty($data->berita_hasil)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <p class="text-white">Pelaksanaan</p>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <?php if (!empty($data->shop_drawing)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->as_built_drawing)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->backup_volume)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->dokumentasi)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->buku_harian)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
                <div class="col-8">
                  <?php if (!empty($data->bast)) { ?>
                    <p>Ada</p>
                  <?php } else { ?>
                    <p>Tidak Ada</p>
                  <?php } ?>
                </div>
              </div>
            </div> <!-- col -->

          </div>

        </div>
      </div> <!-- card -->
    </div>
  </section>
</div>