<nav id="main-navbar" class="navbar is-fixed-top navbar-white-text px-16" style="background-color: transparent; box-shadow: none;" role="navigation"
    aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="./">
            <img src="{{ asset('asset/logo/logo-smp.png') }}" style="max-height: 4rem;"
                alt="Logo">
            <div class="is-flex is-flex-direction-column is-justify-content-center ml-2">
                <p class="has-text-weight-bold is-size-6 navbar-text-color">Sekolah Menengah Pertama</p>
                <p class="is-size-9 navbar-text-color">KARYA GUNA JAYA</p>
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
            <a class="ml-5 navbar-text-color" href="">Home</a>

            <div class="dropdown is-hoverable">
                <div class="dropdown-trigger">
                    <a class="ml-5 navbar-text-color" href="" aria-haspopup="true" aria-controls="dropdown-menu4">Profile</a>
                    <i class="fas fa-angle-down navbar-text-color" aria-hidden="true"></i>
                </div>
                <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                    <div class="dropdown-content">
                        <a href="#" class="dropdown-item has-text-weight-semibold navbar-text-color">Struktur Organisasi</a>
                        <a href="#" class="dropdown-item has-text-weight-semibold navbar-text-color">Kepala Sekolah</a>
                        <a href="#" class="dropdown-item has-text-weight-semibold navbar-text-color">Pendidik</a>
                        <a href="#" class="dropdown-item has-text-weight-semibold navbar-text-color">Ekstrakulikuler</a>
                    </div>
                </div>
            </div>

            <a class="ml-5 navbar-text-color" href="">Info</a>
            <a class="ml-5 navbar-text-color" href="">Galeri</a>
            <a class="ml-5 navbar-text-color" href="">Contact</a>

        </div>

        <div class="navbar-end is-flex is-align-items-center">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="/module-pendaftaran" class="button is-link !text-white">Pendaftaran</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<style>
    .navbar-white-text .navbar-text-color,
    .navbar-white-text .navbar-text-color:visited,
    .navbar-white-text .navbar-text-color:active,
    .navbar-white-text .navbar-text-color:focus,
    .navbar-white-text .navbar-text-color:hover,
    .navbar-white-text .navbar-burger span,
    .navbar-white-text .navbar-burger {
        color: #fff !important;
        fill: #fff !important;
    }
    .navbar-white-bg .navbar-text-color,
    .navbar-white-bg .navbar-text-color:visited,
    .navbar-white-bg .navbar-text-color:active,
    .navbar-white-bg .navbar-text-color:focus,
    .navbar-white-bg .navbar-text-color:hover,
    .navbar-white-bg .navbar-burger span,
    .navbar-white-bg .navbar-burger {
        color: #222 !important;
        fill: #222 !important;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navbar = document.getElementById('main-navbar');
        function updateNavbarTextColor() {
            if (window.scrollY > 0) {
                navbar.style.backgroundColor = 'white';
                navbar.style.boxShadow = '0 2px 4px rgba(0,0,0,0.05)';
                navbar.classList.add('has-background-white', 'navbar-white-bg');
                navbar.classList.remove('navbar-white-text');
            } else {
                navbar.style.backgroundColor = 'transparent';
                navbar.style.boxShadow = 'none';
                navbar.classList.remove('has-background-white', 'navbar-white-bg');
                navbar.classList.add('navbar-white-text');
            }
        }
        updateNavbarTextColor();
        window.addEventListener('scroll', updateNavbarTextColor);
    });
</script>
