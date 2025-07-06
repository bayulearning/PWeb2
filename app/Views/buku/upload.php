<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Upload Buku</h1>
<form action="/buku/save" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>File PDF</label>
        <input type="file" name="file" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
<?= $this->endSection() ?>
