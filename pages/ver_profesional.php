<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');


if(isset($_GET['id'])): 
    $id = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM profesionals WHERE id = '$id'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 

?>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profesional <?php echo $dado['nombres']?> </h1>
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
                        <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input disabled name="nombre" id="nombre" type="text" class="form-control" value="<?php echo $dado['nombres'] ?>">                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input disabled name="apellido" type="text" class="form-control" value="<?php echo $dado['apellidos'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input disabled name="rut" type="text" class="form-control" value="<?php echo $dado['rut'] ?>">
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
                                    <label for="">Asignatura y/o Modulo</label>
                                    <input disabled name="asignatura" type="text" class="form-control" value="<?php echo $dado['asignatura_modulo'] ?>">
                                </div> 
                                <div class="form-group">
                                <a href="listaProfesionals.php" class="btn btn-primary btn-lg btn-block " >Volver</a>
                                </div>  
                                                               
                            </div>
                            <div class="col-lg-6">                                
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input disabled name="correo" type="text" class="form-control" value="<?php echo $dado['correo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de nacimiento</label>
                                    <input disabled name="fech_nac" type="text" class="form-control" value="<?php echo $dado['fecha_nacimiento'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <input disabled name="profesional" type="text" class="form-control" value="<?php echo $dado['titulo_profesional'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Genero</label>
                                    <input disabled name="sexo" type="text" class="form-control" value="<?php echo $dado['sexo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jefe de Curso</label>
                                    <input disabled name="sexo" type="text" class="form-control" value="<?php echo $dado['jefatura_curso'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Coordinador</label>
                                    <input disabled name="coordinador" type="text" class="form-control" value="<?php echo $dado['Coordinador'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label>Planilla</label>
                                    <form action="../modulos/busqueda_planilla_profesional.php" method="POST">
                                    <select name="select_planilla" id="planilla" class="form-control" >
                                        <?php

                                                $sql = "SELECT id_planilla FROM usuarios_planilla where id_profesional=$id ORDER BY id";
                                                $resultado = mysqli_query($enlace, $sql);
                                                $contador = mysqli_num_rows($resultado);

                                                
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $id = $dado['id'];
                                                    $id_planilla=$dado['id_planilla']
                                                    
                                        
                                                ?>
                                        <option value="<?php echo $id_planilla; ?>">
                                            <?php echo $id_planilla; ?>
                                        </option>
                                        <?php
                                                endwhile;
                                            ?>
                                    </select>
                                    <select name="contador" id="contador" class="hidden">
                                    <option value=<?php echo $contador?>></option>
                                    </select>
     
                                </div> 
                                <div class="form-group">
                                   <button id="btn_planilla" name="btn_planilla" type="submit" class="btn btn-success btn-lg btn-block ">Ver Planilla</button>                 
                                </div>
                                </form>                                                
                            </div>                                              
                        </div>
                        
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/cierre-interfaz.php'); ?>

<script>
$(document).ready(function(){
    if(($('#contador').val())==0){
        $('#planilla').attr('disabled',true);
        $('#btn_planilla').attr('disabled',true);
    }
})
</script>