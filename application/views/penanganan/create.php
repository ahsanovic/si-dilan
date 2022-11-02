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
        </div>
        <div class="card-body">
          <form role="form" id="form" enctype="multipart/form-data">
            <?= csrf() ?>
            <input type="hidden" id="save-method" value="add" />
            <div class="form-group">
              <label for="tahun">Tahun</label>
              <input type="number" name="tahun" id="tahun" class="form-control form-control-sm" />
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="bulan">Bulan</label>
              <select name="bulan" class="form-control" id="bulan">
                <option selected disabled>- pilih bulan -</option>
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                  <option value="<?= $i ?>"><?= bulan($i) ?></option>
                <?php } ?>
              </select>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="jenis_pengadaan">Jenis Pengadaan</label>
              <input type="text" name="jenis_pengadaan" id="jenis-pengadaan" class="form-control form-control-sm" />
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="nama_paket">Nama Paket</label>
              <input type="text" name="nama_paket" id="nama-paket" class="form-control form-control-sm" />
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="penyedia_jasa">Penyedia Jasa</label>
              <input type="text" name="penyedia_jasa" id="penyedia-jasa" class="form-control form-control-sm" />
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="nilai_kontrak">Nilai Kontrak</label>
              <input type="number" name="nilai_kontrak" id="nilai-kontrak" class="form-control form-control-sm" />
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="hasil_survey">Hasil Survey Lapangan</label>
              <div class="custom-file">
                <input type="file" name="hasil_survey" class="custom-file-input" id="hasil-survey">
                <label class="custom-file-label" for="hasil-survey">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="gambar_perencanaan">Gambar Perencanaan</label>
              <div class="custom-file">
                <input type="file" name="gambar_perencanaan" class="custom-file-input" id="gambar-perencanaan">
                <label class="custom-file-label" for="gambar-perencanaan">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="kak">KAK Pekerjaan</label>
              <div class="custom-file">
                <input type="file" name="kak" class="custom-file-input" id="kak">
                <label class="custom-file-label" for="kak">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="hps_oe">HPS/OE</label>
              <div class="custom-file">
                <input type="file" name="hps_oe" class="custom-file-input" id="hps-oe">
                <label class="custom-file-label" for="hps-oe">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="berita_hasil">Berita Hasil Pengawasan</label>
              <div class="custom-file">
                <input type="file" name="berita_hasil" class="custom-file-input" id="berita-hasil">
                <label class="custom-file-label" for="berita-hasil">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="shop_drawing">Shop Drawing</label>
              <div class="custom-file">
                <input type="file" name="shop_drawing" class="custom-file-input" id="shop-drawing">
                <label class="custom-file-label" for="shop-drawing">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="as_built">As Built Drawing</label>
              <div class="custom-file">
                <input type="file" name="as_built_drawing" class="custom-file-input" id="asbuilt-drawing">
                <label class="custom-file-label" for="asbuilt-drawing">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="backup_volume">Backup Volume</label>
              <div class="custom-file">
                <input type="file" name="backup_volume" class="custom-file-input" id="backup-volume">
                <label class="custom-file-label" for="backup-volume">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="dokumentasi">Dokumentasi</label>
              <div class="custom-file">
                <input type="file" name="dokumentasi" class="custom-file-input" id="dokumentasi">
                <label class="custom-file-label" for="dokumentasi">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="buku_harian">Buku Harian Standar</label>
              <div class="custom-file">
                <input type="file" name="buku_harian" class="custom-file-input" id="buku-harian">
                <label class="custom-file-label" for="buku-harian">Choose file</label>
              </div>
            </div>
            <div class="form-group">
              <label for="bast">BAST Hasil Pekerjaan PPK ke KPA</label>
              <div class="custom-file">
                <input type="file" name="bast" class="custom-file-input" id="bast">
                <label class="custom-file-label" for="bast">Choose file</label>
              </div>
            </div>
            <a class="btn btn-secondary" href="<?= site_url('penanganan') ?>">Batal</a>
            <button id="btn-save" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>