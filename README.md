# 🚀 Laravel Posts System

Um sistema moderno de gerenciamento de posts desenvolvido com **Laravel**, **Blade** e **Tailwind CSS**.  
A aplicação segue o padrão MVC e foi projetada para oferecer uma experiência simples e eficiente na criação, edição e organização de conteúdos, incluindo suporte completo a imagens e categorias.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** Laravel 12 (PHP 8.2+)
* **Frontend:** Blade Templates + Tailwind CSS
* **Banco de Dados:** MySQL
* **Upload de Arquivos:** Storage do Laravel
* **Servidor:** Laravel Artisan

---

## ✨ Funcionalidades

* **CRUD Completo:** Criação, listagem, edição e exclusão de posts.
* **Sistema de Categorias:** Associação de posts a categorias específicas.
* **Upload de Imagens:** Envio de imagens com validação de tipo e tamanho.
* **Preview de Imagem:** Visualização da imagem antes do envio.
* **Remoção Inteligente:** Exclusão automática da imagem ao deletar ou atualizar um post.
* **Interface em Blog:** Layout organizado e amigável para leitura.

---

## 🧠 Estrutura da Aplicação

O projeto segue a arquitetura MVC:

- **Models**
  - Post
  - Categoria

- **Controller**
  - PostController (responsável pelas operações do CRUD)

- **Views**
  - Post.index → listagem
  - Post.create → criação
  - Post.edit → edição

- **Storage**
  - `/storage/app/public/post` → imagens dos posts

---

## 🚀 Instalação e Execução

Siga os passos abaixo no terminal:

### 📋 Pré-requisitos

Antes de começar, você precisa ter instalado:

* **Git**
* **PHP (>= 8.2)**
* **Composer**
* **MySQL**

---

### 💻 Passo a Passo

Execute os comandos abaixo, um por um, dentro do seu terminal de preferência:

```bash
# 1. Clone o repositório para a sua máquina
git clone https://github.com/Denardi28/auth-app

# 2. Acesse a pasta do projeto que foi criada
cd auth-app

# 3. Instale as dependências de pacotes do PHP/Laravel
composer install

# 4. Instale as dependências do Frontend (Tailwind CSS, Vite, etc.)
npm install

# 5. Crie o arquivo de configuração do ambiente (.env)
cp .env.example .env

# 6. Gere a chave única de segurança do Laravel
php artisan key:generate

# 7. Crie o banco de dados, rode as migrations e adicione as categorias padrão (Seeders)
php artisan migrate --seed

# 8. Crie o link do Storage (Passo obrigatório para que as imagens fiquem visíveis na tela)
php artisan storage:link

# 9. Inicialize o compilador do Tailwind CSS (Deixe este terminal aberto rodando)
npm run dev

# 10. Ligue o servidor local do PHP/Laravel
php artisan serve