<?php
include ('includes/interfaz.php');
include ('../configs/conexion_db.php');

if(isset($_GET['id'])): 
    $id_planilla = mysqli_escape_string($enlace, $_GET['id']);
endif;

$sql = "SELECT swich FROM planilla_planilla WHERE id_planilla = '$id_planilla'";
$resultado = mysqli_query($enlace, $sql);
$dado = mysqli_fetch_array($resultado);
$swich = $dado['swich'];

$sql2 = "SELECT id_planilla FROM planilla_planilla WHERE id_planilla = '$id_planilla'";
$resultado2 = mysqli_query($enlace, $sql2);
$dado2 = mysqli_fetch_array($resultado2);
$swich2 = $dado2['id_planilla'];

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registro de apoyos para cada estudiante o grupo de estudiantes</h1>
            <p>Registrar, por estudiante o grupos de estudiantes, los apoyos específicos o actividades especiales que se realizan en
            forma individual o en pequeños grupos dentro o fuera del aula regular y el o las/os nombres de los profesionales que
            los entregan</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row"><form id="" role="form" method="POST" action="../modulos/insertar_objetivos.php">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">     
                            <div class="form-group">
                                <label for="">Profesional</label>
                                <select name="profesional" id="profesional" class="form-control" required>
                                    <option value="" selected disabled hidden> Seleccione </option>
                                    <?php
                                    $sql = "SELECT up.id_profesional,p.nombres,p.apellidos,p.titulo_profesional FROM usuarios_planilla up INNER JOIN profesionals p ON up.id_profesional=p.id  WHERE id_planilla = '$id_planilla'";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $id = $dado['id_profesional'];
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];
                                        $apellido = $dado['apellidos'];
                                    ?>
                                        <option value="<?php echo $id; ?>">
                                            <?php echo $nombre." ".$apellido." ".$titulo; ?>
                                        </option>
                                        <?php
                                    endwhile;
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Lugar (Dentro o fuera del aula)</label>
                                <select name="lugar_aula" id="lugar_aula" class="form-control" required>
                                    <option value="" selected disabled hidden>Seleccione</option>
                                    <option value="1">Aula Comun</option>
                                    <option value="2">Aula de Recursos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Horas Realizadas</label>
                                <input type="text" name="horas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Acciones, actividades y apoyos entregados a estudiantes.</label>
                                <textarea name="txt_actividades" id="txt_actividades"  rows="3" class="form-control" maxlength="130" placeholder="Hasta 130 caracteres..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Observaciones / Acuerdos</label>
                                <textarea name="txt_observaciones" id="txt_observaciones"  rows="3" class="form-control" maxlength="130" placeholder="Hasta 130 caracteres..." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="insertar_objetivos" id="insertar_objetivos" value="Insertar a planilla" class="btn btn-lg btn-primary" />
                                <input type="hidden" name = 'id' value="<?php echo $id_planilla; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <a href="agregar_resumen.php?id=<?php echo $id_planilla; ?>" type="submit" id="btn-ver" name="btn-ver" class="btn btn-success btn-lg btn-block">Agregar Resumen</a>
                            <a href="editar_resumen.php?id=<?php echo $id_planilla; ?>" type="submit" id="btn-editar" name="btn-editar" class="btn btn-success btn-lg btn-block">Editar Resumen</a>
                                <select name="swich" id="swich" hidden>
                                    <option value="<?php echo $swich;?>"></option>
                                </select> 
                                <select name="swich2" id="swich2" hidden>
                                    <option value="<?php echo $swich2;?>"></option>
                                </select>      
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
</form></div>
    </div>
</div>
<?php
include ('includes/cierre-interfaz.php');
?>

<script>
$(document).ready(function(){
    if($('#swich').val()==1){
        $('#btn-ver').addClass("hidden");
    }
    else{
        $('#btn-editar').addClass("hidden");
        
    }
    
    if($('#swich2').val()==""){
        $('#btn-ver').addClass("hidden");
        alert (" IMPORTANTE!! :Para Agregar un resumen debe existir al menos UN REGISTRO DE APOYO PARA ESTUDIANTES");
    }
});
</script>


