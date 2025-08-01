@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Logo_RETA_Software.png" alt="RETA Software" class="mb-4" style="height: 120px;" />
        <h1 class="mb-4">Bem-vindo ao Sistema RETA</h1>

        <p class="mb-3">
            Este sistema foi desenvolvido para o processo seletivo da vaga de programador júnior na empresa <strong>RETA Software</strong>, com foco em transparência e facilidade de acesso a dados públicos da Câmara dos Deputados.
        </p>

        <p class="mb-3">
            Através da integração com a API oficial da Câmara dos Deputados, o sistema sincroniza automaticamente informações dos deputados federais em exercício e suas despesas públicas, garantindo dados sempre atualizados e confiáveis.
        </p>

        <p class="mb-3">
            Use o menu acima para navegar entre as funcionalidades disponíveis e explorar o sistema.
        </p>

        <p class="text-muted mt-4">
            Desenvolvido com <strong>Laravel 12</strong>, <strong>Docker</strong>, <strong>MySQL</strong>, <strong>Bootstrap 5</strong> e tecnologias modernas para uma experiência robusta e segura.
        </p>
    </div>
</div>
@endsection