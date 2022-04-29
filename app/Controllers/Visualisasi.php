<?php

namespace App\Controllers;

use App\Models\DataKecModel;

class Visualisasi extends BaseController
{
    protected $model;

    public function __construct()
    {
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        // header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        // $method = $_SERVER['REQUEST_METHOD'];
        // if ($method == "OPTIONS") {
        //     die();
        // }

        $this->model = new DataKecModel();
    }
    public function index()
    {
        $data = [
            'dda_kec' => $this->model->get_dda_kec(),
            'kategori' => $this->model->get_kategori(),
            'tahun' => $this->model->get_tahun(),
            'data_kec' => $this->tampilkan(),
        ];
        return view('visualisasi/index', $data);
    }

    function get_indikator()
    {
        if ($this->request->getVar('id_kategori')) {
            $indikator = $this->model->get_indikator($this->request->getVar('id_kategori'));

            $output = '<option value="" disabled selected hidden class="text-slate-500 text-sm">Pilih Indikator</option>';

            foreach ($indikator as $row) {
                $output .= '<option value="' . $row['id_indikator'] . '">' . $row['indikator'] . '</option>';
            }
            return $output;
        }
    }

    function get_variabel()
    {
        if ($this->request->getVar('id_indikator')) {
            $var = $this->model->get_variabel($this->request->getVar('id_indikator'));

            $output = '<option value="" disabled selected hidden class="text-slate-500 text-sm">Pilih Variabel</option>';

            foreach ($var as $row) {
                $output .= '<option value="' . $row['id_var'] . '">' . $row['variabel'] . '</option>';
            }
            return $output;
        }
    }

    public function tampilkan()
    {
        // Nilai default id_var dan id_tahun
        $id_var = 1;
        $id_tahun = 1;
        // Jika ada request, ambil id dari requstnya dan ubah nilainya menjadi integer
        if ($this->request->getPost()) {
            $id_var = intval($this->request->getPost('variabel'));
            $id_tahun = intval($this->request->getPost('tahun'));
        }
        var_dump($id_var, $id_tahun);
        // Ambil data dari database berdasarkan nilai id_var dan id_tahun
        $output = $this->model->get_data_kec($id_var, $id_tahun);
        return $output;
    }
}
