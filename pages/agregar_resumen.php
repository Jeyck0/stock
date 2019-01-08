<?php
include ('../configs/conexion_db.php');
include ('includes/interfaz.php');



if(isset($_GET['id'])): 
    $id_planilla = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM planilla_planilla WHERE id_planilla = '$id_planilla'";
    $resultado = mysqli_query($enlace, $sql);
    while ($dado = mysqli_fetch_array($resultado)):
        $ant = $dado['antecedentes1'];
    endwhile;

endif;





?>

<style>
.subir{
    padding: 5px 10px;
    background: #f55d3e;
    color:#fff;
    border:0px solid #fff;
}
 
.subir:hover{
    color:#fff;
    background: #f7cb15;
}


</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Resumen Proceso Evaluación Diagnóstica Integral e Interdisciplinaria </h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row"><form id="" role="form" method="POST"  action="../modulos/insertar_resumen.php" enctype="multipart/form-data">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">     
                            <div class="form-group">
                                <label for="">Antecedentes relevantes de la Anamnesis</label>
                                <p>Señale aquella información más relevante en el desarrollo del estudiante,la familia y el entorno, que impacte en el aprendizaje, según datos recogidos en la entrevista de la Anamnesis</p>
                                <textarea name="txt_antecedentes_1" id="txt_antecedentes_1"  rows="3" class="form-control" value=""><?php $dado['antecedentes1'] = null ? "" : $dado['antecedente1'] ; ?></textarea>
                            </div>
                            <div class="form-group">
                                <p>Si el o la estudiante no es usuario habitual del español, consigne el nivel de español que maneja tanto en comprensión como en la expresión oral y/o escrita:</p>
                                    <textarea name="txt_antecedentes_2" id="txt_antecedentes_2"  rows="3" class="form-control"></textarea>
                                </div>
                            <div class="form-group">
                                <label for="">Valoración de Salud</label>
                                <p>Señale si existe alguna condicion de salud o tratamiento actual del estudiante que sea relevante consignar:</p>
                                <textarea name="txt_valoracion" id="txt_valoracion"  rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Evaluación Psicoeducativa</label>
                                <p>A partir de la evaluación psicoeducativa realizada al estudiante, señale aquellos aspectos relevantes para su aprendizaje:</p>
                                <textarea name="txt_evaluacion" id="txt_evaluacion"  rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Contexto Familiar y Escolar</label>
                                <p style="color:green">Describa aspectos del  Contexto Familiar que :</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="formgroup">
                                <p>Favorecen el aprendizaje</p>
                                <textarea name="txt_familiar_1" id="txt_familiar_1" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <p>Dificultan el aprendizaje</p>
                                <textarea name="txt_familiar_2" id="txt_familiar_2" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p style="color:green">Describa aspectos del  Contexto Escolar que :</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="formgroup">
                                <p>Favorecen el aprendizaje</p>
                                <textarea name="txt_escolar_1" id="txt_escolar_1" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <p>Dificultan el aprendizaje</p>
                                <textarea name="txt_escolar_2" id="txt_escolar_2" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="" style="color:#73C2FB">Observaciones</label>
                                <textarea name="txt_observaciones" id="txt_observaciones" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file-upload" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                                </label>
                                <input id="file-upload" name="file-upload" onchange='cambiar()' type="file" style='display: none;'/>
                                <div id="info"></div>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="submit" name="insertar_resumen" id="insertar_resumen" value="Insertar a planilla" class="btn btn-lg btn-primary" />
                                <a href="agregar_objetivos.php?id=<?php echo $id_planilla; ?>" type="submit" name="btn-ver" class="btn btn-success btn-lg ">Volver</a>
                                <input type="hidden" name = 'id' value="<?php echo $id_planilla; ?>"> 
                                <input type="hidden" name = 'swich' value="<?php echo $swich; ?>">        
                                
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
<script type="application/javascript">
    function cambiar(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
</script>



