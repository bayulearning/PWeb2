<?= $this->include('template/admin_header'); ?>

<h2><?= esc($title); ?></h2>

<?php if (isset($validation) && !empty($validation)): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach ($validation as $error): ?>
        <li><?= esc($error); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?= esc($data['judul'] ?? '') ?>" required>
    </p>

    <p>
        <label for="isi">Isi</label>
        <textarea name="isi" cols="50" rows="10"><?= esc($data['isi'] ?? '') ?></textarea>
    </p>

    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>"
                    <?= ($data['id_kategori'] == $k['id_kategori']) ? 'selected' : '' ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label for="gambar">Gambar (opsional)</label><br>
        <?php if (!empty($data['gambar'])): ?>
            <img src="<?= base_url('gambar/' . $data['gambar']); ?>" width="150"><br>
        <?php endif; ?>
        <input type="file" name="gambar">
    </p>

    <p><input type="submit" value="Kirim" class="btn btn-primary"></p>
</form>



<?= $this->include('template/admin_footer'); ?>
