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


$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h4>FACTURE N°: '.$pregatedetails['t_num_facture'].' / PREGATE N°: '.$pregatedetails['pr_numero'].'</h4></td>
    </tr>
</table>';

    
$pdf->writeHTML($tbl, true, false, false, false, '');
$compagnie ='';
 //if(($pregatedetails['t_type_facturation'])!="Forfait")  



/*if($compagniedetails['cc_name']!='')
{
$compagnie = $compagniedetails['cc_name'];
}*/

//$pdf->Ln(5);
$pdf->SetFont('freesans', '', 11);
$tbl = '<table width="350"  >
    <tr>
        <td width="130"><b>NOM DU NAVIRE</b></td>
        <td width="10">:</td>
        <td width="250">'.$pregatedetails['t_nom_navire'].'</td>
        <td width="130"><b>REFERENCE BL</b></td>
        <td width="10">:</td>
        <td width="150">'.$pregatedetails['t_reference'].'</td>
    </tr>


    <tr>
        <td width="130"><b>COMPAGNIE</b></td>
        <td width="10">:</td>
        <td  width="250">'.$compagnie.'</td>
        <td width="130"><b>DATE</b></td>
        <td width="10">:</td>
        <td width="150">'.$pregatedetails['t_date_facture'].'</td>

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


if($conteneurdetails!='')// Debut du controle if
{


$html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="15%"><h5>N° ORDRE</h5></th>
            <th width="15%"><h5>DESIGNATION</h5></th>
            <th width="20%"><h5>N° CONTENEUR</h5></th>
            <th width="15%"><h5>TYPE</h5></th>
            <th width="35%"><h5>DESTINATION</h5></th>
      </tr>         
         <tbody>';    




 $destination ='';    
foreach($conteneurdetails as $conteneurdetails)
{ 
	
	 $count++;
 $destination = $conteneurdetails['zone_name']->z_destination;
	
 $adresselivraison='';
 if(isset($conteneurdetails['co_adresse_livraison']))
 { 
    $adresselivraison= $conteneurdetails['co_adresse_livraison'];
 }	
 
 $type=''; 
 if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { 
                            $type='20 pieds'; 
                        } else { 
                           
                              $type='40 pieds'; 
                          }} 

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
             
      $html .=  '<td width="15%">'.$count.'</td>
            <td width="15%">'.$pregatedetails['t_type_facturation'].'</td>
            <td width="20%">'.$conteneurdetails['co_numero_conteneur'].'</td>
            <td width="15%">'.$type.'</td>
            <td width="35%">'.$destination.' - '.$adresselivraison.'</td>
            </tr>';

} //END BOUCLE
      

$pdf->writeHTML($html, false, false, true, false, '');




$html_espace ='<br/><br/><br/><div align="center">EIR PLEINS</div><br/><br/>';

	
	$pdf->writeHTML($html_espace, false, false, true, false, '');

	$count=0;


if($eir_plein!='')// Debut du controle if
{

$pdf_eir_plein = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="15%"><h5>N° ORDRE</h5></th>
            <th width="20%"><h5>N° TRANSACTION</h5></th>
            <th width="20%"><h5>N° MISSION</h5></th>
             <th width="30%"><h5>DATE & HEURE</h5></th>
           <th width="15%"><h5>VALIDATION</h5></th>
      </tr>         
         <tbody>';    




 $destination ='';    
foreach($eir_plein as $eir_plein)
{ 
	
	 $count++;

 if(($count%2)==0)
 {
          

     $pdf_eir_plein .= '
             <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
 }  
 else
 {
      $pdf_eir_plein .= '
             <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
 }
	
	
    if($eir_plein['ei_validation']==0) 
         { 
             $validation='Non validé'; 
          } else { 
             $validation='Validé'; 
          }	
             
      $pdf_eir_plein .=  '<td width="15%">'.$count.'</td>
            <td width="15%">'.$eir_plein['ei_numero_transaction'].'</td>
            <td width="20%">'.$eir_plein['ei_mission_id'].'</td>
            <td width="35%">'.$eir_plein['ei_date'].' - '.$eir_plein['ei_heure'].'</td>
            <td width="15%">'.$validation.'</td>
            </tr>';

}
}
$pdf->writeHTML($pdf_eir_plein, false, false, true, false, '');
	
 

$html_espace ='<br/><br/><br/><div align="center">EIR VIDES</div><br/><br/>';

	
	$pdf->writeHTML($html_espace, false, false, true, false, '');

	$count=0;


if($eir_vide!='')// Debut du controle if
{

$pdf_eir_vide = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="15%"><h5>N° ORDRE</h5></th>
            <th width="20%"><h5>N° TRANSACTION</h5></th>
            <th width="20%"><h5>N° MISSION</h5></th>
             <th width="30%"><h5>DATE & HEURE</h5></th>
           <th width="15%"><h5>VALIDATION</h5></th>
      </tr>         
         <tbody>';    




 $destination ='';    
foreach($eir_vide as $eir_vide)
{ 
	
	 $count++;

 if(($count%2)==0)
 {
          

     $pdf_eir_vide .= '
             <tr height="60" style="background-color:#F2F2F2;color:#000000;border:1px solid #000;">';
 }  
 else
 {
      $pdf_eir_vide .= '
             <tr height="60" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
 }
	
	
    if($eir_vide['ei_validation']==0) 
         { 
             $validation='Non validé'; 
          } else { 
             $validation='Validé'; 
          }	
             
      $pdf_eir_vide .=  '<td width="15%">'.$count.'</td>
            <td width="15%">'.$eir_vide['ei_numero_transaction'].'</td>
            <td width="20%">'.$eir_vide['ei_mission_id'].'</td>
            <td width="35%">'.$eir_vide['ei_date'].' - '.$eir_vide['ei_heure'].'</td>
            <td width="15%">'.$validation.'</td>
            </tr>';

}
}
$pdf->writeHTML($pdf_eir_vide, false, false, true, false, '');    
//Fin affichage partie commune
    
  
    
    
}//fin controle if, si les conteneurs sont enregistrés
else
{
//$pdf->writeHTML($html, false, false, true, false, '');    
$pdf->Write(0, 'CE PREGATE NE DISPOSE PAS ENCORE DE CONTENEURS', '', 0, 'C', true, 0, false, false, 0);// $pdf->writeHTML($html, false, false, true, false, '');   
}




//Close and output PDF document
$pdf->Output('PREGATE_LINK_LOGISTIC.pdf', 'I');



?>