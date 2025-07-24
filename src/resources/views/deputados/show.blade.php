@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Despesas de {{ $deputado->nome }}</h1>

    <div class="mb-3">
        <a href="{{ route('deputados.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('deputados.exportar', $deputado->id) }}" class="btn btn-success">Exportar CSV</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tipo Despesa</th>
                <th>Valor</th>
                <th>Fornecedor</th>
                <th>Data</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($despesas as $despesa)
            <tr>
                <td>{{ $despesa->tipo_despesa }}</td>
                <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                <td>{{ $despesa->fornecedor }}</td>
                <td>{{ \Carbon\Carbon::parse($despesa->data_documento)->format('d/m/Y') }}</td>
                <td>
                    @if ($despesa->url_documento)
                        <a href="{{ $despesa->url_documento }}" target="_blank">Ver Documento</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Nenhuma despesa encontrada.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $despesas->links() }}
</div>
@endsection