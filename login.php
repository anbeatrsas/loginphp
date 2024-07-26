<?php 

    require_once "config.php";
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=['username'];
        $password=['password'];

        $sql=$pdo->prepare("SELECT id, password FROM usuarios WHERE username = :username");
        $sql->bindParam(":username",$username);
        $sql->execute();
        $sql->store_result();

        if($sql->num_rows == 1){
            $sql->bind_result($id, $hashed_password);
            $sql->fetch();
            if(password_verify($password, $hashed_password)){
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                header("location: welcome.php");
            } else{
                echo("Senha inválida.");
            }
        } else{
            echo("Nome de usuário inválido.");
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
    
    <form action="login.php" method="POST">

        <label>LOGIN</label>
        <br>
        <br>
        <label>Nome de usuário:</label>
        <input type="text" name="username" id="username" required><br>
        
        <label for="">Senha:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Entrar">

    </form>

</body>
</html>