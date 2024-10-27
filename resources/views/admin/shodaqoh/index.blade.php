@extends('layouts.admin')
@section('title', 'Shodaqoh')

@section('content')
    <div class="flex justify-between items-center mb-3">
        <h2 class="mb-0 text-uppercase text-4xl">Shodaqoh</h2>
        <button data-modal-target="add-modal" data-modal-toggle="add-modal"
            class="me-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            + Tambah Data
        </button>
    </div>
    <hr />
    <div class="mt-3 max-w-full p-7 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table id="example" class="min-w-full border-collapse border border-gray-300" style="width:100%">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="border border-gray-400 text-white">No</th>
                        <th class="border border-gray-400 text-white">Nama</th>
                        <th class="border border-gray-400 text-white">Tgl. Shodaqoh</th>
                        <th class="border border-gray-400 text-white">Nominal</th>
                        <th class="border border-gray-400 text-white">Bukti Transfer</th>
                        <th class="border border-gray-400 text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shodaqohs as $shodaqoh)
                        <tr>
                            <td class="border p-4 border-gray-400">{{ $loop->iteration }}</td>
                            <td class="border p-4 border-gray-400 font-bold">{{ $shodaqoh->nama_shodaqoh }}</td>
                            <td class="border p-4 border-gray-400">{{ $shodaqoh->tanggal_shodaqoh }}</td>
                            <td class="border p-4 border-gray-400">{{ formatRupiah($shodaqoh->nominal_shodaqoh) }}</td>
                            <td class="border p-4 border-gray-400">
                                <a class="bg-blue-600 p-2 text-white hover:bg-blue-700"
                                    href="{{ asset('storage/' . $shodaqoh->bukti_transfer) }}" download>Download</a>
                            </td>
                            <td class="border p-4 border-gray-400">
                                <div class="flex justify-center">
                                    <button data-modal-target="edit-modal-{{ $shodaqoh->id }}"
                                        data-modal-toggle="edit-modal-{{ $shodaqoh->id }}"
                                        class="me-2 block text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button data-modal-target="delete-modal-{{ $shodaqoh->id }}"
                                        data-modal-toggle="delete-modal-{{ $shodaqoh->id }}"
                                        class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div id="add-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('shodaqoh.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-4">
                            <label for="nama_shodaqoh"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
                            <input type="text" id="nama_shodaqoh" name="nama_shodaqoh"
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
                            <input id="nominal_shodaqoh" type="text" name="nominal_shodaqoh" rows="4"
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        <button data-modal-hide="add-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var nominal_shodaqoh = document.getElementById('nominal_shodaqoh');
        nominal_shodaqoh.addEventListener('keyup', function(e) {
            nominal_shodaqoh.value = formatRupiah(this.value, 'Rp. ');
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
