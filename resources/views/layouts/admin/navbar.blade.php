<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <img class="img-fluid rounded-3 my-5" src="{{ asset('images/logo3.png') }}" alt="..." style="width: 200px; height: auto; margin: 20px auto;" />
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        @hasrole('admin')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Data Jurusan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item"><a href="/dosen" class="menu-link"><div data-i18n="Without menu">Dosen</div></a></li>
                <li class="menu-item"><a href="/prodi" class="menu-link"><div data-i18n="Without navbar">Prodi</div></a></li>
                <li class="menu-item"><a href="/jurusan" class="menu-link"><div data-i18n="Blank">Jurusan</div></a></li>
                <li class="menu-item"><a href="/thnakd" class="menu-link"><div data-i18n="Container">Tahun Akademik</div></a></li>
                <li class="menu-item"><a href="/dosenmatakuliah" class="menu-link"><div data-i18n="Container">Dosen Matakuliah</div></a></li>
                <li class="menu-item"><a href="/kurikulum" class="menu-link"><div data-i18n="Fluid">Kurikulum</div></a></li>
                <li class="menu-item"><a href="/matakuliah" class="menu-link"><div data-i18n="Blank">Matakuliah</div></a></li>
                <li class="menu-item"><a href="/pimpinanjurusan" class="menu-link"><div data-i18n="Blank">Pimpinan Jurusan</div></a></li>
                <li class="menu-item"><a href="/pimpinanprodi" class="menu-link"><div data-i18n="Blank">Pimpinan Prodi</div></a></li>
            </ul>
        </li>
        @endhasrole

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Entry Data KBK</span>
        </li>

        @hasrole('penguruskbk|admin')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">KBK</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item"><a href="/penguruskbk" class="menu-link"><div data-i18n="Account">Dosen KBK</div></a></li>
                <li class="menu-item"><a href="/datakbk" class="menu-link"><div data-i18n="Notifications">Data KBK</div></a></li>
                <li class="menu-item"><a href="/matkul_kbk" class="menu-link"><div data-i18n="Connections">Mata Kuliah KBK</div></a></li>

            </ul>
        </li>
        @endhasrole

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Data RPS</div>
            </a>
            <ul class="menu-sub">
                @hasrole('dosenpengampu|admin')
                <li class="menu-item"><a href="/repo_rps" class="menu-link"><div data-i18n="Basic">Upload RPS</div></a></li>
                @endhasrole
                @hasrole('kaprodi|admin|penguruskbk')
                <li class="menu-item"><a href="/verif_rps" class="menu-link"><div data-i18n="Basic">Verifikasi RPS</div></a></li>
                @endhasrole
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Data Soal Uas</div>
            </a>
            <ul class="menu-sub">
                @hasrole('dosenpengampu|admin')
                <li class="menu-item"><a href="/repo_uas" class="menu-link"><div data-i18n="Error">Upload Soal Uas</div></a></li>
                @endhasrole
                @hasrole('kaprodi|admin|penguruskbk')
                <li class="menu-item"><a href="/verif_uas" class="menu-link"><div data-i18n="Under Maintenance">Verifikasi Uas</div></a></li>
                @endhasrole
            </ul>
        </li>
        @hasrole('kaprodi|penguruskbk|admin')
        <li class="menu-item">
            <a href="/berita_acara_rps" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Analytics">Berita Acara RPS</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/berita_acara_uas" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Analytics">Berita Acara UAS</div>
            </a>
        </li>
        @endhasrole

    </ul>
</aside>

    <!-- Navbar -->
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                    <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">{{ Auth::user()->getRoleNames()->join(', ') }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li><a class="dropdown-item" href="#"><i class="bx bx-user me-2"></i><span class="align-middle">My Profile</span></a></li>
                        <li><a class="dropdown-item" href="#"><i class="bx bx-cog me-2"></i><span class="align-middle">Settings</span></a></li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                    <span class="flex-grow-1 align-middle">Billing</span>
                                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                </span>
                            </a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li><a class="dropdown-item" href="/"><i class="bx bx-power-off me-2"></i><span class="align-middle">Log Out</span></a></li>                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('logout-link').addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah perilaku default dari link
                document.getElementById('logout-form').submit(); // Melakukan submit form
            });
        });
    </script>
