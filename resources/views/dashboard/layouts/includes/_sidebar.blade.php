<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="/">
            <i class="fa fa-circle-notch text-primary"></i>
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">ne</span> <span class="font-w400">4.0</span>
            </span>
        </a>
        <!-- END Logo -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                    <i class="nav-main-link-icon si si-cursor"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('siswa*') ? ' active' : '' }}" href="/siswa">
                    <i class="nav-main-link-icon fa fa-user-alt"></i>
                    <span class="nav-main-link-name">Siswa</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('guru*') ? ' active' : '' }}" href="/guru">
                    <i class="nav-main-link-icon fa fa-user-graduate"></i>
                    <span class="nav-main-link-name">Guru</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('staff*') ? ' active' : '' }}" href="/staff">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Staff</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('kandidat*') ? ' active' : '' }}" href="/kandidat">
                    <i class="nav-main-link-icon fa fa-user-tie"></i>
                    <span class="nav-main-link-name">Kandidat</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('voters*') ? ' active' : '' }}" href="/voters">
                    <i class="nav-main-link-icon fa fa-check"></i>
                    <span class="nav-main-link-name">Voters</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is(['waktu*', 'waktuMulai*', 'waktuTampil*']) ? ' active' : '' }}" href="/waktu">
                    <i class="nav-main-link-icon fa fa-clock"></i>
                    <span class="nav-main-link-name">Waktu</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>