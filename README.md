## Instalação

Primeiramente temos que importar o banco de dados para o seu servidor. No diretório principal existe uma pasta chamada 'db', com o arquivo SQL do wordpress.
Com o banco de dados já importado, temos que alterar na tabela 'empiricus_options' as configurações de URL para o endereço do novo servidor.
Por último, basta configurar com as informações do novo servidor o arquivo 'wp-config.php' do diretório principal.

## WORDPRESS

O projeto foi desenvolvido com campos personalizados, portanto todas as áreas são editáveis pelo painel.
Foi criado um template de página para a Página Inicial, ele pode ser encontrado em 'wp-content->themes->empiricus->templates->home.php'.

Login do Wordress:
Usuário: admin
Senha: admin102030@

## FRONTEND

O frontend separado da integração com o wordpress se encontra em umas pasta do diretório principal chamada 'frontend'.z