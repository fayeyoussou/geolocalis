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
//          $this->load->model('drivers_model');	

     }

	public function index()
	{
		$data['mission'] = $this->mission_model->getall_mission();
		$this->template->template_render('mission',$data);
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
        
               $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();			
			
			
		//$mi_id = $existe['mi_id'];
		$data['missiondetails'] = $this->mission_model->editmission($conteneur);
	//	$this->template->template_render('mission_add',$data);		
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
		
		}
       
        $this->template->template_render('mission_add',$data);
	}
	public function insertmission()
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

			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);
		}
	}
	public function editmission()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['missiondetails'] = $this->mission_model->editmission($e_id);
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
/*			$bookings = $this->transitaire_model->get_facture($tra_id);
		$conteneur = $this->transitaire_model->get_conteneur($tra_id);
		$customer = $this->transitaire_model->get_customer($tra_id);
		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();*/
		
		//		$geofence_events = $this->geofence_model->countvehiclengeofence_events($tra_id);
		if(isset($missiondetails[0]['mi_id'])) {
			$data['missiondetails'] = $missiondetails[0];
/*			$data['bookings'] = $bookings;
			$data['conteneur'] = $conteneur;
			$data['customer'] = $customer;
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
	
	
}
