<?php

use App\Libraries\Convert;

$convert = new Convert();

?>
<?= $this->extend('frontend/layout/index'); ?>
<?= $this->section('page-content'); ?>

<main class="main" style="margin-top: 16vh">
  <section class="container" id="lowongan-kerja" style="margin-top: 8rem">
    <div class="d-md-flex d-block justify-content-between">
      <div class="daftar-berita d-block">
        <?php foreach ($berita as $data) { ?>
          <div class="wrap-lowongan d-flex align-items-start px-3 pt-3 pb-5" style="border-bottom: 2px solid #9ca3af">
            <div class="image-lowongan">
              <img src="<?= base_url() ?>/uploads/<?= $data['image'] ?>" alt="Gmbar Lowongan" style="width: 200px; height:200px;" />
            </div>
            <div class="desc-lowongan ml-4">
              <div class="title">
                <h5><?= $data['judul'] ?></h5>
                <p class="text-secondary fs-12 fw-500">BY <span style="color: #fb9128"><?= $data['nama'] ?></span>, <?= $convert->tanggal_indo($data['created_at']) ?></p>
              </div>
              <div class="desc">
                <ul class="ml-0 pl-0" style="line-height: 1.75rem">
                  <p><?= substr($data['isi'], 0, 180) ?>...</p>
                </ul>
              </div>
              <a href="<?= base_url('news/detail/') ?>/<?= $data['slug'] ?>"><button class="btn bg-blue-800 btn-custom-primary mt-0">Selengkapnya</button></a>
            </div>
          </div>
        <?php } ?>

      </div>
      <div class="berita-right pl-4">
        <div>
          <div class="custom-input d-flex align-items-center">
            <span>
              <i class="fa fa-search"></i>
            </span>
            <input type="text" class="custom-input-group pl-3" placeholder="Cari Berita" />
          </div>
        </div>

        <div class="sidebar">
          <h6 class="font-weight-bold pb-3" style="font-size: 22px">Lowongan <span style="color: #fb9128"> Terbaru</span></h6>
          <div class="d-flex flex-column">
            <?php $no = 1;
            foreach ($loker as $lo) { ?>
              <?php if ($no <= 3) { ?>
                <div class="mt-1">
                  <img src="<?= base_url('uploads') ?>/<?= $lo['image'] ?>" alt="<?= $lo['posisi'] ?>" />
                  <div class="desc-lowongan ml-4 pb-3">
                    <div class="title">
                      <h6 class="fs-16"><?= $lo['posisi'] ?></h6>
                      <div class="pl-5">
                        <ul class="fs-12" style="line-height: 1.275rem">
                          <li><?= $lo['tipe'] ?> - Rp. <?= $convert->ribuan($lo['gaji']) ?>,-</li>
                          <li><?= $lo['lokasi'] ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>

            <?php } ?>
          </div>

        </div>
      </div>
  </section>
</main>

<?= $this->endSection() ?>