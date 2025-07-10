<?php
namespace App\Models;
use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'isi', 'slug', 'gambar'];// Kolom yang diizinkan untuk update
    protected $useTimestamps = false;  // Jika kamu menggunakan timestamp otomatis

}
