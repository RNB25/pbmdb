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

                    <a href="/register" class="button is-link">Pendaftaran</a>
                </div>
            </div>
        </div>
    </div>
</nav>
