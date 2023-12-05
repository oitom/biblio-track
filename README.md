
# biblio-track

  

BiblioTrack - App de gerenciamento de livros em CodeIgniter

> Foram utilizados as seguintes tecnologias:
 - CodeIgniter v3
 - Bootstrap 5.3
 - Jquery 3.6
 - API Google Books V1
 - API HG Brasil Weather
 - API ViaCEP
 - Docker V3
 - MySQL 5.7

  

## Requisitos

  

- Docker

  

## Como executar o projeto

  

1. Clone o repositório:

  

```bash
git clone https://github.com/oitom/biblio-track.git
```

  

2. Entre no diretório do projeto:

  

```bash
cd biblio-track
```

  

3. Execute o Docker Compose para construir as imagens e iniciar os contêineres:

  

```bash
docker-compose up -d
```

4. Aguarde alguns segundos até os seviços ficarem prontos.

```
Isso pode levar até 30 segundos.
```

  

5. Execute as migrations necessárias para construir os dados da aplicação:

  

```
docker-compose exec web php index.php migrate
```

  

6. O projeto estará acessível em [http://localhost:8080](http://localhost:8080).

  

7. Você pode criar uma nova conta pelo link [http://localhost:8080/cadastre-se](http://localhost:8080/cadastre-se) OU

  

8. Você pode acessar a plataforma usando os dados abaixo:

```
e-mail: admin@email.com

senha: admin

  
e-mail: joao@email.com

senha: joao
```

9. Para parar os contêineres, execute:

  

```bash
docker-compose down
```