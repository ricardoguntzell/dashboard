@extends('admin.master.master')

@section('content')

    <div class="row">
        <div class="form-group col-md-12">
            <section>
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <h3 class="text-orange">Listagem de Clientes</h3>
                            </ul>

                            <ul class="navbar-nav my-2 my-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.home') }}">Dashboard
                                        <i class="fas fa-angle-right fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.users.index') }}">Listagem de Clientes
                                        <i class="fas fa-angle-right fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="Novo Cliente" href="{{ route('admin.users.create') }}">
                                        <i class="fas fa-user-plus text-orange"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                <div class="">
                    <table id="dataTable" class="table table-striped table-bordered"
                           style="width: 100% !important;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome Completo</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Nascimento</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->url_friendly) }}"
                                       title="Editar Cliente" class="text-orange">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>{{ $user->document }}</td>
                                <td><a href="mailto:{{ $user->email }}" class="text-dark">{{ $user->email }}</a>
                                </td>
                                <td>{{ $user->date_of_birth }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
