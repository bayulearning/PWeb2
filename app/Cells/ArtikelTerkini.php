<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\BeritaModel;
class ArtikelTerkini extends Cell
{
    public function render(): string
    {
        $model = new BeritaModel(); 
        $artikel = $model->orderBy('id', 'DESC')->limit(5)->findAll(); 
        return view('components/artikel_terkini', ['pengumuman' => $artikel]);
    }

    public function detail(): string
    {
        $model = new BeritaModel(); 
        $artikel = $model->orderBy('id', 'DESC')->limit(5)->findAll(); 
        return view('components/artikel_terkini_user', ['pengumuman' => $artikel]);
    }
    
}
