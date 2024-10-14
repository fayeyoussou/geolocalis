<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class eir_plein extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('eir_plein_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
           $this->load->model('pregate_model');	
         $this->load->model('mission_model');
         $this->load->model('drivers_model');	

     }

	public function index()
	{
		$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein();
		$this->template->template_render('eir_plein',$data);
	}
/*	public function addeir_pleinpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_plein_model->getall_facture();
		$data['conteneurlist'] = $this->eir_plein_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_plein_model->getall_vechicle();
		$data['driverlist'] = $this->eir_plein_model->getall_driverlist();

        $data['zonelist'] = $this->eir_plein_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_plein_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_plein_model->getall_carte_peagelist();
 		$data['numeroeir_plein'] = $this->eir_plein_model->get_numeroeir_plein();

        $data['vehicleremorquelist'] = $this->eir_plein_model->getall_vehicle_remorque();
       
        
        $this->template->template_render('eir_plein_pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}*/	
	
	public function addeir_plein()
	{
		
/*		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission_eir_plein')->where('ei_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){*/
		$this->load->model('trips_model');//trip_conteneur

		if(isset($_POST['incomeexpensereport'])) {
			$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'));

		}			
			else{
		$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein();
			}		
		
		
		$data['facturelist'] = $this->eir_plein_model->getall_facture();
		$data['conteneurlist'] = $this->eir_plein_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_plein_model->getall_vechicle();
		$data['driverlist'] = $this->eir_plein_model->getall_driverlist();

        $data['zonelist'] = $this->eir_plein_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_plein_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_plein_model->getall_carte_peagelist();
 		//$data['numeroeir_plein'] = $this->eir_plein_model->get_numeroeir_plein();
        $data['missionlist'] = $this->mission_model->getall_mission();     
        $data['carte_carburantlist'] = $this->eir_plein_model->getall_carte_carburantlist();
        $data['vehicleremorquelist'] = $this->eir_plein_model->getall_vehicle_remorque();			

//		$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein();
        $data['mission'] = $this->eir_plein_model->fetch_mission();     
 		$data['pregate'] = $this->eir_plein_model->fetch_pregate();
		
		/*		}else{

		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_plein_model->getall_facture();
		$data['conteneurlist'] = $this->eir_plein_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_plein_model->getall_vechicle();
		$data['driverlist'] = $this->eir_plein_model->getall_driverlist();

        $data['zonelist'] = $this->eir_plein_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_plein_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_plein_model->getall_carte_peagelist();
 //		$data['numeroeir_plein'] = $this->eir_plein_model->get_numeroeir_plein();
        
        $data['carte_carburantlist'] = $this->eir_plein_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->eir_plein_model->getall_vehicle_remorque();
	//	$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein();		
		$data['eir_plein'] = $this->eir_plein_model->getall_eir_plein();
         $data['missionlist'] = $this->mission_model->getall_mission();     
       $data['mission'] = $this->eir_plein_model->fetch_mission();     
		}*/
       
        $this->template->template_render('eir_plein_add',$data);
	}
	public function inserteir_plein()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_plein_model->add_eir_plein($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New eir_plein ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('eir_plein/addeir_plein');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir_plein/addeir_plein');
		}
	}
	
	
	public function editeir_plein()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->eir_plein_model->getall_facture();
		$data['conteneurlist'] = $this->eir_plein_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['eir_pleindetails'] = $this->eir_plein_model->editeir_plein($e_id);
		$this->template->template_render('eir_plein_add',$data);
	}

	public function updateeir_plein()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_plein_model->updateeir_plein($this->input->post());
			$pregate = $this->input->post();
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

			redirect('conteneur/pregate/'.$pregate['ei_trip_id']);

//					redirect('eir_plein');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect('conteneur/pregate/'.$pregate['ei_trip_id']);
//				    redirect('eir_plein');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir_plein');
		}
	}
	
	
/* BEGIN VIEW eir_plein */
	
	public function eir_plein_details()
	{
		$ei_id = $this->uri->segment(3);
		$eir_pleindetails = $this->eir_plein_model->get_eir_pleindetails($ei_id);
/*			$bookings = $this->transitaire_model->get_facture($tra_id);
		$conteneur = $this->transitaire_model->get_conteneur($tra_id);
		$customer = $this->transitaire_model->get_customer($tra_id);
		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();*/
		
		//		$geofence_events = $this->geofence_model->countvehiclengeofence_events($tra_id);
		if(isset($eir_pleindetails[0]['ei_id'])) {
			$data['eir_pleindetails'] = $eir_pleindetails[0];
/*			$data['bookings'] = $bookings;
			$data['conteneur'] = $conteneur;
			$data['customer'] = $customer;
			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;*/
			//$data['numeroeir_plein'] = $numeroeir_plein;
			$this->template->template_render('eir_plein_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}	
	
/* END VIEW eir_plein */	

	/*BEGIN AJAX*/
 function fetch_mission()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	/*END AJAX*/

 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->eir_plein_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }		
	
 function fetch_information_mission()
 { //echo "bjr";exit;
  if($this->input->post('mi_lieu_restitution_id'))
  {
   echo $this->eir_plein_model->fetch_information_mission($this->input->post('mi_lieu_restitution_id'));
  }
 }	
	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_lieu_restitution()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->eir_plein_model->fetch_lieu_restitution($this->input->post('mi_trip_id'));
  }
 }
/* END AJAX VEHICULE*/		
	
}
