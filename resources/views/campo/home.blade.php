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
        <h2 class="text-center">
            {{ $amostragem->id }}/
            @php
                $date_amostragem = \Carbon\Carbon::parse($amostragem->data_amostragem)->format('Y');
            @endphp
            {{ $date_amostragem }}
        </h2>
        <div>
            <form action="{{ route('campo.add', ['id_amostragem' => $amostragem->id]) }}" method="post" id="cadastroAmostra">
                @csrf
                <div class="mb-3">
                    <label for="temperatura_media_ambiente" class="form-label"><b>{{ __('Temperatura Ambiente Media (K)') }}</b></label>
                    <input type="number" class="form-control" id="temperatura_media_ambiente" name="temperatura_media_ambiente" min="0" step=".001"
                        value="{{ old('temperatura_media_ambiente', $dadosCampo->temperatura_media_ambiente ?? 302) }}">
                </div>
                <div class="mb-3">
                    <label for="temperatura_media_sazonal" class="form-label"><b>{{ __('Temperatura Ambiente Sazonal (K)') }}</b></label>
                    <input type="number" class="form-control" id="temperatura_media_sazonal" name="temperatura_media_sazonal" min="0" step=".001" disabled
                        value="{{ old('temperatura_media_sazonal', $dadosCampo->temperatura_media_sazonal ?? 298) }}">
                </div>
                <div class="mb-3">
                    <label for="pressao_barometrica_media" class="form-label"><b>{{ __('Pressão Barométrica Média (mm Hg)') }}</b></label>
                    <input type="number" class="form-control" id="pressao_barometrica_media" name="pressao_barometrica_media" min="0" step=".001"
                        value="{{ old('pressao_barometrica_media', $dadosCampo->pressao_barometrica_media ?? 728) }}">
                </div>
                <div class="mb-3">
                    <label for="pressao_barometrica_sazonal" class="form-label"><b>{{ __('Pressão Barométrica Sazonal (mm Hg)') }}</b></label>
                    <input type="number" class="form-control" id="pressao_barometrica_sazonal" name="pressao_barometrica_sazonal" min="0" step=".001" disabled
                        value="{{ old('pressao_barometrica_sazonal', $dadosCampo->pressao_barometrica_sazonal ?? 760) }}">
                </div>
                <div class="mb-3">
                    <label for="leitura_inicial" class="form-label"><b>{{ __('Leitura Inicial Horâmetro') }}</b></label>
                    <input type="number" class="form-control" id="leitura_inicial" name="leitura_inicial" min="0" value="{{$dadosCampo->leitura_inicial}}">
                </div>
                <div class="mb-3">
                    <label for="leitura_final" class="form-label"><b>{{ __('Leitura Final Horâmetro') }}</b></label>
                    <input type="number" class="form-control" id="leitura_final" name="leitura_final" min="0" value="{{$dadosCampo->leitura_final}}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection