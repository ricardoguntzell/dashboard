<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="icon" type="image/png" href=""/>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/login.css') }}">
    <link rel="stylesheet" href="{{url(asset('backend/assets/css/libs.css'))}}">

    <title>Guntzell | Login</title>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-b-160 p-t-50">

            <div class="ajax_response"></div>

            <article class="dash_login_left_box">
                <header class="dash_login_box_headline">
                    <div class="dash_login_box_headline_logo icon-imob icon-notext"></div>
                    <h1 class="login100-form-title p-b-43">Guntzell</h1>
                </header>

                <form class="login100-form" name="login" action="{{route('admin.login.do')}}" method="post"
                      autocomplete="off">

                    <div class="wrap-input100 rs1">
                        <input class="input100" type="email" name="email">
                        <span class="label-input100">
                        <i class="fas fa-envelope"></i> E-mail:
                    </span>
                    </div>

                    <div class="wrap-input100 rs2">
                        <input class="input100" type="password" name="password_check">
                        <span class="label-input100">
                        <i class="fas fa-unlock-alt"></i> Senha:
                    </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            <i class="fas fa-sign-in-alt m-1"></i> Entrar
                        </button>
                    </div>
                </form>

                <footer class="text-center">
                    <p class="text-white">
                        <a target="_blank" class="text-white-50"
                           href="https://api.whatsapp.com/send?phone=55+11+955500041&text=Olá, preciso de ajuda com o login."
                        >
                            <i class="text-white fab fa-whatsapp-square"></i> Precisa de Suporte?
                        </a>
                    </p>

                    <p class="text-white p-3">
                        <small class="text-white-50">Solution <i class="fa fa-copyright text-white"></i> by
                            <span class="font-italic ">
                            <a href="https://www.guntzell.com" class="text-white" target="_blank">Guntzell</a>
                        </span>
                        </small>
                    </p>
                </footer>

                <div class="dash_login_right"></div>
            </article>
        </div>
    </div>
</div>

<script src="{{ asset('backend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('backend/assets/js/login.js') }}"></script>

</body>
</html>
