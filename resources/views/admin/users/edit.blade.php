@extends('admin.master.master')

@section('content')

    <div class="row">
        <div class="form-group col-md-12">
            <section>
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <i class="fas fa-user-edit fa-2x text-orange mr-2"></i>
                                <h3 class="text-orange">Editar Cliente</h3>
                            </ul>

                            <ul class="navbar-nav my-2 my-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.home') }}">Dashboard
                                        <i class="fas fa-angle-right fa-fw"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users.index') }}">Listagem de Clientes
                                        <i class="fas fa-angle-right fa-fw"></i>
                                    </a>
                                </li>

                                <li class="nav-item active">
                                    <a class="nav-link" title="Editar Cliente"
                                       href="{{ route('admin.users.edit', $user->url_friendly) }}">
                                        <i class="fas fa-user-edit text-orange"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

                <div class="response-user">
                    @if($errors->all())
                        @foreach($errors->all() as $error)
                            @message(['color' => 'danger'])
                            <div class="text-left">
                                <i class="fas fa-exclamation-triangle m-1"></i>{{$error}}
                            </div>
                            @endmessage
                        @endforeach
                    @endif

                    @if(session()->exists('message'))
                        @message(['color' => session()->get('color')])
                        <div class="text-left">
                            <i class="fas fa-check-circle m-1"></i>{{session()->get('message')}}
                        </div>
                        @endmessage
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link gradient-gray-light text-white active" id="pills-data-tab"
                                   data-toggle="pill"
                                   href="#pills-data"
                                   role="tab" aria-controls="pills-data" aria-selected="true">Dados Cadastrais</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link gradient-gray-light text-white" id="pills-complementary-tab"
                                   data-toggle="pill"
                                   href="#pills-complementary"
                                   role="tab" aria-controls="pills-complementary" aria-selected="false">Dados
                                    Complementares</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link gradient-gray-light text-white" id="pills-contact-tab"
                                   data-toggle="pill"
                                   href="#pills-contact"
                                   role="tab" aria-controls="pills-contact" aria-selected="false">Contato</a>
                            </li>
                        </ul>

                        <form class="p-3 mb-5"
                              action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="post"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active p-1 m-auto" id="pills-data" role="tabpanel"
                                     aria-labelledby="pills-data-tab">

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="name" class="text-secondary font-weight-bold">*Nome</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Nome Completo"
                                                   value="{{old('name') ?? $user->name}}"/>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="document" class="text-secondary font-weight-bold">*Data de
                                                Nascimento</label>
                                            <input type="tel" name="date_of_birth" class="form-control mask-date"
                                                   placeholder="Data de Nascimento"
                                                   value="{{ old('date_of_birth') ?? $user->date_of_birth }}"/>
                                        </div>
                                    </div>

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="genre" class="text-secondary font-weight-bold">*Gênero</label>
                                            <div>
                                                <select name="genre"
                                                        class="gradient-gray-light selectpicker form-control"
                                                        data-style=""
                                                        data-live-search="true">
                                                    <option
                                                        value="male" {{ (old('genre')  == 'male' ? 'selected' : ($user->genre == 'male' ? 'selected' : '')) }}>
                                                        Masculino
                                                    </option>
                                                    <option
                                                        value="female" {{ (old('genre')  == 'female' ? 'selected' : ($user->genre == 'female' ? 'selected' : '')) }}>
                                                        Feminino
                                                    </option>
                                                    <option
                                                        value="other" {{ (old('genre')  == 'other' ? 'selected' : ($user->genre == 'other' ? 'selected' : '')) }}>
                                                        Outros
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="document" class="font-weight-bold">*CPF</label>
                                            <input type="tel" class="form-control mask-doc" name="document"
                                                   placeholder="CPF do Cliente"
                                                   value="{{ old('document') ?? $user->document }}"/>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cover">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="cover" class="custom-file-input cover" id="cover"
                                                   aria-describedby="cover">
                                            <label class="custom-file-label" for="cover">Escolher imagem...</label>
                                        </div>
                                    </div>

                                    <div class="form-group" data-toggle="collapse"
                                         data-target="#collapseAccess" aria-expanded="false"
                                         aria-controls="collapseAccess">
                                        <h3 class="text-s text-secondary font-weight-bold">Acesso
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-plus-circle fa-pull-right text-secondary"></i>
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="collapse" id="collapseAccess">
                                        <div class="form-row m-auto">
                                            <div class="form-group col-md-6">
                                                <label for="email"
                                                       class="text-secondary font-weight-bold">*E-mail</label>
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Melhor e-mail"
                                                       value="{{ old('email') ?? $user->email }}"/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="password"
                                                       class="text-secondary font-weight-bold">*Senha</label>
                                                <input type="password" name="password" class="form-control"
                                                       placeholder="Senha de acesso"
                                                       value=""/>
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade m-auto" id="pills-complementary" role="tabpanel"
                                     aria-labelledby="pills-complementary-tab">

                                    <div class="form-group ml-2">
                                        <label for="zipcode" class="text-secondary font-weight-bold">*CEP</label>
                                        <input type="tel" name="zipcode"
                                               class="form-control mask-zipcode zip_code_search"
                                               placeholder="Digite o CEP"
                                               value="{{ old('zipcode') ?? $user->zipcode }}"/>
                                    </div>

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="street"
                                                   class="text-secondary font-weight-bold">*Endereço</label>
                                            <input type="text" name="street" class="form-control street"
                                                   placeholder="Endereço Completo"
                                                   value="{{ old('street') ?? $user->street }}"/>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="state"
                                                   class="text-secondary font-weight-bold">*Estado</label>
                                            <input type="text" name="state" class="form-control state"
                                                   placeholder="Estado"
                                                   value="{{ old('state') ?? $user->state }}"/>
                                        </div>
                                    </div>

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="city"
                                                   class="text-secondary font-weight-bold">*Cidade</label>
                                            <input type="text" name="city" class="form-control city"
                                                   placeholder="Cidade"
                                                   value="{{ old('city') ?? $user->city }}"/>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="neighborhood"
                                                   class="text-secondary font-weight-bold">*Bairro</label>
                                            <input type="text" name="neighborhood" class="form-control neighborhood"
                                                   placeholder="Bairro"
                                                   value="{{ old('neighborhood') ?? $user->neighborhood }}"/>
                                        </div>
                                    </div>

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="name" class="text-secondary font-weight-bold">*Número</label>
                                            <input type="text" name="number" class="form-control"
                                                   placeholder="Número do Endereço"
                                                   value="{{ old('number') ?? $user->number }}"/>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="complement"
                                                   class="text-secondary font-weight-bold">Complemento</label>
                                            <input type="text" name="complement" class="form-control"
                                                   placeholder="Completo (Opcional)"
                                                   value="{{ old('complement') ?? $user->complement }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                     aria-labelledby="pills-contact-tab">

                                    <div class="form-row m-auto">
                                        <div class="form-group col-md-6">
                                            <label for="city"
                                                   class="text-secondary font-weight-bold">Residencial</label>
                                            <input type="tel" name="telephone" class="form-control mask-phone"
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('telephone') ?? $user->telephone }}"/>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="neighborhood"
                                                   class="text-secondary font-weight-bold">*Celular</label>
                                            <input type="tel" name="cell" class="form-control mask-cell"
                                                   placeholder="Número do Telefonce com DDD"
                                                   value="{{ old('cell') ?? $user->cell }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-5">
                                    <button class="btn btn-primary fa-pull-right" type="submit">
                                        <i class="fas fa-check mr-1"></i>Atualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            //SET NAME OF INPUT FILE
            $(".cover").on('change', function () {
                $('label[for=cover]').text($(this).val());
            });
        });
    </script>
@endsection
