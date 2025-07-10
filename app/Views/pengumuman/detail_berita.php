<?= $this->include('template/admin_header'); ?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<article class="artikel-detail">
    <h1><?= esc($pengumuman['judul']) ?></h1>
    <p><strong>Kategori:</strong> <?= esc($pengumuman['slug'] ?? '-') ?></p>
    <img src="<?= base_url('/gambar/' . $pengumuman['gambar']) ?>" alt="<?= esc($pengumuman['judul']) ?>">
    <div class="isi-artikel">
        <?= esc($pengumuman['isi']) ?>
    </div>
</article>

<?= $this->endSection() ?>

<?= $this->include('template/footer'); ?>
