 <?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header('Location: /login');
    }

    require 'database.php';
    if(!empty($_POST['usuario'])&& !empty($_POST['contraseña'])){
        $records = $conn->prepare('SELECT id, usuario, contraseña FROM Usuario WHERE usuario=:usuario');
        $records->bindParam(':usuario',$_POST['usuario']);
        $records->execute();
        $resultados= $records->fetch(PDO::FETCH_ASSOC);
        $mensaje= '';
        if(count($results)> 0 && password_verify($_POST['contraseña'], $results['contraseña'])){
            $_SESSION['user_id']=$results['id'];
            header ('Location: /Second');

        }else {
            $mensaje='Las credenciales no coinciden';
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo usuario</title>
</head>
    

<body>
    <span><a href="signup.php">Signup</a></span>

    <?php if(!empty($mensaje)):?>
    <p><?= $mensaje ?></p>
    <?php endif; ?>

    <form action="login.php" method ="post">
     <h4>usuario
     <input type="text" name "usuario" placeholder ="Ingresar usuario"></h4>
     <h4>contraseña
     <input type="text" name "contraseña" placeholder ="Ingresar contraseña"></h4>
     <input type="submit" value="send">
    </form>        
</body>
</html>