<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care</title>
    <link rel="stylesheet" type="text/css" href="{{ asset ('resources/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('resources/login/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('resources/login/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('resources/login/css/iofrm-theme8.css') }}">
</head>
<style>
    .img-holder {
        display: inline-block;
        position: absolute;
        top: 0;
        left: 0;
        width: 550px;
        min-height: 550px;
        height: 100%;
        overflow: hidden;
        padding: 60px;
        text-align: center;
        z-index: 999;
    }
    .img-holder .info-holder h3 {
        display: inline-block;
        color: #fff;
        text-align: left;
        font-size: 25px;
        font-weight: 900;
        margin-bottom: 0px;
        width: 100%;
        max-width: 378px;
        padding-right: 30px;
    }

    .form-content .form-button .ibtn {
        background-color: #ffc107;
        color: #ffffff;
        -webkit-box-shadow: 0 0 0 rgb(0 0 0 / 16%);
        box-shadow: 0 0 0 rgb(0 0 0 / 16%);
    }
    
</style>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="{{ asset('resources/login/images/logo-light.svg') }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3 class="text-success">Yayasan Semen Padang</h3>
                    <h3 class="text-warning">Day Care</h3>
                    <p>Sistem Informasi Manajemen Day Care</p>
                    <img src="{{ asset ('resources/login/images/logo2.png')  }}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="info-holder">
                            <h3 class="text-light text-center">Form Login</h3>
                        </div>
                        {{-- <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <img class="logo-size" src="{{ asset('resources/login/images/logo-light.svg') }}" alt="">
                                </div>
                            </a>
                        </div> --}}
        
                        <form method="POST" action="{{ route ('login') }}">
                            @csrf
                            <label class="mb-1"><strong>NIP</strong></label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="NIP" required>
                            
                            <label class="mb-1"><strong>Password</strong></label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <span> &copy; 2022 Yayasan Semen Padang </span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="{{ asset('resources/login/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/login/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/login/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/login/js/main.js') }}"></script>
</body>
</html>