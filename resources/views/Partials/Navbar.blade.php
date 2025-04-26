<nav class="navbar is-fixed-top " style="background-color: transparent; box-shadow: none;" role="navigation"
    aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="./">
            <img src="{{ asset('asset/logo/logo-smp-nav-removebg-preview.png') }}" style="max-height: 4rem;"
                alt="Logo">
            <div class="is-flex is-flex-direction-column is-justify-content-center ml-2">
                <p class="has-text-weight-bold is-size-6 has-text-black">SMP</p>
                <p class="is-size-9 has-text-black">KARYA GUNA JAYA</p>
            </div>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu is-flex is-align-items-center is-justify-content-space-between">
        <div class="navbar-start is-flex is-justify-content-center is-align-items-center w-full">
            <a class="ml-5 " href="">Home</a>

            <div class="dropdown is-hoverable">
                <div class="dropdown-trigger">
                    <a class="ml-5 " href="" aria-haspopup="true" aria-controls="dropdown-menu4">Profile</a>
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </div>
                <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                    <div class="dropdown-content">
                        <a href="#" class="dropdown-item  has-text-weight-semibold">Struktur Organisasi</a>
                        <a href="#" class="dropdown-item  has-text-weight-semibold">Kepala Sekolah</a>
                        <a href="#" class="dropdown-item  has-text-weight-semibold">Pendidik</a>
                        <a href="#" class="dropdown-item  has-text-weight-semibold">Ekstrakulikuler</a>
                    </div>
                </div>
            </div>

            <a class="ml-5 " href="">Info</a>
            <a class="ml-5 " href="">Galeri</a>
            <a class="ml-5 " href="">Contact</a>

        </div>

        <div class="navbar-end is-flex is-align-items-center">
            <div class="navbar-item">
                <div class="buttons">
                    <button class="button is-success">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                        </svg>
                    </button>
                    <a href="/register" class="button is-link">Pendaftaran</a>
                </div>
            </div>
        </div>
    </div>
</nav>
