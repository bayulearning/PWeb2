<!-- Tambah Pengumuman -->
<?= $this->include('template/admin_header'); ?>

<h2><?= esc($title); ?></h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="kontak">
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" required value="<?= esc($input['judul'] ?? '') ?>">
    </p>

    <p>
        <label for="isi">Isi</label><br>
        <textarea name="isi" id="isi" cols="50" rows="10" required><?= esc($input['isi'] ?? '') ?></textarea>
    </p>

    <p>
        <label for="gambar">Gambar (opsional)</label><br>
        <input type="file" name="gambar" id="gambar" accept="image/*">
    </p>

    <p>
        <input type="submit" value="Kirim" class="btn btn-large">
    </p>
</form>
</div>
<?= $this->include('template/admin_footer'); ?>
