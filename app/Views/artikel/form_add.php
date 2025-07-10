<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

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
        <label for="judul">Nama</label><br>
        <input type="text" name="judul" id="judul" required value="<?= esc($input['judul'] ?? '') ?>">
    </p>

    <p>
        <label for="isi">Alamat</label><br>
        <textarea name="isi" id="isi" cols="50" rows="10"><?= esc($input['isi'] ?? '') ?></textarea>
    </p>

    <p>
        <label for="id_kategori">Kedudukan</label><br>
        <select name="id_kategori" id="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach($kategori as $k): ?>
                <?php if (isset($k['id_kategori']) && isset($k['nama_kategori'])): ?>
                    <option value="<?= intval($k['id_kategori']); ?>"
    <?= (isset($input['id_kategori']) && $input['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
    <?= esc($k['nama_kategori']); ?>
</option>

                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label for="gambar">Gambar</label><br>
        <input type="file" name="gambar" id="gambar" required>
    </p>

    <p>
        <input type="submit" value="Kirim" class="btn btn-large">
    </p>
</form>
</div>
<?= $this->include('template/admin_footer'); ?>
