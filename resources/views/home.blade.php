<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Institut Teknologi Yogyakarta</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ 'landing-page/assets/navbar-ity-logo.png' }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landing-page/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('landing-page/assets/img/navbar-brand-ity.png') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang</div>
            <div class="masthead-heading text-uppercase">Institut Teknologi Yogyakarta</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Selengkapnya</a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Profil Kami</h2>
                <h3 class="section-subheading">ITY Press adalah unit pelaksana teknis Institut Teknologi
                    Yogyakarta (ITY) yang didirikan pada 18 Maret 2016.</h3>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Katalog</h2>
                <h3 class="section-subheading">Buku Best Seller Dari Kami</h3>
            </div>
            <div class="row">
                @foreach ($semuaBuku as $buku)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal"
                                data-bs-target="#modal{{$buku->id_buku}}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid portfolio-image" src="{{ asset("/buku/$buku->gambar") }}"
                                    alt="{{ $buku->judul }}" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $buku->judul }}</div>
                                <div class="portfolio-caption-subheading">Pengarang: {{ $buku->penulis }}</div>
                                <div class="portfolio-caption-price">Harga: Rp {{ $buku->harga }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @foreach ($semuaBuku as $buku)
    <!-- Modal Buku -->
    <div class="portfolio-modal modal fade" id="modal{{$buku->id_buku}}" tabindex="-1" aria-labelledby="modal{{$buku->id_buku}}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="{{ asset('landing-page/assets/img/close-icon.svg') }}" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <h2 class="text-uppercase">{{ $buku->judul }}</h2>
                                <img class="img-fluid d-block mx-auto"  src="{{ asset("/buku/$buku->gambar") }}" alt="{{ $buku->judul }}" />
                                <ul class="list-inline">
                                    <li>
                                        <strong>Pengarang:</strong>
                                        <span>{{ $buku->penulis }}</span>
                                    </li>
                                    <li>
                                        <strong>Harga:</strong>
                                        <span>Rp {{ $buku->harga }}</span>
                                    </li>
                                </ul>
                                <a href="{{ url("/checkout/$buku->id_buku") }}" class="btn btn-primary btn-xl text-uppercase">
                                    <i class="fas fa-shopping-cart me-1"></i>Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing-page/js/scripts.js') }}"></script>

</body>
</html>
