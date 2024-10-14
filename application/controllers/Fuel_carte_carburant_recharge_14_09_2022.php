<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_carte_carburant_recharge extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->model('incomexpense_model');
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
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->add_fuel($this->input->post());
			if($response) {
/*				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel - '.$this->input->post('v_fuelcomments'),'ie_amount'=>$this->input->post('v_fuelprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}*/
                
/*				$is_include = $this->input->post('exp');
				if(isset($is_include)) {*/ 
                //$ie_type = "Décaissement caisse";ccr_fueldate
/*					$addincome = array('ie_beneficiaire'=>'Caisse Carburant','ie_date'=>$this->input->post('ccr_fueldate'),'ie_type'=>'Décaissement caisse','ie_amount'=>$this->input->post('ccr_amount'),'ie_objet'=>'Rechargement de la carte','ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);*/
				//}               
				$this->session->set_flashdata('successmessage', 'Recharge effectué avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Quelque chose s\'est mal passé essaie encore');
			}
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur! Votre saisie n\'est pas autorisée.Veuillez réessayer');
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		}
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
