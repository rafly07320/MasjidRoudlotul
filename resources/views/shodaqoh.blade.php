@extends('layouts.home')

@section('title', 'Shodaqoh')

@section('content')
    <div>
        <div class="bg-striped-brick bg-gray-100 ">
            <div class="max-w-screen-xl mx-auto py-16 text-gray-900">
                <h1 class="text-3xl md:text-4xl font-bold text-center">Infaq dan Shodaqoh</h1>
                <p class="text-center md:text-xl md:max-w-screen-sm md:mx-auto mx-2">Setiap sedekah yang diberikan dengan ikhlas akan mendatangkan pahala yang berlipat ganda.</p>
            </div>
        </div>
        <div class="pt-8 px-4 flex justify-center items-center w-full mx-auto max-w-screen-md">
            <div
                class="max-w-sm p-6 bg-white border-4 border-red-600 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="mb-3" src="{{ asset('images/LogoBankJatim.png') }}" alt="">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">No. Rek. 123456789</p>
                <p class="mb-3 font-normal text-white text-center rounded-xl p-1 bg-red-600 dark:text-gray-400">An. Masjid Roudlotul Ulum</p>
            </div>
        </div>
        <div class="py-8 px-4 flex justify-center items-center w-full mx-auto max-w-screen-md">
            <div
                class="min-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Infaq dan
                        Shodaqoh</h5>
                </a>
                <form action="{{ route('home.shodaqoh.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-4">
                            <label for="nama_shodaqoh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
                            <input type="text" id="nama_shodaqoh" name="nama_shodaqoh"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="email_shodaqoh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Email</label>
                            <input type="email" id="email_shodaqoh" name="email_shodaqoh"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_shodaqoh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Shodaqoh</label>
                            <input type="date" id="tanggal_shodaqoh" name="tanggal_shodaqoh"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="nominal_shodaqoh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nominal</label>
                            <input id="harga" type="text" name="nominal_shodaqoh" rows="4"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></input>
                        </div>
                        <div class="mb-4">
                            <label for="bukti_transfer"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Upload Bukti
                                Transfer</label>
                            <input type="file" id="bukti_transfer" name="bukti_transfer"
                                class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var harga = document.getElementById('harga');
        harga.addEventListener('keyup', function(e) {
            harga.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
