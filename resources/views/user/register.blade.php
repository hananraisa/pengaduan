<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <!-- Favicon icon -->
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<!-- <div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div> -->
                                    <h1 class="text-center mb-4 text-white">R E G I S T E R</h1>
                                    <form action="{{ route('pengaduan.register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Nik</strong></label>
                                            <input type="text" name="nik" class="form-control" placeholder="Nik">
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-6">
                                                <label class="mb-1 text-white"><strong>Nama</strong></label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                                            </div>
                                            <div class="col-6">
                                                <label class="mb-1 text-white"><strong>Username</strong></label>
                                                <input type="email" name="username" class="form-control" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>No.Telp</strong></label>
                                            <input type="text" name="telp" class="form-control" placeholder="No Telp">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="sumbit" class="btn bg-white text-black btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="{{ route('pengaduan.formLogin') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="./vendor/global/global.min.js"></script>
<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./js/custom.min.js"></script>
<script src="./js/deznav-init.js"></script>

</body>
</html>