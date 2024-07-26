<?php 

    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"])?></b>. Bem-Vindo ao nosso site.</h1>

        <p>
            <a href="logout.php"></a>
        </p>

    </body>
    </html>

