<?= $this->include('template/header'); ?>

<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="kontak">
<h1><?= $title ?></h1>
<div class="row mb-3">
  <div class="col-md-6">
    <form method="get" class="form-inline">
      <input 
        type="text" 
        name="q" 
        value="<?= esc($q); ?>" 
        placeholder="Cari " 
        class="form-control mr-2"
      >

      <select name="kategori_id" class="form-control mr-2">
        <option value="">Semua Kategori</option>
        <?php if (!empty($kategori)): ?>
            <?php foreach ($kategori as $k): ?>
    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
        <?= esc($k['nama_kategori']); ?>
    </option>
<?php endforeach; ?>
        <?php endif; ?>
      </select>

      <input type="submit" value="Cari" class="btn btn-primary">
    </form>
  </div>
</div>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Kedudukan</th>
      <th>Status</th>
      <th>Data Update</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($artikel)): ?>
      <?php foreach ($artikel as $row): ?>
        <tr>
          <td><?= esc($row['id']); ?></td>
          <td>
            <b><?= esc($row['judul']); ?></b>
            <p><small><?= esc(substr($row['isi'], 0, 50)); ?>...</small></p>
          </td>
          <td><?= esc($row['nama_kategori']); ?></td>
          <td><?= esc($row['status']); ?></td>
          <td><?= esc($row['updated_at']); ?></td>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>

<?= $pager->only(['q', 'kategori_id'])->links(); ?>
<?= $this->endSection() ?>
<?= $this->include('template/footer_content'); ?>
