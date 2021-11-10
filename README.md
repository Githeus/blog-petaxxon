# INFORMAÇÕES DO SISTEMA
> Este sistema foi desenvolvido em Laravel na versão 6 devido à um desafio proposto pela Petaxxon

# INSTALAÇÃO DO PROJETO

- Clone este projeto
- Rode o comando: ` composer install `
- Crie o seu arquivo .env ou rode o comando: `cp .env.example .env`
- Edite o .env e insira as informações do banco de dados
- Rode o comando: ` php artisan key:generate `
- Rode o comando: ` php artisan migrate `
----------
# **Instruções API**

## **Rotas públicas:**
### Listar todos os posts
- Rota: `api/post/list` (suporta paginação com parâmetro `page`)
- Exemplo: `api/post/list?page=2 `
### Exibir um post específico
- Rota `api/post/{post_id}`
### Listar comentários de um post
- Rota `api/post/{post_id}/comments` (suporta paginação com parâmetro `page`)
- Exemplo: `api/post/1/comments?page=2`


-----
## **Rotas protegidas por autenticação:**
**Para utilizar estas funções de API é necessário obter o token de autenticação através da rota `api/login`**
### `api/login`
- Request: 
    - email
    - password
- Response: 
    - api_token

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


