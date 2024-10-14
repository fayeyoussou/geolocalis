<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_carte_carburant_recharge_model extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['fuel_carte_carburant_recharge'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant_recharge();
		$this->template->template_render('fuel_carte_carburant_recharge',$data);
	}
	public function addfuel_carte_carburant_recharge()
	{
		$this->load->model('trips_model');
		$this->load->model('fuel_model');
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}
	public function insertfuel_carte_carburant_recharge()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->add_fuel_carte_carburant_recharge($this->input->post());
			if($response) {
				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel_carte_carburant_recharge - '.$this->input->post('v_fuel_carte_carburant_rechargecomments'),'ie_amount'=>$this->input->post('v_fuel_carte_carburant_rechargeprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel_carte_carburant_recharge');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_carburant_recharge');
		}
	}
	public function editfuel_carte_carburant_recharge()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fuel_carte_carburant_rechargedetails'] = $this->fuel_carte_carburant_recharge_model->editfuel_carte_carburant_recharge($f_id);
		$this->template->template_render('fuel_carte_carburant_recharge_add',$data);
	}

	public function updatefuel_carte_carburant_recharge()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_carburant_recharge_model->updatefuel_carte_carburant_recharge($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('fuel_carte_carburant_recharge');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('fuel_carte_carburant_recharge');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_carburant_recharge');
		}
	}
}
