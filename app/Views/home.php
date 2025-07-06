<?= $this->include('template/header')?>
<?= $this->extend('layout/main') ?> 
<?= $this->section('content') ?> 
<div>
    <h1>
        <?= $title; ?>
    </h1> 
    <hr> 
    <p>
        <?= $content; ?>
    </p> 
</div>

<div class="about-web">
    <h1>Selamat Datang di Website Wargaku</h1>

    <div class="single-image-carousel">
        <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button>

        <img id="carouselImage" src="<?= base_url('gambar/many_fruits.jpg') ?>" alt="Buah">

        <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button>
    </div>
</div>
<br>
<div class="home-content">
    <p>
        Website ini merupakan portal informasi dan layanan resmi Desa Sukamaju, Kecamatan Sukamakmur, Kabupaten Sejahtera.
        Melalui situs ini, masyarakat dapat mengakses berita terbaru, informasi desa, serta layanan administrasi secara online.
    </p>

    <h2>Profil Singkat Desa</h2>

    <div class="profil_desa">
        <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button>

        <img id="carouselImage" src="<?= base_url('gambar/many_fruits.jpg') ?>" alt="Buah">

        <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button>
    </div>
    <p>
        Desa Sukamaju terletak di wilayah dataran tinggi dengan jumlah penduduk sekitar 3.500 jiwa. Desa ini memiliki potensi unggulan di sektor pertanian dan pariwisata alam.
    </p>

    <h2>Galeri Desa</h2>
    <div class="galeri_desa">
        <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button>

        <img id="carouselImage" src="<?= base_url('gambar/many_fruits.jpg') ?>" alt="Buah">

        <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button>
    </div>
</div>


<?= $this->endSection() ?>
<script>
    const images = [
        "<?= base_url('gambar/many_fruits.jpg') ?>",
        "<?= base_url('gambar/OIP.jpg') ?>",
        "<?= base_url('gambar/maxresdefault.png') ?>"
    ];

    let currentImageIndex = 0;

    function showNextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        updateImage();
    }

    function showPreviousImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updateImage();
    }

    function updateImage() {
        document.getElementById('carouselImage').src = images[currentImageIndex];
    }
</script>

<?= $this->include('template/footer_content')?>