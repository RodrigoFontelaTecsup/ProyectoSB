<?php
// Existe un envio tipo POST, redireccionamos
session_start();
if ($_POST) {
    if(($_POST["user"]=="admin")&&($_POST["password"]=="admin")) {
        $_SESSION["user"] ="ok";
        $_SESSION["nombreUsuario"] = "Admin";
        header('Location:inicio.php');
    } else {
        $mensaje="Error: el usuario o contrasenia son incorrectos";
    }
    
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" type="image/x-icon" href="./img/adm.ico">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?> 
                        </div>
                    <?php } ?>
                        <form method="POST">

                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control" name="user" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>