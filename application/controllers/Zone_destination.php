<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zone_destination extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('zone_destination_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['zone'] = $this->zone_destination_model->getall_zonelist();
		$data['zone_destinationlist'] = $this->zone_destination_model->getall_zone_destination();
		$this->template->template_render('zone_destination_management',$data);
	}
	public function addzone_destination()
	{
		$data['zonelist'] = $this->zone_destination_model->getall_zonelist();
		$this->template->template_render('zone_destination_add',$data);
	}
	public function insertzone_destination()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('zone_destination')->where('zd_name',$this->input->post('zd_name'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->zone_destination_model->add_zone_destination($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New zone_destination added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('zone_destination');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('zone_destination');
		}
	}
	public function editzone_destination()
	{
		$zd_id = $this->uri->segment(3);
		$data['zonelist'] = $this->zone_destination_model->getall_zonelist();
		$data['zone_destinationdetails'] = $this->zone_destination_model->get_zone_destinationdetails($zd_id);
		$this->template->template_render('zone_destination_add',$data);
	}

	public function updatezone_destination()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->zone_destination_model->update_zone_destination($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'zone_destination updated successfully..');
				    redirect('zone_destination');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('zone_destination');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('zone_destination');
		}
	}
}
