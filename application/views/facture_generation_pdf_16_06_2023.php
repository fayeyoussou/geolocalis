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
$pdf->Ln(6);
$pdf->SetFont('freesans', 'B', 16);


if($facturedetails['t_modele_facture']=="FACTURE"){ //controle du modéle de facture
$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>FACTURE N°: '.$facturedetails['t_num_facture'].'</h2></td>
    </tr>
</table>';
}else{
$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>PROFORMA N°: '.$facturedetails['t_num_proforma'].'</h2></td>
    </tr>
</table>';
} //FIN controle du modéle de facture
    
$pdf->writeHTML($tbl, true, false, false, false, '');
$compagnie ='';
 //if(($facturedetails['t_type_facturation'])!="Forfait")  

 if((($facturedetails['t_type_facturation'])!="Forfait") AND (($facturedetails['t_type_facturation'])!="Immobilisation"))  

 
 {

if($compagniedetails['cc_name']!='')
{
$compagnie = $compagniedetails['cc_name'];
}
 }
//$pdf->Ln(5);
$pdf->SetFont('freesans', '', 11);
$tbl = '<table width="350"  >
    <tr>
        <td width="130"><b>NOM DU NAVIRE</b></td>
        <td width="10">:</td>
        <td width="250">'.$facturedetails['t_nom_navire'].'</td>
        <td width="130"><b>REFERENCE BL</b></td>
        <td width="10">:</td>
        <td width="150">'.$facturedetails['t_reference'].'</td>
    </tr>


    <tr>
        <td width="130"><b>COMPAGNIE</b></td>
        <td width="10">:</td>
        <td  width="250">'.$compagnie.'</td>
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
//$pdf->Ln(6);
 $count=0;
$montanttotal=0;
$montantTVA=0;
$montant_total=""; 
$montantTTCAfficher =0;
$montant_lettre="";

if($conteneurdetails!='')// Debut du controle if
{

if((($facturedetails['t_type_facturation'])=="Exportation") || (($facturedetails['t_type_facturation'])=="Transport")) 
{// Debut du controle if

$html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="8%"><h5>N° ORDRE</h5></th>
            <th width="15%"><h5>DESIGNATION</h5></th>
            <th width="20%"><h5>N° CONTENEUR</h5></th>
            <th width="15%"><h5>TYPE</h5></th>
            <th width="30%"><h5>DESTINATION</h5></th>
            <th width="12%"><h5>MONTANT</h5></th>
      </tr>         
         <tbody>';    


    if(($facturedetails['t_type_facturation'])=="Exportation")// Debut du controle if
    {
     $ags=1500;   
    }
    else
    {
     $ags=1271;
    }



$montantags=0;
$nombreags= 0;
$montantTVA=0;
    
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 $montant_conteneurAffiche=0;
/**/  if($conteneurdetails['zone_name']->z_montant_conteneur_20!='') {
 $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20;
	  
  }
 
 
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
 

 if(($count%2)==0)
 {
     

     $html .= '
             <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
 }  
 else
 {
      $html .= '
             <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
 }
             
      $html .=  '<td width="10%">'.$count.'</td>
            <td width="15%">'.$facturedetails['t_type_facturation'].'</td>
            <td width="20%">'.$conteneurdetails['co_numero_conteneur'].'</td>
            <td width="15%">'.$type.'</td>
            <td width="30%">'.$destination.' - '.$adresselivraison.'</td>
            <td width="10%">'.$montant_conteneurAffiche.'</td>
            </tr>';
// cumul du montant total
 $montanttotal += $montant_conteneur;
// $nombreags += $facturedetails['t_nombre_ags'];
// $nombreags += $facturedetails['t_nombre_ags'];
}

 $nombreags = 0;    
 $nombreags = $facturedetails['t_nombre_ags'];

//calcul du montant AGS     
//$montantags=$facturedetails['t_frais_ags'];
//$nombreags= 0;
//$nombreags= $facturedetails['t_nombre_conteneur'] * $facturedetails['t_nombre_ags'];
$montantags=$nombreags * $ags;
//$montantags=10168;

    $montantagsAfficher =0;
$montantagsAfficher = number_format($montantags, 0, ',', ' ');

// initialisation        
$montantHT=0;$montantTTC=0;        

//Calcul montant hors taxe    
$montantHT=$montanttotal+$montantags;   
 $montantHTAfficher =0;
   
// deduction du rabais
/*$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $montantHT=$montantHT-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}*/
    
// deduction du t_frais_divers
$t_frais_divers = 0;    
$t_frais_divers = $facturedetails['t_frais_divers'];   

    if($t_frais_divers>0)
{
        $montantHT=$montantHT + $t_frais_divers;
        $t_frais_diversAfficher = number_format($t_frais_divers, 0, ',', ' ');
}
   	
	
    
$montantHTAfficher = number_format($montantHT, 0, ',', ' ');
// verification TVA
/*$montantTVA=0;
$montant_total=""; */ 
if($facturedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
$montantTVAAfficher =0;    
$montantTVAAfficher = number_format($montantTVAArrondi, 0, ',', ' ');    
//$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

$montant_total="Montant TTC";    
} 
else
{
    $montant_total="Montant total";  
}
// calcul montantTTC         
$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
//$montantTTCAfficher =0;
	
//Rabais	
$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $rabaisAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}
	
//Begin cool printing	
$impression = 0;    
$impression = $facturedetails['t_impression'];   

    if($impression>0)
{
        $impressionAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi+$impression;
        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}	
// End cool printing	
	
$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');

// 09 08 2021    
//$nombre = intval($montantTTC);
$nombre = ceil($montantTTCArrondi);
//$nombre = ceil($montantTTC);
    
//$nombre = $montantTTCAfficher;
//$montant_lettre = $this->convertir_nombre_lettre->convertir_nombre($nombre);
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);
/*$tva=0;
$tva=$facturedetails['t_taxe'];*/


//$pdf->Line(10, 48, 190, 48);//
if($nombreags>0)
{
  $html .= '<h6><tr style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1">
            <td width="10%" style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1"></td>
            <td></td>
            <td></td>
            <td></td>
            <td border="1">AGS</td>
            <td>'.$montantagsAfficher.'</td>
            </tr></h6>';
}
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT</td>
            <td>'.$montantHTAfficher.'</td>
            </tr></h5>'; 
if($rabais>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Remise</td>
            <td>'.$rabaisAfficher.'</td>
            </tr></h5>';
} 
	
	
	
if($t_frais_divers>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Frais divers</td>
            <td>'.$t_frais_diversAfficher.'</td>
            </tr></h5>';
}	
	
    
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

if($impression>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Frais impression</td>
            <td>'.$impressionAfficher.'</td>
            </tr></h5>';
}	
	
    if($facturedetails['t_modele_facture']=="FACTURE"){ //controle du modéle de facture
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la présente facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
}else{
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la proforma facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
} //FIN controle du modéle de facture
        
    
    
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td ><u>La Direction</u></td>
            </tr></h5>';
	
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	

$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	

/*$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';*/
$html .= '<h6><tr >
            <td width="600">NB: Dépotage et restitution du conteneur vide dans les 24h après livraison. Passé ce délai, l\'immobilisation du matériel de transport sera facturée par jour. Tracteur : 55.000 FCFA Remorque : 25.000 FCFA</td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h6>';	
$html .= '</tbody>
          </table>';
$pdf->writeHTML($html, false, false, true, false, '');
    


} // fin controle Exportation et Transport
    

/*BEGIN IMMOBILISATION*/	

	if(($facturedetails['t_type_facturation'])=="Immobilisation") 
{// Debut du controle if

$html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="10%"><h5>N° ORDRE</h5></th>
            <th width="30%"><h5>TYPE</h5></th>
            <th width="20%"><h5>MONTANT VEHICULE</h5></th>
            <th width="20%"><h5>MONTANT REMORQUE</h5></th>
            <th width="20%"><h5>MONTANT</h5></th>
      </tr>         
         <tbody>';    


/*    if(($facturedetails['t_type_facturation'])=="Exportation")// Debut du controle if
    {
     $ags=1500;   
    }
    else
    {
     $ags=1271;
    }*/



//$montantags=0;
//$nombreags= 0;
$montantTVA=0;
    
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 $montant_conteneurAffiche=0;

 
 $montant_conteneur = $conteneurdetails['co_montant']; 
 $montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
  // Fin calcul du montant du type de contenteur

 if(($count%2)==0)
 {
     

     $html .= '
             <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
 }  
 else
 {
      $html .= '
             <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
 }
             
      $html .=  '<td width="10%">'.$count.'</td>
            <td width="30%">'.$facturedetails['t_type_facturation'].'</td>
            <td width="20%">'.$conteneurdetails['co_vehicle_montant'].'</td>
            <td width="20%">'.$conteneurdetails['co_vehicle_remorque_montant'].'</td>
            <td width="20%">'.$montant_conteneurAffiche.'</td>
            </tr>';
// cumul du montant total
 $montanttotal += $montant_conteneur;
// $nombreags += $facturedetails['t_nombre_ags'];
// $nombreags += $facturedetails['t_nombre_ags'];
}

/* $nombreags = 0;    
 $nombreags = $facturedetails['t_nombre_ags'];

//calcul du montant AGS     
//$montantags=$facturedetails['t_frais_ags'];
//$nombreags= 0;
//$nombreags= $facturedetails['t_nombre_conteneur'] * $facturedetails['t_nombre_ags'];
$montantags=$nombreags * $ags;
//$montantags=10168;

    $montantagsAfficher =0;
$montantagsAfficher = number_format($montantags, 0, ',', ' ');*/

// initialisation        
$montantHT=0;$montantTTC=0;        

//Calcul montant hors taxe    
//$montantHT=$montanttotal+$montantags;   
$montantHT=$montanttotal;   
 $montantHTAfficher =0;
   
// deduction du rabais
/*$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $montantHT=$montantHT-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}*/
    
// deduction du t_frais_divers
$t_frais_divers = 0;    
$t_frais_divers = $facturedetails['t_frais_divers'];   

    if($t_frais_divers>0)
{
        $montantHT=$montantHT + $t_frais_divers;
        $t_frais_diversAfficher = number_format($t_frais_divers, 0, ',', ' ');
}
   	
	
    
$montantHTAfficher = number_format($montantHT, 0, ',', ' ');
// verification TVA
/*$montantTVA=0;
$montant_total=""; */ 
if($facturedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
$montantTVAAfficher =0;    
$montantTVAAfficher = number_format($montantTVAArrondi, 0, ',', ' ');    
//$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

$montant_total="Montant TTC";    
} 
else
{
    $montant_total="Montant total";  
}
// calcul montantTTC         
$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
	
//Rabais	
$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $rabaisAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}
	
//Begin cool printing	
$impression = 0;    
$impression = $facturedetails['t_impression'];   

    if($impression>0)
{
        $impressionAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi+$impression;
        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}	
// End cool printing	
	
$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');

// 09 08 2021    
//$nombre = intval($montantTTC);
$nombre = ceil($montantTTCArrondi);
//$nombre = ceil($montantTTC);
    
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);

		
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT</td>
            <td>'.$montantHTAfficher.'</td>
            </tr></h5>'; 
if($rabais>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>Remise</td>
            <td>'.$rabaisAfficher.'</td>
            </tr></h5>';
} 
	
	
	
if($t_frais_divers>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>Frais divers</td>
            <td>'.$t_frais_diversAfficher.'</td>
            </tr></h5>';
}	
	
    
if($facturedetails['t_taxe']=='avec_tva')
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>TVA(18%)</td>
            <td>'.$montantTVAAfficher.'</td>
            </tr></h5>';
}

if($impression>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>Frais impression</td>
            <td>'.$impressionAfficher.'</td>
            </tr></h5>';
}	
	
    if($facturedetails['t_modele_facture']=="FACTURE"){ //controle du modéle de facture
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la présente facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
}else{
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la proforma facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
} //FIN controle du modéle de facture
        
    
    
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            
            <td ><u>La Direction</u></td>
            </tr></h5>';
	
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	

$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
/*$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	

$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';	
$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';$html .= '<h5><tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h5>';*/
$html .= '<h6><tr >
            <td width="600">NB: Dépotage et restitution du conteneur vide dans les 24h après livraison. Passé ce délai, l\'immobilisation du matériel de transport sera facturée par jour. Tracteur : 55.000 FCFA Remorque : 25.000 FCFA</td>
            <td></td>
            <td></td>
            <td ></td>
            </tr></h6>';	
$html .= '</tbody>
          </table>';
$pdf->writeHTML($html, false, false, true, false, '');
    


} // fin controle Exportation et Transport
    

	
/*END IMMOBILISATION*/	
	
    
    $pdf->SetFont('dejavuserifcondensed', '', 11);
    /* DEBUT DETENTION*/
 if(($facturedetails['t_type_facturation'])=="Detention") 
{// Debut du controle if

     $html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="4%"><h5>N°</h5></th>
            <th width="15%"><h5>N° CONTENEUR</h5></th>
            <th width="12%"><h5>DATE DEBUT</h5></th>
            <th width="12%"><h5>DATE FIN</h5></th>
            <th width="10%"><h5>TYPE</h5></th>
           <th width="10%"><h5>PRIX</h5></th>
            <th width="25%"><h5>DETENTION</h5></th>
            <th width="10%"><h5>MONTANT</h5></th>
      </tr>         
         <tbody>';
     $type="";
     $montant=0;

   
 
    foreach($conteneurdetails as $conteneurdetails)
    { 
        $count++;
             if(isset($conteneurdetails['co_type_conteneur']))
             {
                 $type=$conteneurdetails['co_type_conteneur'];
                    if($type=='20_pieds')
                    {  
                        $type="20 pieds"; $montant=15000;
                    } 
                 else 
                 {
                     $type="40 pieds";$montant=25000;
                 }
             }

         if(($count%2)==0)
         {

             $html .= '
                     <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
         }  
         else
         {
              $html .= '
                     <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
         }
             
              $html .=  '
              
              
                    <td width="4%">'.$count.'</td>
                    <td width="15%">'.$conteneurdetails['co_numero_conteneur'].'</td>
                    <td width="12%">'.$conteneurdetails['co_date_heure_debut'].'</td>
                    <td width="12%">'.$conteneurdetails['co_date_heure_fin'].'</td>
                    <td width="10%">'.$type.'</td>
                    <td width="10%">'.$montant.'</td>
                    <td width="25%">'.$conteneurdetails['co_nombre_jour_franchise'].'</td>
                    <td width="10%">'.$conteneurdetails['co_montant'].'</td>
                    </tr>';
  $montanttotal += $conteneurdetails['co_montant'];

    }//Fin foreach

     /*Debut Calcul facture */
     
  $nombreags = 0;    
// $nombreags = $facturedetails['t_nombre_ags'];

//calcul du montant AGS     
//$montantags=$facturedetails['t_frais_ags'];
//$nombreags= 0;
//$nombreags= $facturedetails['t_nombre_conteneur'] * $facturedetails['t_nombre_ags'];
//$montantags=$nombreags * $ags;
//$montantags=10168;

  //  $montantagsAfficher =0;
//$montantagsAfficher = number_format($montantags, 0, ',', ' ');

// initialisation        
$montantHT=0;$montantTTC=0;        

//Calcul montant hors taxe    
$montantHT=$montanttotal;   
 $montantHTAfficher =0;
   
// deduction du rabais
/**/$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $montantHT=$montantHT-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}
    
    
$montantHTAfficher = number_format($montantHT, 0, ',', ' ');
// verification TVA
/*$montantTVA=0;
$montant_total=""; */ 
if($facturedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
$montantTVAAfficher =0;    
$montantTVAAfficher = number_format($montantTVAArrondi, 0, ',', ' ');    
//$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

$montant_total="Montant TTC";    
} 
else
{
    $montant_total="Montant total";  
}
// calcul montantTTC         
$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
//$montantTTCAfficher =0;

	 
/*	Ce 22 08 2022

	 $montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
	 */
//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');

// 09 08 2021    
//$nombre = intval($montantTTC);
/* 22 08 2022
$nombre = ceil($montantTTCArrondi);
//$nombre = ceil($montantTTC);
    
//$nombre = $montantTTCAfficher;
//$montant_lettre = $this->convertir_nombre_lettre->convertir_nombre($nombre);
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);*/
	 
/*$tva=0;
$tva=$facturedetails['t_taxe'];*/

	 $impression = 0;    
$impression = $facturedetails['t_impression'];   

    if($impression>0)
{
        $impressionAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi+$impression; //exit;
        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}
	 $montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
	 
	 $nombre = ceil($montantTTCArrondi);
//$nombre = ceil($montantTTC);
    
//$nombre = $montantTTCAfficher;
//$montant_lettre = $this->convertir_nombre_lettre->convertir_nombre($nombre);
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);

//$pdf->Line(10, 48, 190, 48);//
if($nombreags>0)
{
  $html .= '<h6><tr style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1">
            <td width="10%" style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td border="1">AGS</td>
            <td>'.$montantagsAfficher.'</td>
            </tr></h6>';
}
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
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
            <td></td>
            <td></td>
            <td>TVA(18%)</td>
            <td>'.$montantTVAAfficher.'</td>
            </tr></h5>';
}  
	 
if($impression>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Frais impression</td>
            <td>'.$impressionAfficher.'</td>
            </tr></h5>';
}	 
	 
     /*Fin calcul facture*/
     
if($facturedetails['t_modele_facture']=="FACTURE"){ //controle du modéle de facture
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la présente facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
}else{
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la proforma facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
} //FIN controle du modéle de facture
        
    
    
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>          
            <td ><u>La Direction</u></td>
            </tr></h5>';
$html .= '</tbody>
          </table>';
$pdf->writeHTML($html, false, false, true, false, '');     
     
} // Fin 
    
//debut affichage partie commune
   
$montanttotal = 0;	
	
/* BEGIN FORFAIT*/    
 if(($facturedetails['t_type_facturation'])=="Forfait") 	
 {// Debut du controle if

$html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="5%"><h5>N°</h5></th>
            <th width="30%"><h5>LIBELLE</h5></th>
            <th width="20%"><h5>N° CONTENEUR</h5></th>
            <th width="15%"><h5>PRIX UNITAIRE</h5></th>
            <th width="15%"><h5>QUANTITE</h5></th>
            <th width="15%"><h5>MONTANT</h5></th>
      </tr>            
         <tbody>';    


/*    if(($facturedetails['t_type_facturation'])=="Exportation")// Debut du controle if
    {
     $ags=1500;   
    }
    else
    {*/
     $ags=1271;
 //   }



$montantags=0;
$nombreags= 0;
$montantTVA=0;
    
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 $montant_conteneurAffiche=0;
/*  if($conteneurdetails['zone_name']->z_montant_conteneur_20!='') {
 $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20;
	  
  }*/
 
 
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
 //$destination = $conteneurdetails['zone_name']->z_destination;

 $adresselivraison='';
 if(isset($conteneurdetails['co_adresse_livraison']))
 { 
    $adresselivraison= $conteneurdetails['co_adresse_livraison'];
 } 
 

 if(($count%2)==0)
 {
     

     $html .= '
             <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
 }  
 else
 {
      $html .= '
             <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
 }
             
      $html .=  '                    <td width="5%">'.$count.'</td>
                    <td width="30%">'.$conteneurdetails['co_libelle'].'</td>
                    <td width="20%">'.$conteneurdetails['co_numero_conteneur'].'</td>
                    <td width="15%">'.$conteneurdetails['co_prix_unitaire'].'</td>
                    <td width="15%">'.$conteneurdetails['co_quantite'].'</td>
                    <td width="15%">'.$conteneurdetails['co_montant'].'</td>
                    </tr>';
  $montanttotal += $conteneurdetails['co_montant'];
// cumul du montant total
// $montanttotal += $montant_conteneur;
// $nombreags += $facturedetails['t_nombre_ags'];
// $nombreags += $facturedetails['t_nombre_ags'];
}

 $nombreags = 0;    
 $nombreags = $facturedetails['t_nombre_ags'];

//calcul du montant AGS     
//$montantags=$facturedetails['t_frais_ags'];
//$nombreags= 0;
//$nombreags= $facturedetails['t_nombre_conteneur'] * $facturedetails['t_nombre_ags'];
$montantags=$nombreags * $ags;
//$montantags=10168;

    $montantagsAfficher =0;
$montantagsAfficher = number_format($montantags, 0, ',', ' ');

// initialisation        
$montantHT=0;$montantTTC=0;        

//Calcul montant hors taxe    
$montantHT=$montanttotal+$montantags;   
 $montantHTAfficher =0;
   
// deduction du rabais
/*$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $montantHT=$montantHT-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}*/
    
// deduction du t_frais_divers
$t_frais_divers = 0;    
$t_frais_divers = $facturedetails['t_frais_divers'];   

    if($t_frais_divers>0)
{
        $montantHT=$montantHT + $t_frais_divers;
        $t_frais_diversAfficher = number_format($t_frais_divers, 0, ',', ' ');
}
   	
	
    
$montantHTAfficher = number_format($montantHT, 0, ',', ' ');
// verification TVA
/*$montantTVA=0;
$montant_total=""; */ 
if($facturedetails['t_taxe']=='avec_tva')
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
$montantTVAAfficher =0;    
$montantTVAAfficher = number_format($montantTVAArrondi, 0, ',', ' ');    
//$montantTVAAfficher = number_format($montantTVA, 0, ',', ' ');    

$montant_total="Montant TTC";    
} 
else
{
    $montant_total="Montant total";  
}
// calcul montantTTC         
$montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;

    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
//$montantTTCAfficher =0;
	
//Rabais	
$rabais = 0;    
$rabais = $facturedetails['t_rabais'];   

    if($rabais>0)
{
        $rabaisAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi-$rabais;
        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}
	 
//Begin cool printing	
$impression = 0;    
$impression = $facturedetails['t_impression'];   

    if($impression>0)
{
        $impressionAfficher =0;
		 $montantTTCArrondi=$montantTTCArrondi+$impression;
        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}	
// End cool printing		 
	
$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
// début conversion nombre en lettres
//$val = $this->load->library('convertir_nombre_lettre');

// 09 08 2021    
//$nombre = intval($montantTTC);
$nombre = ceil($montantTTCArrondi);
//$nombre = ceil($montantTTC);
    
//$nombre = $montantTTCAfficher;
//$montant_lettre = $this->convertir_nombre_lettre->convertir_nombre($nombre);
// Fin conversion nombre en lettres
$formatter = \NumberFormatter::create('fr_FR', \NumberFormatter::SPELLOUT);
$formatter->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
$formatter->setAttribute(\NumberFormatter::ROUNDING_MODE, \NumberFormatter::ROUND_HALFUP);
$montant_lettre =$formatter->format($nombre);
/*$tva=0;
$tva=$facturedetails['t_taxe'];*/


//$pdf->Line(10, 48, 190, 48);//
if($nombreags>0)
{
  $html .= '<h6><tr style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1">
            <td width="10%" style="background-color:#F2F2F2;color:#000000;border:1;cellpadding:1; cellspacing:1"></td>
            <td></td>
            <td></td>
            <td></td>
            <td border="1">AGS</td>
            <td>'.$montantagsAfficher.'</td>
            </tr></h6>';
}
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT</td>
            <td>'.$montantHTAfficher.'</td>
            </tr></h5>'; 
if($rabais>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Remise</td>
            <td>'.$rabaisAfficher.'</td>
            </tr></h5>';
} 
	 
	
if($t_frais_divers>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Frais divers</td>
            <td>'.$t_frais_diversAfficher.'</td>
            </tr></h5>';
}	
	
    
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
	 
	 
if($impression>0)
{
$html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Frais impression</td>
            <td>'.$impressionAfficher.'</td>
            </tr></h5>';
} 	 

    if($facturedetails['t_modele_facture']=="FACTURE"){ //controle du modéle de facture
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la présente facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
}else{
  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$montant_total.'</td>
            <td>'.$montantTTCAfficher.'</td>
            
            </tr></h5>Arrétée la proforma facture à la somme de <b>'.$montant_lettre.'</b> FCFA';
} //FIN controle du modéle de facture
        
    
    
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
    



} // fin controle Exportation et Transport
    
/*END FORFAIT*/	
 
    
//Fin affichage partie commune
    
  
    
    
}//fin controle if, si les conteneurs sont enregistrés
else
{
//$pdf->writeHTML($html, false, false, true, false, '');    
$pdf->Write(0, 'CETTE FACTURE NE DISPOSE PAS ENCORE DE CONTENEUR', '', 0, 'C', true, 0, false, false, 0);// $pdf->writeHTML($html, false, false, true, false, '');   
}




//Close and output PDF document
$pdf->Output('FACTURE_LINK_LOGISTIC.pdf', 'I');



?>