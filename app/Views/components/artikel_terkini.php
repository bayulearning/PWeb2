<h3>Informasi Terbaru</h3> 
<ul> 
    <?php foreach ($pengumuman as $row): ?> 
        <li>
        <a href="<?= base_url('/pengumuman/' . $row['slug']) ?>">
            <?= $row['judul'] ?></a></li> <?php endforeach; ?> </ul>
