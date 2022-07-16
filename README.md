<h1 align="center">My Students</h1>

## Sobre o projeto

Esse é um projeto feito com o objetivo de praticar e reforçar o aprendizado com Laravel.
O nome do site é *My Students*, e é um sistema de controle escolar, onde o administrador pode, entre outras coisas:

1. cadastrar estudantes;
2. cadastrar turmas;
3. adicionar dados sobre a escola;

## Login

Pra quem quiser testar o sistema em casa, aqui vai algumas informações sobre o login.

Há uma factory para adicionar automaticamente as informações de login do ADMIN no banco de dados. Portanto, ao rodar um *php  artisan migrate*,
certifique-se de colocar *--UserSeeder* no final.

- Email do admin: **admin@admin.com (email fictício)**
- Senha do admin: **adminsuperpassword**
