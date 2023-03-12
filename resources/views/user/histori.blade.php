<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Pengaduan Masyarakat</title>
    <!--Lava Landing Page https://templatemo.com/tm-540-lava-landing-page-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-lava.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            Pengaduan
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <!-- <ul class="nav">
                            <li class=""><a href="" class="menu-item">Welcome!</a></li>
                        </ul> -->
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-12 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Pengaduan<em> Masyarakat</em></h1>
                        <p>Penyampaian keluhan oleh masyarakat kepada pemerintah atas pelayanan yang tidak sesuai dengan
                            standar pelayanan, atau pengabaian kewajiban dan/atau pelanggaran larangan.</p>
                        <a href="{{ route('pengaduan.masyarakat') }}" class="main-button-slider-1">Masyarakat</a>
                        <a href="{{ route('pengaduan.logout') }}" class="main-button-slider-2">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    <div class="container">
        <h2 class="text-center mb-5">Welcome! <a href="{{ route('pengaduan.logout') }}" class="menu-item" style="color: #fba70b;">{{ Auth::guard('masyarakat')->user()->nama }}</a></h2>
        <div class="table-responsive">
            <table class="display min-w850 dataTable table table-responsive-md" role="grid" aria-describedby="example_info" id="petugasTable">
                <thead>
                    <tr class="text-center">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Nama Pelapor </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Isi Laporan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Foto</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Status</th>
                    </tr>
                </thead>
                <tbody> 
                    <!-- @foreach( $pengaduan as $k => $v )
                    <tr class="text-sm font-weight-bold mb-0 text-center">
                        <td>{{$k += 1}}</td>
                        <td>{{$v->user->nama}}</td>
                        <td>{{$v->isi_laporan}}</td>
                        <td>
                            @if ($v->foto != null)
                            <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}"
                                class="gambar-lampiran">
                            @endif
                            @if ($v->tanggapan != null)
                            {{ $v->tanggapan->petugas->nama_petugas }}
                            {{ $v->tanggapan->tanggapan }}
                            @endif
                        </td>
                        <td>
                            @if ($v->status == '0')
                            Pending
                            @elseif($v->status == 'proses')
                            {{ ucwords($v->status) }}
                            @else
                            {{ ucwords($v->status) }}
                            @endif
                        </td>
                        @endforeach -->
                        @foreach($userHistory as $row)
                            <tr class="text-sm font-weight-bold mb-0 text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->user->nama }}</td>
                                <td>{{ $row->isi_laporan }}</td>
                                <td>
                                    @if ($row->foto != null)
                                    <img src="{{ Storage::url($row->foto) }}" alt="{{ 'Gambar '.$row->judul_laporan }}"
                                        class="gambar-lampiran" width="100px">
                                    @endif
                                    @if ($row->tanggapan != null)
                                    {{ $row->tanggapan->petugas->nama_petugas }}
                                    {{ $row->tanggapan->tanggapan }}
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == '0')
                                    <a href="#" class="badge badge-danger">Pending</a>
                                    @elseif($row->status == 'proses')
                                    <a href="#" class="badge badge-warning text-white">Proses</a>
                                    @else
                                    <a href="#" class="badge badge-success">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <table>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/scrollreveal.min.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>
