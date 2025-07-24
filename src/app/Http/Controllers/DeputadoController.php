<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deputado;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;

class DeputadoController extends Controller
{
    public function index(Request $request)
    {
        $query = Deputado::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('uf')) {
            $query->where('sigla_uf', $request->uf);
        }

        if ($request->filled('partido')) {
            $query->where('sigla_partido', $request->partido);
        }

        $deputados = $query->orderBy('nome')->paginate(10)->withQueryString();

        // Buscar opções distintas para filtros
        $ufs = Deputado::select('sigla_uf')->distinct()->orderBy('sigla_uf')->pluck('sigla_uf');
        $partidos = Deputado::select('sigla_partido')->distinct()->orderBy('sigla_partido')->pluck('sigla_partido');

        return view('deputados.index', compact('deputados', 'ufs', 'partidos'));
    }

    public function show($id)
    {
        $deputado = Deputado::with('despesas')->findOrFail($id);
        $despesas = $deputado->despesas()->paginate(15);

        return view('deputados.show', compact('deputado', 'despesas'));
    }

    public function exportar($id)
    {
        $deputado = Deputado::with('despesas')->findOrFail($id);
        $fileName = 'despesas_' . Str::slug($deputado->nome) . '.csv';

        $response = new StreamedResponse(function () use ($deputado) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Tipo Despesa', 'Valor', 'Fornecedor', 'Data', 'Documento']);

            foreach ($deputado->despesas as $despesa) {
                fputcsv($handle, [
                    $despesa->tipo_despesa,
                    number_format($despesa->valor, 2, ',', '.'),
                    $despesa->fornecedor,
                    $despesa->data_documento,
                    $despesa->url_documento,
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', "attachment; filename=\"$fileName\"");

        return $response;
    }
}