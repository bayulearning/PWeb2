<?= $this->include('template/admin_header'); ?>

<h2><?= esc($title); ?></h2>

<div class="row mb-3">
  <div class="col-md-6">
    <form method="get" class="form-inline">
      <input 
        type="text" 
        name="q" 
        value="<?= esc($q); ?>" 
        placeholder="Cari judul artikel" 
        class="form-control mr-2"
      >

      <select name="kategori_id" class="form-control mr-2">
        <option value="">Semua Kategori</option>
        <?php if (!empty($kategori)): ?>
            <?php foreach ($kategori as $k): ?>
    <option value="<?= esc($k['id_kategori']); ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
        <?= esc($k['nama_kategori']); ?>
    </option>
<?php endforeach; ?>
        <?php endif; ?>
      </select>

      <input type="submit" value="Cari" class="btn btn-primary">
    </form>
  </div>
</div>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($artikel)): ?>
      <?php foreach ($artikel as $row): ?>
        <tr>
          <td><?= esc($row['id']); ?></td>
          <td>
            <b><?= esc($row['judul']); ?></b>
            <p><small><?= esc(substr($row['isi'], 0, 50)); ?>...</small></p>
          </td>
          <td><?= esc($row['nama_kategori']); ?></td>
          <td><?= esc($row['status']); ?></td>
          <td>
            <a 
              class="btn btn-sm btn-info" 
              href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>"
            >
              Ubah
            </a>
            <a 
              class="btn btn-sm btn-danger" 
              onclick="return confirm('Yakin menghapus data?');" 
              href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>"></a>
              Hapus
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script>
$(document).ready(function() {
    // --- Fungsi untuk menampilkan pesan loading ---
    // Fungsi ini akan menampilkan pesan "Loading data..." di dalam tabel.
    // Class "text-center" ditambahkan untuk merapikan teks di tengah kolom.
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center">Loading data...</td></tr>');
    }

    // --- Fungsi untuk memuat data dari server (AJAX GET) ---
    // Fungsi ini bertanggung jawab untuk mengambil data artikel dari backend menggunakan AJAX.
    function loadData() {
        showLoadingMessage(); // Tampilkan pesan loading sebelum mengambil data

        $.ajax({
            url: "<?= base_url('ajax/getData') ?>", // URL ke controller/metode di CodeIgniter yang menyediakan data
            method: "GET",                          // Menggunakan metode HTTP GET untuk mengambil data
            dataType: "json",                       // Mengharapkan respons dari server dalam format JSON
            success: function(data) {
                // Callback yang dijalankan jika permintaan AJAX berhasil.
                // Memastikan data yang diterima adalah array dan tidak kosong.
                if (Array.isArray(data) && data.length > 0) {
                    let tableBody = ""; // Variabel untuk membangun baris tabel HTML

                    // Iterasi (loop) melalui setiap objek data yang diterima
                    data.forEach(function(row) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + row.id + '</td>';
                        tableBody += '<td>' + row.judul + '</td>';
                        // Kolom 'Status' yang masih placeholder, bisa diisi nanti dari data jika ada
                        tableBody += '<td><span class="status">---</span></td>';
                        tableBody += '<td>';
                        // Tombol 'Edit': Menggunakan base_url CodeIgniter untuk URL yang benar
                        // Menambahkan class Bootstrap 'btn-sm' dan 'me-2' untuk tampilan
                        tableBody += '<a href="<?= base_url('artikel/edit/') ?>' + row.id + '" class="btn btn-primary btn-sm me-2">Edit</a>';
                        // Tombol 'Delete': Diubah dari <a> menjadi <button> karena ini adalah aksi, bukan navigasi.
                        // Atribut 'data-id' digunakan untuk menyimpan ID artikel.
                        tableBody += '<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' + row.id + '">Delete</button>';
                        tableBody += '</td>';
                        tableBody += '</tr>';
                    });
                    // Memasukkan HTML yang sudah dibuat ke dalam tbody tabel
                    $('#artikelTable tbody').html(tableBody);
                } else {
                    // Jika tidak ada data atau data kosong
                    $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center">Tidak ada data ditemukan.</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Callback yang dijalankan jika permintaan AJAX gagal (misal: error server, jaringan)
                console.error("AJAX Error:", textStatus, errorThrown); // Log error ke console browser
                $('#artikelTable tbody').html('<tr><td colspan="4" class="text-center text-danger">Gagal memuat data. Silakan coba lagi.</td></tr>');
            }
        });
    }

    // --- Panggil fungsi loadData saat halaman pertama kali dimuat ---
    loadData();

    // --- Implementasi aksi untuk tombol 'Delete' (AJAX POST) ---
    // Menggunakan $(document).on() untuk event delegation. Ini penting karena
    // tombol 'Delete' dibuat secara dinamis setelah data dimuat.
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault(); // Mencegah perilaku default dari tombol (jika itu <a>)

        const id = $(this).data('id'); // Mengambil ID artikel dari atribut 'data-id' tombol

        // Konfirmasi penghapusan kepada pengguna
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini dengan ID: ' + id + '?')) {
            $.ajax({
                url: "<?= base_url('artikel/delete/') ?>" + id, // URL ke controller/metode delete di CodeIgniter
                method: "POST", // Sebaiknya gunakan POST atau DELETE untuk operasi penghapusan data
                dataType: "json", // Mengharapkan respons dari server dalam format JSON
                success: function(response) {
                    // Callback jika penghapusan berhasil.
                    // Diasumsikan server mengembalikan objek JSON dengan 'status' dan 'message'.
                    if (response.status === 'success') {
                        alert(response.message || 'Artikel berhasil dihapus!'); // Tampilkan pesan sukses
                        loadData(); // Muat ulang data untuk memperbarui tampilan tabel
                    } else {
                        alert(response.message || 'Gagal menghapus artikel.'); // Tampilkan pesan gagal
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Callback jika penghapusan gagal
                    console.error("AJAX Delete Error:", textStatus, errorThrown); // Log error
                    alert('Terjadi kesalahan saat menghapus artikel: ' + textStatus); // Beri tahu pengguna
                }
            });
        }
    });
});
</script>

<?= $pager->only(['q', 'kategori_id'])->links(); ?>

<?= $this->include('template/admin_footer'); ?>
