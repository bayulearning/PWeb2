<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'isi', 'gambar'];  // Kolom yang diizinkan untuk update
    protected $useTimestamps = true;  // Jika kamu menggunakan timestamp otomatis
}
