<?= $this->extend('templates/layout'); ?>

<?= $this->section('head'); ?>
	
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Tabel data KDA -->          
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Tambah Data</h4>
<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
            Periksa entrian form!
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
<?php endif; ?>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >
    <form action="<?= base_url('data/store'); ?>" method="post">
        <?= csrf_field(); ?>
        <label for="kategori" class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Kategori</span>
        <select id="kategori" name="kategori" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="<?= old('kategori'); ?>" disabled selected hidden class="text-slate-500 text-sm">Pilih Kategori</option>
            <?php foreach ($kategori as $row): ?>
                <option value="<?= $row['id_kategori'] ?>"> <?= $row['kategori'] ?> </option>;
            <?php endforeach; ?> 
        </select>
        </label>

        <label for="indikator" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Indikator</span>
        <select id="indikator" name="indikator" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="<?= old('indikator'); ?>" disabled selected hidden class="text-slate-500 text-sm">Pilih Indikator</option>
            <?php  ?>
        </select>
        </label>

        <label for="variabel" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Variabel</span>
        <select id="variabel" name="variabel" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="<?= old('variabel'); ?>" disabled selected hidden class="text-slate-500 text-sm">Pilih Variabel</option>
            <?php  ?>
        </select>
        </label>

        <label for="tahun" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Tahun</span>
        <select id="tahun" name="tahun" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="<?= old('tahun'); ?>" disabled selected hidden class="text-slate-500 text-sm">Pilih Tahun</option>
            <?php foreach ($tahun as $row): ?>
                <option value="<?= $row['id_tahun'] ?>"> <?= $row['tahun'] ?> </option>;
            <?php endforeach; ?> 
        </select>
        </label>

        <label for="kec" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Kecamatan</span>
        <select id="kec" name="kec" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="<?= old('tahun'); ?>" disabled selected hidden class="text-slate-500 text-sm">Pilih Kecamatan</option>
            <?php foreach ($kec as $row): ?>
                <option value="<?= $row['id_kec'] ?>"> <?= $row['kecamatan'] ?> </option>;
            <?php endforeach; ?> 
        </select>
        </label>

        <label for="nilai" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nilai</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            id="nilai" name="nilai" value="<?= old('nilai'); ?>"
        />
        </label>

        <div class="block mt-4 text-sm">
            <button type="submit" value="Simpan" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Simpan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function() {
    // request data indikator
    $('#kategori').change(function() {
        var id_kategori = $('#kategori').val(); // ambil value id dari kategori

        if(id_kategori != '') {
            $.ajax({
                url: '<?= base_url('filterdata/get_indikator') ?>',
                method: 'POST',
                data: {
                    id_kategori: id_kategori
                },
                success: function(data) {
                    $('#indikator').html(data)
                }
            });
        }
    });

    $('#indikator').change(function() {
        var id_indikator = $('#indikator').val(); // ambil value id dari indikator

        if(id_indikator != '') {
            $.ajax({
                url: '<?= base_url('filterdata/get_variabel') ?>',
                method: 'POST',
                data: {
                    id_indikator: id_indikator
                },
                success: function(data) {
                    $('#variabel').html(data)
                }
            });
        }
    });
}); 
</script>
<?= $this->endSection(); ?>