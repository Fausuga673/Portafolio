<?php include("cabecera.php")?>
<?php include("conexion.php")?>

<?php

if ($_GET) {
    $id = $_GET['editar'];
}

if ($_POST) {

    if(isset($_POST['enviar'])) {

        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $sql = "UPDATE `proyecto` SET `nombre` = '$nombre', `descripcion` = '$descripcion' WHERE `proyecto`.`id` = $id";
        
        $resultado = new conexion;
        $resultado->ejecutar($sql);
        
}

}

$ObjConexion = new conexion();
$resultado = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">
            Datos del proyecto
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">

                Nombre del proyecto: <input class="form-control" type="text" name="nombre">
                <br>
                Descripcion:
                    <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
                <br>
                <input class="btn btn-success" type="submit" value="Actualizar proyecto" name="enviar">
                <br>
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-2"></div>
</div>