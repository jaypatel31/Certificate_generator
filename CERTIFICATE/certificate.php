<html>
<head>
<title>Certificate Genrater</title>
<style>
	label{
		display:inline-block;
		width:15%;
		font-size:28px;
	}
	input,option,select{
		font-size:24px;
		padding:8px;
	}
</style>
</head>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		function casse($a){
			$a = trim($a);
			$a = strtolower($a);
			$b = ucwords($a);
			return $b;
		}
		$Fname = $_POST['fname'];
		$Fname = casse($Fname);
		$Faname = $_POST['faname'];
		$Faname = casse($Faname);
		$Faname = $Faname[0];
		$Lname = $_POST['lname'];
		$Lname = casse($Lname);
		$Head = $_POST['head'];
		
		
	}
	
?>
<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
		<label for="Fname">First Name : </label>
		<input type="text" name="fname" maxlength="15" required id="Fname" placeholder="John"><br/><br/>
		<label for="Faname">Father's Name : </label>
		<input type="text" name="faname" maxlength="15" required id="Faname" placeholder="Peter"><br/><br/>
		<label for="Lname">Last Name : </label>
		<input type="text" name="lname" maxlength="15" required id="Lname" placeholder="Wick"><br/><br/>
		<label for="head">Certificate From: </label>
		<select name="head" required id="head">
		<option  value="H.O.D">H.O.D</option>
		<option  value="Principale">Principale</option>
		<option  value="President">President</option>
		</select><br/><br/>
		<input type="submit" name="SUBMIT" >
	</form>
</body>
 <?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
	$date= date('d.m.Y');
	ob_start();
    require('fpdf.php');
	$pdf = new FPDF('L');
	$pdf->Addpage();
	$pdf->image('cc2.jpg',0,0,300);
	$pdf->AddFont('ChopinScript','I','ChopinScript.php');
	$pdf->SetFont('ChopinScript','I',40);
	$pdf->Ln(75);
	$pdf->Cell(80);
	$pdf->SetFillColor(245,245,245);
	$pdf->SetDrawColor(101,107,129);
	$pdf->Cell(120,31,$Fname." ".$Faname.". ".$Lname,'B',1,"C",true);
	$pdf->Ln(27);
	$pdf->Cell(85);
	$pdf->AddFont('English_','I','English_.php');
	$pdf->SetFont('English_','I',30);
	$pdf->SetFillColor(243,243,243);
	$pdf->Cell(50,17,$date,'B',0,"C",true);
	$pdf->SetFillColor(240,240,240);
	$pdf->SetFont('English_','I',34);
	$pdf->Cell(15);
	$pdf->Cell(50,17,$Head,'B',0,"C",true);
	$pdf->Output();
    ob_end_flush();
	}
?>
</html>