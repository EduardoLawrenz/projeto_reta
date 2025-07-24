@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Bem-vindo ao Sistema RETA</h1>

        <p class="lead">
            Este sistema foi desenvolvido para facilitar o acesso e análise de dados públicos da Câmara dos Deputados do Brasil.
            Nosso objetivo é fornecer informações atualizadas e detalhadas sobre os deputados federais e suas despesas, garantindo transparência e facilidade para consulta.
        </p>

        <p>
            Através da integração com a API oficial de Dados Abertos da Câmara dos Deputados, sincronizamos automaticamente as informações em nosso banco de dados utilizando tecnologias avançadas como <strong>Laravel Jobs</strong> e filas assíncronas para processamento em segundo plano.
            Isso garante que os dados exibidos estejam sempre atuais e confiáveis.
        </p>

        <p>
            No sistema, você poderá:
        </p>

        <ul class="text-start mx-auto" style="max-width: 600px;">
            <li>Consultar a lista completa dos deputados federais em exercício;</li>
            <li>Visualizar detalhadamente as despesas de cada deputado, com filtros por tipo, data, estado e partido;</li>
            <li>Gerar relatórios exportáveis para análises personalizadas;</li>
            <li>Acompanhar gráficos e dashboards que facilitam a interpretação dos dados;</li>
            <li>Utilizar um ambiente administrativo seguro para gestão dos dados e atualizações.</li>
        </ul>

        <p>
            Para começar, utilize o menu no topo para navegar entre as funcionalidades disponíveis.
            Caso ainda não possua uma conta, faça seu cadastro para acessar as áreas restritas do sistema.
        </p>

        <p class="text-muted mt-4">
            <small>
                Sistema desenvolvido com <strong>Laravel 12</strong>, <strong>Docker</strong>, <strong>MySQL</strong>, <strong>Bootstrap 5</strong> e implementações robustas de jobs assíncronas para garantir desempenho e escalabilidade.
            </small>
        </p>
    </div>
</div>
@endsection