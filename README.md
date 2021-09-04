# INFORMAÇÕES DO SISTEMA
> Este sistema foi desenvolvido em Laravel na versão 6

# INSTALAÇÃO DO PROJETO

- Clone este projeto
- Rode o comando: ` composer install `
- Crie o seu arquivo .env ou rode o comando: `cp .env.example .env`
- Edite o .env e insira as informações do banco de dados
- Rode o comando: ` php artisan key:generate `
- Rode o comando: ` php artisan migrate `
----------

# Instruções API
## Autenticação
**Para utilizar as funções de API é necessário obter o token de autenticação através da rota `api/login`**
### `api/login`
- Request: 
    - email
    - password
- Response: 
    - api_token
----------

## Posts
*Obs: Somente os próprios autores dos posts podem editar ou excluir*
### Criação de novos posts
- Rota: `api/post/store`
- Request:
    - api_token
    - titulo
    - conteudo
### Editar um post
- Rota: `api/post/{post_id}/update`
- Request:
    - api_token
    - titulo
    - conteudo
### Excluir um post
- Rota: `api/post/{post_id}/delete`
- Request:
    - api_token
----------

## Comentários
*Obs: Somente os próprios autores dos comentários podem excluir*
### Criação de novos comentários
- Rota: `api/comment/store`
- Request:
    - api_token
    - post_id
    - conteudo
### Excluir um comentário
- Rota: `api/comment/{comment_id}/delete`
- Request:
    - api_token


