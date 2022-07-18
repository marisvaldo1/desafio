# Desafio

### DOCUMENTAÇÃO

- [Para iniciar](#para-iniciar-o-serviço)
- [Plataforma para execução do projeto](#plataforma-para-execução-do-projeto)
- [Linguagens utilizadas no desenvolvimento](#linguagem)
- [Pré-requisitos](#pré-requisitos)
- [Banco de dados](#banco-de-dados)
- [Observações](#observações)

## Para iniciar o serviço 
Essas instruções farão com que você tenha uma cópia do projeto em execução na sua máquina local para fins de desenvolvimento e teste. Veja a implantação de notas sobre como implantar o projeto em um sistema ativo.

## Plataforma para execução do projeto

```php
XAMPP
```
Para mais informações clique [aqui](https://www.apachefriends.org/pt_br/index.html) para visitar a documentação oficial do xampp e baixar o servidor

## Linguagem

```php
PHP 7.4.2
JavaScript
CSS
```

## Pré-requisitos

```php
Criar um diretório na are trabalho
Clonar o projecto dentro desse diretório
Fazer download do Xampp versão Windows (64 bits) nesse endereço clique [aqui](https://www.apachefriends.org/pt_br/download.html)

Instalar e executar o Xampp
Start no apahe 
Start no MySql

Para instalar as dependência do projecto
Instalar o composer para Windows
Executar o composer install
```
Baixar o composer para Windows nesse link [aqui](https://www.apachefriends.org/pt_br/download.html)

## Banco de dados
</br>Tipo de servidor: MariaDB
</br>Versão do servidor: 10.4.19-MariaDB - mariadb.org binary distribution
</br>Versão do protocolo: 10
</br>Conjunto de caracteres do servidor: UTF-8 Unicode (utf8mb4) 🍻
</br></br>
As configurações do banco de dados estão no arquivo desafio/config/MySql.php

```php
DB_CONNECTION=mysql
DB_HOST=local
DB_PORT=3306
DB_DATABASE=desafio
DB_USERNAME=root
DB_PASSWORD=
```

## Observações

> Muitos melhoramentos foram deixados de fora por conta do prazo<br>
> A opção de inclusão de imagem foi parcialmente feita porém não foi finalizada também por conta do prazo
> A inserção de categoria no produto foi parcialmente concluída (tabelas e relacionamentos criados no banco), mas a tabela associativa 1-N está sendo atualizada.
> Se for detectado algum problema que impeça execução, por favor entre em contato comigo para que eu faça os ajustes necessários
> Ficou faltando a padronização do idioma no desenvolvimento. Pode ser resolvido com futuros ajustes caso haja necessidade didática.
