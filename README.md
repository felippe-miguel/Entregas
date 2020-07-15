# Entregas
Aplicativo desenvolvido como teste para a Uello

# Como instalar
- **1:** Baixe o repositório do sistema com o seguinte comando:
  ```sh
  git clone https://github.com/felippe-miguel/Entregas.git entregas
  ```
- **2:** Após o download, acesse a pasta do projeto com o comando:
  ```sh
  cd entregas/app
  ```
- **3:** Copie o conteúdo do arquivo .env.example para um novo arquivo .env
  **Observação:** Este passo é especialmente importante já que o container roda o comando `php artisan generate:key` logo após subir. Mesmo que você especifique uma chave nas variáveis de ambientes declaradas no docker-compose.yml, o sistema tentará gerar uma nova chave e salvá-la no arquivo .env.
  Caso esse arquivo não exista, o container não prosseguirá a sua inicialização corretamente.

- **4:** Instale as dependências do projeto com o seguinte comando:
  ```sh
  composer install
  ```
  **Observação:** O container não acompanha o composer instalado para evitar aumento do tamanho da imagem. Você pode utilizar o composer da sua própria máquina ou utilizar a partir de um container.

- **5:** Altere as variáveis de ambiente declaradas no arquivo docker-compose.yml caso necessário.
  Mantive uma chave da API do Google Maps que gerei mas estarei desabilitando e removendo a chave em breve, portanto, você pode gerar sua própria chave e inseri-la no arquivo `docker-compose.yml`.
  Você também pode alterar as variáveis `DEFAULT_ORIGIN_ADDRESS` e `DEFAULT_DESTINY_ADDRESS` caso queria calcular a rota com endereço inicial e final diferentes.

- **6:** Após esses passos, volte para a raiz do projeto e execute o container
  ```sh
  cd ..
  docker-compose up -d
  ```
  **Observação:** O container pode demorar um pouco para subir. Você pode acompanhar os logs para entender o que está acontecendo ou simplesmente rodar `docker-compose up` sem a flag "-d" (detach) para acompanhar os logs dos containers a partir do seu terminal.
  O container da aplicação aguarda o container do banco de dados ficar pronto para só então executar o comando `php artisan:migrate`.
  Além disso, para ambientes linux, ele altera o dono dos arquivos do projeto para o usuário padrão do container (www-data).