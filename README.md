# Data API Service (PHP/Lumen)

Este é o microsserviço de API de dados, construído com o micro-framework PHP Lumen. Sua única responsabilidade é gerenciar a comunicação com o banco de dados PostgreSQL, servindo como a fonte central da verdade para os dados de produtos e contatos.

Este serviço faz parte de uma arquitetura maior de monitoramento de preços.

## Tecnologias Utilizadas

- **Linguagem:** PHP 8.2
- **Framework:** Lumen
- **Banco de Dados:** PostgreSQL

## Como Executar (Com Docker Compose)

Este serviço não foi projetado para ser executado de forma isolada. Ele é orquestrado pelo Docker Compose a partir do repositório principal da plataforma.

1.  **Clone o repositório principal:**
    ```bash
    git clone [https://github.com/MaVitor/price-alert-platform.git](https://github.com/MaVitor/price-alert-platform.git)
    cd price-alert-platform
    ```

2.  **Suba o ambiente:**
    O `docker-compose.yml` no diretório raiz cuidará de construir a imagem deste serviço e iniciá-lo junto com os outros.
    ```bash
    docker-compose up
    ```
    A API estará disponível na porta `8000` do seu host.

## API Endpoints

A API gerencia as entidades `Produto` e `Contato` com operações CRUD completas.

- `GET /produtos`
- `POST /produtos`
- `GET /produtos/{id}`
- `PUT /produtos/{id}`
- `DELETE /produtos/{id}`

- `GET /contatos`
- `POST /contatos`
- `GET /contatos/{id}`
- `PUT /contatos/{id}`
- `DELETE /contatos/{id}`
