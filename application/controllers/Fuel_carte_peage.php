<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fuel_carte_peage extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_carte_peage_model');
          $this->load->model('trips_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['fuel'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage_compagnielist();
		$data['fuel_carte_peagelist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage();
		$this->template->template_render('fuel_carte_peage_management',$data);
	}
	public function addfuel_carte_peage()
	{
		
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();				
		$data['fuel'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage_compagnielist();
		$data['fuel_carte_peagelist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage();
		$data['carte_peagecompagnielist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage_compagnielist();
		$this->template->template_render('fuel_carte_peage_add',$data);
	}
	public function insertfuel_carte_peage()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('fuel_carte_peage')->where('cp_numero',$this->input->post('cp_numero'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->fuel_carte_peage_model->add_fuel_carte_peage($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New fuel_carte_peage added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Le numéro existe déjà.');
			}
			redirect('fuel_carte_peage/addfuel_carte_peage');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_peage/addfuel_carte_peage');
		}
	}
	public function editfuel_carte_peage()
	{
		$cp_id = $this->uri->segment(3);
		$data['fuel_carte_peagedetails'] = $this->fuel_carte_peage_model->get_fuel_carte_peagedetails($cp_id);
				$data['fuel'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage_compagnielist();
		$data['fuel_carte_peagelist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();				$data['carte_peagecompagnielist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage_compagnielist();

		
		$data['fuel_carte_peagelist'] = $this->fuel_carte_peage_model->getall_fuel_carte_peage();
		$this->template->template_render('fuel_carte_peage_add',$data);
	}

	public function updatefuel_carte_peage()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_carte_peage_model->update_fuel_carte_peage($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'fuel_carte_peage updated successfully..');
				    redirect('fuel_carte_peage/addfuel_carte_peage');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('fuel_carte_peage/addfuel_carte_peage');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel_carte_peage');

		}
	}
}
