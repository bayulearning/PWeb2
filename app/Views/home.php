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
<script src="https://unpkg.com/scrollreveal"></script>
    <h1>Selamat Datang di Website Wargaku</h1>
    <p>
        Website ini merupakan portal informasi dan layanan resmi Desa Sukamaju, Kecamatan Sukamakmur, Kabupaten Sejahtera.
        Melalui situs ini, masyarakat dapat mengakses berita terbaru, informasi desa, serta layanan administrasi secara online.
    </p>
</div>
<br>
<div class="home-content">
    <div class="isi-data">

    
        <div class="single-image-carousel">
        <!-- <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button> -->

        <img id="carouselImage" src="<?= base_url('gambar/image1.jpg') ?>" alt="">

        <!-- <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button> -->
        </div>
   

        <h2>Profil Singkat Desa</h2>

    <!-- <div class="profil_desa">
        <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button>

        <img id="carouselImage" src="" alt="Buah">

        <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button>
    </div> -->
        <p>
            Desa Sukamaju terletak di wilayah dataran tinggi dengan jumlah penduduk sekitar 80 KK. <br> 
            Desa ini memiliki potensi unggulan di sektor pertanian dan pariwisata alam.
        </p>

            <h2>Galeri Desa</h2>
        <div class="galeri_desa">
            <button class="scroll-btn left" onclick="showPreviousImage()">&#10094;</button>

            <img id="galeri_desa" src="<?= base_url('gambar/desa 1.jpg') ?>" alt="">

            <button class="scroll-btn right" onclick="showNextImage()">&#10095;</button>
            
        </div>
        <p>Beberapa dokumentasi</p>
    </div>
</div>
<div class="home-pengumuman"> 
                <h3 class="title">Papan Pengumuman</h3> 
                <p>Informasi Terbaru dari pengurus RT. klik untuk melihat detail</p> 
                <?= view_cell('App\\Cells\\ArtikelTerkini::detail') ?> 
            </div> 

            <?= $this->endSection() ?>

<?= $this->include('template/footer_content') ?>

<!-- Masukkan library ScrollReveal di bawah -->
<script src="https://unpkg.com/scrollreveal"></script>

<script>
  // Fungsi galeri
  const images = [
      "<?= base_url('gambar/desa 1.jpg') ?>",
      "<?= base_url('gambar/desa 4.jpeg') ?>",
      "<?= base_url('gambar/desa 5.jpg') ?>",
      "<?= base_url('gambar/desa3.jpg') ?>"
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
      document.getElementById('galeri_desa').src = images[currentImageIndex];
  }

  // ScrollReveal efek
  document.addEventListener("DOMContentLoaded", function () {
    const scrollRevealOption = {
      distance: "50px",
      origin: "bottom",
      duration: 1000,
      delay: 200,
      easing: "ease-in-out",
    };

    ScrollReveal().reveal(".about-web h1", {
      ...scrollRevealOption,
      delay: 300,
    });

    ScrollReveal().reveal(".about-web p", {
      ...scrollRevealOption,
      delay: 500,
    });

    ScrollReveal().reveal(".home-content p", {
      ...scrollRevealOption,
      delay: 300,
    });

    ScrollReveal().reveal(".home-content h2", {
      ...scrollRevealOption,
      delay: 500,
    });

    ScrollReveal().reveal(".home-pengumuman h3", {
      ...scrollRevealOption,
      delay: 300,
    });

    ScrollReveal().reveal(".home-pengumuman p", {
      ...scrollRevealOption,
      delay: 500,
    });

    ScrollReveal().reveal(".home-pengumuman a", {
      ...scrollRevealOption,
      delay: 500,
    });
  });
</script>


<?= $this->include('template/footer_content')?>