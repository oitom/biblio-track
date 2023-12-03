# biblio-track

BiblioTrack - App de gerenciamento de livros em CodeIgniter 3

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

4. Execute as migrations necessárias para construir os dados da aplicação (aguarde alguns segundos para executar em caso de erro ):

    ```
    docker-compose exec web php index.php migrate
    ```

5. O projeto estará acessível em [http://localhost:8080](http://localhost:8080).

## Parando os contêineres

Para parar os contêineres, execute:

```bash
docker-compose down
```