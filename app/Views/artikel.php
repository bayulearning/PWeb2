<?= $this->include('template/header'); ?> 
<h1><?= $title; ?></h1> 
<hr> <p><?= $content; ?> selamat datang dihalaman feature. halaman ini menjelaskan beberapa content yang ada didalam aplikasi kembangan kami,
dengan tujuan pengguna dapat mengetahui apa saja isi dalam aplikasi tersebut</p> 
<body>
<section>
    <div class="card-container">
        <div class="card-view">
            <img src="<?= base_url('/assets/image1.png') ?>" alt="image1">
            <p>artikel 1</p>
        </div>
        <div class="card-view">
            <img src="<?= base_url('/assets/image2.png') ?>" alt="image1">
            <p>artikel 2</p>
        </div>
        <div class="card-view">
            <img src="<?= base_url('/assets/image3.png') ?>" alt="image1">
            <p>artikel 3</p>
    </div>
</section>
<section>
    <div class="page-constraint"></div>
        <div class="card-container2">
        <div class="card-view2">
            <img src="<?= base_url('/assets/image1.png') ?>" alt="image1">
            <p>Tampilan login merupakan halaman pengguna untuk memasukan identitas untuk dikenal agar pengguna
                terhubung dengan aplikasi
            </p>
        </div>
        <div class="card-view2">
            <img src="<?= base_url('/assets/image2.png') ?>" alt="image1">
            <p>Halaman home berisi berbagai fitur yang dapat digunakan oleh pengguna. untuk menjelajah dan menemukan fitur yang ingin digunakan</p>
        </div>
        <div class="card-view2">
            <img src="<?= base_url('/assets/image3.png') ?>" alt="image1">
            <p>Halaman yang dapat digunakan pengguna untuk mengetahui penjelasan atau informasi singkat yang dapat diketahui pengguna mengenai tempat yang ingin dikunjungi</p>
    </div>
</section>
</body>

<!-- <!DOCTYPE html>
<html>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device">
    </html> -->