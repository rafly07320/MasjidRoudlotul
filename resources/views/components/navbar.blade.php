<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="w-10 mx-auto" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Masjid Roudlotul
                Ulum</span>
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="">
                    <a href="{{ route('home.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:hover:bg-transparent hover:bg-gray-100 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent
                        {{ request()->routeIs('home.index') ? 'bg-blue-700 text-white md:text-blue-700 dark:bg-blue-600' : '' }}"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class=" flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 
                        md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto 
                        dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white 
                        dark:hover:bg-gray-700 md:dark:hover:bg-transparent
                        {{ request()->routeIs('home.artikel', 'home.kegiatan') ? 'bg-blue-700 text-white md:bg-transparent hover:text-gray-900 md:text-blue-700' : '' }}">Tentang
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('home.kegiatan') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                                    {{ request()->routeIs('home.kegiatan') ? ' text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:bg-blue-600' : '' }}">Kegiatan</a>
                            </li>
                            <li>
                                <a href="{{ route('home.artikel') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white
                                    {{ request()->routeIs('home.artikel') ? ' text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:bg-blue-600' : '' }}">Artikel</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
