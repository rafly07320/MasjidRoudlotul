@extends('layouts.admin')
@section('title', 'zakat')

@section('content')
    <div class="flex justify-between items-center mb-3">
        <h2 class="mb-0 text-uppercase text-4xl">ZAKAT</h2>
        {{-- <h2 class="mb-0 text-uppercase text-2xl font-bold">Total = {{ $total_zakat }} Kg</h2>
        <h2 class="mb-0 text-uppercase text-2xl font-bold">jumlah jiwa = {{ $total_jiwa }}</h2> --}}
        <a href="{{ route('zakat.create') }}"
            class="me-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
            + Tambah Data
        </a>
    </div>
    <hr />
    <div class="mt-3 max-w-full p-7 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table id="example" class="min-w-full border-collapse border border-gray-300" style="width:100%">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="border border-gray-400 text-white">No</th>
                        <th class="border border-gray-400 text-white">Tgl. Zakat</th>
                        <th class="border border-gray-400 text-white">Nama Kepala Keluarga</th>
                        <th class="border border-gray-400 text-white">Alamat</th>
                        <th class="border border-gray-400 text-white">Uang</th>
                        <th class="border border-gray-400 text-white">Total Zakat</th>
                        <th class="border border-gray-400 text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($zakats as $zakat)
                        <tr>
                            <td class="border p-4 border-gray-400">{{ $loop->iteration }}</td>
                            <td class="border p-4 border-gray-400 font-bold">{{ $zakat->tgl_zakat }}</td>
                            <td class="border p-4 border-gray-400">{{ $zakat->nama }}</td>
                            <td class="border p-4 border-gray-400">{{ $zakat->alamat }}</td>
                            <td class="border p-4 border-gray-400">{{ $zakat->harga_per_zakat }}</td>
                            <td class="border p-4 border-gray-400">{{ $zakat->jumlah_zakat }} Kg</td>
                            <td class="border p-4 border-gray-400">
                                <div class="flex justify-center">
                                    <button data-modal-target="edit-modal-{{ $zakat->id }}"
                                        data-modal-toggle="edit-modal-{{ $zakat->id }}"
                                        class="me-2 block text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button data-modal-target="delete-modal-{{ $zakat->id }}"
                                        data-modal-toggle="delete-modal-{{ $zakat->id }}"
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
                <form action="{{ route('zakat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-4">
                            <label for="tgl_zakat" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tgl.
                                Zakat</label>
                            <input type="date" id="tgl_zakat" name="tgl_zakat"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4" id="namaContainer">
                            <div class="nama-item">
                                <label for="nama"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama
                                    dan alamat</label>
                                <input type="text" id="nama" name="nama[]"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <input type="text" id="alamat" name="alamat[]"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <button type="button" onclick="tambahNama()">Tambah Nama</button>
                        <div class="mb-4">
                            <label>Jumlah Orang:</label>
                            <input type="number" id="jumlah_orang" readonly>
                        </div>
                        <div class="mb-4">
                            <label>Jenis Zakat:</label>
                            <select name="jenis_zakat" id="jenis_zakat" onchange="toggleHarga()" required>
                                <option value="bawa_sendiri">Bawa Sendiri</option>
                                <option value="beli_dari_masjid">Beli dari Masjid</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <div id="harga_field" style="display: none;">
                                <label>Harga per zakat (Rp):</label>
                                <input type="number" name="harga_per_zakat" id="harga_per_zakat" value="50000"
                                    step="0.01" disabled>

                                <label>Total Harga (Rp):</label>
                                <input type="number" name="harga_total" id="harga_total" disabled>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label>Zakat per Orang (kg):</label>
                            <input type="number" id="zakat_per_orang" readonly>
                        </div>
                        <div class="mb-4">
                            <label>Total Zakat (kg):</label>
                            <input type="number" id="total_zakat" name="total_zakat" oninput="hitungZakat()"
                                step="any" required>
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
        function tambahNama() {
            let container = document.getElementById("namaContainer");
            let div = document.createElement("div");
            div.classList.add("nama-item", "mb-2");
            div.innerHTML = `
                <input type="text" name="nama[]" placeholder="Nama" class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                <input type="text" name="alamat[]" placeholder="Alamat" class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                <button type="button" class="mt-1 text-red-600 hover:underline" onclick="hapusNama(this)">Hapus</button>
            `;
            container.appendChild(div);
            hitungZakat();
        }

        function hapusNama(button) {
            button.parentElement.remove();
            hitungZakat();
        }

        function hitungZakat() {
            let totalZakat = parseFloat(document.getElementById("total_zakat").value) || 0;
            let jumlahOrang = document.querySelectorAll(".nama-item").length;
            document.getElementById("jumlah_orang").value = jumlahOrang;

            if (jumlahOrang > 0) {
                document.getElementById("zakat_per_orang").value = (totalZakat / jumlahOrang).toFixed(2);
            } else {
                document.getElementById("zakat_per_orang").value = 0;
            }

            if (document.getElementById("jenis_zakat").value === "beli_dari_masjid") {
                hitungTotalHarga();
            }
        }

        function toggleHarga() {
            let jenis = document.getElementById("jenis_zakat").value;
            let hargaField = document.getElementById("harga_field");

            if (jenis === "beli_dari_masjid") {
                hargaField.style.display = "block";
                document.getElementById("zakat_per_orang").value = 2.8; // Default 2.8 kg per orang
                hitungTotalHarga();
            } else {
                hargaField.style.display = "none";
            }
        }

        function hitungTotalHarga() {
            let jumlahOrang = document.querySelectorAll(".nama-item").length;
            let hargaPerZakat = parseFloat(document.getElementById("harga_per_zakat").value) || 0;

            document.getElementById("total_zakat").value = jumlahOrang * 2.8; // Default 2.8 kg
            document.getElementById("harga_total").value = jumlahOrang * hargaPerZakat;
        }
    </script>



    {{-- Modal Edit --}}
    @foreach ($zakats as $zakat)
        <div id="edit-modal-{{ $zakat->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit-modal-{{ $zakat->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('zakat.update', $zakat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="mb-4">
                                <label for="tgl_zakat"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tgl. Zakat
                                </label>
                                <input type="date" id="tgl_zakat" name="tgl_zakat" value="{{ $zakat->tgl_zakat }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="kepala_keluarga"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Kepala Keluarga
                                </label>
                                <input type="text" id="kepala_keluarga" name="kepala_keluarga"
                                    value="{{ $zakat->kepala_keluarga }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="alamat"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Alamat
                                </label>
                                <input type="text" id="alamat" name="alamat" value="{{ $zakat->alamat }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="jumlah_jiwa"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jumlah Jiwa
                                </label>
                                <input type="number" id="jumlah_jiwa" name="jumlah_jiwa"
                                    value="{{ $zakat->jumlah_jiwa }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="total_zakat"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Total Zakat
                                </label>
                                <input type="number" id="total_zakat" name="total_zakat"
                                    value="{{ $zakat->total_zakat }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="edit-modal-{{ $zakat->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Delete --}}
    @foreach ($zakats as $zakat)
        <div id="delete-modal-{{ $zakat->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Hapus Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="delete-modal-{{ $zakat->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin menghapus zakat
                            "<strong>{{ $zakat->kepala_keluarga }}</strong>"? Tindakan ini tidak dapat
                            dibatalkan.</p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <form action="{{ route('zakat.destroy', $zakat->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Hapus
                            </button>
                            <button data-modal-hide="delete-modal-{{ $zakat->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
