<p align="center">
  <img alt="Por" src="https://img.shields.io/badge/Por-Emily%20Matias-ff69b4?style=for-the-badge">
  <img alt="Foco" src="https://img.shields.io/badge/Stacks-PHP%20(Laravel),_Blade-00B8B5?style=for-the-badge">
</p>

# Dashboard Prosa

## Introdução
Dashboard Prosa é uma aplicação web full-stack de gerenciamento de clientes e usuários, desenvolvida com PHP (Laravel) no back-end, MySQL para gerenciamento do banco de dados, e Blade para o front-end. Foi realizado sob licença MIT por mim, Emily Matias, entre 20 a 24 de Fevereiro de 2025, como etapa de prova técnica do processo seletivo da [Prosa](https://prosa.eco.br/a-prosa/).

## Informações
- O projeto segue o padrão do Laravel de arquitetura MVC, que separa a lógica da aplicação para facilitar a manutenção e a escalabilidade. Em `app/` há os modelos (models) com a lógica do back-end, e `resources/` contém views e assets do front-end. Já os controladores (controllers) ficam em `app/Http/Controllers/`.
- A interação com o banco de dados é feita através de Eloquent ORM.
- Banco de dados gerenciado para população através de migrations, seeders e factories, em `database/`.
- Há duas entidades, *Usuários* e *Clientes*: cada usuário possui nome, e-mail, senha, data de criação e data de atualização; cada cliente possui nome, e-mail, telefone (com DDD), CEP, rua, bairro, cidade e UF.
- O projeto utiliza Blade para as views, no formato `.blade.php`.

## Funcionalidades
- Sistema de autenticação e autorização, usando Laravel Breeze.
- Proteção de rotas: apenas usuários logados podem efetuar as operações CRUD.
- Sistema de paginação para a listagem de Clientes e Usuários.
- Campo de busca para filtrar Clientes e Usuários, por nome ou e-mail.
- Senha do usuário criptografada antes de ser armazenada no banco de dados.
- Busca de endereço do Cliente através do [VIA CEP](https://viacep.com.br/).

## Requisitos de ambiente
Para rodar este projeto, verifique se possui os requisitos listados abaixo instalados localmente. Caso falte algum requisito, instale-o a partir da documentação referenciada nos links:

> [!NOTE]
> Dependendo da versão que você já tenha, talvez seja necessário atualizá-la para garantir compatibilidade e segurança.

| Requisito | Comando |
|-----------|---------|
|[PHP 8+](https://www.php.net/manual/pt_BR/install.php)| `php -version` |
| [Node.js 22+](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm) | `node -v` |
| [NPM 10+](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm) | `npm -v` |
| [Composer 2.8+](https://getcomposer.org/download/) | `composer -v` |

## Como executar localmente
> [!IMPORTANT]
> Antes de prosseguir, certifique-se de que você possui os requisitos da seção acima.

Siga os passos abaixo no seu terminal bash para configurar e rodar a aplicação:

1. Clone o repositório na pasta desejada:
   ```bash
   git clone https://github.com/matiasemily/teste-prosa.git
   cd teste-prosa
   ```

2. Instale as dependências do Composer:
   ```bash
   composer install
   ```

3. Instale as dependências do NPM:
   ```bash
   npm install
   ```

4. Atualize as dependências do NPM:
   ```bash
   npm update
   ```

5. Atualize as dependências do Composer:
   ```bash
   composer update
   ```

> [!NOTE]
> Futuramente pode haver atualizações e vulnerabilidades conhecidas para corrigir problemas de Composer e NPM.

6. Copie o arquivo de exemplo de configuração, que servirá de base para nosso `.env`:
   ```bash
   cp .env.example .env
   ```

7. Abra o arquivo `.env` criado e configure as informações:

Na linha 1, renomeie o título do aplicativo:
   ```txt
   APP_NAME="Dashboard Prosa"  # Título da página/aplicativo
   ```
Das linhas 24 a 29, configure a conexão com o banco de dados como abaixo:
   ```txt
   DB_CONNECTION=mysql # Tipo de SGBD utilizado
   DB_HOST=127.0.0.1
   DB_PORT=3306 # Porta utilizada, no caso, a padrão do MySQL
   DB_DATABASE=bdprosa # Nome do banco de dados que será conectado
   DB_USERNAME=root
   DB_PASSWORD=0123 # Senha EXATA do seu banco MySQL local
   ```
   > [!WARNING]
   > Use a senha do banco de dados **exatamente** como você a configurou localmente para o MySQL.<br/>
   > Lembre-se de salvar suas alterações no `.env`.
   
8. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

9. Execute as migrações para criar o banco de dados:
   ```bash
   php artisan migrate
   ```

10. Popule o banco de dados com dados iniciais:
   ```bash
   php artisan db:seed
   ```

11. Inicie o Vite para hot reload com Laravel:
   ```bash
   npm run dev
   ```

12. Em outra janela de terminal, inicie o servidor web PHP:
   ```bash
   php artisan serve
   ```
   
13. Acesse no seu navegador o endereço `localhost:8000`.

## Meu ambiente de desenvolvimento
- OS: Fedora Linux 41 (Workstation Edition)
- Shell: zsh 5.9
- IDE: Visual Studio Code 1.97.2

### Tecnologias utilizadas
- PHP (CLI) 8.3.17
- Laravel (Blade) 11.44.0
- MySQL 8.0.40
- Composer 2.8.5
- Node.js 22.11.0
- NPM 10.9.0
- Tailwind 4.0.8

## Licença

O **Dashboard Prosa** é um software de código aberto, licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
