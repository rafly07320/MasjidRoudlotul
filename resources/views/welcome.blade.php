@extends('layouts.home')
@section('title', 'Masjid Roudlotul Ulum Surabaya')

@section('content')
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-custom-2">
        <!-- Content overlay -->
        <div class="absolute inset-0 flex items-center justify-center text-white z-40 bg-black/60">
            <div class="text-center">
                <h1 class="mb-2 text-3xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    Masjid Roudlotul Ulum</h1>
                <p class="text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:mx-56">Jl Dupak Baru III No. 43 Surabaya</p>
            </div>
        </div>

        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/depan masjid.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/IMG_0017.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/jamaah.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/wali.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/IMG_0785.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 6 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('images/remas2.jpg') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>


    </div>
</div>


<div class="bg-gray-100 p-8 pt-10 pb-10">
    <div class="grid md:grid-cols-3 gap-4">
        <div>
            <a href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover p-5 rounded-t-lg w-32 md:h-auto  md:rounded-none md:rounded-s-lg"
                    src="{{ asset('images/logo-smpdin-fix.png') }}" alt="">
                <div class="flex flex-col justify-between pe-5 pb-5 ps-5 leading-normal">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        Pendidikan
                        Berkualitas</h5>
                    <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">Yayasan ini
                        menawarkan program
                        pendidikan yang berkualitas, baik di tingkat dasar, menengah, maupun tinggi. Program
                        pendidikan yang terintegrasi dengan nilai-nilai keislaman & pengembangan berkarakter.
                    </p>
                </div>
            </a>
        </div>
        <div>
            <a href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover p-5 rounded-t-lg w-32 md:h-auto  md:rounded-none md:rounded-s-lg"
                    src="{{ asset('images/language-school-illustration-17.png') }}" alt="">
                <div class="flex flex-col justify-between pe-5 pb-5 ps-5 leading-normal">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        Lembaga Amil Masjid</h5>
                    <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">Selain pendidikan,
                        yayasan juga memperhatikan aspek sosial masyarakat. Program pemberdayaan & bantuan
                        kemanusiaan menjadi bukti nyata komitmen yayasan terhadap keseimbangan pendidikan &
                        kepedulian sosial.
                    </p>
                </div>
            </a>
        </div>
        <div>
            <a href="#"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover p-5 rounded-t-lg w-32 md:h-auto  md:rounded-none md:rounded-s-lg"
                    src="{{ asset('images/language-school-illustration-25.png') }}" alt="">
                <div class="flex flex-col justify-between pe-5 pb-5 ps-5 leading-normal">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        Pusat Kegiatan Islami</h5>
                    <p class="mb-3 font-normal text-center text-gray-700 dark:text-gray-400">Sebagai landasan
                        bagi Masjid Roudlotul Ulum Surabaya, yayasan ini menjadi pusat kegiatan Islami yang
                        menyelenggarakan berbagai kegiatan keagamaan seperti kajian, pengajian, dan pelatihan
                        keIslaman.
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="my-8">
    <h2 class="p-4 font-poppins underline text-6xl font-black text-center text-gray-900 dark:text-white">Sejarah Masjid
    </h2>
</div>
<div class="bg-brush mt-10 shadow-inner-lg md:w-3/4 mx-auto rounded-xl">
    <div class="flex flex-col md:flex-row  mx-auto md:max-w-screen-xl h-auto">
        <div class="md:w-1/2 w-full  flex justify-center items-center md:my-20 mt-20 mb-10">
            <div class="bg-masjid bg-cover bg-center border-4 border-amber-800 h-96 w-60 rounded-xl shadow-outer-lg">
            </div>
        </div>
        <div class="md:w-1/2 w-full h-96 my-20 py-5 border-2 justify-center align-items-center flex flex-col">
            <h2 class="text-2xl font-black text-gray-900 mb-5 text-center md:text-start">
                MASJID ROUDLOTUL ULUM SURABAYA
            </h2>
            <p class="border-2 font-poppins text-justify md:mx-0 px-5 mb-10 md:mb-0">
                Pada awalnya, sebelum berdirinya Masjid Roudlotul Ulum, terdapat sebuah mushola kecil di wilayah Kampung
                Dupak Baru. Kemudian, dilakukan pembangunan yang menghasilkan sebuah masjid kecil bernama Masjid Al
                Ibrahim. Lalu pada tahun 2000, masjid ini mengalami pembangunan kembali, sehingga menjadi masjid besar
                yang kemudian berganti nama menjadi Masjid Roudlotul Ulum. Pada tahun 1996, didirikan sebuah sekolah
                bernama SDI Roudlotul Ulum, diikuti oleh pendirian TK Tunas Harapan pada tahun 2001. Seiring dengan
                perkembangan tersebut, sesuai dengan peraturan yang berlaku, dibentuklah Yayasan Masjid Roudlotul Ulum
                pada tahun 2013 untuk mengelola SD dan TK tersebut.
            </p>
        </div>
    </div>
</div>

<div class=" dark:bg-gray-900">
    <div class=" px-4 mx-auto max-w-screen-xl lg:py-16">
        <div class="mb-10  flex align-items-center justify-center  w-full">
            <div class="border-b-2 w-1/2 border-emerald-500">
                <h2 class="p-4 md:text-6xl text-2xl font-black text-center text-gray-900 dark:text-white">Kegiatan</h2>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-8 ">
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
    <div class=" px-4 mx-auto max-w-screen-xl lg:pb-16">
        <div class="mb-10 flex align-items-center justify-center w-full">
            <div class="border-b-2 w-1/2 border-gray-500">
                <h2 class="md:text-6xl text-2xl font-black text-center text-gray-900 dark:text-white">Artikel</h2>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-8 justify-center">
            @foreach ($artikels as $artikel)
            <a href="{{ route('artikel.show', ['judul_artikel' => str_replace(' ', '-', $artikel->judul_artikel)]) }}"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                    src="{{ Storage::url('foto_artikels/' . $artikel->foto_artikel) }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $artikel->judul_artikel }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {!! Str::limit($artikel->deskripsi_artikel, 100) !!}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class=" px-4 mx-auto max-w-screen-xl lg:pb-16">
        <div class="mb-10 flex align-items-center justify-center w-full">
            <div class="border-b-2 w-1/2 border-gray-500">
                <h2 class="md:text-6xl text-2xl font-black text-center text-gray-900 dark:text-white">Jadwal Petugas Jumat</h2>
            </div>
        </div>
        <div class="max-w-screen-md justify-center mx-auto">

            <table id="selection-table" class="border-gray-300">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800">
                        <th data-type="date" data-format="DD/MM/YYYY">
                            <span class="flex items-center">
                                Tanggal
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Nama Imam
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Khotib
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Muadzin
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                ba'dal
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas_jumats as $petugasJumat)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ \Carbon\Carbon::parse($petugasJumat->tgl_petugas)->format('d-m-Y') }}
                        </td>
                        <td>{{ $petugasJumat->nama_imam }}</td>
                        <td>{{ $petugasJumat->nama_khotib }}</td>
                        <td>{{ $petugasJumat->nama_muadzin }}</td>
                        <td>{{ $petugasJumat->nama_badal }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const images = [
        "{{ asset('images/remas.jpg') }}",
        "{{ asset('images/logo.jpg') }}",
        "{{ asset('images/ngaji.jpg') }}"
    ];

    document.addEventListener("DOMContentLoaded", function() {
        let currentIndex = 0;
        const backgroundDiv = document.getElementById('dynamic-background');

        function changeBackground() {
            backgroundDiv.style.backgroundImage = `url(${images[currentIndex]})`;
            currentIndex = (currentIndex + 1) % images.length; // Cycle through the images
        }

        // Change the background every 5 seconds
        setInterval(changeBackground, 3000);

        // Set the initial background
        changeBackground();
    });
</script>
@endsection