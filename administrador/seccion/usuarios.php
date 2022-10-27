<?php include("../template/cabecera.php"); ?>

<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtprimerApellido = (isset($_POST['txtprimerApellido'])) ? $_POST['txtprimerApellido'] : "";
$txtsegundoApellido = (isset($_POST['txtsegundoApellido'])) ? $_POST['txtsegundoApellido'] : "";
$txtDni = (isset($_POST['txtDni'])) ? $_POST['txtDni'] : "";
$txtTelefono = (isset($_POST['txtTelefono'])) ? $_POST['txtTelefono'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../configuracion/conexion.php");

switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO usuarios(nombre,primer_apellido,segundo_apellido,dni,telefono) 
            VALUES (:nombre,:primer_apellido,:segundo_apellido,:dni,:telefono);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':primer_apellido', $txtprimerApellido);
        $sentenciaSQL->bindParam(':segundo_apellido', $txtsegundoApellido);
        $sentenciaSQL->bindParam(':dni', $txtDni);
        $sentenciaSQL->bindParam(':telefono', $txtTelefono);
        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
    case "Editar":
        // echo "Presiono boton editar";
        $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET primer_apellido=:primer_apellido WHERE id=:id");
        $sentenciaSQL->bindParam(':primer_apellido', $txtprimerApellido);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET segundo_apellido=:segundo_apellido WHERE id=:id");
        $sentenciaSQL->bindParam(':segundo_apellido', $txtsegundoApellido);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET dni=:dni WHERE id=:id");
        $sentenciaSQL->bindParam(':dni', $txtDni);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE usuarios SET telefono=:telefono WHERE id=:id");
        $sentenciaSQL->bindParam(':telefono', $txtTelefono);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:usuarios.php");
        break;
    case "Cancelar":
        // echo "Presiono boton cancelar";
        header("Location:usuarios.php");
        break;
    case "Perfil":
        // echo "Presiono boton visitar perfil usuario";
        header("Location:../../index.php");
        break;
    case "Mensaje":
        header("Location:mensaje.php");
        // echo "Presiono boton mensaje";
        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        // echo "Presiono boton borrar";
        header("Location:usuarios.php");
        break;
    case "Select":
        // Seleccionamos los registros
        $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $usuario = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        // Recuperar valores de la seleccion
        $txtNombre = $usuario['nombre'];
        $txtprimerApellido = $usuario['primer_apellido'];
        $txtsegundoApellido = $usuario['segundo_apellido'];
        $txtDni = $usuario['dni'];
        $txtTelefono = $usuario['telefono'];

}

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Registrar nuevo usuario
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="txtID">ID</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID"
                        id="txtID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombres</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre"
                        id="txtNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="txtprimerApellido">Apellido Paterno</label>
                    <input type="text" required class="form-control" value="<?php echo $txtprimerApellido; ?>"
                        name="txtprimerApellido" id="txtprimerApellido" placeholder="Apellido paterno">
                </div>
                <div class="form-group">
                    <label for="txtsegundoApellido">Apellido Materno</label>
                    <input type="text" required class="form-control" value="<?php echo $txtsegundoApellido; ?>"
                        name="txtsegundoApellido" id="txtsegundoApellido" placeholder="Apellido materno">
                </div>
                <div class="form-group">
                    <label for="txtDni">DNI</label>
                    <input type="number" required class="form-control" value="<?php echo $txtDni; ?>" name="txtDni"
                        id="txtDni" placeholder="Dni">
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Telefono</label>
                    <input type="number" class="form-control" value="<?php echo $txtTelefono; ?>" name="txtTelefono"
                        id="txtNombre" placeholder="Telefono">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Select") ? "disabled" : ""; ?> value="Agregar"
                        class="btn btn-primary">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Select") ? "disabled" : ""; ?> value="Editar"
                        class="btn btn-warning">Editar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Select") ? "disabled" : ""; ?>
                        value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-8">
    Tabla de usuarios
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Ape.Paterno</th>
                <th>Ape.Materno</th>
                <th>DNI</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaUsuarios as $usuario) { ?>
            <tr>
                <td>
                    <?php echo $usuario['id']; ?>
                </td>
                <td>
                    <?php echo $usuario['nombre']; ?>
                </td>
                <td>
                    <?php echo $usuario['primer_apellido']; ?>
                </td>
                <td>
                    <?php echo $usuario['segundo_apellido']; ?>
                </td>

                <td>
                    <?php echo $usuario['dni']; ?>
                </td>
                <td>
                    <?php echo $usuario['telefono']; ?>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $usuario['id']; ?>">
                        <input type="submit" name="accion" value="Perfil" class="btn btn-primary">
                        <input type="submit" name="accion" value="Mensaje" class="btn btn-secondary">
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                        <input type="submit" name="accion" value="Select" class="btn btn-info">
                    </form>
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>

<?php include("../template/footer.php"); ?>