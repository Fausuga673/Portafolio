
<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php 

if ($_POST) {
    
    $nombre = $_POST ['nombre'];
    
    $fecha = new DateTime();
    
    $imagen = $fecha->getTimestamp()."_". $_FILES ['archivo']['name'];
    $imagen_temporal = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);
    
    $descripcion = $_POST['descripcion'];
    $ObjConexion = new conexion();
    
    $sql = "INSERT INTO `proyecto` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion')";
    $ObjConexion->ejecutar($sql);

}

if ($_GET) {

    //DELETE FROM proyecto WHERE `proyecto`.`id` = 4
    $id = $_GET['borrar'];
    $ObjConexion = new conexion();
    
    $imagen = $ObjConexion->consultar("SELECT imagen FROM `proyecto` WHERE id=".$id);
    unlink("imagenes/".$imagen[0]['imagen']);
    
    $sql="DELETE FROM proyecto WHERE `proyecto`.`id` = ".$id;
    $ObjConexion->ejecutar($sql);
    header("location:portafolio.php");
}

$ObjConexion = new conexion();
$resultado = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                
                        Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
                        <br>
                        Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
                        <br>
                        Descripcion:
                          <textarea class="form-control" name="descripcion" id="" rows="3"></textarea>
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $proyecto) { ?>
                <tr>
                    <td><?php echo $proyecto['id']; ?></td>
                    <td><?php echo $proyecto['nombre']; ?></td>
                    <td>
                        <img src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="<?php echo $proyecto['imagen']; ?>">
                    </td>
                    <td><?php echo $proyecto['descripcion']; ?></td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="editar.php?editar=<?php echo $proyecto['id']; ?>">Editar</a>
                        <a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php include("pie.php");?>