<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Bayu Winata',
            'tes' => ['satu, dua, tiga'],
        ];
        return view('pages/home' , $data);    
     }
    
    public function about()
    {
        $data = [
            'title' => 'About | Bayu Winata',
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'contact | Bayu Winata',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Jend. Sudirman No. 10',
                    'kota' => 'Jakarta'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Jend. Sudirman No. 50',
                    'kota' => 'Jakarta'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }

}