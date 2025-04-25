# 🐾 Cão-panheiro

Cão-panheiro é um projeto **autoral** em desenvolvimento com o objetivo de conectar cães e seus donos de forma inteligente, amigável e segura. A aplicação oferece funcionalidades como cadastro de usuários, perfis personalizados para cada cachorro, e uma interface moderna para facilitar interações.

> ⚠️ **Atenção:** Este projeto está em fase de desenvolvimento. Algumas funcionalidades ainda estão sendo implementadas e refinadas.

---

## 🚀 Tecnologias Utilizadas

- **PHP 8.2**
- **Laravel 10**
- **MySQL**
- **Blade (Laravel Views)**
- **Laravel Sanctum** (Autenticação)
- **API RESTful**

---

## 📦 Funcionalidades em desenvolvimento

- [x] Cadastro de usuários com perfil (imagem, raça, idade, descrição)
- [x] Upload e exibição de imagem dos cachorros
- [x] Listagem dos cachorros cadastrados
- [ ] Match entre usuários com base em critérios (raça, idade, etc.)
- [ ] Sistema de chat
- [ ] Autenticação com middleware e proteção de rotas
- [ ] Dashboard para administrar perfis

---

## 🛠️ Como rodar o projeto

1. Clone o repositório
   ```bash
   git clone https://github.com/seu-usuario/cao-panheiro.git
   cd cao-panheiro
Configure o ambiente .env e execute:

bash
Copiar
Editar
cp .env.example .env
docker-compose up -d
php artisan key:generate
php artisan migrate
php artisan storage:link
Acesse em: http://localhost:8000

👨‍💻 Autor
Este projeto foi idealizado, desenvolvido e mantido por Alexandre de Souza Moreira, como parte de um portfólio pessoal.

⚠️ Termos de uso
Este é um projeto autoral protegido por direitos autorais.

Qualquer cópia, redistribuição ou uso não autorizado sem o consentimento do autor está sujeito às penalidades legais cabíveis, conforme previsto na legislação de direitos autorais vigente.

💼 Recrutadores
Caso você seja um recrutador e esteja analisando este projeto:
✅ Sinta-se à vontade para explorar o código, a estrutura e o raciocínio de desenvolvimento por trás desta aplicação.
❌ Mas por favor, não o considere como finalizado ou pronto para produção. Este repositório é uma vitrine de habilidades em progresso.
