<?php
    // mysql database connection details
    $host = "fenrir.info.uaic.ro";
    $username = "ohoTW";
    $password = "TGJ8JQY5PB";
    $dbname = "ohoTW";

    // open connection to mysql database
    $connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));
	
	 $sql = "select title from articles where likes-dislikes>0";
    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));
	
	$sql1="select title from hobbies where id_hobby=101";
	$result1 = mysqli_query($connection, $sql1) or die("Selection Error " . mysqli_error($connection));
	
	$sql2="select title from categories where id_category=1";
	$result2 = mysqli_query($connection, $sql2) or die("Selection Error " . mysqli_error($connection));
	
	$sql3="select count(*) from users";
	$result3 = mysqli_query($connection, $sql3) or die("Selection Error " . mysqli_error($connection));
	
	$sql4="select count(*) from hobbies";
	$result4 = mysqli_query($connection, $sql4) or die("Selection Error " . mysqli_error($connection));
	
	$sql5="select count(*) from articles";
	$result5 = mysqli_query($connection, $sql5) or die("Selection Error " . mysqli_error($connection));
	
	require_once(__DIR__.'/../../tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin');
$pdf->SetTitle('Raport');
$pdf->SetSubject('Statistics');
$pdf->SetKeywords('TCPDF, admin, raport, stats');
$pdf->setPrintHeader(true);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print


// Print text using writeHTMLCell()
 //$pdf->writeHTMLCell(0, 0, '', '', $result, 0, 1, 0, true, '', true);
 //$pdf->writeHTMLCell(0, 0, '', '', $result, 0, 1, 0, true, '', true);
	$inf = 'Statistics';
	$pdf->writeHTML($inf,true,false,false,false,'C');
  while($row = mysqli_fetch_assoc($result))
  {
	  $pdf->writeHTMLCell(0, 0, '', '',"Most popular article: " .$row['title'], 0, 1, 0, true, '', true);
  }
  
  while($row = mysqli_fetch_assoc($result1))
  {
	  $pdf->writeHTMLCell(0, 0, '', '', "Most popular hobby: " .$row['title'], 0, 1, 0, true, '', true);
  }
  
   while($row = mysqli_fetch_assoc($result2))
  {
	  $pdf->writeHTMLCell(0, 0, '', '', "Most popular category: " .$row['title'], 0, 1, 0, true, '', true);
  }
  
   while($row = mysqli_fetch_assoc($result3))
  {
	  $pdf->writeHTMLCell(0, 0, '', '', "Total number of users: " .$row['count(*)'], 0, 1, 0, true, '', true);
	  var_dump($row);
  }
  
   while($row = mysqli_fetch_assoc($result4))
  {
	  $pdf->writeHTMLCell(0, 0, '', '', "Total number of hobbies: " .$row['count(*)'], 0, 1, 0, true, '', true);
  }
  
   while($row = mysqli_fetch_assoc($result5))
  {
	  $pdf->writeHTMLCell(0, 0, '', '', "Total numbers of articles: " .$row['count(*)'], 0, 1, 0, true, '', true);
  }
   

// ---------------------------------------------------------
 
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_clean();
 $pdf->Output('example_001.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
?>