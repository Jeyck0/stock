<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');

if(isset($_GET['id'])): 
    $id = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM establecimientos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 


?>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Establecimiento <?php echo $dado['nombre']?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sus datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="POST" action="../modulos/editar_alumno.php">
                        <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RBD</label>
                                    <input disabled name="rbd" id="rbd" type="text" class="form-control" value="<?php echo $dado['rbd'] ?>">                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input disabled name="nombre" type="text" class="form-control" value="<?php echo $dado['nombre'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input disabled name="ciudad" type="text" class="form-control" value="<?php echo $dado['ciudad'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input disabled name="direccion" type="text" class="form-control" value="<?php echo $dado['direccion'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input disabled name="telefono" type="text" class="form-control" value="<?php echo $dado['telefono'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Entidad</label>
                                    <input disabled name="entidad" type="text" class="form-control" value="<?php echo $dado['entidad'] ?>">
                                </div>                                                               
                            </div>
                            <div class="col-lg-6">                                
                                <div class="form-group">
                                    <label for="">Nivel educacional</label>
                                    <input disabled name="nivel" type="text" class="form-control" value="<?php echo $dado['nivel_educacional'] ?>">
                                </div>                                                                          
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><a href="lista_establecimientos.php" class="btn btn-primary btn-lg btn-block " >Listado de Establecimientos</a></div>
                            <div class="col-lg-6"></div>
                        </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>