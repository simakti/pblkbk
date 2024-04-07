@extends('layouts.frontend.template')

@section('main-content')
    <header class="">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="frontend/images/ti.jpg" alt="..." /></div>
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

    <section class="py-5" id="pengurus">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Pengurus KBK</h2>
                        <p class="lead fw-normal text-muted mb-5">Bertanggung jawab dalam mengurus urusan Kelompok Bidang
                            Keahlian pada jurusan Teknologi Informasi</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="frontend/images/default.png" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">SOFTAM</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">YULHERNIWATI, S.Kom, M.T</h5>
                            </a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="frontend/images/default.png" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">CAIT</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">HUMAIRA, S.T, M.T</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="frontend/images/default.png" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">PROGRAMMING</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">DENI SATRIA, S.Kom, M.Kom</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="frontend/images/default.png" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">NETWORKING</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">ALDE ALANDA, S.Kom, M.T</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="frontend/images/default.png" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">IT SUPPORT</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">TAUFIK GUSMAN, S.S.T, M.Ds</h5>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-3 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"The Stepping Stone to International Journey"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" height="40" src="frontend/images/logoti.png"
                                        alt="..." />
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
