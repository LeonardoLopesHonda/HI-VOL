@extends('layouts.app')

@section('content')
<div class="container">
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
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body ">
                    <h5 class="card-title">Filtros  
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
                        </svg>
                    </h5>
                    <p class="card-text">Monitore e cadastre filtros de ar</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filtro">
                        Cadastrar Filtro
                    </button>
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
        <!-- <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nº Filtro</th>
                    <th scope="col">Data amostragem</th>
                    <th scope="col">Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->first())
                        @foreach($data as $amostragem)
                            <tr>
                                <th scope="row"></th>
                                <td>{{$amostragem->n_filtro}}</td>
                                <td>{{ date('d-m-Y', strtotime($amostragem->data_amostragem)) }}</td>
                                <td>{{$user->first()->name}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th scope="row" colspan="4" class="opacity-50 text-center">Nothing to show.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Filtro
            </button>
        </div> -->
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="filtro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Filtro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dados.add') }}" method="post" id="cadastroFiltro">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="n_filtro" class="form-label"><b>{{ __('Nº Filtro') }}</b></label>
                        <input type="number" class="form-control" id="n_filtro" name="n_filtro" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_amostragem" class="form-label"><b>{{ __('Data Amostragem') }}</b></label>
                        <input type="date" class="form-control" id="data_amostragem" name="data_amostragem" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="cadastroFiltro">Cadastrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@endsection
