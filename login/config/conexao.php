<?php
session_start();

# Se você for testar on-line, basta você colocar a url cimpleta do seu site
$site = ""; // troque pro seu site (não tire a barra final);

/* DOIS MODOS POSSÍVEIS -> local, producao*/
# Local == Quando o sistema está rodando em localhost.
# Produção == Quando o sistema está on-line.

$modo = 'producao'; # Troque essa variável para: 'producao' ou 'local' 

//[!! ATENÇÃO !!] No modo local NÃO será enviado o email de validação! Para que você sejá "autentificado" você deve ir manualmente no seu banco de dados na coluna STATUS e trocar de novo para confirmado

//CREDENCIAIS LOCAL (XAMPP..etc)
if($modo =='local'){
    $servidor ="localhost"; // Nome do servidor, geralmente e "localhost"
    $usuario = "root";      // Nome do usuario, geralmente e "root"
    $senha = "";            // Senha do banco de dados, geralmente e "";
    $banco = "login";       // Nome do bando de dados, no nosso casso será "login" em localhost
}

//CREDENCIAIS PRODUÇÃO(on-line)
if($modo ==''){               
    $servidor ="";   // Nome do servidor.
    $usuario = "";  // Nome do usuario.
    $senha = "";   // senha do seu banco de dados.
    $banco = "";  // Nome do bando de dados
}


            //CONEXÃO COM BANCO DE DADOS
try{
   $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Banco conectado com sucesso!"; 
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco! ";
}

    // FUNÇÃO PARA LIMPAR O POST, ESSA FUNÇÃO VAI EVITAR INJEÇÃO DE CÓDIGOS MALICIOSOS.
function limparPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}

    //FUNÇÃO PARA AUTENTICAÇÃO
function auth($tokenSessao){
    global $pdo;
    //VERIFICAR SE TEM AUTORIZAÇÃO
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
    $sql->execute(array($tokenSessao));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    //SE NÃO ENCONTRAR O USUÁRIO
    if(!$usuario){
        return false;
    }else{
       return $usuario;
    }
}

