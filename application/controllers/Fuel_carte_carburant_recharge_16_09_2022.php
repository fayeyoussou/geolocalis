<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_carte_carburant_recharge extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_carte_carburant_recharge_model');
//          $this->load->model('fuel_carte_carburant_model');
          $this->load->model('Incomexpense_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['fuel'] = $this->fuel_carte_carburant_recharge_model->getall_fuel();
		$this->template->template_render('fuel_carte_carburant_recharge',$data);
	}
	public function addfuel_carte_carburant_recharge()
	{
		//$this->load->model('trips_model');
		$this->load->model('fuel_carte_carburant_model');
//		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_model->getall_fuel_carte_carburant();
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}
	public function insertfuel()
	{ //echo "reponse";exit;
	 
		$recharge = $this->input->post();
		$ccr_incomeexpense_id = $recharge['ccr_incomeexpense_id'];
		$ccr_carte_id = $recharge['ccr_carte_id'];
		$ccr_fueldate = $recharge['ccr_fueldate'];
		$ccr_fuel_quantity = $recharge['ccr_fuel_quantity'];
        $ccr_fuelprice = $recharge['ccr_fuelprice'];
		$ccr_amount = $recharge['ccr_amount'];
		$ccr_numero_ticket = $recharge['ccr_numero_ticket'];
        
		$ccr_desc = $recharge['ccr_desc'];
        $ccr_created_date = $recharge['ccr_created_date'];
		$ccr_carte_id = $banque['ccr_carte_id'];
/*		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];*/
		$addincomexpense = array('ccr_incomeexpense_id'=>$ccr_incomeexpense_id,'ccr_fueldate'=>$ccr_fueldate,'ccr_fueldate'=>$ccr_fueldate,'ccr_fuel_quantity'=>$ccr_fuel_quantity,'ccr_fuelprice'=>$ccr_fuelprice,'ccr_amount'=>$ccr_amount,'ccr_numero_ticket'=>$ccr_numero_ticket,'ccr_desc'=>$ccr_desc,'ccr_created_date'=>$ccr_created_date);	
//	}
			
$response = $this->fuel_carte_carburant_recharge_model->add_fuel($addincomexpense);
		
		

		if($response) {
			$this->session->set_flashdata('successmessage', 'Recharge effectuée avec succés..');
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur!. Ajout non effectué');
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		}	 
		
	 
echo "reponse".$this->db->insert_id();exit;	 /**/
	 
	 
/*		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->add_fuel($this->input->post());
			if($response) {
             echo "reponse";exit;
				$this->session->set_flashdata('successmessage', 'Recharge effectué avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Quelque chose s\'est mal passé essaie encore');
			}
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur! Votre saisie n\'est pas autorisée.Veuillez réessayer');
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		}*/
	}
	public function editfuel()
	{
		$ccr_id = $this->uri->segment(3);
		//$this->load->model('trips_model');
		$this->load->model('fuel_carte_carburant_model');
//		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_model->getall_fuel_carte_carburant();

		$data['fueldetails'] = $this->fuel_carte_carburant_recharge_model->editfuel($ccr_id);
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}

	public function updatefuel()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->updatefuel($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Recharge modifiée avec succcés..');
			    redirect('fuel_carte_carburant_recharge');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Quelque chose s\'est mal passé essaie encore');
			    redirect('fuel_carte_carburant_recharge');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur! Votre saisie n\'est pas autorisée.Veuillez réessayer');
			redirect('fuel_carte_carburant_recharge');
		}
	}
    
	public function deletefuel()
	{
		$ccr_id = $this->uri->segment(3);
		$response = $this->db->delete('fuel_carte_carburant_recharge', array('ccr_id' =>$ccr_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Carte de recharge supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Quelque chose s\'est mal passé essaie encore');
		}
		redirect('fuel_carte_carburant_recharge');
	}    
    
    
}
