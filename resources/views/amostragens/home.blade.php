@extends('layouts.app')

@section('content')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
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
        <button type="button" class="btn btn-primary my-2 align-self-end d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#amostra">
            Cadastrar Amostragem
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"/>
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
            </svg>
        </button> 
    </div>
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
                    <div id="collapse{{$amostragem->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Data da Amostragem (yyyy-MM-dd)</th>
                                        <th scope="col">Duração</th>
                                        <th scope="col">Tipo de Filtro</th>
                                        <th scope="col">Nº Filtro</th>
                                        <th scope="col">Responsável</th>
                                        <th scope="col">Dados</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$amostragem->data_amostragem}}</td>
                                        <td>{{$amostragem->duracao}} hrs</td>
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
                                            <a href="{{ route('campo.home', ['id_amostragem' => $amostragem->id]) }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cadastro de dados de campo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                                    <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z"/>
                                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('deflexao.home', ['id_amostragem' => $amostragem->id]) }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cadastro de deflexão">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                                    <path d="M8 0q-.264 0-.523.017l.064.998a7 7 0 0 1 .918 0l.064-.998A8 8 0 0 0 8 0M6.44.152q-.52.104-1.012.27l.321.948q.43-.147.884-.237L6.44.153zm4.132.271a8 8 0 0 0-1.011-.27l-.194.98q.453.09.884.237zm1.873.925a8 8 0 0 0-.906-.524l-.443.896q.413.205.793.459zM4.46.824q-.471.233-.905.524l.556.83a7 7 0 0 1 .793-.458zM2.725 1.985q-.394.346-.74.74l.752.66q.303-.345.648-.648zm11.29.74a8 8 0 0 0-.74-.74l-.66.752q.346.303.648.648zm1.161 1.735a8 8 0 0 0-.524-.905l-.83.556q.254.38.458.793l.896-.443zM1.348 3.555q-.292.433-.524.906l.896.443q.205-.413.459-.793zM.423 5.428a8 8 0 0 0-.27 1.011l.98.194q.09-.453.237-.884zM15.848 6.44a8 8 0 0 0-.27-1.012l-.948.321q.147.43.237.884zM.017 7.477a8 8 0 0 0 0 1.046l.998-.064a7 7 0 0 1 0-.918zM16 8a8 8 0 0 0-.017-.523l-.998.064a7 7 0 0 1 0 .918l.998.064A8 8 0 0 0 16 8M.152 9.56q.104.52.27 1.012l.948-.321a7 7 0 0 1-.237-.884l-.98.194zm15.425 1.012q.168-.493.27-1.011l-.98-.194q-.09.453-.237.884zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a7 7 0 0 1-.458-.793zm13.828.905q.292-.434.524-.906l-.896-.443q-.205.413-.459.793zm-12.667.83q.346.394.74.74l.66-.752a7 7 0 0 1-.648-.648zm11.29.74q.394-.346.74-.74l-.752-.66q-.302.346-.648.648zm-1.735 1.161q.471-.233.905-.524l-.556-.83a7 7 0 0 1-.793.458zm-7.985-.524q.434.292.906.524l.443-.896a7 7 0 0 1-.793-.459zm1.873.925q.493.168 1.011.27l.194-.98a7 7 0 0 1-.884-.237zm4.132.271a8 8 0 0 0 1.012-.27l-.321-.948a7 7 0 0 1-.884.237l.194.98zm-2.083.135a8 8 0 0 0 1.046 0l-.064-.998a7 7 0 0 1-.918 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                                </svg>
                                            </a>
                                        </td>
                                        <td>
                                            <button title="Editar" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_amostragem_{{$amostragem->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>
                                            </button>
                                            <button title="Excluir" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_amostragem_{{$amostragem->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Data da Amostragem (yyyy-MM-dd)</th>
                        <th scope="col">Duração</th>
                        <th scope="col">Tipo de Filtro</th>
                        <th scope="col">Nº Filtro</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Dados Campo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="7" class="opacity-50 text-center">Nenhuma amostragem cadastrada.</th>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
</div>

<!-- Modals Amostras-->
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
                            <label for="n_filtro" class="form-label"><b>{{ __('Filtro') }}</b></label>
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

    @if($amostragens->first())
        @foreach($amostragens as $amostragem)
        <div class="modal fade" id="delete_amostragem_{{$amostragem->id}}" tabindex="-1" aria-labelledby="delete_amostragem_{{$amostragem->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_amostragem_{{$amostragem->id}}">Excluir Amostragem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('amostragens.delete', ['id' => $amostragem->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <h3>Tem creteza que deseja deletar a amostragem {{ $amostragem->id }}/
                                @php
                                    $date_amostragem = \Carbon\Carbon::parse($amostragem->data_amostragem)->format('Y');
                                @endphp
                                {{ $date_amostragem }}?
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_amostragem_{{$amostragem->id}}" tabindex="-1" aria-labelledby="edit_amostragem_{{$amostragem->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_amostragem_{{$amostragem->id}}">Alteração de Amostragem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('amostragens.edit', ['amostragem_id' => $amostragem->id, 'filtro_id' => $amostragem->n_filtro]) }}" method="post" id="edit_amostragem_{{$amostragem->id}}">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="data_amostragem" class="form-label"><b>{{ __('Data da Amostragem') }}</b></label>
                                <input type="date" class="form-control" id="data_amostragem" name="data_amostragem" value="{{$amostragem->data_amostragem}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="duracao" class="form-label"><b>{{ __('Período') }}</b></label>
                                <input type="number" class="form-control" id="duracao" name="duracao" min="24" max="24" value="{{$amostragem->duracao}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_filtro" class="form-label"><b>{{ __('Tipo de Filtro') }}</b></label>
                                <input type="text" class="form-control" id="tipo_filtro" name="tipo_filtro" value="Fibra de Vidro" value="{{$amostragem->tipo_filtro}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="n_filtro" class="form-label"><b>{{ __('Filtro') }}</b></label>
                                <select name="n_filtro" id="n_filtro" class="form-select" value="{{$amostragem->n_filtro}}" required>
                                    @if($filtros->first())
                                        @foreach($filtros as $filtro)
                                            @if($filtro->id != $amostragem->n_filtro)
                                                <option value="{{$filtro->id}}">{{$filtro->id}} / {{$filtro->local}}</option>
                                            @else
                                                <option value="{{$amostragem->n_filtro}}">{{$filtro->id}} / {{$filtro->local}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option disabled>Nenhum Filtro cadastrado</option>
                                    @endif
                                </select>
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
    @else
        <div class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filtro">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Nothing to show.
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection