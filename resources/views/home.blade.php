@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-2">
    <div class="row justify-content-center">
        <div class="row">
            <button class="col-sm-3 btn" type="button" data-bs-toggle="modal" data-bs-target="#modal_filtros">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Filtros  
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                            </svg>
                        </h5>
                        <p class="card-text">Monitore e cadastre filtros de ar</p>
                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filtro">
                            Cadastrar Filtro
                        </button> -->
                    </div>
                </div>
            </button>
            <button class="col-sm-3 btn" type="button" data-bs-toggle="modal" data-bs-target="#modal_amostras">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Amostragens
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16"><path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/><path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/></svg>
                    </h5>
                    <p class="card-text">Gerencie suas amostragens</p>
                </div>
                </div>
            </button>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals Filtro-->
    <div class="modal fade" id="modal_filtros" tabindex="-1" aria-labelledby="modal_filtros" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_filtros">Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-around align-items-stretch">
                    <button type="button" class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#list_filtro">
                        Listar Filtros
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filtro">
                        Cadastrar Filtro
                    </button> 
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="filtro" tabindex="-1" aria-labelledby="filtro" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filtro">Cadastro de Filtro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('filtros.add') }}" method="post" id="cadastroFiltro">
                        @csrf
                        <div class="mb-3 d-flex">
                            <span class="d-flex flex-column col-3">
                                <label for="n_filtro" class="form-label"><b>{{ __('Nº Filtro') }}</b></label>
                                <input type="number" class="form-control" id="n_filtro" name="n_filtro" min="0" required>
                            </span>
                            <span class="col-1"></span>
                            <span class="d-flex flex-column col-8">
                                <label for="local" class="form-label"><b>{{ __('Local') }}</b></label>
                                <input type="text" class="form-control" id="local" name="local" required>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="calibrado_CPV" class="form-label"><b>{{ __('Calibrado CPV') }}</b></label>
                            <input type="number" class="form-control" id="calibrado_CPV" name="calibrado_CPV" min="0" step=".0001" value="729.0000">
                        </div>
                        <div class="mb-3">
                            <label for="inclinacao" class="form-label"><b>{{ __('Inclinação') }}</b></label>
                            <input type="number" class="form-control" id="inclinacao" name="inclinacao" min="0" step=".0001" value="1.0979">
                        </div>
                        <div class="mb-3">
                            <label for="ultima_calibracao" class="form-label"><b>{{ __('Data Última Calibração') }}</b></label>
                            <input type="date" class="form-control" id="ultima_calibracao" name="ultima_calibracao" required>
                        </div>
                        <div class="mb-3">
                            <label for="intercepto" class="form-label"><b>{{ __('Intercepto') }}</b></label>
                            <input type="number" class="form-control" id="intercepto" name="intercepto" step=".0001" value="-0.1575">
                        </div>
                        <div class="mb-3">
                            <label for="correlacao" class="form-label"><b>{{ __('Correlação') }}</b></label>
                            <input type="number" class="form-control" id="correlacao" name="correlacao" min="0" step=".0001" value="0.9978">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="cadastroFiltro">Cadastrar</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-xl" id="list_filtro" tabindex="-1" aria-labelledby="list_filtro" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="list_filtro">Listagem de Filtro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Nº Filtro</th>
                            <th scope="col">Local</th>
                            <th scope="col">Calibrado CPV</th>
                            <th scope="col">Inclinação</th>
                            <th scope="col">Última Calibração (yyyy-MM-dd)</th>
                            <th scope="col">Intercepto</th>
                            <th scope="col">Correlação</th>
                            <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($filtros->first())
                                @foreach($filtros as $filtro)
                                    <tr>
                                        <td>{{$filtro->n_filtro}}</td>
                                        <td>{{$filtro->local}}</td>
                                        <td>{{$filtro->calibrado_CPV}}</td>
                                        <td>{{$filtro->inclinacao}}</td>
                                        <td>{{$filtro->ultima_calibracao}}</td>
                                        <td>{{$filtro->intercepto}}</td>
                                        <td>{{$filtro->correlacao}}</td>
                                        <td>
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_filtro_{{$filtro->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_filtro_{{$filtro->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="7" class="opacity-50 text-center">Nothing to show.</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>

    @if($filtros->first())
        @foreach($filtros as $filtro)
        <div class="modal fade" id="delete_filtro_{{$filtro->id}}" tabindex="-1" aria-labelledby="delete_filtro_{{$filtro->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_filtro_{{$filtro->id}}">Excluir Filtro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('filtros.delete', ['id' => $filtro->id]) }}" method="post" id="delete_filtro_{{$filtro->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h3>Tem creteza que deseja deletar o Filtro-{{$filtro->n_filtro}}/{{$filtro->local}}?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >Deletar</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_filtro_{{$filtro->id}}" tabindex="-1" aria-labelledby="edit_filtro_{{$filtro->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filtro">Alteração de Filtro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('filtros.edit', ['id' => $filtro->id]) }}" method="post" id="edit_filtro_{{$filtro->id}}">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 d-flex">
                                <span class="d-flex flex-column col-3">
                                    <label for="n_filtro" class="form-label"><b>{{ __('Nº Filtro') }}</b></label>
                                    <input type="number" class="form-control" id="n_filtro" name="n_filtro" min="0" required>
                                </span>
                                <span class="col-1"></span>
                                <span class="d-flex flex-column col-8">
                                    <label for="local" class="form-label"><b>{{ __('Local') }}</b></label>
                                    <input type="text" class="form-control" id="local" name="local" required>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="calibrado_CPV" class="form-label"><b>{{ __('Calibrado CPV') }}</b></label>
                                <input type="number" class="form-control" id="calibrado_CPV" name="calibrado_CPV" min="0" step=".0001" value="{{$filtro->calibrado_CPV}}">
                            </div>
                            <div class="mb-3">
                                <label for="inclinacao" class="form-label"><b>{{ __('Inclinação') }}</b></label>
                                <input type="number" class="form-control" id="inclinacao" name="inclinacao" min="0" step=".0001" value="{{$filtro->inclinacao}}">
                            </div>
                            <div class="mb-3">
                                <label for="ultima_calibracao" class="form-label"><b>{{ __('Data Última Calibração') }}</b></label>
                                <input type="date" class="form-control" id="ultima_calibracao" name="ultima_calibracao" value="{{$filtro->ultima_calibracao}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="intercepto" class="form-label"><b>{{ __('Intercepto') }}</b></label>
                                <input type="number" class="form-control" id="intercepto" name="intercepto" step=".0001" value="{{$filtro->intercepto}}">
                            </div>
                            <div class="mb-3">
                                <label for="correlacao" class="form-label"><b>{{ __('Correlação') }}</b></label>
                                <input type="number" class="form-control" id="correlacao" name="correlacao" min="0" step=".0001" value="{{$filtro->correlacao}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif
<!-- End Modals Filtro -->

<!-- Modals Amostras-->
    <div class="modal fade" id="modal_amostras" tabindex="-1" aria-labelledby="modal_amostras" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_amostras">Amostragens</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-around align-items-stretch">
                    <button type="button" class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#list_amostras">
                        Listar Amostragens
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#amostra">
                        Cadastrar Amostragens
                    </button> 
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="amostra" tabindex="-1" aria-labelledby="amostra" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="amostra">Cadastro de Filtro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('amostragens.add') }}" method="post" id="cadastroAmostra">
                        @csrf
                        <div class="mb-3">
                            <label for="data_amostragem" class="form-label"><b>{{ __('Data da Amostragem') }}</b></label>
                            <input type="date" class="form-control" id="data_amostragem" name="data_amostragem" required>
                        </div>
                        <div class="mb-3">
                            <label for="duracao" class="form-label"><b>{{ __('Período') }}</b></label>
                            <input type="number" class="form-control" id="duracao" name="duracao" min="24" max="24" value="24" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_filtro" class="form-label"><b>{{ __('Tipo de Filtro') }}</b></label>
                            <input type="text" class="form-control" id="tipo_filtro" name="tipo_filtro" value="Fibra de Vidro" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="duracao" class="form-label"><b>{{ __('Filtro') }}</b></label>
                            <select name="n_filtro" id="n_filtro" class="form-select" required>
                                @if($filtros->first())
                                    @foreach($filtros as $filtro)
                                        <option value="{{$filtro->id}}">{{$filtro->id}} / {{$filtro->local}}</option>
                                    @endforeach
                                @else
                                    <option disabled>Nenhum Filtro cadastrado</option>
                                @endif
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="cadastroAmostra">Cadastrar</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-xl" id="list_amostras" tabindex="-1" aria-labelledby="list_amostras" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="list_amostras">Listagem de Amostragens</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Data da Amostragem (yyyy-MM-dd)</th>
                            <th scope="col">Duração</th>
                            <th scope="col">Tipo de Filtro</th>
                            <th scope="col">Nº Filtro</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($amostragens->first())
                                @foreach($amostragens as $amostragem)
                                    <tr>
                                        <td>{{$amostragem->data_amostragem}}</td>
                                        <td>{{$amostragem->duracao}}</td>
                                        <td>{{$amostragem->tipo_filtro}}</td>
                                        <td>{{$amostragem->n_filtro}}</td>
                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $amostragem->user_id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_filtro_{{$filtro->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_filtro_{{$filtro->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="7" class="opacity-50 text-center">Nenhuma amostragem cadastrada.</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>   -->
                    <div class="accordion" id="accordionExample">
                        @if($amostragens->first())
                            @foreach($amostragens as $amostragem)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button d-flex gap-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$amostragem->id}}" aria-expanded="true" aria-controls="collapseOne">
                                            <h4>
                                                {{ $amostragem->id }}/
                                                @php
                                                    $date_amostragem = \Carbon\Carbon::parse($amostragem->data_amostragem)->format('Y');
                                                @endphp
                                                {{ $date_amostragem }}
                                            </h4>
                                        </button>
                                    </h2>
                                    <div id="collapse{{$amostragem->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Data da Amostragem (yyyy-MM-dd)</th>
                                                    <th scope="col">Duração</th>
                                                    <th scope="col">Tipo de Filtro</th>
                                                    <th scope="col">Nº Filtro</th>
                                                    <th scope="col">Responsável</th>
                                                    <th scope="col">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$amostragem->data_amostragem}}</td>
                                                        <td>{{$amostragem->duracao}}</td>
                                                        <td>{{$amostragem->tipo_filtro}}</td>
                                                        <td>{{$amostragem->n_filtro}}</td>
                                                        <td>
                                                            @foreach($users as $user)
                                                                @if($user->id == $amostragem->user_id)
                                                                    {{$user->name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_filtro_{{$filtro->id}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                                            </button>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_filtro_{{$filtro->id}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <tr>
                                    <td>{{$amostragem->data_amostragem}}</td>
                                    <td>{{$amostragem->duracao}}</td>
                                    <td>{{$amostragem->tipo_filtro}}</td>
                                    <td>
                                        @foreach($filtros as $filtro)
                                            @if($filtro->id == $amostragem->n_filtro)  
                                                {{$filtro->n_filtro}} / {{$filtro->local}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($users as $user)
                                            @if($user->id == $amostragem->user_id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_filtro_{{$filtro->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_filtro_{{$filtro->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                                        </button>
                                    </td>
                                </tr> -->
                            @endforeach
                        @else
                            <tr>
                                <th scope="row" colspan="7" class="opacity-50 text-center">Nenhuma amostragem cadastrada.</th>
                            </tr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($amostragens->first())
        @foreach($amostragens as $amostragem)
        <div class="modal fade" id="delete_amostragem_{{$amostragem->id}}" tabindex="-1" aria-labelledby="delete_amostragem_{{$amostragem->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_amostragem_{{$amostragem->id}}">Excluir Amostragem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('amostragens.delete', ['id' => $amostragem->id]) }}" method="post" id="delete_amostragem_{{$amostragem->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h3>Tem creteza que deseja deletar a amostragem <h4> {{ $amostragem->id }}/
                                                @php
                                                    $date_amostragem = \Carbon\Carbon::parse($amostragem->data_amostragem)->format('Y');
                                                @endphp
                                                {{ $date_amostragem }}</h4>?
                        </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" >Deletar</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_filtro_{{$filtro->id}}" tabindex="-1" aria-labelledby="edit_filtro_{{$filtro->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filtro">Alteração de Filtro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('filtros.edit', ['id' => $filtro->id]) }}" method="post" id="edit_filtro_{{$filtro->id}}">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 d-flex">
                                <span class="d-flex flex-column col-3">
                                    <label for="n_filtro" class="form-label"><b>{{ __('Nº Filtro') }}</b></label>
                                    <input type="number" class="form-control" id="n_filtro" name="n_filtro" min="0" required>
                                </span>
                                <span class="col-1"></span>
                                <span class="d-flex flex-column col-8">
                                    <label for="local" class="form-label"><b>{{ __('Local') }}</b></label>
                                    <input type="text" class="form-control" id="local" name="local" required>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="calibrado_CPV" class="form-label"><b>{{ __('Calibrado CPV') }}</b></label>
                                <input type="number" class="form-control" id="calibrado_CPV" name="calibrado_CPV" min="0" step=".0001" value="{{$filtro->calibrado_CPV}}">
                            </div>
                            <div class="mb-3">
                                <label for="inclinacao" class="form-label"><b>{{ __('Inclinação') }}</b></label>
                                <input type="number" class="form-control" id="inclinacao" name="inclinacao" min="0" step=".0001" value="{{$filtro->inclinacao}}">
                            </div>
                            <div class="mb-3">
                                <label for="ultima_calibracao" class="form-label"><b>{{ __('Data Última Calibração') }}</b></label>
                                <input type="date" class="form-control" id="ultima_calibracao" name="ultima_calibracao" value="{{$filtro->ultima_calibracao}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="intercepto" class="form-label"><b>{{ __('Intercepto') }}</b></label>
                                <input type="number" class="form-control" id="intercepto" name="intercepto" step=".0001" value="{{$filtro->intercepto}}">
                            </div>
                            <div class="mb-3">
                                <label for="correlacao" class="form-label"><b>{{ __('Correlação') }}</b></label>
                                <input type="number" class="form-control" id="correlacao" name="correlacao" min="0" step=".0001" value="{{$filtro->correlacao}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif

@endsection
