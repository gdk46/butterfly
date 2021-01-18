<p align="center">
<img src="https://raw.githubusercontent.com/gdk46/privado/4c5128b8c938b6f6a3c5b83f24f10e15bcfedeb3/butterfly/Group%201.svg?token=AMZ23B7YRYJAXB5QDQYDNJLAAXQIU" width="500">
</p>

<p align="center">
    <img alt="GitHub" src="https://img.shields.io/github/license/gdk46/Butterfly?color=blueviolet">
    <img src="https://img.shields.io/badge/version-1.0.0-blueviolet">
</p>

## Mais sobre a Butterfly
Desenvolvido para agilizar na construção de projetos com arquitetura MVC + Dao, Butterfly utiliza o método
top-down, onde o desenvolvedor é obrigado a construir sua solução a partir banco de dados da sua aplicação, pós estruturado,
a Butterfly gera uma estrutura de pastas e arquivos necessários para um projeto, além disso, possibilita o trabalho com construção APIs REST.

## Estrutura padrão gerada
<pre>
Projeto/
├── app/
│   │
│   ├── Api
│   │   ├── Repository
│   │   └── Service
│   │
│   ├── Controller
│   │   └── (Regra de negócio dos Modelos)
│   │
│   ├── Dao
│   │   └── (Dados dos modelos das entidades)
│   │
│   ├── Libs
│   ├── Model
│   │   └── (Modelos das entidades)
│   │
│   ├── Util
│   │   └── Crud
│   │       ├── Config
│   │       └── Database
│   │            ├── Connect.php
│   │            └── Crud.php
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
│       ├── (* gera de acordo com as entidades do banco)
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
