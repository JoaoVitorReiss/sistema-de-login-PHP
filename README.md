# Sistema de login PHP
 Para que esse sistema funcione você deve ante fazer algumas configurações. Você deve ir ate a pasta login\config e abrir a arquivo conexao.php
 e você deve definir um modo de execução local ou producao (mais detalhes dentro arquivo). O email de verificação só será enviado caso o modo de execução
 seja producao, caso seja localhost, para você ser autentificado você deve ir manualmente no banco de dados e ir na coluna **status** e trocar de **novo** pra **confirmado**
 
 Você deve importar o arquivo login.sql para seu banco de dados
