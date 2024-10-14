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
        $this->Image($image_file, 0, 260, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
 
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
$pdf->SetFont('freesans', 'B', 16);
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


$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>FACTURE N°: '.$facturedetails['t_num_facture'].'</h2></td>
    </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->Ln(5);
$pdf->SetFont('freesans', '', 11);
$tbl = '<table width="350"  >
    <tr>
        <td width="130"><b>NOM DU NAVIRE</b></td>
        <td width="10">:</td>
        <td width="170">'.$facturedetails['t_nom_navire'].'</td>
        <td width="130"><b>REFERENCE BL</b></td>
        <td width="10">:</td>
        <td width="150">'.$facturedetails['t_reference'].'</td>
    </tr>


    <tr>
        <td width="130"><b>COMPAGNIE</b></td>
        <td width="10">:</td>
        <td  width="170">'.$facturedetails['t_nom_navire'].'</td>
        <td width="130"><b>DATE</b></td>
        <td width="10">:</td>
        <td width="150">'.$facturedetails['t_date_facture'].'</td>

    </tr>    

</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->Ln(2);
//$pdf->SetFont('pdfacourier', '', 11);
$tbl = '<table width="350"  >
    <tr>
        <td width="130"><b>CLIENT</b></td>
        <td width="10">:</td>
        <td width="240">'.$customerdetails['c_name'].'</td>
    </tr>
 
     <tr>
        <td><b>ADRESSE</b></td>
        <td>:</td>
        <td>'.$customerdetails['c_address'].'</td>
    </tr>

    <tr>
        <td><b>TELEPHONE</b></td>
        <td>:</td>
        <td>'.$customerdetails['c_mobile'].'</td>
    </tr>
    
    <tr>
        <td><b>E-MAIL</b></td>
        <td>:</td>
        <td>'.$customerdetails['c_email'].'</td>
    </tr>    

</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

    $pdf->SetFont('dejavuserifcondensed', '', 12);
$pdf->Ln(6);

$html = '<table border="0" cellspacing="0" align="center" width="100%"> 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="70"><h5>N° ORDRE</h5></th>
            <th width="120"><h5>DESIGNATION</h5></th>
            <th width="130"><h5>N° CONTENEUR</h5></th>
            <th width="50"><h5>TYPE</h5></th>
            <th width="170"><h5>DESTINATION</h5></th>
            <th width="80"><h5>MONTANT</h5></th>
      </tr>         
         <tbody>';
//for($i = 0; $i < 10 ; $i++)
$count=0;$montanttotal=0;$ags=1271;$montantags=0;$montantTVA=0;
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 $montant_conteneurAffiche=0;
 $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20;
 
 // début calcul du montant du type de contenteur
 if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
                        } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
                          }} $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
  // Fin calcul du montant du type de contenteur
 
 //Début affichage destination
 $destination = $conteneurdetails['zone_name']->z_destination;

 $adresselivraison='';
 if(isset($conteneurdetails['co_adresse_livraison']))
 { 
    $adresselivraison= $conteneurdetails['co_adresse_livraison'];
 } 
 
 //Début affichage destination
 
 
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
 
 
  $html .= '<br>
             <tr height="20" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">
             
             
            <td width="10%">'.$count.'</td>
            <td width="15%">'.$facturedetails['t_type_facturation'].'</td>
            <td width="20%">'.$conteneurdetails['co_numero_conteneur'].'</td>
            <td width="15%">'.$type.'</td>
            <td width="30%">'.$destination.' - '.$adresselivraison.'</td>
            <td width="10%">'.$montant_conteneurAffiche.'</td>
            </tr>';
// cumul du montant total
 $montanttotal += $montant_conteneur;
}

//calcul du montant AGS        
$montantags=$facturedetails['t_nombre_conteneur'] * $ags;
$montantagsAfficher =0;
$montantagsAfficher = number_format($montantags, 0, ',', ' ');

// initialisation        
$montantHT=0;$montantTTC=0;        

//Calcul montant hors taxe    
$montantHT=$montanttotal+$montantags;   
 $montantHTAfficher =0;
$montantHTAfficher = number_format($montantHT, 0, ',', ' ');
// verification TVA
$montantTVA=0;
$montant_total="";  
if($facturedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));
$montantTVAAfficher =0;    
$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

$montant_total="Montant TTC";    
} 
else
{
    $montant_total="Montant total";  
}
// calcul montantTTC         
$montantTTC=$montantTVA+$montantHT; 
$montantTTCAfficher =0;
$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');
$nombre = intval($montantTTC);
//$nombre = $montantTTCAfficher;
//$montant_lettre = $this->convertir_nombre_lettre->convertir_nombre($nombre);
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);
/*$tva=0;
$tva=$facturedetails['t_taxe'];*/


//$pdf->Line(10, 48, 190, 48);//montant_conteneurAffiche
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1">
            <td width="10%" style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1"></td>
            <td></td>
            <td></td>
            <td></td>
            <td border="1">AGS</td>
            <td>'.$montantagsAfficher.'</td>
            </tr></h5>';
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT</td>
            <td>'.$montantHTAfficher.'</td>
            </tr></h5>'; 
if($facturedetails['t_taxe']=='avec_tva')
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TVA(18%)</td>
            <td>'.$montantTVAAfficher.'</td>
            </tr></h5>';
}
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la présente facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td ><u>La Direction</u></td>
            </tr></h5>';
$html .= '</tbody>
          </table>';

$pdf->writeHTML($html, false, false, true, false, '');



//Close and output PDF document
$pdf->Output('FACTURE_LINK_LOGISTIC.pdf', 'I');



?>