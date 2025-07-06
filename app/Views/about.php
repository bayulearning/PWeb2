<?= $this->include('template/header')?>
<?= $this->section('content') ?> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> 
    <title><?= $title ?? 'My Website' ?></title> 
    <link rel="stylesheet" href="<?= base_url('/style.css');?>"> 
    </head> 
<body>
    <div>
        <h1><?= $title; ?></h1> 
        <hr> 
        <p><?= $content; ?></p> 
    </div>
    
    <div class="about-content">
        <h1>Tentang Aplikasi</h1>
        <hr>
        <p>
            <strong>Nama Aplikasi:</strong> Wargaku<br>
            <strong>Versi:</strong> 1.0.0<br>
            <strong>Dirilis:</strong> Juli 2025
        </p>
        
        <h2>Deskripsi</h2>
        <p>
            Wargaku adalah aplikasi website sederhana untuk menampilkan data warga yang tinggal di lingkungan RT 15 RW 20
            Aplikasi ini dibuat dalam rangka menyortir data agar para warga dapat mengingat para tetangganya. yang mungkin jika ada
            yang menanyakan alamat atau nama sesorang bisa sangat membantu mempercepat menemukannya 
        </p>
        
        <h2>Fitur Unggulan</h2>
        <ul>
            <li>Melihat Kegiatan Rutin RT 15</li>
            <li>Mencari data warga RT 15</li>
            <li>Lihat Berita terkini disekitar warga RT 15 </li>
            <li>Membuat laporan langsung agar Ketua RT dapat menerimanya secara realtime</li>
        </ul>
        
        <h2>Tujuan</h2>
        <p>
            Aplikasi ini dibuat untuk mempermudah mengelola kegiatan serta informasi warga yang ada di RT 15
        </p>
        
        <h2>Tentang Pengembang</h2>
        <p>
            Aplikasi ini dikembangkan oleh <strong>Kelompok 7</strong> sebagai bagian dari proyek pembelajaran dan implementasi teknologi CodeIgniter 4 untuk aplikasi berbasis web.
        </p>
    </div>
</body>
    
    
<?= $this->include('template/footer_content')?>