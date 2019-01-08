<?php
include ('includes/interfaz.php');
include ('../configs/conexion_db.php');
?>

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
                <form action="../modulos/agregar_alumno_plantilla.php" method="POST">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">agregar alumnos</label>
                            <select name="alumno1" id="" class="form-control">
                            <?php
                                $sql = "SELECT * FROM alumnos";
                                $resultado = mysqli_query($enlace, $sql);
                                while ($dado = mysqli_fetch_array($resultado)):
                                    echo "<option id="."hola"." value=".$dado['id'].">".$dado['nombres']."</option>";
                                endwhile;
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="alumno2" id="" class="form-control">
                            <?php
                                $sql = "SELECT * FROM alumnos";
                                $resultado = mysqli_query($enlace, $sql);
                                while ($dado = mysqli_fetch_array($resultado)):
                                    echo "<option id="."hola2"." value=".$dado['id'].">".$dado['nombres']."</option>";
                                endwhile;
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" name="btn-submit">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include ('includes/cierre-interfaz.php');
?>
<script>
    $(document).ready(function() {
        alert($("#hola2").val());
});
</script>