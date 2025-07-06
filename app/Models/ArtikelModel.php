<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'isi', 'slug', 'gambar','id_kategori'];// Kolom yang diizinkan untuk update
    protected $useTimestamps = true;  // Jika kamu menggunakan timestamp otomatis

 // Dalam ArtikelModel.php
public function getArtikelWithKategoriQuery()
{
    return $this->select('artikel.*, kategori.nama_kategori')
                ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');
}

public function getArtikelWithKategoriFiltered($q = '', $kategori_id = '')
{
    $builder = $this->select('artikel.*, kategori.nama_kategori')
                    ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

    if (!empty($q)) {
        $builder->like('artikel.judul', $q);
    }

    if (!empty($kategori_id)) {
        $builder->where('artikel.id_kategori', $kategori_id);
    }

    return $builder;
}


}
