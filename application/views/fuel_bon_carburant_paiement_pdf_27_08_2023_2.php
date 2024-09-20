<?php 

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
/**/	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo noir.jpg';
        //$image_file = base_url().'assets/uploads/'.'logo_example.jpg;
		$this->Image($image_file, 20, 6, 170, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
		// Set font
		//$this->SetFont('helvetica', 'B', 20);
		// Title
		//$this->Cell(0, 15, '<< TCPDF ESYSxample 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$image_file = K_PATH_IMAGES.'pied.jpg';
        //$image_file = base_url().'assets/uploads/'.'logo_example.jpg;
		//$this->Image($image_file, 10, 10, 150, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		//$this->Cell(0, 10, 'Page '.$image_file.'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
 
//        $this->Image($image_file, 0, 265, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
        
        
        $this->Image($image_file, 0, 262, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
 
    }
}

// create new PDF document
/*$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '','');
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetFooterData(PDF_FOOTER_LOGO, PDF_FOOTER_LOGO_WIDTH, '','');

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
*/

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
*/
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '');

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

// set font
//$pdf->SetFont('helvetica', 'B', 14);

// add a page
$pdf->AddPage();

// TITRE N°
$pdf->Ln(16);
$pdf->SetFont('freesans', 'B', 11);


$tbl = '
<table align="right" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>Date : '.$bon_carburantdetails['ccrp_date'].'</h2></td>
    </tr>
</table>';

    
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln(14);
$pdf->SetFont('freesans', 'B', 16);


$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>PAIEMENT BONS DE CARBURANT</h2></td>
    </tr>
</table>';

    
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln(16);


$taille=0;
$taille=51;


$pdf->Ln(2);
//$pdf->SetFont('pdfacourier', '', 11);

    $pdf->SetFont('dejavuserifcondensed', '', 12);

$result = join_multi_select($bon_carburantdetails['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_id');

foreach(explode(',',$result) as $str)
{
  $str = str_replace('"','',$str);
	
		$query = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id',$str)->order_by('bc_id','desc')->get()->result_array();

	foreach($query as $row_bc)
	{
			/*echo $row_bc['bc_id'];
		 echo $bc_quantite = $row_bc['bc_quantite'];			
		 echo $bc_numero = $row_bc['bc_numero'];			
		 echo $bc_vehicule_id = $row_bc['bc_vehicule_id'];			
		 echo "date= ".$bc_date = $row_bc['bc_date'];*/
		}
	
}



$html = '
<table cellpadding="0" cellspacing="0" border="1" style="text-align:center;" width="90%">

<tr>
	<td style="text-align:left;" height="'.$taille.'" width="110"><b>N° BON :</b></td>
	<td height="'.$taille.'" width="90"><b>QUANTITE</b></td>
		<td style="text-align:left;" height="'.$taille.'" width="150"><b>NUMERO </b></td>
	<td height="'.$taille.'" width="150"><b>DATE</b></td>
	<td height="'.$taille.'" width="150"><b>VEHICULE</b></td>	
</tr>



</table>';

/*<tr>
	<td style="text-align:left;" height="'.$taille.'" width="80"><b>N° BON :</b></td>
	<td height="'.$taille.'" width="100">'.$taille.'</td>
		<td style="text-align:left;" height="'.$taille.'" width="50"><b>QTE :</b></td>
	<td height="'.$taille.'" width="150">'.$taille.'</td>
		<td style="text-align:left;" height="'.$taille.'" width="150"><b>N° BON CARBURANT :</b></td>
	<td height="'.$taille.'" width="150">'.$taille.'</td>	
</tr>*/

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Ln(2);
//$pdf->SetFont('pdfacourier', '', 11);

    $pdf->SetFont('dejavuserifcondensed', '', 12);


$html = '
<table cellpadding="0" cellspacing="0" border="0" style="text-align:center;" >
<tr style="text-align:left;">
	<td height="'.$taille.'" width="261"><b></b>
	</td>
	<td style="text-align:left;" height="'.$taille.'" width="221">
	</td>
	<td style="text-align:left;" height="'.$taille.'" ><b>Responsable Logistique</b>
	</td>	
</tr>

</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('BON_CARBURANT_:'.$bon_carburantdetails['ccrp_id'].'.pdf', 'I');



?>