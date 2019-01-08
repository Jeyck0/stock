<?php

require '../fpdf/fpdf.php';
include ('../configs/conexion_db.php');


$id = mysqli_escape_string($enlace, $_GET['id']);

$query="SELECT nombres,asignatura_modulo, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and pr.titulo_profesional='PROFESOR(A)'";
$resultado= $enlace->query($query);


class pdf extends FPDF{

    

    public function header(){

        $this->Image('..\assets\img\logomined.jpg',30,8,50,30,'jpg');
        $this->SetFont('Helvetica','',10);
        $this->SetX(48);
        $this->SetTextColor(120,120,120);
        $this->Write(14,utf8_decode('Educación Especial'));
        $this->Ln();

        $this->SetLineWidth(0.2);
        $this->Line(8,8,208,8);
        $this->Line(8,8,8,272);
        $this->Line(8,272,208,272);
        $this->Line(208,8,208,272);
    }

    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************
//******************************************************************

    
    
} 



$pdf = new pdf();
$pdf->AddPage('portrait','letter');


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Write(14,utf8_decode('I EQUIPO DE AULA 1'));
$pdf->Ln();
$pdf->Write(14,utf8_decode('1.- Identificación del Equipo de Aula'));
$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Docente(s) de educación regular del curso: '));
$pdf->Ln();
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Asignatura y/o módulo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(45,6,$row['asignatura_modulo'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}

$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Profesores especiaizados: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Especialidad'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT nombres,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla='$id' and (pr.titulo_profesional='EDUCADORA DE PARBULO' OR pr.titulo_profesional='EDUCADOR(A) DIFERENCIAL')";

$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->CellFitSpace(45,6,$row['titulo_profesional'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}


$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Profesionales especializados de la educación: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(35,6,'Nombre',1,0,'C',1);
$pdf->CellFitSpace(45,6,utf8_decode('Especialidad'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT nombres,asignatura_modulo,titulo_profesional, telefono, correo, id_planilla, id_profesional FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional=pr.id WHERE up.id_planilla=$id and (pr.titulo_profesional='FONOAUDIOLOGO(A)' or pr.titulo_profesional='TERAPEUTA OCUPACIONAL' or pr.titulo_profesional='PSICOLOGO(A)' )";

$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->CellFitSpace(35,6,$row['nombres'],1,0,'C',1);
    $pdf->CellFitSpace(45,6,$row['titulo_profesional'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,'',1,1,'C',1);
}

$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(14,utf8_decode('Coordinación del programa: '));
$pdf->Ln();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B');
$pdf->Cell(40,6,'',1,0,'C',1);
$pdf->CellFitSpace(40,6,utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('Correo'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Firma'),1,1,'C',1);

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_establecimiento=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'En establecimiento',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_daem=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'En el Daem ',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}

$query="SELECT p.lugar_establecimiento,p.lugar_daem,p.lugar_redes_apoyo,pr.nombres,pr.telefono,pr.correo FROM planilla p INNER JOIN profesionals pr ON p.lugar_redes_apoyo=pr.id WHERE p.id=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(40,6,'Con Redes de Apoyo',1,0,'C',1);
    $pdf->Cell(40,6,$row['nombres'],1,0,'C',1);
    $pdf->Cell(30,6,$row['telefono'],1,0,'C',1);
    $pdf->CellFitSpace(55,6,$row['correo'],1,0,'C',1);
    $pdf->Cell(30,6,utf8_decode(''),1,1,'C',1);
   
}


$pdf->AddPage('portrait','letter');
$pdf->SetFont('Arial','B');
$pdf->Write(14,utf8_decode(''));
$pdf->Ln();
$pdf->Write(14,utf8_decode('2.- Registro de aopoyo para cada estudiante o grupo de estudiantes'));
$pdf->Ln();
$pdf->SetFont('Arial');
$pdf->Write(6,utf8_decode('Registrar, por estudiante o grupos de estudiantes, los apoyos específicos o actividades especiales que se realizan en
forma individual o en pequeños grupos dentro o fuera del aula regular y el o las/os nombres de los profesionales que
los entregan. '));
$pdf->Ln();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial');
$pdf->Cell(195,6,'Nombres de los estudiantes',1,1,'L',1);

$query="SELECT a.nombres, a.apellidos,up.id_planilla  FROM alumnos a INNER JOIN usuarios_planilla up ON a.id=up.id_alumno WHERE up.id_planilla=$id ";
$resultado= $enlace->query($query);

while($row=$resultado->fetch_assoc()){
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial');
    $pdf->Cell(195,6,$row['nombres']." ".$row['apellidos'],1,1,'L',1);
    
    
   
}
$pdf->Ln();
$pdf->SetFont('Arial','B');
$pdf->SetXY(10,112);
$pdf->Cell(195,6,'Objetivos de Aprendizaje',1,1,'L',1);
$pdf->SetFillColor(232,232,232);
$pdf->Cell(20,18,'Fecha',1,0,'C',1);
$pdf->MultiCell( 25, 6, 'Horas pedagogicas Realizadas', 1,'C',1);
$pdf->SetXY(55,118);
$pdf->MultiCell( 25, 6, 'Lugar(dentro o fuera del aula)', 1,'C',1);
$pdf->SetXY(80,118);
$pdf->MultiCell( 45, 6, 'Acciones, actividades y apoyos entregados a estudiantes)', 1,'C',1);
$pdf->SetXY(125,118);
$pdf->MultiCell( 41, 9, 'Observaciones / Acuerdos)', 1,'C',1);
$pdf->SetXY(165,118);
$pdf->MultiCell( 40, 9, 'Nombre del profesional', 1,'C',1);

$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(20,50,'12/10/2018',1,0,'C',1);
$pdf->SetXY(30,136);
$pdf->MultiCell(25,50,'99',1,'C',1);
$pdf->SetXY(55,136);
$pdf->MultiCell(25,4,'Aula de recursos',1,'C',1);
$pdf->SetXY(80,136);
$pdf->MultiCell( 45, 5, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 1,'C',1);


$query="SELECT p.fecha_creacion  FROM alumnos a INNER JOIN usuarios_planilla up ON a.id=up.id_alumno WHERE up.id_planilla=$id ";
$resultado= $enlace->query($query);






$pdf->Output();