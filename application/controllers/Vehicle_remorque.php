<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehicle_remorque extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('vehicle_remorque_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['vehicle_remorquelist'] = $this->vehicle_remorque_model->getall_vehicle_remorque();
		$this->template->template_render('vehicle_remorque_management',$data);
	}
	public function addvehicle_remorque()
	{
		$this->template->template_render('vehicle_remorque_add');
	}
	public function insertvehicle_remorque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('vehicle_remorque')->where('vr_numero_immatriculation',$this->input->post('vr_numero_immatriculation'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->vehicle_remorque_model->add_vehicle_remorque($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New vehicle_remorque added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('vehicle_remorque');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vehicle_remorque');
		}
	}
	public function editvehicle_remorque()
	{
		$vr_id = $this->uri->segment(3);
		$data['vehicle_remorquedetails'] = $this->vehicle_remorque_model->get_vehicle_remorquedetails($vr_id);
		$this->template->template_render('vehicle_remorque_add',$data);
	}

	public function updatevehicle_remorque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->vehicle_remorque_model->update_vehicle_remorque($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'vehicle_remorque updated successfully..');
				    redirect('vehicle_remorque');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('vehicle_remorque');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vehicle_remorque');
		}
	}
}
