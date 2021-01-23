<?php

include("../coneccionBaseDatos/coneccionEnvio.php");
require ("../pdf/fpdf.php");
if (isset($_GET['id_UnicoAlum'])) {
    $id_UnicoAlum = $_GET['id_UnicoAlum'];
    $query = "SELECT * FROM  becariocuenta WHERE id_UnicoAlum='$id_UnicoAlum'";
    $resulta = mysqli_query($coneccion, $query);
    $tipo = "ACTIVO";

    $query1 = "SELECT * FROM  alumnos WHERE id_UnicoAlum='$id_UnicoAlum'";
    $resulta1 = mysqli_query($coneccion, $query1);
    $row1 = mysqli_fetch_array($resulta1);
    $id_UnicoPro = $row1['id_UnicoPro'];

    $query2 = "SELECT * FROM  programas WHERE id_UnicoPro='$id_UnicoPro'";
    $resulta2 = mysqli_query($coneccion, $query2);
    $row2 = mysqli_fetch_array($resulta2);
    if (mysqli_num_rows($resulta) == 1) {
        $row = mysqli_fetch_array($resulta);

        $pdf = new FPDF('P','mm','Letter');
        $pdf->SetMargins(30,20);
        $pdf->AddPage();


        $pdf->SetFont('Arial','B',11);
        $pdf->Write(5,'Nombre de la dependecia:');
        $pdf->SetFont('Arial','',11);
        $encabezar = $pdf->GetX();
        $pdf->Cell(100,5,'Universidad Autonoma de Yucatan',0,1,'L');
        $pdf->SetX($encabezar);
        $pdf->Cell(100,5,'Unidad MultidiciplinariaTizimin',0,1,'L');
        $pdf->SetX($encabezar);
        $pdf->Cell(100,5,'Centro de Computo',0,1,'L');
        $pdf->SetFont('Arial','B',11);
        $pdf->Write(10,'Direccion:');
        $pdf->SetFont('Arial','',11);
        $pdf->SetX($encabezar);
        $pdf->MultiCell(70,10,'Calle 48 A s/n x 31',0,'L');
        $pdf->Ln(20);
        $pdf->SetFont('Times','B',18);
        $pdf->Cell(160,5,'Carta De Inicio',0,1,'C');
        $pdf->Cell(160,5,$row2['tipoProgra'],0,1,'C');
        $pdf->Ln(30);
        $pdf->SetFont('Times','B',12);
        date_default_timezone_set("America/Mexico_City");
        DateTimeInterface::RFC1123;
        $fechaRegistroAlumno = date(DATE_RFC1123);
        $pdf->Cell(160,5,$fechaRegistroAlumno,0,1,'R');
        $pdf->Ln(30);
        $pdf->Write(5,$row1['primerNomBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['segundoNomBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['apellidoPaterBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['apellidoMaterBeca']);
        $pdf->Ln(10);
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,'        Por este medio hago constar que el alumno ');
        $pdf->SetFont('Times','B',12);
        $pdf->Write(5, $row1['apellidoPaterBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['apellidoMaterBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['primerNomBeca']);
        $pdf->Write(5,' ');
        $pdf->Write(5,$row1['segundoNomBeca']);
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,' realizara su(s) ');
        $pdf->SetFont('Times','B',12);
        $pdf->Write(5,$row2['tipoProgra']);
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,' en el');
        $pdf->SetFont('Times','B',12);
        $pdf->Write(5,' Centro de Computo de la Unidad Multidisciplinaria Tizimin');
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,' a partir del Presente y hasta cubrir un total de ');
        $pdf->SetFont('Times','B',12);
        $pdf->Write(5,$row['horas_restantes']);
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,' horas.');
        $pdf->Ln(5);
        $pdf->Write(5,' Las actividades que desempenara como');
        $pdf->SetFont('Times','B',12);
        $pdf->Write(5,' Apoyo al Centro de Computo');
        $pdf->SetFont('Times','',12);
        $pdf->Write(5,' seran las siguentes: atencion a usuarios (soporte tecnologicos a alumnos y maestros, asignacion de turnos, prestamos de equipos), mantenimiento de equipos, instalacion de software, entre otras.');
        $pdf->Ln(10);
        $pdf->Write(5,'     Se extiende la presente para los fines que al interesado convengan.');
        $pdf->Ln(20);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(160,5,'Atentamente',0,1,'C');
        $pdf->Line(70,245,150,245);
        $pdf->SetY(250);
        $pdf->Cell(160,5,'Unidad Multidisciplinaria Tizimin',0,1,'C');
        $pdf->Output();

        $fechaRegistrobecario = date("D");
        $fechaRegistrobecario .= ", ";
        $fechaRegistrobecario .= date("d");
        $fechaRegistrobecario .= " ";
        $fechaRegistrobecario .= date("m");
        $fechaRegistrobecario .= " ";
        $fechaRegistrobecario .= date("Y");
        $fechaRegistrobecario .= " ";
        $fechaRegistrobecario .= date("H");
        $fechaRegistrobecario .= ":";
        $fechaRegistrobecario .= date("i");
        $CuentaBecario ="UPDATE becariocuenta SET fechaInicio = '$fechaRegistrobecario', tipo = '$tipo' WHERE id_UnicoAlum = '$id_UnicoAlum'"; 
        $CuentaQuery = mysqli_query($coneccion,$CuentaBecario);
    }
}
?>