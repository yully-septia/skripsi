<?php

namespace App\Controllers;

use App\Models\DataKecModel;

class Coba extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper('form');
        $this->model = new DataKecModel();
    }
    public function index()
    {
        // $variabel = $this->request->getVar('variabel');
        // $tahun = $this->request->getVar('tahun');

        // if ($variabel && $tahun) {
        //     $query = $this->model->get_data_kec($variabel, $tahun);
        // } else {
        //     $query = $this->model;
        // }


        $data = [
            'dda_kec' => $this->model->get_dda_kec(),
            'kategori' => $this->dropdown_kategori(),
            'tahun' => $this->dropdown_tahun(),
            'data_kec' => $this->tampilkan(),
            // 'data_kec' => $query,
            // 'data_kec' => $this->model->get_data_kec(),
        ];
        return view('coba-geojson/coba', $data);
    }

    function dropdown_kategori()
    {
        $data_kategori = $this->model->get_kategori();
        foreach ($data_kategori as $row) {
            $kategori[$row['id_kategori']] = $row['kategori'];
        }
        return $kategori;
    }
    function dropdown_tahun()
    {
        $data_tahun = $this->model->get_tahun();
        foreach ($data_tahun as $row) {
            $tahun[$row['id_tahun']] = $row['tahun'];
        }
        return $tahun;
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
        $id_var = 1;
        $id_tahun = 2;
        if ($this->request->getPost()) {
            global $id_var, $id_tahun;
            $id_var = $this->request->getPost('variabel');
            $id_tahun = $this->request->getPost('tahun');
        }
        $output = $this->model->get_data_kec($id_var, $id_tahun);
        return $output;
    }
}
