<?php

namespace App\Controllers;

use App\Models\DataKecModel;

class Visualisasi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new DataKecModel();
    }
    public function index()
    {

        $data = [
            // 'dda_kec' => $this->model->get_dda_kec(),
            'kategori' => $this->model->get_kategori(),
            'tahun' => $this->model->get_tahun(),
            'output' => $this->tampilkan(),
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

        // Load file Geojson
        $filename = base_url('assets/agamkab.geojson');
        $file = file_get_contents($filename);
        $file = json_decode($file);

        // Mengambil setiap features (data spasial tiap kecamatan) pada file geojson
        $features = $file->features;

        // Membrikan nilai pada setiap feature/kecamatan berdasarkan id_var dan id_tahun yang direquest
        foreach ($features as $feature) {
            //Mengambil properti kode kecamatan dari setiap feature
            $kode_kec = $feature->properties->kode;
            // Mengambil data berdasarkan kode_kecamatan, id_var, dan id_tahun yang direquest
            $data = $this->model
                ->join('tbl_kecamatan', 'tbl_kecamatan.id_kec=tbl_data_kec.id_kec')
                ->where('id_var', $id_var)
                ->where('id_tahun', $id_tahun)
                ->where('kd_kec', $kode_kec)
                ->first();
            // Memberikan data nilai dari database pada setiap feature
            if ($data) {
                $feature->properties->nilai = $data['nilai'];
            }
        }

        $nilaiMax = $this->model
            ->select('MAX(nilai) AS nilai')
            ->where('id_var', $id_var)
            ->where('id_tahun', $id_tahun)
            ->first()['nilai'];

        // Ambil data dari database berdasarkan nilai id_var dan id_tahun
        $result = $this->model->get_data_kec($id_var, $id_tahun);

        $output = ['maps' => $features, 'result' => $result, 'nilai_max' => $nilaiMax];
        return $output;
    }
}
