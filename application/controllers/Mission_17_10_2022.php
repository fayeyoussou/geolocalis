<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mission extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('mission_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
          $this->load->model('pregate_model');	

     }

	public function index()
	{
		$data['mission'] = $this->mission_model->getall_mission();
 		$data['country'] = $this->mission_model->fetch_country();
		$this->template->template_render('mission',$data);
	}
	
	 function ajax_pregate_conteneur()
 {
		 
	  if($this->input->post('pr_trip_id'))
	  {
		   echo $this->mission_model->ajax_pregate_conteneur($this->input->post('pr_trip_id'));
	  }
		 
 }
	
/*	public function addmissionpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
       
        
        $this->template->template_render('mission_pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}*/	
	
	public function addmission()
	{
		
		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){
		$this->load->model('trips_model');//trip_conteneur

		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
  		//$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();  
	//	$data['website_setting'] = $this->mission_model->get_price();
		$data['website_setting'] = $this->mission_model->websitesetting_price();
	
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();				$data['mission'] = $this->mission_model->getall_mission();
	
			
 		$data['country'] = $this->mission_model->fetch_country();
			
		//$mi_id = $existe['mi_id'];
		$data['missiondetails'] = $this->mission_model->editmission($conteneur);
	//	$this->template->template_render('mission_add',$data);		
			
 		$data['pregate'] = $this->mission_model->fetch_pregate();
  		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_restitution'] = $this->mission_model->fetch_lieu_restitution();
	
		}else{

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
        
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
		$data['mission'] = $this->mission_model->getall_mission();
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_restitution'] = $this->mission_model->fetch_lieu_restitution();
		
		$data['website_setting'] = $this->mission_model->websitesetting_price();
		
		}
       
        $this->template->template_render('mission_add',$data);
	}
	
	
/*	public function insertmission()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->mission_model->add_mission($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('pr_statut').' mission ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('mission/addmission');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('mission/addmission');
		}
	}*/
	
	
	public function insertmission()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$mission = $this->input->post();
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id'];
		$mi_conteneur_id = $mission['mi_conteneur_id'];
        
		$mi_lieu_restitution_id = $mission['mi_lieu_restitution_id'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];		
			
	$addincomexpense = array('mi_vehicle_id'=>$mi_vehicle_id,'mi_bon_carburant_id'=>$mi_bon_carburant_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_conteneur_id'=>$mi_conteneur_id,'mi_lieu_restitution_id'=>$mi_lieu_restitution_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero); /**/  
			
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	$response = $this->mission_model->add_mission($this->input->post());
		
 if($response)   {   
//fuel_bon_carburant

$bc_restant = 0;	 
$bc_restant = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $mi_bon_carburant_id)->get()->row()->bc_restant;
/*$ie_banque_emettrice_id = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_banque_emettrice_id;
$ie_banque_receptrice_id = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_banque_receptrice_id;
$ie_numero = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_numero;
$ie_numero_enregistrement_reglement = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_numero_enregistrement;	*/ 

$bc_qte_restant = '';	 
$bc_qte_restant = $bc_restant - $mi_quantite_carburant;	 

	 
$dataCompteur_incomexpense = array(
   
   'bc_restant' => $bc_qte_restant
);	 
	 
		$this->db->where('bc_id',$mi_bon_carburant_id);
		        $this->db->update('fuel_bon_carburant',$dataCompteur_incomexpense); /*	*/
/*echo $modif= "UPDATE fuel_bon_carburant
SET bc_restant = '$bc_qte_restant' WHERE bc_id=".$mi_bon_carburant_id;//exit;*/
	 
/*$dataCompteur_incomexpense = array(
   'bc_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->update('fuel_bon_carburant', $dataCompteur_incomexpense); */       
	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New  added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}	
	
	
	public function editmission()
	{
		$mi_id = $this->uri->segment(3);		
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
//		$e_id = $this->uri->segment(3);
		
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();
		
		$data['missiondetails'] = $this->mission_model->editmission($mi_id);
		$this->template->template_render('mission_add',$data);
	}

	public function updatemission()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->mission_model->updatemission($this->input->post());
			$pregate = $this->input->post();
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);

//					redirect('mission');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);
//				    redirect('mission');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('mission');
		}
	}
	
	
/* BEGIN VIEW MISSION */
	
	public function mission_details()
	{
		$mi_id = $this->uri->segment(3);
		$missiondetails = $this->mission_model->get_missiondetails($mi_id);
		$eir_vide = $this->mission_model->get_eir_vide($mi_id);
//		$pregate = $this->pregate_model->get_pregate_mission($mi_id);
		$eir_plein = $this->mission_model->get_eir_plein($mi_id);
/*		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();*/
		
		//		$geofence_events = $this->geofence_model->countvehiclengeofence_events($tra_id);
		if(isset($missiondetails[0]['mi_id'])) {
			$data['missiondetails'] = $missiondetails[0];
			$data['eir_vide'] = $eir_vide;
			$data['eir_plein'] = $eir_plein;
/*			$data['customer'] = $customer;
			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;*/
			//$data['numeromission'] = $numeromission;
			$this->template->template_render('mission_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}	
	
/* END VIEW MISSION */	
	
/*BEGIN AJAX*/
/**/	
 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	
 function fetch_information()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	

	
 function fetch_state()
 { //echo "bjr";exit;
  if($this->input->post('country_id'))
  {
   echo $this->mission_model->fetch_state($this->input->post('country_id'));
  }
 }

 function fetch_city()
 {exit;
  if($this->input->post('state_id'))
  {
   echo $this->mission_model->fetch_city($this->input->post('state_id'));
  }
 }	
/*END AJAX*/	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_bon_carburant()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id'))
  {
   echo $this->mission_model->fetch_bon_carburant($this->input->post('mi_vehicle_id'));
  }
 }
/* END AJAX VEHICULE*/	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_bon_carburant_quantite()
 { //echo "bjr";exit;
  if($this->input->post('mi_bon_carburant_id'))
  {
   echo $this->mission_model->fetch_bon_carburant_quantite($this->input->post('mi_bon_carburant_id'));
  }
 }
/* END AJAX VEHICULE*/	
	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_lieu_restitution()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_lieu_restitution($this->input->post('mi_trip_id'));
  }
 }
/* END AJAX VEHICULE*/		
	
}
