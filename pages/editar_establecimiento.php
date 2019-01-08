<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');

if(isset($_GET['id'])){
    $id = mysqli_escape_string($enlace, $_GET['id']);
    
    $sql = "SELECT * FROM establecimientos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);

}
?>
<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Establecimiento</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingreso de datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="POST" action="../modulos/editar_establecimiento.php">
                            <div class="col-lg-6">
                            <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                                <div class="form-group">
                                    <label for="">RBD</label>
                                    <input name="rbd" type="text" class="form-control" value="<?php echo $dado['rbd'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" value="<?php echo $dado['nombre'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input name="ciudad" type="text" class="form-control" value="<?php echo $dado['ciudad'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" value="<?php echo $dado['direccion'] ?>">
                                </div>    
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control" value="<?php echo $dado['telefono'] ?>">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Entidad</label>
                                    <input name="entidad" type="text" class="form-control" value="<?php echo $dado['entidad'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Nivel Educacional</label>
                                    <label class="hidden" id="valor-nivel" ><?php echo $dado['nivel_educacional'] ?></label>
                                    <select id="select-nivel" class="form-control" name="nivel" >
                                        <option value="1">Básica</option>
                                        <option value="2">Media</option>
                                        <option value="3">Básica y Media</option>
                                    </select>
                                </div>                                                                 
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="submit" type ="submit" >Actualizar Establecimiento</button></div>
                            <div class="col-lg-6"></div>
                        </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>

<script >
        $(document).ready(function(){
            var valor_nivel = $("#valor-nivel").text();
            var select_nivel =$("#select-nivel");
            if(valor_nivel=="BASICA"){
                select_nivel.val("1").attr("selected");
            }
            if(valor_nivel=="MEDIA"){
                select_nivel.val("2").attr("selected");
            }
            if(valor_nivel=="BASICA Y MEDIA"){
                select_nivel.val("3").attr("selected");
            }            
        });    
</script>
