<?php
// isian form dropdown kategori
$kategori = [
    'name' => 'kategori',
    'options' => $kategori + ['' => 'Pilih Kategori'], // Options kategori dan placeholdernya
    'selected' => '',  // Agar palceholdernya muncul
    'disabled_option' => '',  // Agar placeholdernya tidak terpilih
    'class' => 'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray',
    'id' => 'kategori',   // Id yang nanti dipake di js
];

$tahun = [
    'name' => 'tahun',
    'options' => $tahun + ['' => 'Pilih Tahun'],
    'selected' => '',
    'disabled_option' => '',
    'class' => 'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray',
    'id' => 'tahun'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Tampilkan',
    'class' => 'px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
    'type' => 'submit'
];

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGAGAH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('windmill-admin/assets/css/tailwind.output.css'); ?>" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="<?= base_url('windmill-admin/assets/js/init-alpine.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
        <!-- Desktop sidebar -->
        <!-- <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    SIGAGAH
                </a>
            </div>
        </aside> -->
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <!-- <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    SIGAGAH
                </a>
            </div>
        </aside> -->
        <div class="flex flex-col flex-1">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between h-4 px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for projects" aria-label="Search" />
                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->
                        <li class="flex">
                            <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                                <template x-if="!dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                    </svg>
                                </template>
                                <template x-if="dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                    </svg>
                                </template>
                            </button>
                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <!-- <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                            </button> -->
                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Login
                            </button>
                        </li>
                    </ul>
                </div>
            </header>
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container mx-auto grid">
                    <div class="grid mx-3 gap-6 my-6 md:grid-cols-2">
                        <div class="min-w-0 bg-gray-50 dark:bg-gray-900 rounded-lg ">
                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <?= form_open('Coba/index'); ?>
                                <div class="block flex mt-4 text-sm">
                                    <label class="text-gray-700 pr-2 flex items-center dark:text-gray-400" for="kategori">Kategori</label>
                                    <?= form_dropdown($kategori); ?>
                                </div>
                                <div class="block flex mt-4 text-sm">
                                    <label class="text-gray-700 pr-2 flex items-center dark:text-gray-400" for="indikator">Indikator</label>
                                    <select id="indikator" name="indikator" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                        <option value="" disabled selected hidden class="text-slate-500 text-sm">Pilih Indikator</option>
                                        <?php  ?>
                                    </select>
                                </div>
                                <div class="block flex mt-4 text-sm">
                                    <label class="text-gray-700 pr-2 flex items-center dark:text-gray-400" for="variabel">Variabel</label>
                                    <select id="variabel" name="variabel" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                        <option value="" disabled selected hidden class="text-slate-500 text-sm">Pilih Variabel</option>
                                        <?php  ?>
                                    </select>
                                </div>
                                <div class="block flex mt-4 text-sm">
                                    <label class="text-gray-700 pr-2 flex items-center dark:text-gray-400" for="tahun">Tahun</label>
                                    <?= form_dropdown($tahun); ?>
                                </div>
                                <div class="block flex mt-4 text-sm">
                                    <button type="Submit">Tampilkan</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                                Traffic
                            </h4>
                            <table>
                                <thead>
                                    <th>Kecamatan</th>
                                    <th>Nilai</th>
                                </thead>
                                <?php foreach ($data_kec as $row) : ?>
                                    <tr>
                                        <td><?= $row['kecamatan']; ?></td>
                                        <td><?= $row['nilai']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function tampilkan() {
            var id_var = $('#variabel').val();
            var id_tahun = $('#tahun').val();
            $.ajax({
                type: "POST", // Method pengiriman data dengan POST
                url: '<?= base_url('coba/tampilkan_data'); ?>', //Url file yang dituju/method controller
                data: { // Data yang akan dikirim untuk diproses
                    id_var: id_var,
                    id_tahun: id_tahun,
                },
                dataType: 'json',
                success: function(response) { // Ketika proses pengiriman berhasil
                    if (response.status == "success") { // Jika isi dari array status adalah success
                        $("#kecamatan").val(response.kecamatan); // set kecamatan
                        $("#niilai").val(response.nilai); // Set nilai 
                    } else { // Jika array status adalah failed
                        alert("Data Tidak Ditemukan");
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.responseText);
                }
            });
        }
        $(document).ready(function() {
            // request data indikator
            $('#kategori').change(function() {
                var id_kategori = $('#kategori').val(); // ambil value id dari kategori
                if (id_kategori != '') {
                    $.ajax({
                        url: '<?= base_url('coba/get_indikator') ?>',
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
                if (id_indikator != '') {
                    $.ajax({
                        url: '<?= base_url('coba/get_variabel') ?>',
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
</body>

</html>