<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fuel_carte_carburant_recharge extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->model('Incomexpense_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['fuel'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge_compagnielist();
		$data['fuel_carte_carburant_rechargelist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge();
		$this->template->template_render('fuel_carte_carburant_recharge_management',$data);
	}
	public function addfuel_carte_carburant_recharge()
	{
		
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant();
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();	

		
		
		//$data['fuel'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge_compagnielist();
		$data['fuel_carte_carburant_rechargelist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge();
		$data['carte_carburantcompagnielist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge_compagnielist();
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}
	public function insertfuel_carte_carburant_recharge()
	{
		$testxss = xssclean($_POST);
		if($testxss){
/*			$exist = $this->db->select('*')->from('fuel_carte_carburant_recharge')->where('ccr_id',$this->input->post('ccr_id'))->get()->result_array();
			if(count($exist)==0) {*/
			
			
	//$response = $this->fuel_carte_carburant_recharge_model->add_fuel_carte_carburant_recharge($this->input->post());
		
		$reglement = $this->input->post();
		$ccr_incomeexpense_id = $reglement['ccr_incomeexpense_id'];	
			$ie_amount = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ccr_incomeexpense_id)->get()->row()->ie_amount;

//Prix du litre du carburant	
			$montant_carburant = 0;
			$montant_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;	//exit;		
			
		$ccr_carte_id = $reglement['ccr_carte_id'];	
		$ccr_fuel_quantity = 0;	
		$ccr_fuel_quantity = $ie_amount/$montant_carburant;	
			
			$carburant_restant = 0;
/*echo "restant REQUETE=". */$carburant_restant = $this->db->select_sum('ccr_fuel_restant')->from('fuel_carte_carburant_recharge')->where('ccr_carte_id', $ccr_carte_id)->get()->row()->ccr_fuel_restant;		
			$total_carburant_restant = $carburant_restant + $ccr_fuel_quantity;
/*DEBUT AJOUT*/			
	$ajout = array('ccr_carte_id'=>$this->input->post('ccr_carte_id'),'ccr_number_ticket'=>$this->input->post('ccr_number_ticket'),'ccr_fueldate'=>$this->input->post('ccr_fueldate'),'ccr_desc'=>$this->input->post('ccr_desc'),'ccr_created_date'=>$this->input->post('ccr_created_date'),'ccr_incomeexpense_id'=>$this->input->post('ccr_incomeexpense_id'),'ccr_fuel_quantity'=>$ccr_fuel_quantity,'ccr_amount'=>$ie_amount,'ccr_fuelprice'=>$montant_carburant,'ccr_fuel_restant'=>$total_carburant_restant);
					$response = $this->db->insert('fuel_carte_carburant_recharge',$ajout);				
/*FIN AJOUT*/			
			
			
			
				if($response) {
					$this->session->set_flashdata('successmessage', 'New fuel_carte_carburant_recharge added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
/*			} else {
				$this->session->set_flashdata('warningmessage', 'Le numéro existe déjà.');
			}*/
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
		}
	}
	public function editfuel_carte_carburant_recharge()
	{
		$cc_id = $this->uri->segment(3);
		$data['fuel_carte_carburant_rechargedetails'] = $this->fuel_carte_carburant_recharge_model->get_fuel_carte_carburant_rechargedetails($cc_id);
				$data['fuel'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge_compagnielist();
		$data['fuel_carte_carburant_rechargelist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge();
		$data['carte_carburantcompagnielist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge_compagnielist();

		
				$data['fuel_carte_carburant_rechargelist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge();
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}

	public function updatefuel_carte_carburant_recharge()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->update_fuel_carte_carburant_recharge($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'fuel_carte_carburant_recharge updated successfully..');
				    redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('fuel_carte_carburant_recharge/addfuel_carte_carburant_recharge');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_carburant_recharge');
		}
	}
}
