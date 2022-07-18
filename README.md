# Desafio

### DOCUMENTAÇÃO

- [Para iniciar](#para-iniciar-o-serviço)
- [Plataforma para execução do projeto](#plataforma-para-execução-do-projeto)
- [Design de software](#design-de-software)
- [Framework](#framework)
- [Base de dados para execução das notificações](#base-de-dados-para-execução-das-notificações)
- [Pré-requisitos](#pré-requisitos)
- [Comandos básicos](#comandos-básicos)
- [Banco de dados](#banco-de-dados)
- [Teste-Unintário](#teste-Unintário)
- [Sobre os testes](#Sobre-os-testes)
- [Chamadas da API](#chamadas-da-API)
- [Link da collections](#link-da-collections)
- [Erros](#erros)

## Para iniciar o serviço 
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.

## Plataforma para execução do projeto

```php
XAMPP
```
Para mais informações clique [aqui](https://docs.docker.com/) para visitar a documentação oficial do docker

## Design de software

```php
S O L I D 
```

## Framework

```php
Laravel
```

## Pré-requisitos

```php
Criar um diretório na are trabalho
Clonar o projecto dentro desse diretório
```

Executar o docker compuser
```php
docker-compose up 
```

## Comandos básicos 

```php
#para entrar no container
docker exec -it php-fpm sh

#para entrar no diretório do projecto
cd <Diretório do projecto>

#para copiar as variáveis de ambiente 
cp .env.docker.example .env

#para instalar as dependência do projecto
composer install
```

## Banco de dados
Configura o seu banco de dados 

Acesse o container pgadmin via browser

```php
localhost:5050

EMAIL=user@domain.com
PASSWORD=SuperSecret    
```

Criar novo server no pgadmin

```php
DB_CONNECTION=pgsql
DB_HOST=postgresql
DB_PORT=5432
DB_DATABASE=dev
DB_USERNAME=postgres
DB_PASSWORD=root
```

Acessar o container onde esta à aplicacão e dentro do diretório do projecto executar os seguinte comando

```php
php artisan config:clear
```

```php
composer dump-autoload
```

```php
php artisan migrate
```

## Teste Unintário  

Acessar o container onde esta à aplicacão e dentro do diretório do projecto execute o seguinte comando para executar os testes

```php
vendor/bin/phpunit
ou
php artisan test
```

## Sobre os testes 
>Recomendamos o uso de qualquer ferramenta `client-rest` para testes nas chamadas da API.
 
- *INSOMNIA*
[https://insomnia.rest/download/](https://insomnia.rest/download/)

- *POSTMAN*
[https://www.getpostman.com/downloads/](https://www.getpostman.com/downloads/)

## Chamadas da API	
Documentação: 

## Link da collections 
Collections:
https://www.getpostman.com/collections/640ba3c782c1c9fc971e
## Erros

> Se você detectar algum problema que não consiga solucionar, por favor nos informe e se possivel abra uma `issue` sobre..

## Configurações do banco de dados?
Tipo de servidor: MariaDB
Versão do servidor: 10.4.19-MariaDB - mariadb.org binary distribution
Versão do protocolo: 10
Conjunto de caracteres do servidor: UTF-8 Unicode (utf8mb4) 🍻
