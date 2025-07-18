@extends('layouts.frontend.template')

@section('main-content')
    <header class="">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src=" {{ asset('images/frontend/postti.jpg') }}" alt="..." /></div>
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-black mb-2">WELCOME TO SIMAK TI</h1>
                        <p class="lead fw-normal text-black-50 mb-4" style="font-size: 18px">Sistem informasi KBK ini akan
                            memberikan kemudahan
                            dalam pengelolaan pengurus KBK, pengelolaan mata kuliah per KBK, pengelolaan RPS mata kuliah,
                            pengelolaan soal, dan pengelolaan RPS/Soal yang akurat.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-outline-dark btn-lg px-4 me-sm-3" href="#about">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <section class="py-5" id="about">
        <div class="container px-5 my-5">
            <div class="row gx-5 gx-5 align-items-center justify-content-center">
                <div class="col-lg-4 mb-5 mb-lg-0 ">
                    <h2 class="fw-bolder mb-0 ">Apa itu SIMAK TI ?</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1">
                        Sistem Informasi Manajemen KBK Teknologi Informasi atau dapat disingkat "SIMAK TI" dirancang untuk
                        meningkatkan efisiensi dan
                        efektivitas
                        pengelolaan KBK di jurusan Teknologi Informasi. Sistem ini menyediakan platform terpusat untuk
                        mengelola
                        data dan informasi KBK, termasuk pengurus KBK, mata kuliah, RPS, dan soal ujian. Sistem ini juga
                        memungkinkan integrasi dengan sistem lain yang ada di Politeknik Negeri Padang.
                        Manfaat utama dari sistem ini adalah:
                        <br>
                        <br>
                        <ol>
                            <li>Mempermudah pengelolaan data dan informasi KBK.</li>
                            <li>Meningkatkan akses informasi bagi civitas akademik.</li>
                            <li>Meningkatkan efisiensi dan transparansi dalam pengelolaan KBK.</li>
                            <li>Meningkatkan kualitas dan akuntabilitas penyelenggaraan KBK.</li>
                        </ol>
                        Sistem ini akan dikembangkan dengan menggunakan teknologi terkini dan diimplementasikan dengan
                        mengikuti
                        ruang lingkup yang telah ditetapkan. Sistem Informasi Manajemen KBK Teknologi Informasi diharapkan
                        dapat
                        memberikan kontribusi positif bagi kemajuan jurusan Teknologi Informasi Politeknik Negeri Padang.
                    </div>
                </div>
            </div>
    </section>

    <section class="py-5" id="datakbk">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Data KBK</h2>
                        <p class="lead fw-normal text-muted mb-5">Bertanggung jawab dalam mengurus urusan Kelompok Bidang Keahlian pada jurusan Teknologi Informasi</p>
                    </div>
                </div>
            </div>


            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row gx-5">
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-img-wrapper">
                                        <img class="card-img-top img-fluid rounded-circle custom-img" src="{{ asset('images/softam.jpg') }}" alt="YULHERNIWATI" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">SOFTAM</h5>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-img-wrapper">
                                        <img class="card-img-top img-fluid rounded-circle custom-img" src="{{ asset('images/AI.jpg') }}" alt="Meri Azmi" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">AI</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-img-wrapper">
                                        <img class="card-img-top img-fluid rounded-circle custom-img" src="{{ asset('images/programming.jpg') }}" alt="DENI SATRIA" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">PROGRAMMING</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row gx-5">
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-img-wrapper">
                                        <img class="card-img-top img-fluid rounded-circle custom-img" src="{{ asset('images/ncs.jpg') }}" alt="ALDE ALANDA" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">NETWORK AND CYBERSEC</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <div class="card-img-wrapper">
                                        <img class="card-img-top img-fluid rounded-circle custom-img" src="{{ asset('images/IT.jpg') }}" alt="Hendra Rotama" />
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                        <a class="text-decoration-none link-dark stretched-link" href="#!">
                                            <h5 class="card-title mb-3">IT Infrastructure</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .custom-img {
                    width: 200px;
                    height: 200px;
                    object-fit: cover;
                    margin: 0 auto;
                }

                .card-body {
                    text-align: center;
                }

                .card {
                    margin-top: 50px;
                }

                .card-img-wrapper {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 200px; /* Adjust as needed for better vertical alignment */
                }
            </style>



                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="left: -40px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="right: -40px;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
                <section class="py-5" id="prodi">
                    <div class="container px-5 my-5">
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div class="text-center">
                                    <h2 class="fw-bolder">Prodi</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar1.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar2.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar3.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar4.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar5.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                        <div class="card shadow border-0 d-flex justify-content-center align-items-center"
                            style="height: 150px; border-radius: 25px;">
                            <img class="img-fluid" src="{{ asset('images/frontend/gambar6.jpg') }}" alt="..."
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 25px;" />
                        </div>
                    </div>
                </div>
            </section>



            <div class="py-3 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"The Stepping Stone to International Journey"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" height="40"
                                        src="{{ asset('images/frontend/logoti.png') }}" alt="..." />
                                    <div class="fw-bold">
                                        Teknologi Informasi
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        Politeknik Negeri Padang
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
