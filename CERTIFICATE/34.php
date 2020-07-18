<html>
<head>
	<title>PDF</title>
</head>

<?php
	ob_start();
    require('fpdf.php');
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
	
	$pdf->AddFont('Sofia-Regular','B','Sofia-Regular.php');
	$pdf->SetFont('Sofia-Regular','B',24);
    $pdf->Cell(100,40,'Hello World!',1,2,"C");
	//$pdf->SetMargins(50,10,20);
	$pdf->Ln(5);
	
	$pdf->SetFontSize(40);
	$pdf->Write(3,'Visit');
	$pdf->Ln(15);
	$pdf->SetTextColor(0,0,255);
	$pdf->SetDrawColor(5,150,0);
	$pdf->SetFillColor(100,150,0);
	$pdf->Cell(100,50,'Second line',1,0,"C",true);
    $pdf->Output();
    ob_end_flush();
?>
</html>