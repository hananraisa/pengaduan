<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pengaduan Masyarakat</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="/vendor/chartist/css/chartist.min.css">
    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Content body start
        ***********************************-->
        <!-- row -->
        <div class="container-fluid">
            <div class="col-6 mt-5" style="margin-left: 400px;">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Isi Tanggapan</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $pengaduan->id }}">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group mb-3">
                                        <select name="status" id="status" class="custom-select">
                                            @if($pengaduan->status == '0')
                                            <option selected value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            @elseif($pengaduan->status == 'proses')
                                            <option value="0">Pending</option>
                                            <option selected value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            @else
                                            <option value="0">Pending</option>
                                            <option value="proses">Proses</option>
                                            <option selected value="selesai">Selesai</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- <div class="form-group col-12">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div> -->

                                    <div class="form-group col-12">
                                        <label>Tanggapan</label>
                                        <textarea name="tanggapan" class="form-control" rows="4"
                                            id="tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Add</button>
                            </form>
                            @if (Session::has('status'))
                                <div class="alert alert-success mt-2">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/deznav-init.js"></script>
    <script src="/vendor/owl-carousel/owl.carousel.js"></script>

    <!-- Chart piety plugin files -->
    <script src="/vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <script src="/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="/js/dashboard/dashboard-1.js"></script>
    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 30,
                nav: false,
                dots: false,
                left: true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                    '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    484: {
                        items: 2
                    },
                    882: {
                        items: 3
                    },
                    1200: {
                        items: 2
                    },

                    1540: {
                        items: 3
                    },
                    1740: {
                        items: 4
                    }
                }
            })
        }
        jQuery(window).on('load', function () {
            setTimeout(function () {
                carouselReview();
            }, 1000);
        });

    </script>
</body>

</html>
