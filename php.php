<?php

//print_r($_GET); //usado pelo progrmador para verificar quais dados estao chegando
//inicializar variaveis
$nome = '';
$email = '';
$assunto = '';
$mensagem = '';
//inicializar variaveis
if(isset($_GET['botao'])){
    //onde pegas os dados do formulário
    $nome= $_GET['nome'];
    $email= $_GET['email'];
    $assunto= $_GET['assunto'];
    $mensagem= $_GET['msg'];
    //onde pegas os dados do formulário
    
    //onde cria a conexão com banco
    $dbhost = 'localhost'; 
    $dbuser = 'root';   
    $dbpassword = '';
    try{
    $conectdb = new PDO('mysql:host=localhost;dbname=cxlsnvlf_aulas', $dbuser, $dbpassword);
     $conectdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    //onde cria a conexão com banco

    //inserir dados no banco de dados
        try{
            $inserir = $conectdb->prepare("INSERT INTO contato(nome, email, assunto, mensagem) VALUES (:nome, :email, :assunto, :mensagem)");
            $inserir->bindParam(':nome', $nome, PDO::PARAM_STR, 100);
            $inserir->bindParam(':email', $email, PDO::PARAM_STR, 200);
            $inserir->bindParam(':assunto', $assunto, PDO::PARAM_STR, 50);
            $inserir->bindParam(':mensagem', $mensagem, PDO::PARAM_STR, 1000);
            $op = $inserir->execute();
        }catch(PDOException $e){
            $op = 0;
            print($e);
        }
    //inserir dados no banco de dados

}

?>