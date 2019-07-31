@php
    use \Illuminate\Support\Facades\Auth as AuthUser;
    use \Illuminate\Support\Facades\File as File;

    if(!empty(AuthUser::user()->cover) && File::exists(public_path().'/storage/'.AuthUser::user()->cover)){
        $cover = AuthUser::user()->url_cover;
    } else{
        $cover = url(asset('backend/assets/img/user.jpg'));
    }
@endphp
    <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Guntzell | Dashboard</title>

    <link rel="stylesheet" href="{{url(asset('backend/assets/css/libs.css'))}}">
    <link rel="stylesheet" href="{{ url(asset('backend/assets/css/main.css')) }}">
    <link rel="stylesheet" href="{{ url(asset('backend/assets/css/sidebar-themes.css')) }}">
    <link rel="stylesheet" href="{{ url(asset('backend/assets/css/style.css')) }}">

    @hasSection('css')
        @yield('css')
    @endif

    <link rel="shortcut icon" type="image/png" href=""/>
</head>

<body>

<div class="page-wrapper chiller-theme bg1 toggled" style="background: #f7f7f7;">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <!-- sidebar-brand  -->
            <div class="sidebar-item sidebar-brand text-center">
                <a href="{{ route('admin.home') }}"><i class="fas fa-home fa-2x"></i></a>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                <div class="user-pic">
                    <img class="img-responsive img-circle rounded-circle"
                         src="{{ $cover }}"
                         alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name p-3 text-capitalize">{{ AuthUser::user()->name }}</span>
                </div>
            </div>

            <!-- sidebar-menu  -->
            <div class=" sidebar-item sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar">
                        <a href="{{ route('admin.home') }}">
                            <i class="fa fa-tachometer-alt"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="menu-text">Clientes</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="{{ route('admin.users.index') }}">
                                        <i class="fas fa-list"></i>Listagem
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.users.create') }}">
                                        <i class="fas fa-user-plus"></i>Novo Cliente
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>

        <!-- sidebar-footer  -->
        <div class="sidebar-footer transition">
            <div>
                <a title="Sair" class="transition" href="{{ route('admin.logout') }}">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- page-content  -->
    <main class="page-content pt-2">
        <div id="overlay" class="overlay"></div>
        <div class="container-fluid p-3">
            <div class="row">
                <div class="form-group col-md-12">
                    <a id="toggle-sidebar" class="btn btn-secondary" href="#">
                        <i id="toggle-sidebar-icon" class="fas fa-angle-double-left"></i>
                    </a>
                </div>
            </div>

            @yield('content')

            <div class="row">
                <div class="form-group col-md-12 mb-1">
                    <hr>
                    <small>Solution <i class="fa fa-copyright"></i> by
                        <span class="text-secondary font-weight-bold">
                            <a href="https://www.guntzell.com" class="text-secondary font-weight-bold" target="_blank">
                                Guntzell
                            </a>
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </main>
    <!-- page-content" -->
</div>
<!-- page-wrapper -->

<!-- using local scripts -->
<script src="{{ url(asset('backend/assets/js/jquery.js')) }}"></script>
<script src="{{ url(asset('backend/assets/js/libs.js')) }}"></script>
<script src="{{ url(asset('backend/assets/js/scripts.js')) }}"></script>

@hasSection('js')
    @yield('js')
@endif

</body>
</html>
