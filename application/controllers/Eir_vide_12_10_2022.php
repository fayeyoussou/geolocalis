<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eir_vide extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('eir_vide_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
           $this->load->model('mission_model');
         $this->load->model('drivers_model');	

     }

	public function index()
	{
		$data['eir_vide'] = $this->eir_vide_model->getall_eir_vide();
		$this->template->template_render('eir_vide',$data);
	}
/*	public function addeir_videpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_vide_model->getall_facture();
		$data['conteneurlist'] = $this->eir_vide_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_vide_model->getall_vechicle();
		$data['driverlist'] = $this->eir_vide_model->getall_driverlist();

        $data['zonelist'] = $this->eir_vide_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_vide_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_vide_model->getall_carte_peagelist();
 		$data['numeroeir_vide'] = $this->eir_vide_model->get_numeroeir_vide();

        $data['vehicleremorquelist'] = $this->eir_vide_model->getall_vehicle_remorque();
       
        
        $this->template->template_render('eir_vide_pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}*/	
	
	public function addeir_vide()
	{
		
/*		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission_eir_vide')->where('ei_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){*/
		$this->load->model('trips_model');//trip_conteneur

		$data['facturelist'] = $this->eir_vide_model->getall_facture();
		$data['conteneurlist'] = $this->eir_vide_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_vide_model->getall_vechicle();
		$data['driverlist'] = $this->eir_vide_model->getall_driverlist();

        $data['zonelist'] = $this->eir_vide_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_vide_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_vide_model->getall_carte_peagelist();
 		//$data['numeroeir_vide'] = $this->eir_vide_model->get_numeroeir_vide();
           $data['missionlist'] = $this->mission_model->getall_mission();     
        $data['carte_carburantlist'] = $this->eir_vide_model->getall_carte_carburantlist();
        $data['vehicleremorquelist'] = $this->eir_vide_model->getall_vehicle_remorque();			
		//$data['eir_vide'] = $this->eir_vide_model->getall_eir_vide();		
		//$ei_id = $existe['ei_id'];
//		$data['eir_videdetails'] = $this->eir_vide_model->editeir_vide($conteneur);
		$data['eir_vide'] = $this->eir_vide_model->getall_eir_vide();
       $data['mission'] = $this->eir_vide_model->fetch_mission();     
 		$data['pregate'] = $this->eir_vide_model->fetch_pregate();
		
		/*		}else{

		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_vide_model->getall_facture();
		$data['conteneurlist'] = $this->eir_vide_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_vide_model->getall_vechicle();
		$data['driverlist'] = $this->eir_vide_model->getall_driverlist();

        $data['zonelist'] = $this->eir_vide_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_vide_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_vide_model->getall_carte_peagelist();
 //		$data['numeroeir_vide'] = $this->eir_vide_model->get_numeroeir_vide();
        
        $data['carte_carburantlist'] = $this->eir_vide_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->eir_vide_model->getall_vehicle_remorque();
	//	$data['eir_vide'] = $this->eir_vide_model->getall_eir_vide();		
		$data['eir_vide'] = $this->eir_vide_model->getall_eir_vide();
         $data['missionlist'] = $this->mission_model->getall_mission();     
       $data['mission'] = $this->eir_vide_model->fetch_mission();     
		}*/
       
        $this->template->template_render('eir_vide_add',$data);
	}
	public function inserteir_vide()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_vide_model->add_eir_vide($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New eir_vide ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('eir_vide/addeir_vide');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir_vide/addeir_vide');
		}
	}
	public function editeir_vide()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->eir_vide_model->getall_facture();
		$data['conteneurlist'] = $this->eir_vide_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['eir_videdetails'] = $this->eir_vide_model->editeir_vide($e_id);
		$this->template->template_render('eir_vide_add',$data);
	}

	public function updateeir_vide()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_vide_model->updateeir_vide($this->input->post());
			$pregate = $this->input->post();
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

			redirect('conteneur/pregate/'.$pregate['ei_trip_id']);

//					redirect('eir_vide');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect('conteneur/pregate/'.$pregate['ei_trip_id']);
//				    redirect('eir_vide');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir_vide');
		}
	}
	
	
/* BEGIN VIEW eir_vide */
	
	public function eir_vide_details()
	{
		$ei_id = $this->uri->segment(3);
		$eir_videdetails = $this->eir_vide_model->get_eir_videdetails($ei_id);
/*			$bookings = $this->transitaire_model->get_facture($tra_id);
		$conteneur = $this->transitaire_model->get_conteneur($tra_id);
		$customer = $this->transitaire_model->get_customer($tra_id);
		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();*/
		
		//		$geofence_events = $this->geofence_model->countvehiclengeofence_events($tra_id);
		if(isset($eir_videdetails[0]['ei_id'])) {
			$data['eir_videdetails'] = $eir_videdetails[0];
/*			$data['bookings'] = $bookings;
			$data['conteneur'] = $conteneur;
			$data['customer'] = $customer;
			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;*/
			//$data['numeroeir_vide'] = $numeroeir_vide;
			$this->template->template_render('eir_vide_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}	
	
/* END VIEW eir_vide */	

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
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }		
	
 function fetch_information_mission()
 { //echo "bjr";exit;
  if($this->input->post('ei_mission_id'))
  {
   echo $this->eir_vide_model->fetch_information_mission($this->input->post('ei_mission_id'));
  }
 }		
	
}
