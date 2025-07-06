<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Daftar Buku</h1>
<a href="/buku/upload" class="btn btn-primary mb-3">Upload Buku</a>
<ul class="list-group">
    <?php foreach($buku as $b): ?>
        <li class="list-group-item">
            <a href="/buku/detail/<?= $b['id'] ?>"><?= esc($b['judul']) ?></a>
        </li>
    <?php endforeach ?>
</ul>
<?= $this->endSection() ?>
