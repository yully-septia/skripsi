<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CdaModel;
use App\Models\KdaModel;

class Data extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new KdaModel();
    }
    public function index()
    {
        $data_kec = $this->model
            ->select('id_data_kec, variabel, tahun, kecamatan, nilai')
            ->join('tbl_variabel', 'tbl_variabel.id_var=tbl_data_kec.id_var')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun=tbl_data_kec.id_tahun')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kec=tbl_data_kec.id_kec')
            ->paginate(6, 'tbl_data_kec');

        $data = [
            'currentAdminMenu' => 'data-kda',
            'data_kec' => $data_kec,
            'pager' => $this->model->pager,
        ];
        return view('admin/data-kda/index', $data);
    }

    function edit($id_data_kda)
    {
        $data_kda = $this->model->get_data($id_data_kda);
        if (empty($data_kda)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }

        $data = [
            'currentAdminMenu' => 'data-kda',
            'id' => $id_data_kda,
            'data_kda' => $data_kda,
            'kategori' => $this->model->get_kategori(),
            'tahun' => $this->model->get_tahun(),
            'kec' => $this->model->get_kec(),
        ];
        return view('admin/data-kda/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nilai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->model->update($id, [
            'kategori' => $this->request->getVar('kategori'),
            'indikator' => $this->request->getVar('indikator'),
            'variabel' => $this->request->getVar('variabel'),
            'tahun' => $this->request->getVar('tahun'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'nilai' => $this->request->getVar('nilai')
        ]);
        session()->setFlashdata('message', 'Update Data Berhasil');
        return redirect()->to('/data');
    }
    // public function create()
    // {
    //     $data = [
    //         'currentAdminMenu' => 'data-kda',
    //         'data_kec' => $this->model->get_data_kda(),
    //         'kategori' => $this->model->get_kategori(),
    //         'tahun' => $this->model->get_tahun(),
    //         'kec' => $this->model->get_kec(),
    //     ];
    //     return view('admin/data-kda/create', $data);
    // }

    // public function store()
    // {
    //     if (!$this->validate([
    //         'waktu' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'nilai' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ]
    //     ])) {
    //         session()->setFlashdata('error', $this->validator->listErrors());
    //         return redirect()->back()->withInput();
    //     }

    //     $this->model->insert([
    //         'time' => $this->request->getVar('waktu'),
    //         'value' => $this->request->getVar('nilai')
    //     ]);
    //     session()->setFlashdata('message', 'Tambah Data Impor Berhasil');
    //     return redirect()->to('/data');
    // }

    // function edit($id)
    // {
    //     $dataImport = $this->model->find($id);
    //     if (empty($dataImport)) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Impor Tidak ditemukan !');
    //     }
    //     $data['import'] = $dataImport;
    //     return view('dashboard/edit', $data);
    // }

    // public function update($id)
    // {
    //     if (!$this->validate([
    //         'waktu' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ],
    //         'nilai' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Harus diisi'
    //             ]
    //         ]
    //     ])) {
    //         session()->setFlashdata('error', $this->validator->listErrors());
    //         return redirect()->back();
    //     }

    //     $this->model->update($id, [
    //         'time' => $this->request->getVar('waktu'),
    //         'value' => $this->request->getVar('nilai')
    //     ]);
    //     session()->setFlashdata('message', 'Update Data Impor Berhasil');
    //     return redirect()->to('/data');
    // }

    // function delete($id)
    // {
    //     $dataImpor = $this->model->find($id);
    //     if (empty($dataImpor)) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
    //     }
    //     $this->model->delete($id);
    //     session()->setFlashdata('message', 'Data Impor Berhasil Dihapus');
    //     return redirect()->to('/data');
    // }
}
