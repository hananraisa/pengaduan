<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Petugas</title>
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
                       <h4 class="card-title">Edit Petugas</h4>
                   </div>
                   <div class="card-body">
                       <div class="basic-form">
                       <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" value="{{$petugas->nama_petugas}}" name="nama_petugas" id="nama_petugas" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="{{$petugas->username}}" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="number" value="{{$petugas->telp}}" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <div class="input-group mt-3">
                                <select name="level" id="level" class="custom-select">
                                    @if ($petugas->level == 'admin')
                                    <option selected value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    @else
                                    <option value="admin">Admin</option>
                                    <option selected value="petugas">Petugas</option> 
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning text-white">Update</button>
                    </form>
                    <form action="{{ route('petugas.destroy', $petugas->id) }}" method="post" style="margin-left: 120px; margin-top: -55px;">
                        @csrf
                        @method('DELETE')
                        <button type="sumbit" class="btn btn-danger">Delete</button>
                    </form>
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
