<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Menambahkan namespace untuk exception

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll(); // Mengambil semua artikel
        return view('artikel/index', compact('artikel', 'title')); // Mengirim data ke view
    }

       public function indexadmin()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll(); // Mengambil semua artikel
        return view('artikel/index_admin', compact('artikel', 'title')); // Mengirim data ke view
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        // Mencari artikel berdasarkan slug
        $artikel = $model->where('slug', $slug)->first();

        // Jika artikel tidak ditemukan, tampilkan halaman error 404
        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Menetapkan judul dari artikel yang ditemukan
        $title = $artikel['judul'];

        // Mengirimkan data artikel dan title ke view
        return view('artikel/detail', compact('artikel', 'title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll(); // Mengambil semua artikel
        return view('artikel/admin_index', compact('artikel', 'title')); // Mengirim data ke view admin
    }

    public function add() { // validasi data. 
    $validation = \Config\Services::validation(); 
    $validation->setRules(['judul' => 'required']); 
    $isDataValid = $validation->withRequest($this->request)->run(); 
    if ($isDataValid) { 
        $artikel = new ArtikelModel(); 
        $artikel->insert([ 'judul' => $this->request->getPost('judul'),
        'isi' => $this->request->getPost('isi'), 'slug' => url_title($this->request->getPost('judul')), ]); 
        return redirect('admin/artikel'); 
    } $title = "Tambah Artikel"; 
    return view('artikel/form_add', compact('title')); }

public function edit($id)
{
    // Membuat instance model ArtikelModel
    $model = new ArtikelModel();
    
    // Cari artikel berdasarkan ID
    $artikel = $model->find($id);

    // Jika artikel tidak ditemukan, tampilkan error
    if (!$artikel) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // Cek jika form disubmit (POST)
    if ($this->request->getMethod() === 'post') {

        // Validasi input dari form
        $validationRules = [
            'judul' => 'required|min_length[3]',
            'isi' => 'required',
        ];

        // Cek apakah validasi berhasil
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, tampilkan form edit dengan pesan error
            return view('artikel/edit', [
                'artikel' => $artikel,
                'title' => 'Edit Artikel',
                'validation' => $this->validator
            ]);
        }

        // Ambil data dari form
        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
        ];

        // Cek apakah gambar baru di-upload
        if ($gambar = $this->request->getFile('gambar')) {
            if ($gambar->isValid()) {
                // Pindahkan gambar ke folder uploads
                $gambar->move(WRITEPATH . 'uploads');
                $data['gambar'] = $gambar->getName();  // Simpan nama gambar di database
            }
        } else {
            // Jika gambar tidak diubah, gunakan gambar lama
            $data['gambar'] = $artikel['gambar'];  // Gunakan gambar lama yang ada di database
        }

        // Debug: Log data yang akan diupdate
        log_message('debug', 'Data yang akan diupdate: ' . print_r($data, true));

        // Update artikel berdasarkan ID
        if ($model->update($id, $data)) {
            // Setelah artikel berhasil diupdate, redirect ke halaman daftar artikel
            return redirect()->to('/admin/artikel')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            // Jika update gagal, tampilkan pesan error
            log_message('error', 'Gagal mengupdate artikel dengan ID: ' . $id);
            return redirect()->back()->with('error', 'Gagal memperbarui artikel. Coba lagi.');
        }
    }

    // Jika form belum disubmit, tampilkan form edit dengan data artikel
    $title = 'Edit Artikel: ' . $artikel['judul'];
    return view('artikel/edit', compact('artikel', 'title'));
}


    // Menghapus artikel
    public function delete($id)
    {
        $model = new ArtikelModel();
        $artikel = $model->where('id', $id)->first();

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Menghapus artikel
        $model->delete($artikel['id']);
        return redirect()->to('/admin/artikel');
    }

    // public function edit($id) { $artikel = new ArtikelModel(); // validasi data. 
    // $validation = \Config\Services::validation(); 
    // $validation->setRules(['judul' => 'required']); 
    // $isDataValid = $validation->withRequest($this->request)->run(); 
    // if ($isDataValid) { 
    //     $artikel->update($id, [ 'judul' => $this->request->getPost('judul'), 'isi' => $this->request->getPost('isi'), ]); 
    //     return redirect('admin/artikel'); } // ambil data lama 
    //     $data = $artikel->where('id', $id)->first(); 
    //     $title = "Edit Artikel"; return view('artikel/edit', compact('title', 'data')); }
}
