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
</div>
<div class="container my-2 d-flex flex-column">
    <div class="d-flex justify-content-between">
        <a href="{{route('home')}}" class="btn btn-primary my-2 d-flex align-items-center gap-2">
            Voltar
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
        </a> 
        <button type="button" class="btn btn-primary my-2 align-self-end d-flex align-items-end" data-bs-toggle="modal" data-bs-target="#filtro">
            Cadastrar Filtro
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" style="filter: invert(1);">
                <g clip-path="url(#clip0_20_4)">
                <path d="M7.5 7.5C7.5 7.36739 7.55268 7.24021 7.64645 7.14645C7.74021 7.05268 7.86739 7 8 7H20C20.1326 7 20.2598 7.05268 20.3536 7.14645C20.4473 7.24021 20.5 7.36739 20.5 7.5V9.5C20.5 9.62331 20.4544 9.74226 20.372 9.834L16 14.692V19.5C15.9999 19.6049 15.9669 19.7071 15.9055 19.7922C15.8441 19.8772 15.7575 19.9409 15.658 19.974L12.658 20.974C12.5829 20.999 12.5029 21.0058 12.4246 20.9939C12.3463 20.982 12.272 20.9516 12.2077 20.9053C12.1435 20.859 12.0912 20.7982 12.055 20.7277C12.0189 20.6572 12.0001 20.5792 12 20.5V14.692L7.628 9.834C7.54561 9.74226 7.50002 9.62331 7.5 9.5V7.5ZM8.5 8V9.308L12.872 14.166C12.9544 14.2577 13 14.3767 13 14.5V19.806L15 19.14V14.5C15 14.3767 15.0456 14.2577 15.128 14.166L19.5 9.308V8H8.5Z" fill="black"/>
                <path d="M21.2159 10.1051V1.66761H22.6477V10.1051H21.2159ZM17.7131 6.60227V5.17045H26.1506V6.60227H17.7131Z" fill="black"/>
                </g>
                <defs>
                <clipPath id="clip0_20_4">
                <rect width="28" height="28" fill="white"/>
                </clipPath>
                </defs>
            </svg>
        </button> 
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" colspan="8" class="text-center fs-3">
                    Filtros
                </th>
            </tr>
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
                    <th scope="row" colspan="8" class="opacity-50 text-center">Nothing to show.</th>
                </tr>
            @endif
        </tbody>
    </table>  
</div>

<!-- Modals Filtro-->
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
                                    <input type="number" class="form-control" id="n_filtro" name="n_filtro" min="0" value="{{$filtro->n_filtro}}" required>
                                </span>
                                <span class="col-1"></span>
                                <span class="d-flex flex-column col-8">
                                    <label for="local" class="form-label"><b>{{ __('Local') }}</b></label>
                                    <input type="text" class="form-control" id="local" name="local" value="{{$filtro->local}}" required>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif
<!-- End Modals Filtro -->
@endsection
