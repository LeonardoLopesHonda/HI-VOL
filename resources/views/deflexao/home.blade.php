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
<main class="container my-2 d-flex flex-column">
    <div class="d-flex justify-content-between">
        <a href="{{ route('amostragens.home') }}" class="btn btn-primary my-2 mb-3 d-flex align-items-center gap-2">
            Voltar
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
        </a> 
    </div>
    <div class="border p-3">
        <h2 class="text-center my-2">
            {{ $amostragem->id }}/
            @php
                $date_amostragem = \Carbon\Carbon::parse($amostragem->data_amostragem)->format('Y');
            @endphp
            {{ $date_amostragem }}
        </h2>
        <div>
            <form action="" method="post" id="cadastroDeflexao">
                @csrf
                <!-- <section class="row d-flex justify-content-between">
                    <div class="col">
                        <div class="mb-3">
                            <label for="hora_1" class="form-label"><b>{{ __('Hora 1') }}</b></label>
                            <input type="number" class="form-control" id="hora_1" name="hora_1" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_2" class="form-label"><b>{{ __('Hora 2') }}</b></label>
                            <input type="number" class="form-control" id="hora_2" name="hora_2" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_3" class="form-label"><b>{{ __('Hora 3') }}</b></label>
                            <input type="number" class="form-control" id="hora_3" name="hora_3" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_4" class="form-label"><b>{{ __('Hora 4') }}</b></label>
                            <input type="number" class="form-control" id="hora_4" name="hora_4" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_5" class="form-label"><b>{{ __('Hora 5') }}</b></label>
                            <input type="number" class="form-control" id="hora_5" name="hora_5" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_6" class="form-label"><b>{{ __('Hora 6') }}</b></label>
                            <input type="number" class="form-control" id="hora_6" name="hora_6" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_7" class="form-label"><b>{{ __('Hora 7') }}</b></label>
                            <input type="number" class="form-control" id="hora_7" name="hora_7" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_8" class="form-label"><b>{{ __('Hora 8') }}</b></label>
                            <input type="number" class="form-control" id="hora_8" name="hora_8" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_9" class="form-label"><b>{{ __('Hora 9') }}</b></label>
                            <input type="number" class="form-control" id="hora_9" name="hora_9" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_10" class="form-label"><b>{{ __('Hora 10') }}</b></label>
                            <input type="number" class="form-control" id="hora_10" name="hora_10" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_11" class="form-label"><b>{{ __('Hora 11') }}</b></label>
                            <input type="number" class="form-control" id="hora_11" name="hora_11" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_12" class="form-label"><b>{{ __('Hora 12') }}</b></label>
                            <input type="number" class="form-control" id="hora_12" name="hora_12" min="0" step=".001">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="hora_13" class="form-label"><b>{{ __('Hora 13') }}</b></label>
                            <input type="number" class="form-control" id="hora_13" name="hora_13" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_14" class="form-label"><b>{{ __('Hora 14') }}</b></label>
                            <input type="number" class="form-control" id="hora_14" name="hora_14" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_15" class="form-label"><b>{{ __('Hora 15') }}</b></label>
                            <input type="number" class="form-control" id="hora_15" name="hora_15" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_16" class="form-label"><b>{{ __('Hora 16') }}</b></label>
                            <input type="number" class="form-control" id="hora_16" name="hora_16" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_17" class="form-label"><b>{{ __('Hora 17') }}</b></label>
                            <input type="number" class="form-control" id="hora_17" name="hora_17" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_18" class="form-label"><b>{{ __('Hora 18') }}</b></label>
                            <input type="number" class="form-control" id="hora_18" name="hora_18" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_19" class="form-label"><b>{{ __('Hora 19') }}</b></label>
                            <input type="number" class="form-control" id="hora_19" name="hora_19" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_20" class="form-label"><b>{{ __('Hora 20') }}</b></label>
                            <input type="number" class="form-control" id="hora_20" name="hora_20" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_21" class="form-label"><b>{{ __('Hora 21') }}</b></label>
                            <input type="number" class="form-control" id="hora_21" name="hora_21" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_22" class="form-label"><b>{{ __('Hora 22') }}</b></label>
                            <input type="number" class="form-control" id="hora_22" name="hora_22" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_23" class="form-label"><b>{{ __('Hora 23') }}</b></label>
                            <input type="number" class="form-control" id="hora_23" name="hora_23" min="0" step=".001">
                        </div>
                        <div class="mb-3">
                            <label for="hora_24" class="form-label"><b>{{ __('Hora 24') }}</b></label>
                            <input type="number" class="form-control" id="hora_24" name="hora_24" min="0" step=".001">
                        </div>
                    </div>
                </section> -->
            </form>
            <table class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Número Intervalo</th>
                        <th scope="col">Deflexão</th>
                        <th scope="col" class="text-center">Número Intervalo</th>
                        <th scope="col">Deflexão</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $second_interval = 12;
                    @endphp
                    @for ($i = 1; $i <= 12; $i++)
                        <tr>
                            <td scope="row" class="text-center" disabled>{{$i}}</td>
                            <td><input type="numeric" name="hora_{{$i}}" id="hora_{{$i}}" form="cadastroDeflexao" class="form-control d-flex"></td>
                            <td scope="row" class="text-center" disabled>{{$second_interval + $i}}</td>
                            <td><input type="numeric" name="hora_{{$second_interval + $i}}" id="hora_{{$second_interval + $i}}" form="cadastroDeflexao" class="form-control d-flex"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" form="cadastroDeflexao">{{ __('Salvar') }}</button>
            </div>
        </div>
    </div>
</main>
@endsection