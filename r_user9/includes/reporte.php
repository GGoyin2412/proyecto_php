<?php
require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Constructor
    function __construct($orientation = 'L', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
    }

    // Cabecera de página
    function Header()
    {
        // Insertar logo en la esquina superior izquierda
        $this->Image('../img/logo.jpeg', 8, 8, 25); // Cambia 'ruta/del/logo.png' por la ruta real de tu logo

        // Arial bold 15
        $this->SetFont('Arial','B',20);
    
        // Obtener ancho de la página
        $anchoPagina = $this->GetPageWidth();

        // Calcular posición para centrar el título
        $tituloAncho = 100; // Ancho estimado del título
        $x = ($anchoPagina - $tituloAncho) / 2;

        // Mover al punto medio de la página
        $this->SetX($x);

        // Título
        $this->Cell(0, 15, 'Tabla de incidencias', 0, 1, 'C');
        // Salto de línea
    
        $this->Ln(30);
        $this->SetFont('Arial','B',10);
        $this->SetX(8);
        $this->Cell(25,10,'Incidencia',1,0,'C',0);
        $this->Cell(30,10,'Nivel',1,0,'C',0,);
        $this->Cell(27,10,'Grado',1,0,'C',0);
        $this->Cell(25,10,'Alumno',1,0,'C',0);
        $this->Cell(50,10,'Intervencion',1,0,'C',0);
        $this->Cell(50,10,'Incidencia',1,0,'C',0);
        $this->Cell(20,10,'Fecha',1,0,'C',0);
        $this->Cell(20,10,'Hora',1,0,'C',0);
        $this->Cell(40,10,'Comentarios',1,1,'C',0);
        
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
    
        $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
        //$this->SetFillColor(223, 229,235);
        //$this->SetDrawColor(181, 14,246);
        //$this->Ln(0.5);
    }
}

$conexion=mysqli_connect("localhost","root","","incidencia");

// Verificar conexión
if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
    exit();
}

$SQL="SELECT r.id_incidencia, n.Nom_Nivel, g.Nom_Grado, gr.Nom_Grupo, a.Nom_Alu, ni.Nom_incidencia, r.incidencia, r.fecha, r.hora, r.comentarios
    FROM registro_incidencia r
    LEFT JOIN nivel n ON r.id_nivel = n.id_Nivel
    LEFT JOIN grado g ON r.id_grado = g.id_grado
    LEFT JOIN grupo gr ON r.id_grupo = gr.id_Grupo
    LEFT JOIN alumno a ON r.id_alumno = a.id_Alu
    LEFT JOIN nivel_incidencia ni ON r.id_nivelin = ni.id_nivelin";

$dato = mysqli_query($conexion, $SQL);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row = mysqli_fetch_assoc($dato)) {
    $pdf->SetX(8);
    $pdf->Cell(25,10,$row['id_incidencia'],1,0,'C',0);
    $pdf->Cell(30,10,$row['Nom_Nivel'],1,0,'C',0);
    $pdf->Cell(27,10,$row['Nom_Grado'],1,0,'C',0);
    $pdf->Cell(25,10,$row['Nom_Alu'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Nom_incidencia'],1,0,'C',0);
    $pdf->Cell(50,10,$row['incidencia'],1,0,'C',0);
    $pdf->cell(20,10,$row['fecha'],1,0,'C',0);
    $pdf->Cell(20,10,$row['hora'],1,0,'C',0);
    $pdf->Cell(40,10,$row['comentarios'],1,1,'C',0);
}

$pdf->Output();
?>
