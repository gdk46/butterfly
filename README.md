<p align="center">
<img src="https://raw.githubusercontent.com/gdk46/Butterfly/0d126c0eb9fbbe56d6eb19ce81ba1322fb441a11/docs/Group%201.svg" width="500">
</p>

<p align="center">
    <img alt="GitHub" src="https://img.shields.io/github/license/gdk46/Butterfly?color=blueviolet">
    <img src="https://img.shields.io/badge/version-1.0.0-blueviolet">
</p>

## Mais sobre a Butterfly
Desenvolvido para agilizar na construção de projetos com arquitetura MVC + Dao, Butterfly utiliza o método
top-down, onde o desenvolvedor é obrigado a construir sua solução a partir do banco de dados da sua aplicação, pós estruturado,
a Butterfly gera uma estrutura de pastas e arquivos necessários para um projeto, além disso, possibilita o trabalho com construção APIs REST.

## Estrutura padrão gerada
<pre>
Projeto/
├── app/
│   │
│   ├── Api
│   │   ├── Repository
│   │   │   └── *
│   │   └── Service
│   │       └── *
│   │
│   ├── Controller
│   │   └── *
│   │
│   ├── Dao
│   │   └── *
│   │
│   ├── Libs
│   │   ├── ConnectDb
│   │   │   └── Database
│   │   │        ├── Connect.php
│   │   │        └── SetUpConnect.php
│   │   └── Crud
│   │       ├── Config
│   │       └── Database
│   │            └── Crud.php
│   ├── Model
│   │   └── *
│   │
│   ├── Util
│   ├── Vendor
│   └── composer.json
│
├── Environment/
│   │
│   ├── Config
│   └── Tests
│
├── resources/
│   │
│   ├── assets
│   │   ├── boot
│   │   ├── css
│   │   ├── img
│   │   ├── js
│   │   └── libs
│   │
│   └── View
│       ├── __layout__
│       │    ├── admin.html
│       │    └── layout.html
│       │
│       ├── *
│       │    ├── criar.html
│       │    └── visualizar.html
│       │
│       ├── .htaccess
│       └── Index.php
│
├── .gitignore
└── autoload.php
</pre>

## Como iniciar um projeto com butterfly 
