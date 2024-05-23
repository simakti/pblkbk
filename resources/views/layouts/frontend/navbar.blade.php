<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top">
    <div class="container px-5">
        <img src="frontend/images/logo2.png" height="60" alt="" loading="lazy" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item back-to-top"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#pengurus">Pengurus</a></li>
                <li class="nav-item"><a class="nav-link" href="#dosen">Dosen</a></li>
                <li class="nav-item"><a class="nav-link" href="#prodi">Prodi</a></li>
                <li class="nav-item dropdown"  style="margin-left: 15px;">
                    <a class="nav-link dropdown-toggle nav-link-login" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Masuk</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                        <li><a class="dropdown-item" href="/login">Login</a></li>
                        <li><a class="dropdown-item" href="/login">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <style>
        .dropdown-menu {
            padding: 0.2rem;
        }

        .nav-link {
            border-radius: 50px;
            padding: 0.2rem 2rem;
        }

        .nav-link-login {
            background-color: #0c1b0c;
            color: #fff;
        }

        .nav-link-login:hover {
            background-color: #333735;
        }
    </style>
</nav>
