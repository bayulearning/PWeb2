<?= $this->include('template/header'); ?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<article class="artikel-detail">
    <h1><?= esc($artikel['judul']) ?></h1>
    <p><strong>Kategori:</strong> <?= esc($artikel['nama_kategori'] ?? '-') ?></p>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']) ?>" alt="<?= esc($artikel['judul']) ?>">
    <div class="isi-artikel">
        <?= esc($artikel['isi']) ?>
    </div>
</article>

<?= $this->endSection() ?>

<?= $this->include('template/footer'); ?>
