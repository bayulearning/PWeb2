<h3>Pengumuman Terbaru</h3> 
<ul class="announcement-list"> 
<?php foreach ($pengumuman as $row): ?>
<div class="scroll-reveal-item entry">
    <h4>
        <a class="title" href="<?= base_url('/pengumuman/' . $row['slug']) ?>">
            <?= esc($row['judul']) ?>
        </a>
    </h4>
    <p><?= esc(substr($row['isi'], 0, 100)) ?>...</p>
</div>
<?php endforeach; ?>

