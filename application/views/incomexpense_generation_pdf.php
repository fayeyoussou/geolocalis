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
        
        
        $this->Image($image_file, 0, 267, 218, '', 'JPG', '', 'T', false, 0, '', false, false, 0, false, false, false);
 
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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


 //controle du modéle de facture
$tbl = '
<table align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td rowspan="3"><h2>Détails du reglement N°: '.$incomexpensedetails['ie_numero_enregistrement'].'</h2></td>
    </tr>
</table>';
 //FIN controle du modéle de facture
    
$pdf->writeHTML($tbl, true, false, false, false, '');

// $t_num_facture = $paiementreglementdetails['facture']->t_num_facture;		
//$banqueemettrice ='';
//$banquereceptrice ='';
if($incomexpensedetails['ie_banque_emettrice_id']!=0){
	 $banqueemettrice = "".$banqueemettrice['ieb_name'];		
}

if($incomexpensedetails['ie_banque_receptrice_id']!=0){
	 $banquereceptrice = $banquereceptrice['ieb_name'];		
}

//if($incomexpensedetails['ie_transitaire_id']!=0){}
	 $transitairereglement = $incomexpensedetails['tra_name'];	
     $montantreglement = 0;
	 $montantreglement = $incomexpensedetails['ie_amount'];

$montantReglementAfficher = number_format($incomexpensedetails['ie_amount'], 0, ',', ' ');

//$pdf->Ln(5);
$pdf->SetFont('freesans', '', 10);
/**/$tbl = '<table width="350"  >
    <tr>
        <td width="130"><b>BANQUE EMETTRICE</b></td>
        <td width="10">:</td>
        <td width="250">'.$banqueemettrice.'</td>
        <td width="130"><b>DATE</b></td>
        <td width="10">:</td>
        <td width="150">'.$incomexpensedetails['ie_date'].'</td>
    </tr>
    <tr>
        <td width="130"><b>BANQUE RECEPTRICE</b></td>
        <td width="10">:</td>
        <td width="250">'.$banquereceptrice.'</td>
        <td width="130"><b>MONTANT</b></td>
        <td width="10">:</td>
        <td width="150">'.$montantReglementAfficher.'</td>
    </tr>
    <tr>
        <td width="130"><b>TRANSITAIRE</b></td>
        <td width="10">:</td>
        <td width="250">'.$transitairereglement.'</td>
        <td width="130"><b>TYPE PAIEMENT</b></td>
        <td width="10">:</td>
        <td width="150">'.$incomexpensedetails['ie_espece_cheque'].'</td>
    </tr>
	
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');



$pdf->Ln(10);
//$pdf->writeHTML($tbl, true, false, false, false, '');

    $pdf->SetFont('dejavuserifcondensed', '', 12);


//$pdf->Ln(6);
/* $count=0;
$montanttotal=0;
$montantTVA=0;
$montant_total=""; 
$montantTTCAfficher =0;
$montant_lettre="";

if($conteneurdetails!='')// Debut du controle if
{

if((($incomexpense_generation['t_type_facturation'])=="Exportation") || (($incomexpense_generation['t_type_facturation'])=="Transport")) 
{// Debut du controle if
*/


$html = '<table border="0" cellspacing="0" align="center" width="100%" > 
        <tr height="20" style="color:#000;border:1px solid #000;">
            <th width="10%"><h5>N°</h5></th>
            <th width="20%"><h5>FACTURE</h5></th>
            <th width="35%"><h5>CLIENT</h5></th>
            <th width="20%"><h5>MONTANT FACTURE</h5></th>
            <th width="15%"><h5>MONTANT</h5></th>
		</tr>         
         <tbody>';    


    
    $pdf->SetFont('dejavuserifcondensed', '', 11);

//$pdf->writeHTML($html, false, false, true, false, '');  

//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

/* DEBUT DETENTION*/
$count=0;
$montanttotal=0;

if(!empty($paiementreglementdetails)){
	
	foreach($paiementreglementdetails as $paiementreglementdetails){ 
$count++;
$montanttotal += $paiementreglementdetails['tp_amount'];
$facture_name = '';	
$t_type_facturation = '';	 		
$t_trip_amount = 0;		
 $t_num_facture = $paiementreglementdetails['facture']->t_num_facture;		
 //$t_type_facturation = $paiementreglementdetails['facture_name']->t_type_facturation;		
 $t_trip_amount = $paiementreglementdetails['facture']->t_trip_amount;		
 $c_name = $paiementreglementdetails['client']->c_name;		
 $tra_name = $paiementreglementdetails['transitaire']->tra_name;		
		
		         if(($count%2)==0)
         {

             $html .= '
                     <tr height="100" style="background-color:#000000;color:#000000;border:1px solid #000;">';
         }  
         else
         {
              $html .= '
                     <tr height="100" style="background-color:#FFFFFF;color:#000000;border:1px solid #000;">';    
         }
 $montanttotaltp_amount = number_format($paiementreglementdetails['tp_amount'], 0, ',', ' ');
            
              $html .=  '

                    <td width="10%">'.$count.'</td>
                    <td width="20%">'.$t_num_facture.'</td>
                    <td width="35%">'.$c_name.'</td>
                    <td width="20%">'.$t_trip_amount.'</td>
                    <td width="15%">'.$montanttotaltp_amount.'</td>
                    </tr>';


	}// Fin foreach    
$montantreglementAfficher = number_format($montantreglement, 0, ',', ' ');
$montanttotalAfficher = number_format($montanttotal, 0, ',', ' ');

  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td>Montant du réglement</td>
            <td>'.$montantreglementAfficher.'</td>
            </tr></h5>'; 

	  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td>Montant total factures</td>
            <td>'.$montanttotalAfficher.'</td>
            </tr></h5>'; 

	$montantrestant = 0;
	$montantrestant = $montantreglement - $montanttotal;
    $montantrestantAfficher = number_format($montantrestant, 0, ',', ' ');
	
	if($montantreglement > $montanttotal){
	  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td>Montant restant</td>
            <td>'.$montantrestantAfficher.'</td>
            </tr></h5>'; 
}else if($montantreglement - $montanttotal == 0){
	  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td>Réglement épuisé </td>
            <td>'.$montantrestantAfficher.'</td>
            </tr></h5>';	
	
}else {
	  $html .= '<h5><tr style="background-color:#F2F2F2;color:#000000;">
            <td></td>
            <td></td>
            <td>Avoir de </td>
            <td>'.$montantrestantAfficher.'</td>
            </tr></h5>';		
	}		
	
	
	$pdf->writeHTML($html, false, false, true, false, '');     
   
}//fin controle if, si les conteneurs sont enregistrés
	else
{
//$pdf->writeHTML($html, false, false, true, false, '');    
	$pdf->Write(0, 'CE REGLEMENT NE DISPOSE PAS ENCORE DE PAIEMENTS', '', 0, 'C', true, 0, false, false, 0);// $pdf->writeHTML($html, false, false, true, false, '');   
}

//Close and output PDF document
$pdf->Output('LINK_LOGISTIC_'.$incomexpensedetails['ie_numero_enregistrement'].'.pdf', 'I');

?>