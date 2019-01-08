<?php 
include("../configs/conexion_db.php"); 
include("../mpdf/mpdf.php"); 

$id = mysqli_escape_string($enlace, $_GET['id']);
$query="SELECT nombres,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and pr.titulo_profesional='PROFESOR(A)'";
$resultado= $enlace->query($query);

$html='
<style>
.resumen {
	width:95%;
	border: solid 2px black ;
	padding:5px;
}
.lista-estudiantes{
	width:95%;
}
@page {
	margin-top: 100px;
	margin-right:20px;
	margin-left:40px;
	margin-bottom:100px;
   }
div{
	width: 200px;
	padding: 2px 0;
	margin: 0;
}

#flotante{  /*padre*/
	overflow: hidden;
	width: 100%; 
}

#flotante .A, #flotante .B, #flotante .C, #flotante .D, #flotante .E{  /*hijos*/
    float: left;
    text-align:center;
    width:19%;
}

#flotante2{  /*padre*/
	overflow: hidden;
	width: 1000px; 
}

#flotante2 .A, #flotante2 .B, #flotante2 .C, #flotante2 .F{  /*hijos*/
    float: left;
    text-align:center;
    width:100px;
}

#flotante2 .D, #flotante2 .E{  /*hijos*/
    float: left;
    text-align:center;
    width:150px;
}


.borde{
    border: solid 1px black ;
}
</style>
<h4>I EQUIPO DE AULA</h4>
<h4>1.- Identificación del Equipo de Aula</h4>
<p>Docente(s) de la educación regular del curso :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:32px;background-color:rgb(232,232,232);">Nucleo Asignatura y/o Modulo</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';

function selectTabla($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and pr.titulo_profesional='PROFESOR(A)'";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['asignatura_modulo'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>';
	}

	return $tabla;
}

function selectTabla2($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and (pr.titulo_profesional='EDUCADORA DE PARVULOS' OR pr.titulo_profesional='EDUCADOR(A) DIFERENCIAL')";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['titulo_profesional'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla3($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT nombres,apellidos,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$s_id' and (pr.titulo_profesional='FONOAUDIOLOGO(A)' or pr.titulo_profesional='TERAPEUTA OCUPACIONAL' or pr.titulo_profesional='PSICOLOGO(A)' )";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['titulo_profesional'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla4($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_establecimiento=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">En el establecimiento</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla5($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_daem=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">En el DAEM (si el PIE es comunal)</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla6($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.apellidos,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_redes_apoyo=pr.id WHERE p.id='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:60px;">Con Redes de Apoyo</div>
				 <div class="A borde" style="height:60px;">'.$row['nombres']." ".$row['apellidos'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['telefono'].'</div>
				 <div class="A borde" style="height:60px;">'.$row['correo'].'</div>
				 <div class="A borde" style="height:60px;"></div>
				 ';
	}

	return $tabla;
}

function selectTabla7($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT a.nombres, a.apellidos,up.id_planilla  FROM alumnos a INNER JOIN usuarios_planilla up ON a.id=up.id_alumno WHERE up.id_planilla='$s_id' ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div  class="borde lista-estudiantes" >'.$row['nombres']." ".$row['apellidos'].'</div>';
	}

	return $tabla;
}

function selectTabla8($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT actividades,observaciones,nombres,apellidos,titulo_profesional,lugar_aula,horas_realizadas,fecha_ultimo_cambio FROM planilla_planilla INNER JOIN profesionals ON id_profesional=profesionals.id WHERE id_planilla='$s_id'";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="A borde" style="height:200px;padding-top:11px;">'.$row['fecha_ultimo_cambio'].'</div>
		<div class="B borde" style="height:200px;padding-top:11px;">'.$row['horas_realizadas'].'</div>
		<div class="C borde" style="height:200px;padding-top:11px;">'.utf8_decode($row['lugar_aula']).'</div>
		<div class="D borde" style="height:200px;padding-top:11px;">'.utf8_decode($row['actividades']).'</div>
		<div class="E borde" style="height:200px;padding-top:11px;">'.utf8_decode($row['observaciones']).'</div>
		<div class="F borde" style="height:200px;padding-top:11px;">'.utf8_decode($row['nombres'])." ".$row['apellidos']." ".$row['titulo_profesional'].'</div>';
	}

	return $tabla;
}

function selectTabla9($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT antecedentes1 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['antecedentes1'].'</div>';
	}

	return $tabla;
}

function selectTabla10($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT antecedentes2 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['antecedentes2'].'</div>';
	}

	return $tabla;
}

function selectTabla11($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT valoracion FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['valoracion'].'</div>';
	}

	return $tabla;
}

function selectTabla12($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT evaluacion FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['evaluacion'].'</div>';
	}

	return $tabla;
}

function selectTabla13($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT familiar1 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['familiar1'].'</div>';
	}

	return $tabla;
}

function selectTabla14($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT familiar2 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['familiar2'].'</div>';
	}

	return $tabla;
}

function selectTabla15($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT escolar1 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null ";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['escolar1'].'</div>';
	}

	return $tabla;
}

function selectTabla16($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT escolar2 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['escolar2'].'</div>';
	}

	return $tabla;
}

function selectTabla17($s_id){
	$connect = new mysqli ('localhost','root','','phpcartes');
	$query="SELECT observaciones_2 FROM planilla_planilla WHERE id_planilla='$s_id' AND actividades is null AND evidencia is null";
	$resultado= $connect->query($query);
	$tabla="";

	while($row=$resultado->fetch_assoc()){
		$tabla.='<div class="resumen">'.$row['observaciones_2'].'</div>';
	}

	return $tabla;
}




$html .=(selectTabla($id));
$html2='<br/>
<p>Profesores especializados :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Especialidad</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';
$html .=$html2;
$html .=(selectTabla2($id));


$html3 ='<br/>
<p>Preofesionales especializados asistentes de la educación :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Especialidad</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>'; 
$html .=$html3;
$html .=(selectTabla3($id));

$html4='<br/>
<p>Coordinación del programa :</p>
<div id="flotante">
<div class="A borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);"></div>
<div class="B borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Nombre</div>
<div class="C borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Teléfono </div>
<div class="D borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Correo electrónico  </div>
<div class="E borde" style="height:31px;padding-top:11px;background-color:rgb(232,232,232);">Firma </div>';
$html .=$html4;
$html.=(selectTabla4($id));
$html.=(selectTabla5($id));
$html.=(selectTabla6($id));

$html5='<h4>2.- Registro de aopoyo para cada estudiante o grupo de estudiantes</h4>
<p>Registrar, por estudiante o grupos de estudiantes, los apoyos específicos o actividades especiales que se realizan en
forma individual o en pequeños grupos dentro o fuera del aula regular y el o las/os nombres de los profesionales que
los entregan.</p>
<div  class="borde lista-estudiantes" style="font-weight: bold;">Nombre/s estudiante/s</div>';
$html.=$html5;
$html.=(selectTabla7($id));

$html6 ='<br/><div  class=" lista-estudiantes" style="font-weight: bold;">Objetivos de Aprendizaje</div>
<div id="flotante2">
<div class="A borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Fecha</div>
<div class="B borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Horas Pedagógicas realizadas </div>
<div class="C borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Lugar (dentro o fuera del aula) </div>
<div class="D borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Acciones, actividades y apoyos entregados a estudiantes.  </div>
<div class="E borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Observaciones y/o acuerdos </div>
<div class="F borde" style="height:60px;padding-top:11px;background-color:rgb(232,232,232);">Nombre del profesional </div>


';
$html .=$html6;
$html.=(selectTabla8($id));

$html7='<h3>Resumen Proceso Evaluación Diagnóstica Integral e Interdisciplinaria</h3>
<h4>Antecedentes relevantes de la Anamnesis</h4>
<p style="color:grey">Señale aquella información más relevante en el desarrollo del estudiante,la familia y el entorno, que impacte en el aprendizaje, según datos recogidos en la entrevista de la Anamnesis:</p>
';
$html.=$html7;
$html.=(selectTabla9($id));

$html8='<p style="color:grey">Si el o la estudiante no es usuario habitual del español, consigne el nivel de español que maneja tanto en comprensión como en la expresión oral y/o escrita:</p>
';
$html.=$html8;
$html.=(selectTabla10($id));

$html9='<h4>Valoración de Salud</h4>
<p style="color:grey">Señale si existe alguna condicion de salud o tratamiento actual del estudiante que sea relevante consignar:</p>
';
$html.=$html9;
$html.=(selectTabla11($id));

$html10='<h4>Evaluación Psicoeducativa</h4>
<p style="color:grey">A partir de la evaluación psicoeducativa realizada al estudiante, señale aquellos aspectos relevantes para su aprendizaje:</p>
';
$html.=$html10;
$html.=(selectTabla12($id));

$html11='<h4>Contexto Familiar</h4>
<p style="color:grey">Describa aspectos del  Contexto Familiar que favorecen el aprendizaje :</p>

';
$html.=$html11;
$html.=(selectTabla13($id));

$html12='<p style="color:grey">Describa aspectos del  Contexto Familiar que dificultan el aprendizaje :</p>
';
$html.=$html12;
$html.=(selectTabla14($id));

$html13='<h4>Contexto Escolar</h4>
<p style="color:grey">Describa aspectos del  Contexto Escolar que favorecen el aprendizaje :</p>

';
$html.=$html13;
$html.=(selectTabla15($id));

$html14='
<p style="color:grey">Describa aspectos del  Contexto Escolar que dificultan el aprendizaje :</p>

';
$html.=$html14;
$html.=(selectTabla16($id));

$html15='<h4>Observaciones</h4>


';
$html.=$html15;
$html.=(selectTabla17($id));


$mpdf = new mPDF('c','A4');
$mpdf->SetImportUse();
$mpdf->SetDocTemplate('../assets/img/planilla.pdf',true);
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->allow_charset_conversion=true;
$mpdf->charset_in='UTF-8';
$mpdf->writeHTML($html);

$mpdf->Output('planilla.pdf','I');

