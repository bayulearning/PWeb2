<?php

namespace App\Controllers;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    public function index()
    {
        $model = new BukuModel();
        $data['buku'] = $model->findAll();
        return view('buku/index', $data);
    }

    public function detail($id)
    {
        $model = new BukuModel();
        $data['buku'] = $model->find($id);
        return view('buku/detail', $data);
    }

    public function upload()
    {
        return view('buku/upload');
    }

    public function save()
    {
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);

            $model = new BukuModel();
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $newName,
            ]);

            return redirect()->to('/buku');
        }
    }
}
