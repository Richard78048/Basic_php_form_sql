<?php 
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

//Leia Dados E Mostre os Dados
try{
    $tarefa = $conectdb->query("SELECT * FROM contato");
    $user_result = $tarefa->fetchAll();
}catch(PDOException $e){
    print_r($e);
}
//Leia Dados E Mostre os Dados
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADOS</title>
    <style>

        .res{
            margin:auto auto;
            width:60%;
            background-color:black;
            padding:15px;
            border-radius:9px;
        }
        .res-linha{
        padding:10px;
        background-color:white;
        border-radius:12px;
        margin-top:10px;
        }
        #home{
        padding:10px;
        width:100%;
        display:flex;
        justify-content:center;
        }
        #home a:hover{
         transition: all 0.4s ease-in-out;
        scale:1.10;
        }
    </style>
</head>
<body>
    <div class="res"> <!--DADOS Serao inseridos aqui -->

    <?php 
    foreach($user_result as $user){
        echo "
        <div class='res-linha'>
            <h3>".$user['nome']."</h3>
            <i>".$user['email']."</i>
            <span>(".$user['assunto'].")</span>
            <p>".$user['mensagem']."</p>
        </div>
        ";
    }
    ?>
        <div id="home">
            <a href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                </svg>
            </a>
        </div>
    </div>
</body>
</html>

