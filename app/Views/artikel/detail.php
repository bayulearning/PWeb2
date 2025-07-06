<?= $this->include('template/header'); ?>
<article class="entry">

<img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?=
$artikel['judul']; ?>">
<h1><?= esc($title); ?></h1>
<p><?= esc($artikel['isi']); ?></p>
</article>
<?= $this->include('template/footer'); ?>