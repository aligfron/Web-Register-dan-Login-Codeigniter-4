<?php

namespace App\Controllers;

use App\Models\emailModel;
use App\Models\userModel;
use PDO;

class Home extends BaseController
{
    protected $userModel, $emailModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }
    public function index()
    {
        $user = user_id();
        $user = $this->userModel->find($user);
        
        $data = [
            'title' => 'Profil',
            'user' => $user
        ];



        return view('index', $data);
    }
    function emailtampil($user1)
    {
        $db = new PDO('mysql:host=localhost;dbname=ci4_login_shield', 'root', '');
        
        $q = $db->prepare("SELECT * FROM auth_identities where user_id = '$user1'");
        $q->execute();
        return @$q->fetchAll();
    }
    public function lengkapi(): string
    {
        $user = user_id();
        $user = $this->userModel->find($user);
        $data = [
            'title' => 'Profil',
            'user' => $user
        ];
        return view('lengkapi', $data);
    }
    public function lengkapiproses($id)
    {
        $user = user_id();
        $user = $this->userModel->find($user);
        $filegambar = $this->request->getFile('gambar');
        $filegambar->move('img');
        $namagambar = $filegambar->getName();
        $nama          = $this->request->getVar('nama');
        $abc = $this->userModel->where('id', $id);
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $builder->update(
            [
                'id' => $id,
                'nama'           => $nama,
                'gambar'       => $namagambar

            ]);
            session()->setFlashdata('pesan', 'Data Berhasil di ubah');
        $data = [
            'title' => 'Profil',
            'user' => $user
        ];
        return redirect()->to('/Home/index');
    }
    
}
