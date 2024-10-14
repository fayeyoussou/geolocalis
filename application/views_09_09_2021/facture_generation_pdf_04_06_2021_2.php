<?php 

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
/*	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo noir.jpg';
        //$image_file = base_url().'assets/uploads/'.'logo_example.jpg;
		$this->Image($image_file, 10, 10, 150, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
		// Set font
		//$this->SetFont('helvetica', 'B', 20);
		// Title
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
        $this->Image($image_file, 0, 262, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
 
    }*/
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
/*$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');*/

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

// ---------------------------------------------------------

// set font
//$pdf->SetFont('helvetica', 'B', 14);

// add a page
$pdf->AddPage();

// TITRE N°
$pdf->Ln(16);
$pdf->SetFont('helvetica', 'B', 16);
/*$pdf->Write(0, 'FACTURE N°'.$facturedetails['t_num_facture'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(6);
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(0, 'CLIENT', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, ''.$facturedetails['t_num_facture'], '', 0, 'L', true, 0, false, false, 0);*/
//ln(4);
//$customerdetails['c_address']; 
/*$pdf->$customerdetails['c_address']; 
          Téléphone:$customerdetails['c_mobile']; 
          Email: $customerdetails['c_email'];*/

//$pdf->SetFont('helvetica', '', 12);

// -----------------------------------------------------------------------------





/*$tbl = '
<table border="1" cellpadding="2" cellspacing="2" align="center"> <tr >
            <th>N° Ordre</th>
            <th>Désignation</th>
            <th>N° Conteneur</th>
            <th>Type</th>
            <th>Destination</th>
            <th>Montant</th>
 </tr>';
$tbl .= '<tr nobr="true">

        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>

    <tr >';

 $tbl .= '</table>';*/

/*
foreach($conteneurdetails as $conteneurdetails){*/

/*$tbl .= '<tr >

        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>

    <tr >';

$tbl .= '</table>';*/

/*$tbl .='<tr >
	<td><h3>'.$customerdetails['c_name'].'</td>
	<td><h3>'.$facturedetails['t_date_facture'].'</td>
	<td><h3>'.$facturedetails['t_type_facturation'].'</td>
	<td><h3>'.$facturedetails['t_type_facturation'].'</td>
	<td><h3>'.$facturedetails['t_type_facturation'].'</td>
	<td><h3>'.$facturedetails['t_type_facturation'].'</td>
    
    <tr >';*/
/*}*/

//$tbl .='</table>';

//$pdf->writeHTML($tbl, true, false, false, false, '');
//$pdf->writeHTML($tbl, true, false, true, false, '');
//$pdf->writeHTMLCell(0, $tbl, '', 0, 'C', true, 0, false, false, 0);
//<h1>Some text</h1>
//<table border="1" cellpadding="2" cellspacing="2" align="center"> <tr >
$tbl = '<table  >
    <tr><td rowspan="3"><h2>FACTURE N°'.$facturedetails['t_num_facture'].'</h2></td>';
    $pdf->SetFont('helvetica', '', 11);
    $tbl .= '<td><br>
                 Client: '.$customerdetails['c_name'].'<br>
                 Adresse: '.$customerdetails['c_address'].'<br>
                 Téléphone: '.$customerdetails['c_mobile'].'<br>
                 E-mail: '.$customerdetails['c_email'].'<br>
            </td>
            <td><br>
                Date: '.$facturedetails['t_date_facture'].'<br>
                Référence BL N°: '.$facturedetails['t_reference'].'<br>
                Nom du navire: '.$facturedetails['t_nom_navire'].'<br>
               Compagnie: '.$facturedetails['t_nom_navire'].'<br>
            </td>
    </tr>

</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->SetFont('helvetica', '', 12);

$html = '<table border="0" cellpadding="0" cellspacing="0" align="center"> 
        <tr>
            <th><h5>N° Ordre</h5></th>
            <th><h5>Désignation</h5></th>
            <th><h5>N° Conteneur</h5></th>
            <th><h5>Type</h5></th>
            <th><h5>Destination</h5></th>
            <th><h5>Montant</h5></th>
      </tr>         
         <tbody>';
//for($i = 0; $i < 10 ; $i++)
$count=0;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
foreach($conteneurdetails as $conteneurdetails)
{ $type='';$montant_conteneur=0;$montant=0; $count++;$destination =''; $montant_conteneurAffiche =0;
   // $destination = $conteneurdetails['z_destination'];
 
 //$destination = $conteneurdetails['zone_name']->z_destination;
 
/* $destination=$zonedetails['z_destination'];
if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { //$montant_conteneur = $conteneurdetails['z_montant_conteneur_20']; 
                            $type='20 pieds'; 
                        } else { 
                           // $montant_conteneur = $conteneurdetails['z_montant_conteneur_40']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); */ 
 
 
  $html .= '<br><tr>
            <td>'.$count.'</td>
            <td>'.$facturedetails['t_type_facturation'].'</td>
            <td>'.$conteneurdetails['co_numero_conteneur'].'</td>
            <td>'.$type.'</td>
            <td>'.$destination.' - '.$conteneurdetails['co_adresse_livraison'].'</td>
            <td>'.$montant_conteneurAffiche.'</td>
            </tr>';
}

  $html .= '<h5><tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>AGS</td>
            <td>'.$montant_conteneurAffiche.'</td>
            </tr></h5>';
  $html .= '<h5><tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT</td>
            <td>'.$montant_conteneurAffiche.'</td>
            </tr></h5>';  
$html .= '<h5><tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TVA(18%)</td>
            <td>'.$montant_conteneurAffiche.'</td>
            </tr></h5>';
  $html .= '<h5><tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Montant total</td>
            <td>'.$montant_conteneurAffiche.'</td>
            </tr></h5>';

$html .= '</tbody>
          </table>';

$pdf->writeHTML($html, false, false, true, false, '');


/*$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
    	<td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    	<td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
*/
// -----------------------------------------------------------------------------

/*$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
    	<td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    	 <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');*/

// -----------------------------------------------------------------------------
/*
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
    	<td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
    	 <td>COL 3 - ROW 2<br />text line<br />text line</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
*/
// -----------------------------------------------------------------------------
/*
$tbl = <<<EOD
<table border="1">
<tr>
<th rowspan="3">Left column</th>
<th colspan="5">Heading Column Span 5</th>
<th colspan="9">Heading Column Span 9</th>
</tr>
<tr>
<th rowspan="2">Rowspan 2<br />This is some text that fills the table cell.</th>
<th colspan="2">span 2</th>
<th colspan="2">span 2</th>
<th rowspan="2">2 rows</th>
<th colspan="8">Colspan 8</th>
</tr>
<tr>
<th>1a</th>
<th>2a</th>
<th>1b</th>
<th>2b</th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
</tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');*/

// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
/*$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>A</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>B</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX1<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">4.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->writeHTML($tbl, true, false, false, false, '');*/

// -----------------------------------------------------------------------------

// NON-BREAKING TABLE (nobr="true")

/*$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">NON-BREAKING TABLE</th>
 </tr>
 <tr>
  <td>1-1</td>
  <td>1-2</td>
  <td>1-3</td>
 </tr>
 <tr>
  <td>2-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
 <tr>
  <td>3-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');*/

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

/*$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="3">NON-BREAKING ROWS</th>
 </tr>
 <tr nobr="true">
  <td>ROW 1<br />COLUMN 1</td>
  <td>ROW 1<br />COLUMN 2</td>
  <td>ROW 1<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 2<br />COLUMN 1</td>
  <td>ROW 2<br />COLUMN 2</td>
  <td>ROW 2<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 3<br />COLUMN 1</td>
  <td>ROW 3<br />COLUMN 2</td>
  <td>ROW 3<br />COLUMN 3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');*/

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');



?>