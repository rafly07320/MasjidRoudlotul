@extends('layouts.admin')
@section('title', 'Kas Masjid')

@section('content')

    <div class="flex justify-between items-center mb-3">
        <h2 class="mb-0 text-uppercase text-4xl">kas</h2>
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
                        <th class="border border-gray-400 text-white">tanggal</th>
                        <th class="border border-gray-400 text-white">jenis kas</th>
                        <th class="border border-gray-400 text-white">jumlah kas</th>
                        <th class="border border-gray-400 text-white">saldo_akhir</th>
                        <th class="border border-gray-400 text-white">deskripsi kas</th>
                        <th class="border border-gray-400 text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kas_masjid as $kas)
                        <tr>
                            <td class="border p-4 border-gray-400">{{ $loop->iteration }}</td>
                            <td class="border p-4 border-gray-400">{{ $kas->tanggal_kas }}</td>
                            <td class="border p-4 border-gray-400">
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium 
                                {{ $kas->jenis_kas == 'masuk' ? 'bg-green-400 text-white' : 'bg-yellow-400 text-white' }} 
                                rounded-full">
                                    {{ ucfirst($kas->jenis_kas) }}
                                </span>
                            </td>
                            <td class="border p-4 border-gray-400">@rupiah($kas->jumlah_kas)</td>
                            <td class="border p-4 border-gray-400">@rupiah($kas->saldo_akhir)</td>
                            <td class="border p-4 border-gray-400 whitespace-normal break-words">{{ $kas->deskripsi_kas }}
                            </td>
                            <td class="border p-4 border-gray-400">
                                <div class="flex justify-center">
                                    <button data-modal-target="edit-modal-{{ $kas->id }}"
                                        data-modal-toggle="edit-modal-{{ $kas->id }}"
                                        class="me-2 block text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button data-modal-target="delete-modal-{{ $kas->id }}"
                                        data-modal-toggle="delete-modal-{{ $kas->id }}"
                                        class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="add-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
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
                <form action="{{ route('kas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-4">
                            <label for="tanggal_kas"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Kas</label>
                            <input type="date" id="tanggal_kas" name="tanggal_kas"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="jenis_kas" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis
                                Kas</label>
                            <select id="jenis_kas" name="jenis_kas"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                                <option value="" disabled selected>Pilih jenis kas</option>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_kas"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nominal</label>
                            <input id="" type="number" name="jumlah_kas" rows="4"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></input>
                        </div>
                        {{-- <div class="mb-4">
                            <label for="saldo_akhir"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Saldo Akhir</label>
                            <input type="number" id="saldo_akhir" name="saldo_akhir" min="1"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div> --}}
                        <div class="mb-4">
                            <label for="deskripsi_kas"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi Kas</label>
                            <textarea id="deskripsi_kas" name="deskripsi_kas"
                                class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
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

    @foreach ($kas_masjid as $kas)
        <!-- Modal Edit -->
        <div id="edit-modal-{{ $kas->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-4xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit-modal-{{ $kas->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('kas.update', $kas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="mb-4">
                                <label for="tanggal_kas"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Kas</label>
                                <input type="date" id="tanggal_kas" name="tanggal_kas"
                                    value="{{ $kas->tanggal_kas }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="jenis_kas"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis Kas</label>
                                <select id="jenis_kas" name="jenis_kas"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                    <option value="masuk" {{ $kas->jenis_kas == 'masuk' ? 'selected' : '' }}>Masuk
                                    </option>
                                    <option value="keluar" {{ $kas->jenis_kas == 'keluar' ? 'selected' : '' }}>Keluar
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_kas"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nominal</label>
                                <input id="jumlah_kas" type="number" name="jumlah_kas" value="{{ $kas->jumlah_kas }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi_kas"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi
                                    Kas</label>
                                <textarea id="deskripsi_kas" name="deskripsi_kas"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ $kas->deskripsi_kas }}</textarea>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="edit-modal-{{ $kas->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($kas_masjid as $kas)
        <!-- Delete Modal -->
        <div id="delete-modal-{{ $kas->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-between items-center p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Konfirmasi Hapus
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="delete-modal-{{ $kas->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.5 14.25v-3m3 3v-3m-9 9h15a2.25 2.25 0 0 0 2.25-2.25v-15A2.25 2.25 0 0 0 19.5 3h-15A2.25 2.25 0 0 0 3.75 5.25v15A2.25 2.25 0 0 0 6 22.5ZM21 7.5H3" />
                        </svg>
                        <p class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            Apakah Anda yakin ingin menghapus data ini?
                        </p>
                        <form action="{{ route('kas.destroy', $kas->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center dark:focus:ring-red-800">
                                Ya, Hapus
                            </button>
                            <button data-modal-hide="delete-modal-{{ $kas->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
