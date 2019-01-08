<?php
include('includes/interfaz.php');
include('../configs/conexion_db.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Profesional</h1>
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
                        <form id="limpiar" name="formulario1" role="form" method="POST" action="../modulos/agregar_profesional.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input name="rut" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Región</label>
                                    <select class="seleccion form-control" name="cosa" onchange="cambia()">
                                        <option value="0" selected="selected">Regiones</option>
                                        <option value="1">Tarapaca</option>
                                        <option value="2">Antofagasta</option>
                                        <option value="3">Atacama</option>
                                        <option value="4">Coquimbo</option>
                                        <option value="5">Valparaiso</option>
                                        <option value="6">O'Higgins</option>
                                        <option value="7">Maule</option>
                                        <option value="8">Bio - Bio</option>
                                        <option value="9">Araucania</option>
                                        <option value="10">Los Lagos</option>
                                        <option value="11">Aisen</option>
                                        <option value="12">Magallanes Y Antartica</option>
                                        <option value="13">Metropolitana</option>
                                        <option value="14">Los Rios</option>
                                        <option value="15">Arica y Parinacota</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Comuna</label>
                                    <select class="seleccion form-control" name="opt">
                                        <option value="0">Comuna</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input name="direccion" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Asignatura y/o Ámbito</label>
                                    <select class="form-control hidden" name="asignatura" id="asignatura1">
                                        <option value="Artes Visuales">Artes Visuales</option>
                                        <option value="Ciencias Naturales">Ciencias Naturales</option>
                                        <option value="Educación Física y Salud">Educación Física y Salud</option>
                                        <option value="Historia, Geografía y Ciencias Sociales">Historia, Geografía y
                                            Ciencias Sociales</option>
                                        <option value="Matemática">Matemática</option>
                                        <option value="Música">Música</option>
                                        <option value="Orientación">Orientación</option>
                                        <option value="Tecnología">Tecnología</option>
                                    </select>
                                    <select class="form-control hidden" name="asignatura" id="asignatura2">
                                        <option value="Formación personal y social">Formación personal y social</option>
                                        <option value="Comunicación">Comunicación</option>
                                        <option value="Relación con el medio natural y cultural">Relación con el medio natural y cultural</option>
                                    </select>
                                    <select class="form-control " name="asignatura" id="asignatura3" disabled>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" id="email" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="fecha_nac" type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <select class="form-control" name="titulo" id="titulo" required>
                                        <option value="">Seleccione</option>
                                        <option value="1">Educadora de parvulos</option>
                                        <option value="2">Psicologo(A)</option>
                                        <option value="3">Terapeuta ocupacional</option>
                                        <option value="4">Fonoaudiologo(A)</option>
                                        <option value="5">Profesor(A)</option>
                                        <option value="6">Educador(A) Diferencial</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="form-control" name="sexo" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jefe de curso</label>
                                    <select class="form-control" name="jefatura" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Coordinador</label>
                                    <select class="form-control" name="coordinador" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-lg btn-block " id="send" name="submit" type="submit">Registrar
                                        Profesional
                                    </button></div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <input type="button" class="btn btn-lg btn-block btn-danger" value="Limpiar campos"
                                        onclick="Limpiar();" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/cierre-interfaz.php'); ?>
<script type="text/javascript">
    function Limpiar() {
        var t = document.getElementById("limpiar").getElementsByTagName("input");
        for (var i = 0; i < t.length; i++) {
            t[i].value = "";
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('#send').click(function () {
            if ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                alert('El correo electrónico introducido no es correcto.');
                return false;
            }


        });
    });

    $('#titulo').change(function () {
        if ($('#titulo').val() == '5') {
            $('#asignatura1').removeClass('hidden');
            $('#asignatura1').attr('name', 'asignatura');

            $('#asignatura3').addClass('hidden');
            $('#asignatura2').addClass('hidden');
            $('#asignatura2').attr('name', 'noname');
        } else {
            $('#asignatura2').removeClass('hidden');
            $('#asignatura2').attr('name', 'asignatura');

            $('#asignatura3').addClass('hidden');
            $('#asignatura1').addClass('hidden');
            $('#asignatura1').attr('name', 'noname');
        }

        if ($('#titulo').val() == '') {
            $('#asignatura1').addClass('hidden');
            $('#asignatura3').removeClass('hidden');
            $('#asignatura2').addClass('hidden');
        }
    });
</script>

<script type="text/javascript">
    //1) Definir Las Variables Correspondintes
    ciudades_1 = new Array("Arica");
    ciudades_2 = new Array("Alto Hospicio", "Iquique", "Pozo Almonte");
    ciudades_3 = new Array("Caldera", "Chanaral", "Copiapo", "Diego de Almagro", "El Salvador", "Huasco",
        "Tierra Amarilla", "Vallenar");
    ciudades_4 = new Array("Andacollo", "Combarbala", "Coquimbo", "El Palqui", "Illapel", "La Serena", "Los Vilos",
        "Montepatria", "Ovalle", "Salamanca", "Vicuna");
    ciudades_5 = new Array("Algarrobo", "Cabildo", "Calle Larga", "Cartagena", "Casablanca", "Catemu", "Concon",
        "El Melon", "El Quisco", "El Tabo", "Hijuelas", "La Calera", "La Cruz", "La Ligua", "Las Ventanas",
        "Limache", "Llaillay", "Los Andes", "Nogales", "Olmue", "Placilla de Penuelas", "Putaendo", "Quillota",
        "Quilpue", "Quintero", "Rinconada", "San Antonio", "San Esteban", "San Felipe", "Santa Maria",
        "Santo Domingo", "Valparaiso", "Villa Alemana", "Villa Los Almendros", "Vina del Mar");
    ciudades_6 = new Array("Chimbarongo", "Codegua", "Donihue", "Graneros", "Gultro", "Las Cabras", "Lo Miranda",
        "Machali", "Nancagua", "Palmilla", "Peumo", "Pichilemu", "Punta Diamante", "Quinta de Tilcoco", "Rancagua",
        "Rengo", "Requinoa", "San Fernando", "San Francisco de Mostazal", "San Vicente de Tagua Tagua",
        "Santa Cruz");
    ciudades_7 = new Array("Cauquenes", "Constitucion", "Curico", "Hualane", "Linares", "Longavi", "Molina", "Parral",
        "San Clemente", "San Javier", "Talca", "Teno", "Villa Alegre");
    ciudades_8 = new Array("Arauco", "Bulnes", "Cabrero", "Canete", "Chiguayante", "Chillan", "Chillan Viejo",
        "Coelemu", "Coihueco", "Concepcion", "Conurbacion La Laja-San Rosendo", "Coronel", "Curanilahue", "Hualpen",
        "Hualqui", "Huepil", "Lebu", "Los alamos", "Los angeles", "Lota", "Monte aguila", "Mulchen", "Nacimiento",
        "Penco", "Quillon", "Quirihue", "San Carlos", "San Pedro de la Paz", "Santa Barbara", "Santa Juana",
        "Talcahuano", "Tome", "Yumbel", "Yungay");
    ciudades_9 = new Array("Angol", "Carahue", "Collipulli", "Cunco", "Curacautin", "Freire", "Gorbea", "Labranza",
        "Lautaro", "Loncoche", "Nueva Imperial", "Padre Las Casas", "Pitrufquen", "Pucon", "Puren", "Renaico",
        "Temuco", "Traiguen", "Victoria", "Villarrica");
    ciudades_14 = new Array("Futrono", "La Union", "Lanco", "Los Lagos", "Paillaco", "Panguipulli", "Rio Bueno",
        "San Jose de la Mariquina", "Valdivia");
    ciudades_11 = new Array("Coihaique", "Puerto Aisen");
    ciudades_12 = new Array("Punta Arenas", "Puerto Natales");
    ciudades_13 = new Array("Alto Jahuel", "Bajos de San Agustin", "Batuco", "Buin", "Cerrillos", "Cerro Navia",
        "Colina", "Conchali", "Curacavi", "El Bosque", "El Monte", "Estacion Central", "Hospital", "Huechuraba",
        "Independencia", "Isla de Maipo", "La Cisterna", "La Florida", "La Granja", "La Islita", "La Pintana",
        "La Reina", "Lampa", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipu", "Melipilla",
        "Nunoa", "Padre Hurtado", "Paine", "Pedro Aguirre Cerda", "Penaflor", "Penalolen", "Pirque", "Providencia",
        "Pudahuel", "Puente Alto", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Bernardo", "San Joaquin",
        "San Jose de Maipo", "San Miguel", "San Ramon", "Santiago", "Talagante", "Tiltil", "Vitacura");
    ciudades_10 = new Array("Ancud", "Calbuco", "Castro", "Fresia", "Frutillar", "Llanquihue", "Los Muermos", "Osorno",
        "Puerto Montt", "Puerto Varas", "Purranque", "Quellon", "Rio Negro");
    ciudades_15 = new Array("Antofagasta", "Calama", "Maria Elena", "Mejillones", "Taltal", "Tocopilla");
    // 2) crear una funcion que permita ejecutar el cambio dinamico

    function cambia() {
        var cosa;
        //Se toma el vamor de la "cosa seleccionada"
        cosa = document.formulario1.cosa[document.formulario1.cosa.selectedIndex].value;
        //se chequea si la "cosa" esta definida
        if (cosa != 0) {
            //selecionamos las cosas Correctas
            mis_opts = eval("ciudades_" + cosa);
            //se calcula el numero de cosas
            num_opts = mis_opts.length;
            //marco el numero de opt en el select
            document.formulario1.opt.length = num_opts;
            //para cada opt del array, la pongo en el select
            for (i = 0; i < num_opts; i++) {
                document.formulario1.opt.options[i].value = mis_opts[i];
                document.formulario1.opt.options[i].text = mis_opts[i];
            }
        } else {
            //si no habia ninguna opt seleccionada, elimino las cosas del select
            document.formulario1.opt.length = 1;
            //ponemos un guion en la unica opt que he dejado
            document.formulario1.opt.options[0].value = "-";
            document.formulario1.opt.options[0].text = "-";
        }
        //hacer un reset de las opts
        document.formulario1.opt.options[0].selected = true;

    }
</script>