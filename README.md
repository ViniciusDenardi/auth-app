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

```bash
# 1. Clonar o repositório
git clone https://github.com/ViniciusDenardi/auth-app.git

# 2. Entrar na pasta
cd seu-repositorio

# 3. Instalar dependências do Laravel
composer install

# 4. Criar arquivo de ambiente
cp .env.example .env

# 5. Gerar chave da aplicação
php artisan key:generate

# 6. Configurar banco de dados no .env

# 7. Rodar migrations
php artisan migrate

# 8. Criar link do storage (IMPORTANTE)
php artisan storage:link

# 9. Rodar o servidor
php artisan serve