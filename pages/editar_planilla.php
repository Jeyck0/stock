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
            <h1 class="page-header">Editar planilla N°
                <?php echo $id_planilla; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    I EQUIPO DE AULA 1
                </div>
                <!-- -----------DOCENTES------------------------------------------------------------------------------------------------- -->
                <div class="panel-body">
                    <div class="row">
                        <form id="formularioDocentes" role="form" action="../modulos/editar_planilla_eliminar.php"
                            method="POST">
                            <div class="form-group">
                                <input name="numero" type="text" style="width: 80px" class="form-control hidden" value=" <?php print_r($id_planilla) ?> ">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="cantidadDocentes" id="cantidadDocentes" class="hidden">
                                    <label for="">a) Docente(s) de educación regular del curso:</label>

                                    <br>
                                    <?php
                                      
                                        $num = 0;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='PROFESOR(A)' AND id_planilla = $id_planilla";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                            $id_profesional = $dado['id'];
                                            $num ++;
                                    ?>
                                    <div id="row<?php echo $num?>" class="row">
                                        <div id="inputTres<?php echo $num?>" class="col-md-12 cantidadDocentes">
                                            <select name="nombre<?php echo $num ?>" id="nombre<?php echo $num ?>" class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                $sql2 = "SELECT * FROM profesionals where titulo_profesional='PROFESOR(A)' ORDER BY id";
                                                $resultado2 = mysqli_query($enlace, $sql2);
                                                while ($dado2 = mysqli_fetch_array($resultado2)):
                                                    $id2 = $dado2['id'];
                                                    $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                endwhile;
                                            ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroUno<?php echo $num;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idUno<?php echo $num;?>" value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="btn-delete<?php echo $num;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="hidden" type="" name="numero<?php echo $num;?>" value="<?php print_r($id_planilla) ?>">
                                            <button type="submit" id="btn-update" name="btn-update" class="btn btn-lg btn-success btn-block">Actualizar
                                                Docentes existentes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="hidden">
                                    <p><strong>*Agregar nuevo docente</strong></p>
                                    <div id="" class="row">
                                        <div id="" class="col-md-12">
                                            <select name="nuevoDocente" id="nuevoDocente" class="form-control" required>
                                            <option value="" selected disabled hidden>Seleccione</option>
                                                
                                                <?php

                                            $sql2 = "SELECT * FROM profesionals where titulo_profesional='PROFESOR(A)' ORDER BY id";
                                            $resultado2 = mysqli_query($enlace, $sql2);
                                            while ($dado2 = mysqli_fetch_array($resultado2)):
                                                $id2 = $dado2['id'];
                                                $nombre2 = $dado2['nombres'];
                                            ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2; ?>
                                                </option>
                                                <?php
                                            endwhile;
                                        ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="" value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="" value="<?php echo $dado['id_profesional'] ?>">
                                                    <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
                <hr>
                <!-- ------------EDUCADORES DIFERENCIAL Y PARVULO------------------------------------------------------------------------------------------------ -->
                <div class="panel-body">
                    <div class="row">
                        <form id="formularioEspecial" role="form" action="../modulos/editar_planilla_eliminar.1.php"
                            method="POST">
                            <div class="form-group">
                                <input name="numero" type="text" style="width: 80px" class="form-control hidden" value=" <?php print_r($id_planilla) ?> ">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="especial" id="especial" class="hidden">
                                    <label for="">b) Profesores especializados:</label>

                                    <br>
                                    <?php
                                        $num = 0;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND id_planilla = $id_planilla AND titulo_profesional='EDUCADOR(A) DIFERENCIAL'";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                            $id_profesional = $dado['id'];

                                            $num ++;
                                    ?>
                                    <div id="row<?php echo $num?>" class="row">
                                        <div id="col<?php echo $num?>" class="col-md-12 cantidadEspecial">
                                            <select name="select<?php echo $num ?>" id="select<?php echo $num ?>" class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals WHERE titulo_profesional='EDUCADOR(A) DIFERENCIAL' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroDos<?php echo $num;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idDos<?php echo $num;?>" value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="borrar<?php echo $num;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>

                                    <?php
                                        $num2 = $num;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND id_planilla = $id_planilla AND titulo_profesional='EDUCADORA DE PARVULOS'";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                            $id_profesional = $dado['id'];
                                            $num2 ++;
                                    ?>
                                    <div id="row<?php echo $num2?>" class="row">
                                        <div id="col<?php echo $num2?>" class="col-md-12 cantidadEspecial">
                                            <select name="select<?php echo $num2 ?>" id="select<?php echo $num2 ?>"
                                                class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals WHERE titulo_profesional='EDUCADORA DE PARVULOS' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroDos<?php echo $num2;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idDos<?php echo $num2;?>" value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="borrar<?php echo $num2;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="hidden" type="" name="numero<?php echo $num2;?>" value="<?php print_r($id_planilla) ?>">
                                            <button type="submit" id="actualizar" name="actualizar" class="btn btn-lg btn-success btn-block">Actualizar
                                                profesores especializados existentes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="hidden">
                                    <p><strong>*Agregar nuevo profesor especializado</strong></p>
                                    <div id="" class="row">
                                        <div id="" class="col-md-12">
                                            <select name="nuevoEspecial" id="" class="form-control" required>
                                            <option value="" selected disabled hidden>Seleccione</option>                                                
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals where titulo_profesional='EDUCADORA DE PARVULOS' OR titulo_profesional='EDUCADOR(A) DIFERENCIAL' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                        $titulo2 = $dado2['titulo_profesional'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo2; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="" value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="" value="<?php echo $dado['id_profesional'] ?>">
                                                    <button type="submit" name="agregarDos" id="agregarDos" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
                <hr>
                <!-- -------------RESTO------------------------------------------------------------------------------------------------------------- -->
                <div class="panel-body">
                    <div class="row">
                        <form id="formularioAsistente" role="form" action="../modulos/editar_planilla_eliminar.2.php"
                            method="POST">
                            <div class="form-group">
                                <input name="numero" type="text" style="width: 80px" class="form-control hidden" value=" <?php print_r($id_planilla) ?> ">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="asistente" id="asistente" class="hidden">
                                    <label for="">c) Profesionales especializados asistentes de la educación:</label>

                                    <br>
                                    <?php
                                        $num = 0;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND id_planilla = $id_planilla AND titulo_profesional='TERAPEUTA OCUPACIONAL'";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                            $id_profesional = $dado['id'];

                                            $num ++;
                                    ?>
                                    <div id="row<?php echo $num?>" class="row">
                                        <div id="col<?php echo $num?>" class="col-md-12 cantidadAsistente">
                                            <select name="sel<?php echo $num ?>" id="sel<?php echo $num ?>" class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals WHERE titulo_profesional='TERAPEUTA OCUPACIONAL' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroDos<?php echo $num;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idTres<?php echo $num;?>" value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="delete<?php echo $num;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>

                                    <?php
                                        $num2 = $num;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND id_planilla = $id_planilla AND titulo_profesional='PSICOLOGO(A)'";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $titulo = $dado['titulo_profesional'];
                                            $id_profesional = $dado['id'];
                                            $num2 ++;
                                    ?>
                                    <div id="row<?php echo $num2?>" class="row">
                                        <div id="col<?php echo $num2?>" class="col-md-12 cantidadAsistente">
                                            <select name="sel<?php echo $num2 ?>" id="sel<?php echo $num2 ?>" class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals WHERE titulo_profesional='PSICOLOGO(A)' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroDos<?php echo $num2;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idTres<?php echo $num2;?>"
                                                        value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="delete<?php echo $num2;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>

                                    <?php
                                        $num3 = $num2;
                                        $sql = "SELECT * FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND id_planilla = $id_planilla AND titulo_profesional='FONOAUDIOLOGO(A)'";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $id_profesional = $dado['id'];
                                            $titulo = $dado['titulo_profesional'];
                                            $num3 ++;
                                    ?>
                                    <div id="row<?php echo $num3?>" class="row">
                                        <div id="col<?php echo $num3?>" class="col-md-12 cantidadAsistente">
                                            <select name="sel<?php echo $num3 ?>" id="sel<?php echo $num3 ?>" class="form-control">

                                                <option value="<?php echo $id_profesional; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
                                                </option>
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals WHERE titulo_profesional='FONOAUDIOLOGO(A)' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroDos<?php echo $num3;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idTres<?php echo $num3;?>"
                                                        value="<?php echo $id_profesional; ?>">
                                                    <button type="submit" name="delete<?php echo $num3;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="hidden" type="" name="numero<?php echo $num3;?>" value="<?php print_r($id_planilla) ?>">
                                            <button type="submit" id="update" name="update" class="btn btn-lg btn-success btn-block">Actualizar
                                                asistentes especializados existentes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="hidden">
                                    <p><strong>*Agregar nuevo profesor especializado</strong></p>
                                    <div id="" class="row">
                                        <div id="" class="col-md-12">
                                            <select name="nuevoAsistente" id="nuevoAsistente" class="form-control"
                                                required>
                                            <option value="" selected disabled hidden>Seleccione</option>                                                
                                                <?php

                                                    $sql2 = "SELECT * FROM profesionals where titulo_profesional='FONOAUDIOLOGO(A)' OR titulo_profesional='PSICOLOGO(A)' OR titulo_profesional='TERAPEUTA OCUPACIONAL' ORDER BY id";
                                                    $resultado2 = mysqli_query($enlace, $sql2);
                                                    while ($dado2 = mysqli_fetch_array($resultado2)):
                                                        $id2 = $dado2['id'];
                                                        $nombre2 = $dado2['nombres'];
                                                        $titulo2 = $dado2['titulo_profesional'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2." - ".$titulo2; ?>
                                                </option>
                                                <?php
                                                    endwhile;
                                                ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="" value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="" value="<?php echo $dado['id_profesional'] ?>">
                                                    <button type="submit" name="agregarTres" id="agregarTres" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
                <hr>
                <!-- -------------COORDINACION DEL PROGRAMA------------------------------------------------------------------------------------------------------------- -->
                <div class="panel-body">
                    <div class="container">
                        <h5><strong>d) Coordinación del Programa:</strong></h5>
                        <br>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>En el establecimiento</label>
                        </div>
                        <div class="form-group">
                            <label>En el Daem (Si el PIE es comunal)</label>
                        </div>
                        <div class="form-group">
                            <label>Con Redes de Apoyo</label>
                        </div>
                    </div>
                    <?php
                        $sql = "SELECT * FROM planilla pl, profesionals p WHERE pl.lugar_establecimiento=p.id AND pl.id = $id_planilla";
                        $resultado = mysqli_query($enlace, $sql);
                        $dado = mysqli_fetch_array($resultado);

                            $id = $dado['lugar_establecimiento'];
                            $nombre = $dado['nombres'];
                            $titulo = $dado['titulo_profesional'];
                    ?>
                    <form id="formularioCoordinacion" role="form" action="../modulos/editar_planilla_coordinacion.php"
                    method="POST">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select name="coordinador1" id="nombre1" class="form-control">
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php
                                    
                                    $sql = "SELECT * FROM profesionals where coordinador='si' ORDER BY id";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $id = $dado['id'];
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];
                                ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php
                                    endwhile;
                                ?>
                                </select>
                            </div>
                            <?php
                        $sql = "SELECT * FROM planilla pl, profesionals p WHERE pl.lugar_daem=p.id AND pl.id = $id_planilla";
                        $resultado = mysqli_query($enlace, $sql);
                        $dado = mysqli_fetch_array($resultado);

                            $id = $dado['lugar_daem'];
                            $nombre = $dado['nombres'];
                            $titulo = $dado['titulo_profesional'];
                        ?>
                            <div class="form-group">
                                <select name="coordinador2" id="nombre1" class="form-control">
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php

                                    $sql = "SELECT * FROM profesionals where coordinador='si' ORDER BY id";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $id = $dado['id'];
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];

                                ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php
                                    endwhile;
                                ?>
                                </select>
                            </div>
                            <?php
                            $sql = "SELECT * FROM planilla pl, profesionals p WHERE pl.lugar_redes_apoyo=p.id AND pl.id = $id_planilla";
                            $resultado = mysqli_query($enlace, $sql);
                            $dado = mysqli_fetch_array($resultado);

                                $id = $dado['lugar_redes_apoyo'];
                                $nombre = $dado['nombres'];
                                $titulo = $dado['titulo_profesional'];
                        ?>
                            <div class="form-group">
                                <select name="coordinador3" id="nombre1" class="form-control">
                                    <option value="<?php echo $id;?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php

                                    $sql = "SELECT * FROM profesionals where coordinador='si' ORDER BY id";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                        $id = $dado['id'];
                                        $nombre = $dado['nombres'];
                                        $titulo = $dado['titulo_profesional'];

                                ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre." - ".$titulo; ?>
                                    </option>
                                    <?php
                                    endwhile;
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="hidden" type="" name="numero" value="<?php print_r($id_planilla) ?>">
                                <button type="submit" id="up-coordinacion" name="up-coordinacion" class="btn btn-lg btn-success btn-block">Actualizar
                                    Coordinacion del programa</button>
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
    $(document).ready(function () {
        var valor_sexo = $("#valor-sexo").text();
        var select_sexo = $("#select-sexo");
        if (valor_sexo == "MASCULINO") {
            select_sexo.val("1").attr("selected");
        } else {
            select_sexo.val("2").attr("selected");
        }

    });
</script>

<!-- Scripts de Docentes -->
<script>
    $('#btn-update').click(function () {
        $('#formularioDocentes').attr('action', '../modulos/editar_planilla_actualizar.php');
    });
</script>
<script>
    $('#agregar').click(function () {
        $('#formularioDocentes').attr('action', '../modulos/editar_planilla_agregar.php');
    });
</script>

<!-- Scripts de Profesores Especializados -->
<script>
    $('#actualizar').click(function () {
        $('#formularioEspecial').attr('action', '../modulos/editar_planilla_actualizar.1.php');
    });
</script>
<script>
    $('#agregarDos').click(function () {
        $('#formularioEspecial').attr('action', '../modulos/editar_planilla_agregar.1.php');
    });
</script>

<!-- Scripts de Asistentes especializados -->
<script>
    $('#update').click(function () {
        $('#formularioAsistente').attr('action', '../modulos/editar_planilla_actualizar.2.php');
    });
</script>
<script>
    $('#agregarTres').click(function () {
        $('#formularioAsistente').attr('action', '../modulos/editar_planilla_agregar.2.php');
    });
</script>