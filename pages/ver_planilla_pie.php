<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');


if(isset($_GET['id'])): 
    $id_planilla = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM usuarios_planilla WHERE id_planilla = '$id_planilla'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Planilla N°
                <?php echo $dado['id_planilla']?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form role="form" method="POST" action="../modulos/editar_alumno.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">a) Docente(s) de educación regular del curso:</label>
                                    <?php

                                        $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='PROFESOR(A)' AND id_planilla = $id_planilla";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                    ?>
                                                
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo ?>"><br>


                                    <?php
                                        endwhile;
                                    ?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">b) Profesores especializados:</label>

                                    <?php

                                    $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='EDUCADORA DE PARVULOS' AND id_planilla = $id_planilla ";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];
                                    ?>
                                    
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo; ?>"><br>


                                    <?php
                                    endwhile;
                                    ?>

                                    <?php

                                    $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='EDUCADOR(A) DIFERENCIAL' AND id_planilla = $id_planilla ";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];
                                    ?>
                                    
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo; ?>"><br>


                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">c) Profesionales especializados asistentes de la educación:</label>
                                    <?php
                                                $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='TERAPEUTA OCUPACIONAL' AND id_planilla = $id_planilla ";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $nombre = $dado['nombres'];
                                                    $titulo = $dado['titulo_profesional'];

                                                ?>
                                                <?php
                                    ?>
                                                
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo ?>"><br>


                                    <?php
                                        endwhile;
                                    ?>
                                    <?php
                                                $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='PSICOLOGO(A)' AND id_planilla = $id_planilla ";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $nombre = $dado['nombres'];
                                                    $titulo = $dado['titulo_profesional'];
                                                ?>
                                                <?php
                                    ?>
                                                
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo ?>"><br>


                                    <?php
                                        endwhile;
                                    ?>
                                    <?php
                                                $sql = "SELECT nombres, titulo_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='FONOAUDIOLOGO(A)' AND id_planilla = $id_planilla ";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $nombre = $dado['nombres'];
                                                    $titulo = $dado['titulo_profesional'];

                                                ?>
                                                <?php
                                    ?>
                                                
                                    <input disabled name="" type="text" class="form-control" value="<?php echo $dado['nombres']." - ".$titulo ?>"><br>


                                    <?php
                                        endwhile;
                                    ?>
                                </div>

                            </div>

                        </form>
                    </div>

                    <div class="row">
                        <div class="col-lg-6"><a href="lista_plantillas_pie.php" class="btn btn-primary btn-lg btn-block ">Ir
                                a listado de planillas</a></div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>