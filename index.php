<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php

$ObjConexion = new conexion();
$resultado = $ObjConexion->consultar("SELECT * FROM `proyecto`");

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Wenas</h1>
        <p class="lead">Este es el portafolio mas la gaver que existe</p>
        <hr class="my-2">
    </div>
</div>
<br>
<div class="row row-cols-1 row-cols-md-3 g-4">

<?php foreach($resultado as $proyecto) { ?>

    <div class="col">
        <div class="card h-100">
        <div class="img-contenedor">
        <img src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="<?php echo $proyecto['imagen']; ?>" class="card-img-top">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $proyecto['nombre']?></h5>
            <p class="card-text"><?php echo $proyecto['descripcion']?></p>
        </div>
        </div>
    </div>

<?php } ?>

</div>
<br>

<?php include("pie.php");?>