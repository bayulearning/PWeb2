<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1><?= esc($buku['judul']) ?></h1>
<p><?= esc($buku['deskripsi']) ?></p>
<embed src="/uploads/<?= $buku['file'] ?>" type="application/pdf" width="100%" height="600px" />
<?= $this->endSection() ?>
