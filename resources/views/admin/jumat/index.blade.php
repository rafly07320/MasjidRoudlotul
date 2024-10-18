@extends('layouts.admin')
@section('title', 'Petugas Jumat')

@section('content')
    <div class="flex justify-between items-center mb-3">
        <h2 class="mb-0 text-uppercase text-4xl">Petugas Jumat</h2>
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
                        <th class="border border-gray-400 text-white">Admin</th>
                        <th class="border border-gray-400 text-white">Nama Imam</th>
                        <th class="border border-gray-400 text-white">Khotib</th>
                        <th class="border border-gray-400 text-white">Muadzin</th>
                        <th class="border border-gray-400 text-white">Badal</th>
                        <th class="border border-gray-400 text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jumat as $petugasJumat)
                        <tr>
                            <td class="border p-4 border-gray-400">{{ $loop->iteration }}</td>
                            <td class="border p-4 border-gray-400 font-bold">{{ $petugasJumat->user->name }}</td>
                            <td class="border p-4 border-gray-400">{{ $petugasJumat->nama_imam }}</td>
                            <td class="border p-4 border-gray-400">{{ $petugasJumat->nama_khotib }}</td>
                            <td class="border p-4 border-gray-400">{{ $petugasJumat->nama_muadzin }}</td>
                            <td class="border p-4 border-gray-400">{{ $petugasJumat->nama_badal }}</td>
                            <td class="border p-4 border-gray-400">
                                <div class="flex justify-center">
                                    <button data-modal-target="edit-modal-{{ $petugasJumat->id }}"
                                        data-modal-toggle="edit-modal-{{ $petugasJumat->id }}"
                                        class="me-2 block text-white bg-amber-400 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button data-modal-target="delete-modal-{{ $petugasJumat->id }}"
                                        data-modal-toggle="delete-modal-{{ $petugasJumat->id }}"
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
                <form action="{{ route('jumat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="mb-4">
                            <label for="nama_imam"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Imam</label>
                            <input type="text" id="nama_imam" name="nama_imam"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="tgl_petugas"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Jadwal</label>
                            <input type="date" id="tgl_petugas" name="tgl_petugas"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="nama_khotib"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Khotib</label>
                            <input id="nama_khotib" name="nama_khotib" rows="4"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></input>
                        </div>
                        <div class="mb-4">
                            <label for="nama_muadzin"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Muadzin</label>
                            <input id="nama_muadzin" name="nama_muadzin" rows="4"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></input>
                        </div>
                        <div class="mb-4">
                            <label for="nama_badal"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-400">Badal</label>
                            <input id="nama_badal" name="nama_badal" rows="4"
                                class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></input>
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

    {{-- Modal Edit --}}
    @foreach ($jumat as $petugasJumat)
        <div id="edit-modal-{{ $petugasJumat->id }}" tabindex="-1" aria-hidden="true"
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
                            data-modal-hide="edit-modal-{{ $petugasJumat->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('jumat.update', $petugasJumat->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="nama_imam"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Judul
                                    Imam</label>
                                <input type="text" id="nama_imam" name="nama_imam"
                                    value="{{ $petugasJumat->nama_imam }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="nama_khotib"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Judul
                                    Khotib</label>
                                <input type="text" id="nama_khotib" name="nama_khotib"
                                    value="{{ $petugasJumat->nama_khotib }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="nama_muadzin"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Judul
                                    Muadzin</label>
                                <input type="text" id="nama_muadzin" name="nama_muadzin"
                                    value="{{ $petugasJumat->nama_muadzin }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="nama_badal"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Judul
                                    Badal</label>
                                <input type="text" id="nama_badal" name="nama_badal"
                                    value="{{ $petugasJumat->nama_badal }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div class="mb-4">
                                <label for="tgl_petugas"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal
                                    Jadwal</label>
                                <input type="date" id="tgl_petugas" name="tgl_petugas"
                                    value="{{ $petugasJumat->tgl_petugas }}"
                                    class="mt-1 p-2.5 block w-full rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                            <button data-modal-hide="edit-modal-{{ $petugasJumat->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Delete --}}
    @foreach ($jumat as $petugasJumat)
        <div id="delete-modal-{{ $petugasJumat->id }}" tabindex="-1" aria-hidden="true"
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
                            data-modal-hide="delete-modal-{{ $petugasJumat->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('jumat.destroy', $petugasJumat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Apakah Anda yakin ingin menghapus petugas jumat dengan imam
                            "<strong>{{ $petugasJumat->nama_imam }}</strong>"? Tindakan ini tidak dapat
                            dibatalkan.
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                            <button data-modal-hide="delete-modal-{{ $petugasJumat->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
