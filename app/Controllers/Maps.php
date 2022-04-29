<?php

namespace App\Controllers;

class Maps extends BaseController
{
    public function index()
    {
        $filename = base_url('assets/agamkab.geojson');
        $file = file_get_contents($filename);
        $file = json_decode($file);

        $features = $file->features;

        return view('coba-geojson/cobaa-geojson', [
            'data' => $features,
        ]);
    }
}
