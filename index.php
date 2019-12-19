<?php 
    session_start();
    require 'database.php';
    if(isset($_SESSION['user_id'])){
        $records=$conn->prepare('SELECT id, usuario, contraseña FROM Usuario  WHERE id=:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $resultados=$records->FETCH(PDO::FETCH_ASSOC);
        $user =null;
        if(count($resultados)>0){
            $user=$resultados;
        }  
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido!</title>
</head>
<body>
    <?php if(!empty($user)): ?>
    <br>Bienvenido.<?=$user['usuario'] ?>
    <a href="logout.php">Logout</a>
    <?php else:?>
    <h1>Te inivito a ingresar o crear un usuario</h1>
    <a href="login.php">Login</a> or<a href="signup.php">Signup</a>
    <?php endif; ?>
</body>
</html>
