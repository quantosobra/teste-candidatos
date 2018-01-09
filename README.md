# QuantoSobra: Tarefas para Candidatos

Este repositório contém o projeto base para ser utilizado nas tarefas dos candidatos às
[vagas de desenvolvedor no QuantoSobra][vagas].


## Requisitos

* Docker 17.09+
* docker-compose 1.17+

## Estrutura

O projeto é organizado em dois diretórios:

* **backend**: contém um projeto de uma API REST em PHP com [Symfony][symfony]
* **frontend**: contém um projeto da interface com [Ember.js][emberjs]

## Dependências

Antes de poder executar o projeto, é necessário instalar as dependências. Para o frontend, é utilizado o NPM, e para o
backend é usado o Composer. Para instalar as dependências dos dois projetos, execute os seguintes comandos:

`docker-compose run --rm backend composer install`
`docker-compose run --rm frontend npm install`

## Executando

Você pode executar o projeto utilizando o docker-compose para iniciar os containers para frontend, backend e o banco de
dados MySQL:

`docker-compose up -d`

Esse comando irá iniciar todos os serviços e deixá-los executando em plano de fundo. Na primeira vez que o projeto for
executado será necessário criar as tabelas no banco de dados. Para isso, após ter iniciado os serviços com o comando
anterior, execute o seguinte comando:

`docker-compose exec backend app/console doctrine:schema:update --force`


[vagas]: https://quantosobra.recruiterbox.com/ "Vagas no QuantoSobra"
[symfony]: https://symfony.com/ "Symfony"
[emberjs]: https://emberjs.com/ "Ember.js"