<div align="center">
    <a href="https://github.com/thiiagoms/venus">
        <img src="./resources/img/logo.png" alt="Logo" width="80" height="80">
    </a>
    <h3 align="center">Teste - 4yousee :brazil:</h3>
    <p>
        This is a challenge by Coodesh
    </p>
    <p float="left">
        <img
            src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"
            alt="PHP"
        >
        <img
            src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white"
            alt="Docker"
        >
    </p>
</div>

- [Tecnologias :computer:](#tecnologias)
- [Depéndências :package:](#dependências)
- [Instalação :memo:](#instalação)
- [Uso :runner:](#uso)

## Tecnologias
- PHP8.2 (Sem uso de bibliotecas ou gerenciador de dependências).
- Docker

## Dependências
- PHP8.2+
- Docker :whale:

**Observação**: Será demonstrado a execução com ambas as formas

## Instalação

01 -) Clone o repositório:
```bash
$ git clone https://github.com/thiiagoms/4yousee-coodesh
```

02 -) Utilizando seu terminal, navegue até o diretório do projeto:
```bash
$ cd 4yousee-coodesh
4yousee-coodesh $ 
```

### Instalação com o servidor nativo do PHP :elephant:

01 -) Dentro do diretório da aplicação, execute o seguinte comando:
```bash
4yousee-coodesh $  php -S localhost:8000
```

### Instalação docker :whale:

01 -) Execute o `docker-compose.yml` para iniciar o container do projeto:

```bash
4yousee-coodesh $  docker-compose up -d
```

**IMPORTANTE**: A aplicação será iniciada na porta **8000** do seu computador.

## Uso

01 -) Navegue até `http://localhost:8000` para visualizar a aplicação:

02 -) Para dar desativar a aplicação:

* Utilizando servidor nativo do PHP, basta pressionar `CTRL+D` no seu terminal.
* Utilizando docker, basta desativar o container da aplicação
```bash
4yousee-coodesh $  docker-compose down
```
