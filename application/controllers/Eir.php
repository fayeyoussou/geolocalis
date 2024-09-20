<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class eir extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('eir_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
           $this->load->model('pregate_model');	
         $this->load->model('mission_model');
         $this->load->model('drivers_model');	

     }

/*BEGIN EIR PLEIN*/	
	
	public function index()
	{
		$data['eir_plein'] = $this->eir_model->getall_eir_plein();
		$data['eir_vide'] = $this->eir_model->getall_eir_vide();

		$this->template->template_render('eir_plein',$data);
	}
/*	public function addeir_pleinpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_model->getall_facture();
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_model->getall_vechicle();
		$data['driverlist'] = $this->eir_model->getall_driverlist();

        $data['zonelist'] = $this->eir_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_model->getall_carte_peagelist();
 		$data['numeroeir_plein'] = $this->eir_model->get_numeroeir_plein();

        $data['vehicleremorquelist'] = $this->eir_model->getall_vehicle_remorque();
       
        
        $this->template->template_render('eir_plein_pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}*/	
	
	public function addeir_plein_vide()
//	public function addeir_plein()
	{
		
/*		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission_eir_plein')->where('ei_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){*/
		$this->load->model('trips_model');//trip_conteneur

		if(isset($_POST['incomeexpensereport'])) {
			$data['eir_plein'] = $this->eir_model->getall_eir_plein_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'));

		}			
			else{
		$data['eir_plein'] = $this->eir_model->getall_eir_plein();
		$data['eir_vide'] = $this->eir_model->getall_eir_vide();
			}		
		
		
		$data['facturelist'] = $this->eir_model->getall_facture();
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_model->getall_vechicle();
		$data['driverlist'] = $this->eir_model->getall_driverlist();

        $data['zonelist'] = $this->eir_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_model->getall_carte_peagelist();
 		//$data['numeroeir_plein'] = $this->eir_model->get_numeroeir_plein();
        $data['missionlist'] = $this->mission_model->getall_mission();     
        $data['carte_carburantlist'] = $this->eir_model->getall_carte_carburantlist();
        $data['vehicleremorquelist'] = $this->eir_model->getall_vehicle_remorque();			

//		$data['eir_plein'] = $this->eir_model->getall_eir_plein();
        $data['mission'] = $this->eir_model->fetch_mission();     
 		$data['pregate'] = $this->eir_model->fetch_pregate();
		

        $this->template->template_render('eir_add',$data);
	}
	
	
	public function inserteir_plein()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_model->add_eir_plein($this->input->post());
			if($response) {
				
/* BEGIN MODIFICATION*/

		$this->db->where('t_id',$this->input->post('ei_pregate_id'));
			$dataCompteur_facture = array('t_statut_id' => '4');
		$this->db->update('trips', $dataCompteur_facture); 

				
		$this->db->where('pr_trip_id',$this->input->post('ei_pregate_id'));
			$dataPregate_statut = array('pr_statut' => '2');
		$this->db->update('trip_pregate', $dataPregate_statut); 				
/*END MODIFICATION*/				
				
				$this->session->set_flashdata('successmessage', 'New eir_plein ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('eir/addeir_plein_vide');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir/addeir_plein_vide');
		}
	}
	
	
	public function editeir_plein()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
 		$data['pregate'] = $this->eir_model->fetch_pregate_edit();
		$data['facturelist'] = $this->eir_model->getall_facture();
		//$data['conteneurlist'] = $this->mission_model->getall_conteneur();		
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['eir_pleindetails'] = $this->eir_model->editeir_plein($e_id);

		$this->template->template_render('eir_add',$data);
	}

	public function updateeir_plein()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_model->updateeir_plein($this->input->post());
			$pregate = $this->input->post();
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

			redirect('conteneur/pregate/'.$pregate['ei_trip_id']);

//					redirect('eir_plein');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			//redirect('conteneur/pregate/'.$pregate['ei_trip_id']);
				    redirect('eir/addeir_plein_vide');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir/addeir_plein_vide');
		}
	}
	
	
/* BEGIN VIEW eir_plein */
	
	public function eir_plein_details()
	{
		$ei_id = $this->uri->segment(3);
		$eir_pleindetails = $this->eir_model->get_eir_pleindetails($ei_id);
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
   echo $this->eir_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	
	
 function fetch_conteneur_vide()
 { //echo "bjr";exit;
  if($this->input->post('ei_trip_id'))
  {
   echo $this->eir_model->fetch_conteneur($this->input->post('ei_trip_id'));
  }
 }		
	
 function fetch_information_mission()
 { //echo "bjr";exit;
  if($this->input->post('mi_lieu_restitution_id'))
  {
   echo $this->eir_model->fetch_information_mission($this->input->post('mi_lieu_restitution_id'));
  }
 }	
	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_lieu_restitution()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->eir_model->fetch_lieu_restitution($this->input->post('mi_trip_id'));
  }
 }
	
	 function fetch_lieu_restitution_vide()
 { //echo "bjr";exit;
  if($this->input->post('ei_trip_id'))
  {
   echo $this->eir_model->fetch_lieu_restitution($this->input->post('ei_trip_id'));
  }
 }	
/* END AJAX VEHICULE*/		

/*END EIR PLEIN*/	
	
	
	
/*BEGIN EIR VIDE*/	
	
	public function addeir_vide()
	{
		
/*		$facture = "";
		$conteneur = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission_eir_vide')->where('ei_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){*/
		$this->load->model('trips_model');//trip_conteneur

		if(isset($_POST['incomeexpensereport'])) {
			$data['eir_vide'] = $this->eir_model->getall_eir_vide_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'));

		}			
			else{
		$data['eir_vide'] = $this->eir_model->getall_eir_vide();
			}		
				
		
		$data['facturelist'] = $this->eir_model->getall_facture();
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_model->getall_vechicle();
		$data['driverlist'] = $this->eir_model->getall_driverlist();

        $data['zonelist'] = $this->eir_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_model->getall_carte_peagelist();
 		//$data['numeroeir_vide'] = $this->eir_model->get_numeroeir_vide();
           $data['missionlist'] = $this->mission_model->getall_mission();     
        $data['carte_carburantlist'] = $this->eir_model->getall_carte_carburantlist();
        $data['vehicleremorquelist'] = $this->eir_model->getall_vehicle_remorque();			

//		$data['eir_vide'] = $this->eir_model->getall_eir_vide();
       $data['mission'] = $this->eir_model->fetch_mission();     
 		$data['pregate'] = $this->eir_model->fetch_pregate();
		
		/*		}else{

		$this->load->model('trips_model');
		$data['facturelist'] = $this->eir_model->getall_facture();
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();

		$data['vechiclelist'] = $this->eir_model->getall_vechicle();
		$data['driverlist'] = $this->eir_model->getall_driverlist();

        $data['zonelist'] = $this->eir_model->getall_zonelist();
        $data['transitairelist'] = $this->eir_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->eir_model->getall_carte_peagelist();
 //		$data['numeroeir_vide'] = $this->eir_model->get_numeroeir_vide();
        
        $data['carte_carburantlist'] = $this->eir_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->eir_model->getall_vehicle_remorque();
	//	$data['eir_vide'] = $this->eir_model->getall_eir_vide();		
		$data['eir_vide'] = $this->eir_model->getall_eir_vide();
         $data['missionlist'] = $this->mission_model->getall_mission();     
       $data['mission'] = $this->eir_model->fetch_mission();     
		}*/
       
        $this->template->template_render('eir_vide_add',$data);
	}
	public function inserteir_vide()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_model->add_eir_vide($this->input->post());
			if($response) {
				
/* BEGIN MODIFICATION*/

			/*$this->db->where('st_id', $gr_id);
    		$this->db->delete('trip_statut');*/
		$this->db->where('t_id',$this->input->post('ei_pregate_id'));
		// $this->db->update('trip_pregate',$this->input->post());
			
			$dataCompteur_facture = array(
   
   't_statut_id' => '5' 
);
$this->db->update('trips', $dataCompteur_facture); 
				
				
		$this->db->where('pr_trip_id',$this->input->post('ei_pregate_id'));
			$dataPregate_statut = array('pr_statut' => '3');
		$this->db->update('trip_pregate', $dataPregate_statut); 				
			
/*END MODIFICATION*/
				
				$this->session->set_flashdata('successmessage', 'New eir_vide ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('eir/addeir_plein_vide');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('eir/addeir_plein_vide');
		}
	}
	public function editeir_vide()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->eir_model->getall_facture();
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['eir_videdetails'] = $this->eir_model->editeir_vide($e_id);
		
		
		$data['pregate'] = $this->eir_model->fetch_pregate_edit();
/*		$data['facturelist'] = $this->eir_model->getall_facture();
		//$data['conteneurlist'] = $this->mission_model->getall_conteneur();		
		$data['conteneurlist'] = $this->eir_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['eir_pleindetails'] = $this->eir_model->editeir_plein($e_id);	*/	
		
		$this->template->template_render('eir_add',$data);
	}

	public function updateeir_vide()
	{

		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->eir_model->updateeir_vide($this->input->post());
			$pregate = $this->input->post();
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

			//redirect('conteneur/pregate/'.$pregate['ei_trip_id']);

					redirect('eir/addeir_plein_vide');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			redirect('eir/addeir_plein_vide');
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
		$eir_videdetails = $this->eir_model->get_eir_videdetails($ei_id);
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
/* function fetch_mission()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }*/	
	/*END AJAX*/

/* function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	*/	
	
/* function fetch_information_mission()
 { //echo "bjr";exit;
  if($this->input->post('ei_mission_id'))
  {
   echo $this->eir_model->fetch_information_mission($this->input->post('ei_mission_id'));
  }
 }	
	*/
	
/* function fetch_information_mission()
 { //echo "bjr";exit;
  if($this->input->post('mi_lieu_restitution_id'))
  {
   echo $this->eir_plein_model->fetch_information_mission($this->input->post('mi_lieu_restitution_id'));
  }
 }	*/
	
	
/* BEGIN AJAX VEHICULE*/	
/*	 function fetch_lieu_restitution()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->eir_plein_model->fetch_lieu_restitution($this->input->post('mi_trip_id'));
  }
 }*/
/* END AJAX VEHICULE*/		
	
/*END EIR VIDE*/	
	
}
