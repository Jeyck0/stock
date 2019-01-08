<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');


if(isset($_GET['id'])): 
    $id = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM alumnos WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 

?>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Alumno</h1>
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
                        <form role="form" method="POST" action="../modulos/editar_alumno.php">
                        <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Numero de Matricula</label>
                                    <input name="matricula" id="matricula" type="number" class="form-control" value="<?php echo $dado['num_matricula'] ?>">                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input name="rut" type="text" class="form-control" value="<?php echo $dado['rut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" value="<?php echo $dado['nombres'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control" value="<?php echo $dado['apellidos'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="nacimiento" type="date" class="form-control" value="<?php echo $dado['fecha_nacimiento'] ?>">
                                </div>
                                
                                
                                                               
                            </div>
                            <div class="col-lg-6">
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
                                <div class="form-group">
                                    <label>Genero</label>
                                    <label id="valor-sexo" class="hidden"><?php echo $dado['sexo']?></label>
                                    <select id="select-sexo"  name="sexo" class="form-control">
                                        <option  value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Curso</label>
                                    <input name="curso" type="text" class="form-control" value="<?php echo $dado['curso'] ?>">
                                </div>                                                 
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="btn-editar" type ="submit" >Actualizar Alumno</button></div>
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
            var valor_sexo = $("#valor-sexo").text();
            var select_sexo =$("#select-sexo");
            if(valor_sexo=="MASCULINO"){
                select_sexo.val("1").attr("selected");
            }
            else{
                select_sexo.val("2").attr("selected");
            }
            
        });    
    </script>