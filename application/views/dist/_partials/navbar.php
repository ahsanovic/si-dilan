<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item <?= ($this->uri->segment(1) == 'beranda') ? 'active' : '' ?>">
        <a href="<?= base_url('beranda') ?>" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
      </li>
      <li class="nav-item dropdown 
        <?= ($this->uri->segment(1) == 'sotk' ||
          $this->uri->segment(1) == 'tupoksi' ||
          $this->uri->segment(1) == 'wilker')
          ? 'active' : ''; ?>
      ">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Profil</a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="<?= base_url('sotk'); ?>" class="nav-link">Struktur Organisasi</a></li>
          <li class="nav-item"><a href="<?= base_url('tupoksi'); ?>" class="nav-link">Tugas Pokok dan Fungsi</a></li>
          <li class="nav-item"><a href="<?= base_url('wilker'); ?>" class="nav-link">Wilayah Kerja</a></li>
        </ul>
      </li>
      <li class="nav-item <?= ($this->uri->segment(1) == 'kondisi') ? 'active' : ''; ?>">
        <a href="<?= base_url('kondisi'); ?>" class="nav-link"><i class="fas fa-road"></i><span>Kondisi Jalan</a>
      </li>
      <li class="nav-item <?= ($this->uri->segment(1) == 'penanganan') ? 'active' : ''; ?>">
        <a href="<?= base_url('penanganan'); ?>" class="nav-link"><i class="fas fa-road"></i><span>Penanganan Jalan</a>
      </li>
    </ul>
  </div>
</nav>