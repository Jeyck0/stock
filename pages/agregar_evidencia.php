<?php
include ('includes/interfaz.php');
include ('../configs/conexion_db.php');
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
            <h1 class="page-header">Plantillas PIE</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!-- <a href="llenar_plantilla_pie.php" class="btn btn-sm btn-success">Llenar nueva plantilla</a> -->

                    <form action="../modulos/upload.php" method="post" enctype="multipart/form-data">
                        <label for="file-upload" class="subir">
                            <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                        </label>
                        <input id="file-upload" name="file-upload" onchange='cambiar()' type="file" style='display: none;'/>
                        <div id="info"></div>
                        <input type="submit" value="Enviar" name="enviar">  
                        <input type="submit" value="<?php echo $dado['id']?>" name="id" hidden> 
                    </form>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th scope="col">N° Plantilla</th>
                                <th scope="col">Subir Evidencia</th>
                                <th scope="col">Colegio</th>
                                <th scope="col">Participantes</th>
                                <th scope="col">Ultima edición</th>
                                <th scope="col">Agregar Objetivos</th>
                                <th scope="col">Descargar</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    // $sql = "SELECT p.nombres, u.id, u.id_planilla, u.ultimo_cambio from profesionals p  inner join usuarios_planilla u ON p.id=u.id_profesional where id_profesional > 0";
                                    $sql = "SELECT * from planilla ";
                                    // $sql = "SELECT id_planilla FROM usuarios_planilla u, planilla pl WHERE u.id_planilla=pl.id";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                <?php echo $dado['id'] ?>
                                </td>
                                <td style="text-align:center"> 
                                    
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                <?php echo $_SESSION['s_id'] ?>
                                </td>
                                <td>
                                
                                    
                                </td>
                                <td style="text-align:center">
                                <a href="agregar_objetivos.php?id=<?php echo $dado['id'] ?>" type="submit" name="objetivo"><i class="fas fa-book-reader fa-2x" style="color:#0066ff;"></i></a>
                                </td >
                                <td style="text-align:center">
                                <a href="mpdfprueba.php?id=<?php echo $dado['id'] ?>" type="submit" name="descargar"><i class="fas fa-download fa-2x"></i></a>
                                </td>
                                <td>
                                    <a href="ver_planilla_pie.php?id=<?php echo $dado['id'] ?>" type="submit" name="btn-ver" class="btn btn-xs btn-info">Ver</a>
                                    <a href="editar_planilla.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-warning">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $dado['id'] ?>">Eliminar</a>
                                    <!-- Modal -->
                                    <div id="myModal<?php echo $dado['id'] ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Eliminar registro</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Esta seguro de que quiere eliminar este registro?</p>
                                                </div>
                                                <div class="modal-footer">

                                                    <form action="../modulos/eliminar_planilla.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $dado['id'] ?>">
                                                        <button type="submit" name="btn-delete" class="btn btn-danger">Eliminar</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                    </form>
                </div>
            </div>
        </div>
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