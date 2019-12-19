<?php
    require 'database.php';
    $mensaje='';
        
    
    if(!empty($_post['usuario'])&& !empty($_post['contraseña'])){
         $sql ="INSERT INTO (usuario, contraseña) VALUES (:usuario, :contraseña )";
         $statement=$conn->prepare($sql);
         $statement->bindParam(':usuario',$_post['usuario']);
         $contraseña=password_hash($_post['contraseña'],PASSWORD_BCRYPT );
         $statement->bindParam(':contraseña', $contraseña);
         if($statement->execute()){
            $mensaje='Se creo nuevo usuario';
         }else{
            $mensaje='Ocurrio un error al crear un usuario';
         }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
    

<body>
    <?php if(!empty($mensaje)):?>
    <p><?= $mensaje ?></p>
    <?php endif; ?>
    <h1>SIgnup<h/1>
    <span><a href="login.php">Signup</a></span>

      
    <form action="signup.php" method ="post">
     <h4>Usuario 
     <input type="text" name "usuario" placeholder ="Ingresar usuario"></h4>
     <h4>contraseña
     <input type="text" name "contraseña" placeholder ="Ingresar contraseña"></h4>
     <input type="submit" value="Registrar">
    </form>        
</body>
</html>