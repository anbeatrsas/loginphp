
<?php 

    require_once "config.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $password =$_POST['password'];

        $sql=$pdo->prepare("INSERT INTO usuarios (username, password) VALUES(:username,:password)");
        $sql->bindParam(":username", $username);
        $sql->bindParam(":password", $password);
        
        if($sql->execute()){
            echo("Usuário criado com sucesso!");
        } else{
            echo("ERRO: ". $sql->error);
        }
        
        $sql=null;
        $pdo=null;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form action="register.php" method="POST">

    <label>REGISTER</label>
    <br>
    <br>

    <label>Nome de usuário:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="">Senha:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Registrar">

    </form>

</body>
</html>