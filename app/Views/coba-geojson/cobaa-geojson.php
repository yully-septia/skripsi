<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('leaflet/leaflet.css') ?>" />
    <script src="<?= base_url('leaflet/leaflet.js') ?>"></script>
    <style>
        #maps {
            height: 500px;
        }
    </style>
</head>
<body>
    <h1>Helooo.... World!!!</h1>
    <h1>Peta Indonesia</h1>
<div id="maps"></div>
<script>
    var data = <?= json_encode($data) ?>;
    var map = L.map('maps').setView({ lat : 0.7893, lon : 113.9213 }, 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);

    var geojson = new L.geoJson(data).addTo(map);
</script>
</body>
</html>