<?= $this->include('template/admin_header'); ?> 
<form action="<?= base_url('/admin/artikel/edit/' . $artikel['id']); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    
    <div class="form-group">
        <label for="judul">Judul Artikel</label>
        <input type="text" name="judul" id="judul" value="<?= esc($artikel['judul']); ?>" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="isi">Isi Artikel</label>
        <textarea name="isi" id="isi" class="form-control" required><?= esc($artikel['isi']); ?></textarea>
    </div>

    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control">
        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->include('template/admin_footer'); ?>