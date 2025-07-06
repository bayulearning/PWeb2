<?= $this->include('template/header'); ?>

<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h1><?= $title ?></h1>


<?php if (!empty($artikel) && is_array($artikel)): ?>
    <?php foreach ($artikel as $row): ?>
        <article class="artikel-card">
            <h2><a href="<?= base_url('/artikel/' . $row['slug']) ?>"><?= $row['judul'] ?></a></h2>
            <p>Kategori: <?= $row['nama_kategori'] ?></p>
            <img src="<?= base_url('/gambar/' . $row['gambar']) ?>" alt="<?= $row['judul'] ?>">
            <p><?= substr($row['isi'], 0, 200) ?>...</p>
        </article>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tidak ada artikel ditemukan.</p>
<?php endif; ?>

<?= $this->endSection() ?>


<?= $this->include('template/footer'); ?>
