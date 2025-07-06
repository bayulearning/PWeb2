<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Menambahkan namespace untuk exception
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Warga';
        $artikel = $artikelModel = new ArtikelModel();
    
        // Jika pakai getArtikelWithKategoriQuery()
        $artikel = $artikelModel->getArtikelWithKategoriFiltered()->findAll();
    
        // Atau jika pakai filter
        // $data['artikel'] = $artikelModel->getArtikelWithKategoriFiltered($q, $kategori_id)->findAll();
    
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
    $data['artikel'] = $model->where('slug', $slug)->first();
    if (empty($data['artikel'])) {
    throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the article.');
    }
    $data['title'] = $data['artikel']['judul'];
    return view('artikel/detail', $data);
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
    
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
    
        // Ambil query builder
        $builder = $model->getArtikelWithKategoriFiltered($q, $kategori_id);
    
        // Karena paginate() tidak bisa langsung dari builder, kita gunakan model untuk pagination
        $data['artikel'] = $builder->paginate(2);
        $data['pager'] = $model->pager;
    
        $data['title'] = $title;
        $data['q'] = $q;
        $data['kategori_id'] = $kategori_id;
    
        // Ambil semua kategori untuk dropdown
        $kategoriModel = new \App\Models\KategoriModel();
        $data['kategori'] = $kategoriModel->asArray()->findAll();
    
        return view('artikel/admin_index', $data);
    }
    
    
// ... (methods add, edit, delete remain largely the same, but update to handle id_kategori)
public function add()
{
    // Load model dan service validasi
    $artikel = new ArtikelModel();
    $kategoriModel = new KategoriModel();
    $validation = \Config\Services::validation();

    // Atur rules validasi
    $validation->setRules([
        'judul'       => 'required',
        'id_kategori' => 'required|integer'
    ]);

    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/gambar', $fileName);

        $artikel->insert([
            'judul'       => $this->request->getPost('judul'),
            'isi'         => $this->request->getPost('isi'),
            'slug'        => url_title($this->request->getPost('judul'), '-', true),
            'gambar'      => $fileName,
            'id_kategori' => (int)$this->request->getPost('id_kategori'),
        ]);

        return redirect()->to('admin/artikel');
    }

    // Ambil daftar kategori untuk dropdown
    $kategori = $kategoriModel->asArray()->findAll();
    $title = "Tambah Artikel";

    return view('artikel/form_add', compact('title', 'kategori'));
}


public function edit($id)
{
    $artikel = new ArtikelModel();
    $validation = \Config\Services::validation();

    // Validasi input
    $validation->setRules([
        'judul' => 'required',
        'id_kategori' => 'required|integer',
    ]);

    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        // Ambil data lama untuk cek gambar sebelumnya
        $dataLama = $artikel->find($id);

        // Siapkan data update
        $updateData = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul'), '-', true),
            'id_kategori' => (int)$this->request->getPost('id_kategori'),
        ];

        // Cek apakah ada file gambar diupload
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/gambar', $namaGambar);

            // Hapus gambar lama jika ada
            if (!empty($dataLama['gambar']) && file_exists(ROOTPATH . 'public/gambar/' . $dataLama['gambar'])) {
                unlink(ROOTPATH . 'public/gambar/' . $dataLama['gambar']);
            }

            $updateData['gambar'] = $namaGambar;
        }

        // Lakukan update
        $artikel->update($id, $updateData);
        return redirect('admin/artikel');
    }

    // Ambil data lama + kategori untuk form
    $data = $artikel->where('id', $id)->first();
    $kategoriModel = new \App\Models\KategoriModel();
    $kategori = $kategoriModel->findAll();
    $title = "Edit Artikel";

    return view('artikel/edit', compact('title', 'data', 'kategori'));
}



    
    // $data['artikel'] = $model->find($id);
    // $data['kategori'] = $kategoriModel->findAll();
    // $data['title'] = 'Edit Artikel';
    // $db = \Config\Database::connect();

    
    // return view('artikel/edit', $data);


    // Menghapus artikel
    public function delete($id)
    {
        $model = new ArtikelModel();
        $artikel = $model->where('id', $id)->first();

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Menghapus artikel
        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }

  
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

