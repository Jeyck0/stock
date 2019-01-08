<!-- Conexion -->
<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Alumno</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <?php if($_SESSION['tipo']==1) { ?>
                    <a href="agregar_alumno.php" class="btn btn-sm btn-success">Nuevo alumno</a>
                    <?php } ?>

                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th scope="col">N° de Matricula</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Opciones</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT a.id,a.nombres,a.apellidos,a.rut,a.ciudad,a.direccion,a.fecha_nacimiento,a.telefono,a.sexo,a.num_matricula,a.curso,c.nombre_curso FROM alumnos a inner join curso c on c.id=a.curso";;
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $dado['num_matricula'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['rut'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nombres'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['apellidos'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nombre_curso'] ?>
                                </td>
                                <td>
                                    <a href="ver_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-info">Ver</a>

                                    <?php if($_SESSION['tipo']==1) { ?>
                                    <a href="editar_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-warning">Editar</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $dado['id'] ?>">Eliminar</a>
                                    <?php } ?>

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

                                                    <form action="../modulos/eliminar_alumno.php" method="POST">
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

<?php include('includes/cierre-interfaz.php'); ?>