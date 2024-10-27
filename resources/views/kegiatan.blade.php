@extends('layouts.home')

@section('title', 'Kegiatan')

@section('content')
    <div>
        <div class="bg-striped-brick bg-gray-100 ">
            <div class="max-w-screen-xl mx-auto py-16 text-gray-900">
                <h1 class="text-3xl md:text-4xl font-bold text-center">Kegiatan dan Informasi Masjid</h1>
                <p class="text-center md:text-xl md:max-w-screen-sm md:mx-auto mx-2">Selain Berita, menampilkan juga
                    Informasi, Wawasan, Sejarah dan Opini, Semoga
                    Bermanfa'at.</p>
            </div>
        </div>
        
            <div class="grid md:grid-cols-2 gap-8 mb-10">
                @foreach ($kegiatans as $kegiatan)
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ Storage::url('foto_kegiatans/' . $kegiatan->foto_kegiatan) }}"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a
                                href="{{ route('kegiatan.show', ['judul_kegiatan' => str_replace(' ', '-', $kegiatan->judul_kegiatan)]) }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $kegiatan->judul_kegiatan }}
                                </h5>
                            </a>
                            <p class=" font-normal text-gray-700 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                            </p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Pukul {{ \Carbon\Carbon::parse($kegiatan->waktu_kegiatan)->format('H:i') }}
                            </p>
                            <a href="{{ route('kegiatan.show', ['judul_kegiatan' => str_replace(' ', '-', $kegiatan->judul_kegiatan)]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
