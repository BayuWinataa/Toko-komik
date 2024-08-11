<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function home()
    {
        $data = [
            'title' => 'Toko Komik',
            'komik' => $this->komikModel->getKomik() 
        ];

        return view('komik/home', $data);
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik() 
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);

        if (empty($komik)) {
            throw new PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan');
        }

        $data = [
            'title' => $komik['judul'],
            'komik' => $komik
        ];

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => session()->getFlashdata('validation')
        ];
        return view('Komik/create', $data);
    }

    public function save(){

        //validasi input data
if(!$this->validate([
    "judul" => [
        "rules" => "required|is_unique[komik.judul]",
        "errors" =>[
            "required"=>"{field} komik harus di isi",
            "is_unique"=> "{field} komik sudah terdaftar di database"
        ]
        ],
        //meng upload file
        "sampul" => [
            "rules" => "max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]", 
            //menampilkan pesan pesan errornya
            "errors" =>[
                "max_size" => "Ukuran gambar terlalu besar",
                "is_image" => "yang anda pilih bukan gambar",
                "mime_in" => "yang anda pilih bukan gambar",

            ]
        ]
])){
    // Tangkap pesan kesalahan ke variabel validation
    // $validation = \Config\Services::validation();
        //kalau tidak tervalidasi
    return redirect()->back()->withInput()->with("errors", $this->validator->getErrors());
   
}
            //ambil gambar sesuai dengan keinginan kita
            $filsampul = $this->request->getFile("sampul");
            //apakah user tidak ada meng upload gambar
            if($filsampul->getError() == 4)
            {
                $namaSampul = "default.jpg";
            }
            //jika ada user meng upload file / gambar
            else{
                //generate nama sampul random
                    $namaSampul = $filsampul->getRandomName();
                        //pindahkan file / gambar ke folder img
                                $filsampul->move("img", $namaSampul);
            }
        $slug = url_title($this->request->getVar("judul"), "-", true);
        $this->komikModel->save([
        "judul" =>$this->request->getVar("judul"),
        "slug" => $slug,
        "penulis" =>$this->request->getVar("penulis"),
        "penerbit" =>$this->request->getVar("penerbit"),
        "sampul" =>$namaSampul
      ]);

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

    return redirect()->to('/Komik');
}



    // public function delete($id)
    // {
    //     // cek gambar default
    //     $komik = $this->komikModel->getKomik($id);
    //     if ($komik['sampul'] != 'default.jpg') {
    //         unlink('img/' . $komik['sampul']);
    //     }
        
    //     $this->komikModel->delete($id);
    //     session()->setFlashdata('pesan', 'Data Berhasil dihapus');
    //     return redirect()->to('/Komik');
    // }

public function delete($id)
{
    log_message('info', 'Memulai proses hapus untuk ID: ' . $id);

    // cek apakah komik dengan id tersebut ada
    $komik = $this->komikModel->find($id);
    if ($komik) {
        log_message('info', 'Komik ditemukan: ' . json_encode($komik));

        // cek apakah sampul bukan gambar default
        if ($komik['sampul'] != 'default.jpg') {
            log_message('info', 'Sampul bukan default, akan dihapus: ' . $komik['sampul']);

            // hapus gambar
            if (file_exists('img/' . $komik['sampul'])) {
                unlink('img/' . $komik['sampul']);
            } else {
                log_message('error', 'File sampul tidak ditemukan: img/' . $komik['sampul']);
            }
        }

        // hapus data komik
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
    } else {
        log_message('error', 'Data komik dengan id ' . $id . ' tidak ditemukan.');
        session()->setFlashdata('error', 'Data tidak ditemukan');
    }

    return redirect()->to('/Komik');
}




    // public function edit($slug)
    // {
    //     $data = [
    //         'title' => 'Form Ubah Data Komik',
    //         'validation' => session()->getFlashdata('validation'),
    //         'komik' => $this->komikModel->getKomik($slug)
    //     ];
    //     return view('Komik/edit', $data);
    // }

    public function edit($slug)
{
    $data = [
        'title' => 'Form Ubah Data Komik',
        'validation' => \Config\Services::validation(),
        'komik' => $this->komikModel->getKomik($slug)
    ];
    return view('Komik/edit', $data);
}


    public function update($id)
    {
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
            'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'max_size' => 'Ukuran gambar terlalu besar',
                'is_image' => 'Yang anda pilih bukan gambar',
                'mime_in' => 'Yang anda pilih bukan gambar'
            ]
        ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Komik/edit/' . $id)->withInput()->with('validation', $validation);
            
            // return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
            
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        
        if ($fileSampul->getError()==4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            unlink('img/' . $this->request->getVar('sampulLama'));
        }
            

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'slug' => $slug,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah');

        return redirect()->to('/Komik');
    }
}