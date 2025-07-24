@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Deputados</h1>

    <form method="GET" action="{{ route('deputados.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" name="nome" class="form-control" placeholder="Buscar por nome" value="{{ request('nome') }}">
        </div>
        <div class="col-md-3">
            <select name="uf" class="form-select" onchange="this.form.submit()">
                <option value="">Filtrar por UF</option>
                @foreach($ufs as $uf)
                    <option value="{{ $uf }}" {{ request('uf') == $uf ? 'selected' : '' }}>{{ $uf }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="partido" class="form-select" onchange="this.form.submit()">
                <option value="">Filtrar por Partido</option>
                @foreach($partidos as $partido)
                    <option value="{{ $partido }}" {{ request('partido') == $partido ? 'selected' : '' }}>{{ $partido }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="{{ route('deputados.index') }}" class="btn btn-secondary">Limpar</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Partido</th>
                    <th>UF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($deputados as $deputado)
                <tr>
                    <td><img src="{{ $deputado->url_foto }}" alt="Foto" style="height: 50px;"></td>
                    <td>{{ $deputado->nome }}</td>
                    <td>{{ $deputado->sigla_partido }}</td>
                    <td>{{ $deputado->sigla_uf }}</td>
                    <td>
                        <a href="{{ route('deputados.show', $deputado->id) }}" class="btn btn-primary btn-sm">
                            Ver Despesas
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum deputado encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $deputados->links() }}

    <h3 class="mt-5">Distribuição por Partido</h3>
    <canvas id="graficoPartidos" width="400" height="200"></canvas>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('graficoPartidos').getContext('2d');

        const dataLabels = @json($partidos->toArray());
        const dataValues = @json(
            $partidos->map(fn($partido) => \App\Models\Deputado::where('sigla_partido', $partido)->count())
        );

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'Deputados por Partido',
                    data: dataValues,
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d',
                        '#6610f2', '#e83e8c', '#fd7e14', '#20c997', '#17a2b8',
                        '#8e44ad', '#2ecc71', '#3498db', '#e67e22', '#f39c12'
                    ]
                }]
            }
        });
    });
</script>
@endsection