$(function () {
    $('#tampilkan_data').on('click', function () {
        $('#judul').html('Tabel Data DDA Update');

        var id_tahun = $('#tahun').val();
        console.log(id_tahun);
    });
});
