# 📊 Reta Projeto - Deputados Federais e Despesas

Este sistema Laravel consome dados públicos da Câmara dos Deputados via API oficial. Ele sincroniza os **deputados federais em exercício** e suas respectivas **despesas**, exibindo tudo com layout visual e filtrável. O projeto é feito com PHP + Laravel 10, Docker, Bootstrap 5 e processamento assíncrono com Laravel Jobs.

## 🚀 Funcionalidades

- 🔁 Sincronização automática de dados dos deputados e despesas
- 📂 Armazenamento local em banco MySQL
- ⚙️ Jobs processados automaticamente com filas Laravel (queue)
- 🖥️ Interface amigável e responsiva com Bootstrap 5
- 📌 Filtros por UF, partido e paginação
- 🔐 Autenticação com Laravel Breeze (login/cadastro)

---

## 📁 Estrutura de Pastas
reta-projeto/
├── docker/ # Dockerfile principal e scripts
├── src/ # Código Laravel (app completo)
├── docker-compose.yml # Orquestração dos containers
└── README.md

---

## 🐳 Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- Git (opcional, para clonar o repositório)

---

## ⚙️ Como rodar o projeto localmente

1. Extraia o `.zip` do projeto em qualquer pasta (ex: `C:\Users\SeuNome\reta-projeto`)

2. Abra o terminal na raiz do projeto e execute:

```bash
docker compose up --build

3. Aguarde a primeira sincronização com a API da Câmara (leva cerca de 2 minutos)

4. Acesse no navegador:
    👉 http://localhost:8080

🔐 Acesso
Você pode:

Criar uma nova conta (cadastro)

Fazer login com conta existente

Ver a lista de deputados, despesas, filtros e gráficos no dashboard após o login

🧠 Como funciona por trás
Ao rodar o projeto:

O container app sobe o Laravel com Apache

O container queue roda php artisan queue:work automaticamente

O comando php artisan sync:deputados roda automaticamente e salva os deputados

O comando php artisan sync:despesas dispara uma fila com um job para cada deputado

A fila é processada em background com as despesas salvas no banco

Tudo isso acontece sem você precisar executar comandos manuais.

🐞 Possíveis problemas
Caso algo falhe, reinicie o projeto com:
    docker compose down -v --remove-orphans
    docker compose up --build

📄 Licença
Este projeto é de código aberto e pode ser utilizado para fins educacionais e profissionais.

Autor
Eduardo Lawrenz