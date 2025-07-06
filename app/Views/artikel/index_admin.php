<?= $this->include('template/admin_header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
<article class="entry">
    <!-- Judul Artikel yang Dapat Diklik -->
    <h2>
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
            <?= $row['judul']; ?>
        </a>
    </h2>

    <!-- Gambar Artikel -->
    <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>">

    <!-- Ringkasan Isi Artikel -->
    <p><?= substr($row['isi'], 0, 200); ?>...</p>
</article>

<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->include('template/admin_footer'); ?>
