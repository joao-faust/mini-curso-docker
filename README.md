# Conceitos e Comandos Docker

## Conceitos

- **Docker**: Ferramenta que emula ambientes, baixando apenas os recursos necessários e executando-os isoladamente.
- **Imagem**: Um projeto desenvolvido, que pode ser uma linguagem, sistema operacional, etc.
- **Container**: Uma imagem em execução.
- **Dockerfile**: Arquivo que define uma imagem personalizada.
- **docker-compose.yml**: Arquivo para configurar e gerenciar múltiplos containers.
- **Volume**: Mecanismo que permite que os dados sejam persistidos(mesmo se o container for derrubado) e compartilhados entre containers e entre o host
- *Network*: Mecanismo que permite a comunicação entre os containers e o host. O valor padrão é bridge
- **.dockerignore**: Arquivo que especifica quais arquivos devem ser ignorados durante o processo de construção da imagem.

## Comandos

```bash
# roda uma imagem em um container
docker run [id|nome] [opções]
  -d # não ocupa o terminal
  -it # abre um terminal
  -p [porta_host:porta_container] # expõe uma porta
  --name # nomeia um container

# lista todos os containers ativos
docker ps
  -a # lista todos os container inclusive os desativados

# para um container
docker stop [id|nome]

# executa um container
docker start [id|nome]

# exibe os logs de um container
docker logs [id|nome]

# remove um container
docker rm [id|nome]
  -f # força a remoção

# faz o build de uma imagem personalizada
docker build .
  -t # atribui uma tag(nome) para a imagem

# lista todas as imagens
docker image ls

# lista todos os volumes
docker volume ls

# lista todas as networks
docker network ls

# roda uma imagem personalizada em um container
docker run -d -p 3000:3000 --name node-container node-image

# remove uma imagem
docker rmi [id|nome]
  -f # força a remoção

# remove tudo que não está sendo utilizado
docker system prune

# sobe os containers especificados no docker-composer.yml e faz o build das imagens personalizadas
docker compose up -d --build

# sobe os containers especificados no docker-composer.yml
docker compose -up -d

# derruba os containers especificados no docker-composer.yml
docker compose down

# abre o terminal do container especificado
docker exec -it web-container

# cria o arquivo composer.json
docker exec -it web-container composer init
```
