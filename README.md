# Cadastro de Usuarios

para rodar o projeto deve-se seguir os seguintes passos:

1- Criar o arquivo .env

```bash
cp .env.example .env

```
2- Criar e Iniciar imagem docker

```bash
docker-compose up --build -d
```

3-Instalar o composer

```bash
docker-compose exec app composer install
```


4- Rodar migrations

```bash
docker-compose exec app php artisan migrate
```
* disponivel na porta 80. ou seja basta acessar http://localhost no navegador.

# Testes Unitários
* Para executar o teste de cadastro de usuario rodar o comando: 

```bash
docker-compose exec app php artisan test
```
