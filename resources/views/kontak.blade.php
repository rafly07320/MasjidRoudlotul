@extends('layouts.home')
@section('title', 'Kontak')
@section('content')
    <div class="container mx-auto min-w-full">
        <div class="flex flex-col md:flex-row mx-auto justify-center min-w-full my-8">
            <div class="flex justify-start items-center min-w-[50%]">
                <div class="flex flex-col p-10">
                    <div class="mb-8">
                        <h1 class="text-4xl md:text-7xl font-sans font-bold mb-4">Kontak Kami</h1>
                        <div class="flex flex-col md:flex-row gap-4">
                            <div
                                class="max-w-full md:w-[50%] flex  flex-col items-center justify-center p-6 bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-10 h-10 mb-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                    <h5 class="mb-3 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Ust. Khanafi S.Ag</h5>
                                
                                <p class="mb-3 text-xl font-semibold  text-black dark:text-gray-400">+6289644802622</p>
                                <a href="https://wa.me/6289644802622" target="_blank" rel="noopener noreferrer">
                                <button type="button"
                                    class="text-white bg-orange-500	 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Chat or Call
                                </button>
                                </a>
                            </div>
                            <div
                                class="max-w-full md:w-[50%] flex flex-col items-center justify-center p-6 bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <svg class="w-10 h-10 mb-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6">
                                    <path
                                        d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 0 0-1.032-.211 50.89 50.89 0 0 0-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 0 0 2.433 3.984L7.28 21.53A.75.75 0 0 1 6 21v-4.03a48.527 48.527 0 0 1-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979Z" />
                                    <path
                                        d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 0 0 1.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0 0 15.75 7.5Z" />
                                </svg>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=raflydrr2001@gmail.com&subject=Your%20Subject&body=Your%20Message" 
                                    target="_blank" rel="noopener noreferrer">
                                    <h5 class="mb-3 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Email
                                    </h5>
                                </a>
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=raflydrr2001@gmail.com&subject=Your%20Subject&body=Your%20Message" target="_blank" rel="noopener noreferrer"
                                    class="text-xl font-semibold text-black dark:text-gray-400">
                                    roudlotululum@gmail.com
                                </a>
                                <!--
                                <a href="https://wa.me/6289644802622">
                                <button type="button"
                                    class="text-white bg-orange-500	 hover:bg-orange-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Chat with Sales
                                </button>
                                </a>
                                -->
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-4xl font-sans font-bold mb-4">Informasi Alamat Masjid </h1>
                        <p>Jl. Dupak Baru III No.43, Jepara, Kec. Bubutan, Surabaya, Jawa Timur 60171</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center min-w-[50%]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.988655447958!2d112.71967427367568!3d-7.242128892764206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9005a3f448f%3A0x4a67fc0b5a4c45b3!2sMasjid%20Roudlotul%20Ulum%20Dupak%20Baru!5e0!3m2!1sid!2sid!4v1735800768883!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

    </div>
@endsection
