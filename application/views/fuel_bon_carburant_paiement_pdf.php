<?php 

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
/*	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo noir.jpg';
        //$image_file = base_url().'assets/uploads/'.'logo_example.jpg;
		$this->Image($image_file, 20, 6, 170, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        

	}*/

	// Page footer
/*	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		$image_file = K_PATH_IMAGES.'pied.jpg';
        
        
        $this->Image($image_file, 0, 262, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
 
    }*/
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
$pdf->Ln(4);
$pdf->SetFont('freesans', 'B', 11);


$tbl = '
<table align="right" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>Date : '.$bon_carburantdetails['ccrp_date'].'</h2></td>
    </tr>
</table>';

    
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln(4);
$pdf->SetFont('freesans', 'B', 16);


$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>PAIEMENT BONS DE CARBURANT N° BP: '.$bon_carburantdetails['ccrp_numero'].'</h2></td>
    </tr>
</table>';

$pdf->Ln(4);
$pdf->SetFont('freesans', 'B', 10);
$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>STATION:  '.$bon_carburantdetails['ccc_name'].' </h2></td>
    </tr>
</table>';
    
$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln(4);


$taille=0;
$taille=21;


$pdf->Ln(2);
//$pdf->SetFont('pdfacourier', '', 11);

    $pdf->SetFont('dejavuserifcondensed', '', 12);

$result = join_multi_select($bon_carburantdetails['ccrp_bon_carburant_id'], 'fuel_bon_carburant', 'bc_id', 'bc_id');




$html = '
<table cellpadding="0" cellspacing="0" border="1" style="text-align:center;" width="90%">

<tr>
	<td style="text-align:center;" height="'.$taille.'" width="40"><b>N°</b></td>	
	<td style="text-align:center;" height="'.$taille.'" width="80"><b>N° BON </b></td>
	<td height="'.$taille.'" width="100"><b>QUANTITE</b></td>
		<td style="text-align:left;" height="'.$taille.'" width="100"><b> DATE</b></td>
	<td style="text-align:center;" height="'.$taille.'" width="120"><b>VEHICULE</b></td>
	<td style="text-align:center;" height="'.$taille.'" width="180"><b>CONDUCTEUR</b></td>
</tr>';


$i=0;
$quantitetotale =0;
foreach(explode(',',$result) as $str)
{
  $str = str_replace('"','',$str);
//
$where = "";
$where = "bc_compagnie_id=ccc_id AND bc_driver_id=d_id AND bc_vehicule_id=v_id AND bc_id='$str'";	
	
		$query = $this->db->select('*')->from('fuel_bon_carburant,vehicles,drivers,fuel_carte_carburant_compagnie')->where($where)->order_by('bc_date','desc')->get()->result_array();
//		$query = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id',$str)->order_by('bc_id','desc')->get()->result_array();

	foreach($query as $row_bc)
	{$i++;
$quantitetotale += $row_bc['bc_quantite'];	
		
$html .= '		

<tr>
	<td style="text-align:center;" height="'.$taille.'" width="40"><b>'.$i.'</b></td>
<td style="text-align:center;" height="'.$taille.'" width="80"><b>'.$row_bc['bc_numero'].'</b></td>
	<td height="'.$taille.'" width="100" style="text-align:center;"><b>'.$row_bc['bc_quantite'].'</b></td>
		<td style="text-align:center;" height="'.$taille.'" width="100"><b>'.$row_bc['bc_date'].' </b></td>
	<td style="text-align:center;" height="'.$taille.'" width="120"><b>'.$row_bc['v_registration_no'].'</b></td>
	<td style="text-align:center;" height="'.$taille.'" width="180"><b>'.$row_bc['d_name'].'</b></td>
</tr>

';}
	
}

$html .= '
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Ln(2);
//$pdf->SetFont('pdfacourier', '', 11);

    $pdf->SetFont('dejavuserifcondensed', '', 12);
			$montant_carburant = 0;
			$prix_carburant = 0;
			$prix_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;

$montant_carburant = $prix_carburant * $quantitetotale;
$montant_carburantAffiche = number_format($montant_carburant, 0, ',', ' '); 
$html = '
<table cellpadding="0" cellspacing="0" border="0" style="text-align:center;" >
<tr style="text-align:left;">
	<td height="'.$taille.'" width="201"><b>Total</b>
	</td>
	<td style="text-align:left;" height="'.$taille.'" width="201"><b>'.$quantitetotale.' Litres</b>
	</td>
	<td style="text-align:left;" height="'.$taille.'" ><b>Montant: '.$montant_carburantAffiche.' FCFA</b>
	</td>	
</tr>
<tr style="text-align:left;">
	<td height="'.$taille.'" width="201"><b>Responsable Logistique </b>
	</td>
	<td style="text-align:left;" height="'.$taille.'" width="221"><b></b>
	</td>
	<td style="text-align:left;" height="'.$taille.'" ><b>Direction</b>
	</td>	
</tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('BON_PAIEMENT_CARBURANT_:'.$bon_carburantdetails['ccrp_id'].'.pdf', 'I');



?>