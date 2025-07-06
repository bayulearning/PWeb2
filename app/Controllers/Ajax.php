<?php

namespace App\Controllers;

use CodeIgniter\Controller;
// use CodeIgniter\HTTP\Request; // Tidak perlu di-use jika tidak digunakan secara eksplisit
// use CodeIgniter\HTTP\Response; // Tidak perlu di-use jika tidak digunakan secara eksplisit
use App\Models\ArtikelModel; // Pastikan namespace model kamu benar

class AjaxController extends Controller
{
    /**
     * @var ArtikelModel
     */
    protected $artikelModel; // Deklarasikan properti untuk menyimpan instance model

    // --- Constructor untuk inisialisasi model ---
    // Ini adalah praktik yang lebih baik daripada membuat instance model di setiap metode.
    // Model akan di-load satu kali saat controller diinstansiasi.
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // --- Metode Index (Opsional) ---
    // Metode ini akan dipanggil jika kamu mengakses URL 'ajax/' tanpa metode spesifik.
    // Jika controller ini murni untuk API AJAX dan tidak akan menampilkan halaman HTML,
    // metode ini bisa dihapus atau dialihkan.
    public function index()
    {
        // Biasanya, controller AJAX tidak memiliki view "index" yang berdiri sendiri
        // karena fungsinya adalah menyediakan data.
        // Jika kamu tetap ingin punya, pastikan view 'ajax/index' memang ada.
        return view('ajax/index');
    }

    // --- Metode getData untuk mengambil semua data artikel ---
    public function getData()
    {
        // Untuk memastikan ini adalah permintaan AJAX, meskipun tidak wajib di semua kasus.
        // Bisa digunakan untuk menghentikan akses langsung via browser.
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Akses ditolak.']);
        }

        $dataArtikel = $this->artikelModel->findAll();

        // Mengembalikan data dalam format JSON.
        // CodeIgniter 4 secara otomatis mengatur Content-Type menjadi application/json.
        return $this->response->setJSON($dataArtikel);
    }

    // --- Metode delete untuk menghapus artikel berdasarkan ID ---
    public function delete($id = null) // Tambahkan $id = null untuk penanganan ID kosong
    {
        // Pastikan ini adalah permintaan AJAX
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Akses ditolak.']);
        }

        // --- Validasi ID ---
        if (is_null($id)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'ID artikel tidak boleh kosong.']);
        }

        // --- Lakukan Operasi Delete ---
        $isDeleted = $this->artikelModel->delete($id); // $isDeleted akan berisi true/false

        // --- Siapkan Respons Berdasarkan Hasil Operasi ---
        if ($isDeleted) {
            $response = [
                'status' => 'success', // Gunakan 'success' untuk konsistensi dengan frontend
                'message' => 'Artikel berhasil dihapus!'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error', // Gunakan 'error' jika gagal
                'message' => 'Gagal menghapus artikel atau artikel tidak ditemukan.'
            ];
            // Set status HTTP code 404 (Not Found) jika artikel tidak ada atau 500 (Internal Server Error) jika gagal hapus
            return $this->response->setStatusCode(404)->setJSON($response);
        }
    }
}