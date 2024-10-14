<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_bon_carburant extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_bon_carburant_model');
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->model('fuel_compagnie_model');
          $this->load->model('vehicle_model');
          $this->load->model('trips_model');
          $this->load->model('drivers_model');
          $this->load->model('fuel_compagnie_model');
 //         $this->load->model('trips_model');
          $this->load->library('tcpdf_Pdf_Library');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$this->template->template_render('fuel_bon_carburant',$data);
	}
	
	public function addfuel_bon_carburant()
	{
		$this->load->model('trips_model');

		
 		$data['numerobon_carburant'] = $this->fuel_bon_carburant_model->get_numerocarburant();
		
		$data['numerobon_carburant_payments'] = $this->fuel_bon_carburant_model->get_numerocarburantpayments();


				
				if(isset($_POST['journal_bon_carburant'])) {
			$data['fuel_journal_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));//exit;

		}			
			else{
		}
		
			$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		//$data['numerobon_carburant_payments'] = $this->fuel_bon_carburant_model->get_numerocarburantpayments();		
			/*$data['numerobon_carburant_payments'] = $this->fuel_bon_carburant_model->get_numerocarburant_payments1();*/	
		
			$data['fuel_bon_carburant_tab_paiement_list'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant_paiement();
		
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();	
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant();
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();
		$data['station_service'] = $this->fuel_bon_carburant_model->fetch_station_service();

		//$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['paiement_fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getpaiement_fuel_bon_carburant();
		$data['paiement_fuel_bon_carburantlist'] = $this->fuel_bon_carburant_model->getallpaiement_fuel_bon_carburant();

		$data['journal_list'] = $this->fuel_bon_carburant_model->getallpaiement_fuel_bon_carburant();		
		
		//$data['fuel_bon_carburant_tab_paiement_list'] = $this->fuel_bon_carburant_model->getallpaiement_fuel_bon_carburant();

		$this->template->template_render('fuel_bon_carburant_add',$data);
	}
	
	public function insertfuel_bon_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$bon_carburant = $this->input->post();

/*BEGIN ADD*/
		$bc_quantite = $bon_carburant['bc_quantite'];			
		$bc_numero = $bon_carburant['bc_numero'];			
		$bc_vehicule_id = $bon_carburant['bc_vehicule_id'];			
		$bc_date = $bon_carburant['bc_date'];			
		$bc_quantite = $bon_carburant['bc_quantite'];			
		$bc_desc = $bon_carburant['bc_desc'];			
		$bc_created_date = $bon_carburant['bc_created_date'];	
		$bc_compagnie_id = $bon_carburant['bc_compagnie_id'];		
		$bc_driver_id = $bon_carburant['bc_driver_id'];

	    $quantite_restante = 0;

//Prix du litre du carburant	
			$montant_carburant = 0;
			$prix_carburant = 0;
			$prix_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;

$montant_carburant = $prix_carburant * $bc_quantite;			

/* DEBUT VERIFICATION QUANTITE CARBURANT*/			
/*	    $requete_quantite_carb_vehicule = '';
	    $quantite_carb_vehicule = 0;
			
	 $requete_quantite_carb_vehicule = "v_id=$bc_vehicule_id";

  $this->db->where($requete_quantite_carb_vehicule);
//  $this->db->order_by('bc_id', 'desc');
  $query_quantite_carb_vehicule = $this->db->get('vehicles');
$row_quantite_carb_vehicule = $query_quantite_carb_vehicule->row();
	 $quantite_carb_vehicule_restant = 0;
	 if($row_quantite_carb_vehicule != ''){
		$quantite_carb_vehicule_restant = $row_quantite_carb_vehicule->v_quantite_restant;	
		 $nouvelle_quantite_carb_vehicule_restant = $quantite_carb_vehicule_restant + $bc_quantite;
	 }			

$data_maj_vehicule = '';			
$data_maj_vehicule = array('v_quantite_restant' => $nouvelle_quantite_carb_vehicule_restant);	 
	 
		$this->db->where('v_id',$bc_vehicule_id);
		$this->db->update('vehicles',$data_maj_vehicule);			
*/
			
/* FIN VERIFICATION QUANTITE CARBURANT*/			
			
		
			
			
/*$requete='';	 
$restant=0;	 

$requete = "bc_vehicule_id=$bc_vehicule_id";

  $this->db->where($requete);
  $this->db->order_by('bc_id', 'desc');
  $query = $this->db->get('fuel_bon_carburant');
$row_quantite = $query->row();
	 $carburant_restant = 0;
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->bc_restant;		 
	 }
			
		$quantite_restante_vehicule =0;
			$quantite_restante_vehicule = $carburant_restant+$bc_quantite;	*///exit;		

	$add_bon_carburant = array('bc_numero'=>$bc_numero,'bc_vehicule_id'=>$bc_vehicule_id,'bc_date'=>$bc_date,'bc_quantite'=>$bc_quantite,'bc_desc'=>$bc_desc,'bc_created_date'=> $bc_created_date,'bc_compagnie_id'=>$bc_compagnie_id,'bc_driver_id'=>$bc_driver_id,'bc_montant'=>$montant_carburant);		
			
		$response = $this->db->insert('fuel_bon_carburant',$add_bon_carburant);			

			
$dataCompteur_bon_carburant = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('trip_compteur_bon_carburant', $dataCompteur_bon_carburant);			
			
/*DEBUT INSERTION TABLE JOURNAL*/
/*			$fuel_journal_carburant_id = 0;	
			$fuel_journal_carburant_id= $this->db->insert_id();	
			$fjc_type='';
			$fjc_type='BON CARBURANT';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_bc_id'=>$fuel_journal_carburant_id,'fjc_bc_numero'=>$bc_numero,'fjc_v_id'=>$bc_vehicule_id,'fjc_date'=>$bc_date,'fjc_quantite'=>$bc_quantite,'fjc_description'=>$bc_desc,'fjc_created_date'=> $bc_created_date,'fjc_comp_id'=>$bc_compagnie_id,'fjc_type'=>$fjc_type);		
			
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);*/		//echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL*/				
			

			
			
			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}
	}

/*BEGIN PAIEMENT*/	
	
	public function insert_paiementfuel_bon_carburant()
	{


		$bon_carburant = $this->input->post();
		$ccrp_numero = $bon_carburant['ccrp_numero'];		
		$ccrp_date = $bon_carburant['ccrp_date'];
		$ccrp_compagnie_id = $bon_carburant['ccrp_compagnie_id'];
			
	$addincomexpense = array('ccrp_numero'=>$ccrp_numero,'ccrp_date'=>$ccrp_date,'ccrp_compagnie_id'=>$ccrp_compagnie_id,'ccrp_bon_carburant_id'=> implode(',', (array) $this->input->post('ccrp_bon_carburant_id'))); //exit; /**/  
			
	  $response = $this->fuel_bon_carburant_model->add_fuel_bon_carburant($addincomexpense);
		
$dataCompteur_bon_carburant_paiement = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('fuel_carte_carburant_recharge_payments_compteur', $dataCompteur_bon_carburant_paiement);		
			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel_bon_carburant/addfuel_bon_carburant');

	}	
/*END PAIEMENT*/	
	
	
	public function editfuel_bon_carburant()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fuel_bon_carburantdetails'] = $this->fuel_bon_carburant_model->editfuel_bon_carburant($f_id);
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();		
		$this->template->template_render('fuel_bon_carburant_add',$data);
	}

	public function updatefuel_bon_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_bon_carburant_model->updatefuel_bon_carburant($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('fuel_bon_carburant/addfuel_bon_carburant');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('fuel_bon_carburant/addfuel_bon_carburant');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}
	}
	

	public function journal($from,$to,$v_id) { 
		$fuel_bon_carburant = array();
		if($v_id=='all') {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to);
		} else {
			$where = array('bc_date>='=>$from,'bc_date<='=>$to,'bc_vehicule_id'=>$v_id);
		}
		
		$fuel_bon_carburant = $this->db->select('*')->from('fuel_bon_carburant')->where($where)->order_by('bc_id','desc')->get()->result_array();
		if(!empty($fuel_bon_carburant)) {
			foreach ($fuel_bon_carburant as $key => $fuel_bon_carburants) {
				$newfuel_bon_carburant[$key] = $fuel_bon_carburants;
				$newfuel_bon_carburant[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$fuel_bon_carburants['bc_vehicule_id'])->get()->row();
				$newfuel_bon_carburant[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$fuel_bon_carburants['bc_driver_id'])->get()->row();
			}
			return $newfuel_bon_carburant;
		} else 
		{
			return array();
		}
	}	
	
	
 function fetch_numero_bon_commande()
 { //echo "bjr";exit;
  if($this->input->post('fetch_numero_bon_commande'))
  {
   echo $this->fuel_bon_carburant_model->fetch_numero_bon_commande($this->input->post('fetch_numero_bon_commande'));
  }
 }	
	
 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->fuel_bon_carburant_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	
	
/*DEBUT VALIDATION PAIEMENT BON CARBURANT*/	

	public function fuel_bon_carburant_paiement_validation()
	{
		$id = $this->uri->segment(3);
        $ccrp_statut=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        'ccrp_statut' => $ccrp_statut
);

$this->db->where('ccrp_id', $id);
$response = $this->db->update('fuel_carte_carburant_recharge_payments', $data);  

		if($response) {
			$this->session->set_flashdata('successmessage', 'Paiement Bon carburant validé avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Paiement Bon carburant non validé');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('fuel_bon_carburant/addfuel_bon_carburant');
		
		redirect('reports/bon_carburant');	
	
	}
/*FIN VALIDATION PAIEMENT BON CARBURANT*/	
	
	public function fuel_bon_carburant_validation()
	{
		$id = $this->uri->segment(3);
        $bc_type=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        'bc_type' => $bc_type
);

$this->db->where('bc_id', $id);
$response = $this->db->update('fuel_bon_carburant', $data);        

		
/*DEBUT VALIDATION */		
/*RECUPERATION DONNEES DE LA MISSION*/
		$requete_bc='';	 
$restant_bc=0;	 
$row_bc = "";		
//$requete="";	 
	 $requete_bc = "bc_id=$id";

  $this->db->where($requete_bc);
 // $this->db->order_by('mi_id', 'desc');
  $query = $this->db->get('fuel_bon_carburant');
  $row_bc = $query->row();

		if($row_bc != ''){
			
		$bc_quantite = $row_bc->bc_quantite;			
		$bc_numero = $row_bc->bc_numero;			
		$bc_vehicule_id = $row_bc->bc_vehicule_id;			
		$bc_date = $row_bc->bc_date;			
		//$bc_quantite = $row_bc->bc_quantite;			
		$bc_desc = $row_bc->bc_desc;			
		$bc_created_date = $row_bc->bc_created_date;	
		$bc_compagnie_id = $row_bc->bc_compagnie_id;			
	 }		
/*FIN RECUPERATION DONNEES DE LA MISSION*/		
	 
/*DEBUT INSERTION TABLE JOURNAL*/
			
			$fjc_type='';
			$fjc_type='BON CARBURANT';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_bc_id'=>$id,'fjc_bc_numero'=>$bc_numero,'fjc_v_id'=>$bc_vehicule_id,'fjc_date'=>$bc_date,'fjc_quantite'=>$bc_quantite,'fjc_description'=>$bc_desc,'fjc_created_date'=> $bc_created_date,'fjc_comp_id'=>$bc_compagnie_id,'fjc_type'=>$fjc_type);		
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);		//echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL*/			
		
/*DEBUT INSERTION TABLE JOURNAL AGS*/

		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL AGS */		

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

		$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$bc_vehicule_id";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = 0;
	 $carburant_quantite_totale = 0;
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
		$carburant_quantite_totale = $row_quantite->v_quantite_totale;
		
	 }
$quantite_carburant_restant = 0;	 
$quantite_carburant_totale = 0;	 
$quantite_carburant_restant = $carburant_restant + $bc_quantite;		
$quantite_carburant_totale = $carburant_quantite_totale + $bc_quantite;		
		$this->db->where('v_id',$bc_vehicule_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); 		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/			
		
	/*	$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$bc_vehicule_id";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = 0;
	 $carburant_quantite_totale = 0;
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
		$carburant_quantite_totale = $row_quantite->v_quantite_totale;
		
	 }
$quantite_carburant_restant = 0;	 
$quantite_carburant_totale = 0;	 
$quantite_carburant_restant = $carburant_restant + $mi_quantite_carburant;		
$quantite_carburant_totale = $carburant_quantite_totale + $mi_quantite_carburant;		
		$this->db->where('v_id',$bc_vehicule_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); */		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/		 
		
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Bon carburant validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Bon carburant non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('fuel_bon_carburant/addfuel_bon_carburant');
		
		redirect('reports/bon_carburant');
		
	}    
   
    
    /*Fin Validation*/    	

public function fuel_bon_carburant_pdf()
	{
		$data = array();
		$bc_id = $this->uri->segment(3);
		$fuel_bon_carburantdetails= $this->fuel_bon_carburant_model->editfuel_bon_carburant($bc_id);	
		//$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($fuel_bon_carburantdetails[0]['bc_id'])) {
			
            $data['bon_carburantdetails'] = $fuel_bon_carburantdetails[0];
			
/*			$driverdetails = $this->drivers_model->get_driverdetails($fuel_bon_carburantdetails[0]['bc_driver_id']);
			
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';*/
			
// pour afficher la compagnie 
            $compagniedetails = $this->fuel_compagnie_model->get_fuel_compagniedetails($fuel_bon_carburantdetails[0]['bc_compagnie_id']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['ccc_id']))?$compagniedetails[0]:'';
			

			$vechicledetails = $this->vehicle_model->get_vehicledetails($fuel_bon_carburantdetails[0]['bc_vehicule_id']);		
			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';

			
			$driverdetails = $this->drivers_model->get_driverdetails($fuel_bon_carburantdetails[0]['bc_driver_id']);
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
			
			
/*			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';			
			
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();*/
			
		/*$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['bon_carburantdetails'] = $this->fuel_bon_carburant_model->editfuel_bon_carburant($fuel_bon_carburantdetails[0]['bc_id']);
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();*/				
			
			
			//$vechicledetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			//$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['bc_driver_id']);
			/*$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
            
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
            
 
            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
            //$zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);            
//            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';            
// pour afficher la compagnie 
            $compagniedetails = $this->compagnie_model->get_compagniedetails($facturedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';*/ 
            
            }
		$this->load->view('fuel_bon_carburant_pdf',$data);
	}	

	
public function fuel_bon_carburant_paiement_pdf()
	{
		$data = array();
		$bc_id = $this->uri->segment(3);
		$fuel_bon_carburantdetails= $this->fuel_bon_carburant_model->fuel_bon_carburant_paiement_pdf($bc_id);	
		//$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($fuel_bon_carburantdetails[0]['ccrp_id'])) {
			
            $data['bon_carburantdetails'] = $fuel_bon_carburantdetails[0];
			
/*
            $compagniedetails = $this->fuel_compagnie_model->get_fuel_compagniedetails($fuel_bon_carburantdetails[0]['bc_compagnie_id']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['ccc_id']))?$compagniedetails[0]:'';
			

			$vechicledetails = $this->vehicle_model->get_vehicledetails($fuel_bon_carburantdetails[0]['bc_vehicule_id']);		
			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';

			
			$driverdetails = $this->drivers_model->get_driverdetails($fuel_bon_carburantdetails[0]['bc_driver_id']);
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';*/
			
            }
		$this->load->view('fuel_bon_carburant_paiement_pdf',$data);
	}	

public function fuel_bon_carburant_delete()
	{
		$st_id = $this->uri->segment(3);
		$returndata = $this->fuel_bon_carburant_model->fuel_bon_carburant_delete($st_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Bon Carburant supprimé avec succés...');
			redirect('fuel_bon_carburant/addfuel_bon_carburant');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Some vechicle are mapped with this group. Please remove from vechicle management');
		    redirect('fuel_bon_carburant/addfuel_bon_carburant');
		}
	}	
	
}
