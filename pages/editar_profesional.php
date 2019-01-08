<?php
include("../configs/conexion_db.php");
include('includes/interfaz.php');

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
            <h1 class="page-header">Editar Profesional</h1>
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
                        <form role="form" method="POST" action="../modulos/editar_profesional.php">
                            <div class="col-lg-6">
                            <input type="hidden" name = 'id' value="<?php echo $dado['id'] ?>">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" value="<?php echo $dado['nombres'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control" value="<?php echo $dado['apellidos'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input name="rut" type="text" class="form-control" value="<?php echo $dado['rut'] ?>">
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
                                <div class="form-group">
                                    <label for="">Asignatura y/o Modulo</label>
                                    <input name="asignatura" type="text" class="form-control" value="<?php echo $dado['asignatura_modulo'] ?>">
                                </div>                                  
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control" value="<?php echo $dado['correo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="fecha_nac" type="date" class="form-control" value="<?php echo $dado['fecha_nacimiento'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <label class="hidden" id="valor-profesional" ><?php echo $dado['titulo_profesional'] ?></label>
                                    <select id="select-profesional" class="form-control" name="titulo" >
                                        <option value="1">Educadora de parvulos</option>
                                        <option value="2">Psicologo(A)</option>
                                        <option value="3">Terapeuta ocupacional</option>
                                        <option value="4">Fonoaudiologo(A)</option>
                                        <option value="5">Profesor(A)</option>
                                        <option value="6">Educador(A) Diferencial</option>
                                    </select>
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
                                    <label>Jefe de curso</label>
                                    <label id="valor-jefe" class="hidden"><?php echo $dado['jefatura_curso']?></label>
                                    <select id="select-jefe" class="form-control" name="jefatura">
                                        <option value="1">Si</option>
                                        <option value="2">No</option>                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Coordinador</label>
                                    <label id="valor-coordinador" class="hidden"><?php echo $dado['jefatura_curso']?></label>
                                    <select id="select-coordinador" class="form-control" name="coordinador">
                                        <option value="1">Si</option>
                                        <option value="2">No</option>                                       
                                    </select>
                                </div>                                                                      
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="submit" type ="submit" >Actualizar Profesional</button></div>
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
            var valor_profesional = $("#valor-profesional").text();
            var select_profesional =$("#select-profesional");
            if(valor_profesional=="EDUCADORA DE PARVULOS"){
                select_profesional.val("1").attr("selected");
            }
            if(valor_profesional=="PSICOLOGO(A)"){
                select_profesional.val("2").attr("selected");
            }
            if(valor_profesional=="TERAPEUTA OCUPACIONAL"){
                select_profesional.val("3").attr("selected");
            }
            if(valor_profesional=="FONOAUDIOLOGO(A)"){
                select_profesional.val("4").attr("selected");
            }
            if(valor_profesional=="PROFESOR(A)"){
                select_profesional.val("5").attr("selected");
            }
            if(valor_profesional=="EDUCADOR(A) DIFERENCIAL"){
                select_profesional.val("6").attr("selected");
            }
            
        });    
</script>
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
<script >
        $(document).ready(function(){
            var valor_jefe = $("#valor-jefe").text();
            var select_jefe =$("#select-jefe");
            if(valor_jefe=="si"){
                select_jefe.val("1").attr("selected");
            }
            else{
                select_jefe.val("2").attr("selected");
            }
            
        });    
</script>
<script >
        $(document).ready(function(){
            var valor_jefe = $("#valor-coordinador").text();
            var select_jefe =$("#select-coordinador");
            if(valor_jefe=="si"){
                select_jefe.val("1").attr("selected");
            }
            else{
                select_jefe.val("2").attr("selected");
            }
            
        });    
</script>