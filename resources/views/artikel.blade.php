@extends('layouts.home')
@section('title', 'Artikel')

@section('content')
    <div>
        <div class="bg-kotak bg-gray-100 ">
            <div class="max-w-screen-xl mx-auto py-16 text-gray-900">
                <h1 class="text-3xl md:text-4xl font-bold text-center">Berita dan Informasi Masjid</h1>
                <p class="text-center md:text-xl md:max-w-screen-sm md:mx-auto mx-2">Selain Berita, menampilkan juga
                    Informasi, Wawasan, Sejarah dan Opini, Semoga
                    Bermanfa'at.</p>
            </div>
        </div>
        <div class="py-8 px-4 mx-auto max-w-screen-xl ">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($artikels as $artikel)
                    <a href="{{ route('artikel.show', ['judul_artikel' => str_replace(' ', '-', $artikel->judul_artikel)]) }}"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="{{ Storage::url('foto_artikels/' . $artikel->foto_artikel) }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $artikel->judul_artikel }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($artikel->deskripsi_artikel, 100) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
