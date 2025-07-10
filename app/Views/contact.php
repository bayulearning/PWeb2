<?= $this->include('template/header'); ?>
<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="UTF-8"> 
    <title><?= $title ?? 'My Website' ?></title> 
    <link rel="stylesheet" href="<?= base_url('/style.css');?>"> 
    </head> 
<div class="deskripsi">
    <h1 class="judul-title"><?= $title; ?></h1> <hr> 
    <p><?= $content; ?></p> 
</div>

<div class="kontak">
    <h2>Hubungi Kami</h2>
    <p>Jika Anda memiliki pertanyaan, saran, atau ingin bekerja sama, silakan hubungi kami melalui form berikut atau media sosial.</p>

    <form action="#" method="post" class="form-kontak">
        <div>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="pesan">Pesan:</label><br>
            <textarea id="pesan" name="pesan" rows="5" required></textarea>
        </div>
        <button type="submit">Kirim Pesan</button>
    </form>

    <div class="info-kontak">
        <h3>Informasi Kontak</h3>
        <p><strong>Alamat:</strong> Jl. Contoh No.123, Jakarta</p>
        <p><strong>Email:</strong> kontak@contoh.com</p>
        <p><strong>Telepon:</strong> +62 812-3456-7890</p>

        <h4>Ikuti Kami:</h4>
        <p>
    <a href="https://instagram.com"><i class="fab fa-instagram"></i> Instagram</a> |
    <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a> |
    <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
</p>

    </div>
</div>

<?= $this->include('template/footer_content'); ?>