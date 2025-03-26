@extends('layouts.admin')
@section('title', 'zakat')

@section('content')
    <div class="mt-3 max-w-full p-7 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="overflow-x-auto">
            <form action="{{ route('zakat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    {{-- <div class="mb-4">
                        <label for="tgl_zakat" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tgl.
                            Zakat</label>
                        <input type="date" id="tgl_zakat" name="tgl_zakat"
                            class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div> --}}
                    <div class="mb-4" id="namaContainer">
                        <div class="nama-item">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="nama"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
                                    <input type="text" id="nama" name="nama[]"
                                        class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                </div>
                                <div>
                                    <label for="nama"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-400">alamat</label>
                                    <input type="text" id="alamat" name="alamat[]"
                                        class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="me-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" onclick="tambahNama()">Tambah Orang
                    </button>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jumlah Orang:</label>
                            <input
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                type="number" id="jumlah_orang" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Jenis Zakat:</label>
                            <select
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                name="jenis_zakat" id="jenis_zakat" onchange="toggleHarga()" required>
                                <option value="bawa_sendiri">Bawa Sendiri</option>
                                <option value="beli_dari_masjid">Beli dari Masjid</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div id="harga_field" style="display: none;">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Harga per
                                        zakat (Rp):</label>
                                    <input
                                        class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        type="number" name="harga_per_zakat" id="harga_per_zakat" value="50000"
                                        step="0.01" disabled>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Total Harga
                                        (Rp):</label>
                                    <input
                                        class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                        type="number" name="harga_total" id="harga_total" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Zakat per Orang
                                (kg):</label>
                            <input
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                type="number" id="zakat_per_orang" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Total Zakat
                                (kg):</label>
                            <input
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                type="number" id="total_zakat" name="total_zakat" oninput="hitungZakat()" step="any"
                                required>
                        </div>
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

    <script>
        function tambahNama() {
            let container = document.getElementById("namaContainer");
            let div = document.createElement("div");
            div.classList.add("nama-item", "mb-2");
            div.innerHTML =
                `<div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="nama[]" placeholder="Nama" class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <input type="text" name="alamat[]" placeholder="Alamat" class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                </div>
                <button type="button" class="mt-1 text-red-600 hover:underline" onclick="hapusNama(this)">Hapus</button>`;
            container.appendChild(div);
            hitungZakat();
        }

        function hapusNama(button) {
            button.parentElement.remove();
            hitungZakat();
        }

        function toggleHarga() {
            let jenis = document.getElementById("jenis_zakat").value;
            let hargaField = document.getElementById("harga_field");

            if (jenis === "beli_dari_masjid") {
                hargaField.style.display = "block";
                document.getElementById("zakat_per_orang").value = 2.8; // Default 2.8 kg per orang
                document.getElementById("total_zakat").value = document.querySelectorAll(".nama-item").length * 2.8;
                hitungTotalHarga();
            } else {
                hargaField.style.display = "none";
                document.getElementById("zakat_per_orang").value = 0;
                document.getElementById("total_zakat").value = "";
            }
        }

        function hitungZakat() {
            let jumlahOrang = document.querySelectorAll(".nama-item").length;
            document.getElementById("jumlah_orang").value = jumlahOrang;

            let jenis = document.getElementById("jenis_zakat").value;

            if (jenis === "beli_dari_masjid") {
                // For buying from mosque, use fixed 2.8 kg per person
                let totalZakat = jumlahOrang * 2.8;
                document.getElementById("total_zakat").value = totalZakat.toFixed(2);
                document.getElementById("zakat_per_orang").value = 2.8;
                hitungTotalHarga();
            } else {
                // For bringing own zakat, calculate based on total zakat input
                let totalZakat = parseFloat(document.getElementById("total_zakat").value) || 0;

                if (jumlahOrang > 0) {
                    document.getElementById("zakat_per_orang").value = (totalZakat / jumlahOrang).toFixed(2);
                } else {
                    document.getElementById("zakat_per_orang").value = 0;
                }
            }
        }

        function hitungTotalHarga() {
            let jumlahOrang = document.querySelectorAll(".nama-item").length;
            let hargaPerZakat = parseFloat(document.getElementById("harga_per_zakat").value) || 0;

            document.getElementById("harga_total").value = jumlahOrang * hargaPerZakat;
        }
    </script>
@endsection
