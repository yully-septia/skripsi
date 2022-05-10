<?php

namespace App\Models;

use CodeIgniter\Model;

class KdaModel extends Model
{
    protected $table = 'tbl_data_kec';
    protected $primaryKey = 'id_data_kec';
    protected $returnType = 'array';
    protected $allowedFields = ['id_tahun', 'id_var', 'id_kec', 'nilai'];
    protected $useTimestamps = false;

    public function get_data_kda()
    {
        $query = $this->db
            ->table('tbl_data_kec')
            // ->select('*')
            ->select('id_data_kec, variabel, tahun, kecamatan, nilai')
            ->join('tbl_variabel', 'tbl_variabel.id_var=tbl_data_kec.id_var')
            ->join('tbl_indikator', 'tbl_indikator.id_indikator=tbl_variabel.id_indikator')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_indikator.id_kategori')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun=tbl_data_kec.id_tahun')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kec=tbl_data_kec.id_kec')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_kategori()
    {
        $query = $this->db
            ->table('tbl_kategori')
            ->orderBy('kategori', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_indikator($id_kategori)
    {
        $query = $this->db
            ->table('tbl_indikator')
            ->where('id_kategori', $id_kategori)
            ->orderBy('indikator', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_variabel($id_indikator)
    {
        $query = $this->db
            ->table('tbl_variabel')
            ->where('id_indikator', $id_indikator)
            ->orderBy('variabel', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_tahun()
    {
        $query = $this->db
            ->table('tbl_tahun')
            ->orderBy('tahun', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_kec()
    {
        $query = $this->db
            ->table('tbl_kecamatan')
            ->orderBy('id_kec', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function get_data($id_data_kec)
    {
        $query = $this->db
            ->table('tbl_data_kec')
            // ->select('*')
            ->select('*')
            ->join('tbl_variabel', 'tbl_variabel.id_var=tbl_data_kec.id_var')
            ->join('tbl_indikator', 'tbl_indikator.id_indikator=tbl_variabel.id_indikator')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_indikator.id_kategori')
            ->join('tbl_tahun', 'tbl_tahun.id_tahun=tbl_data_kec.id_tahun')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kec=tbl_data_kec.id_kec')
            ->getWhere(['id_data_kec' => $id_data_kec])
            ->getResultArray();
        return $query;
    }

}
