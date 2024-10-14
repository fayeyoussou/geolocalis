<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compagnie_lieu_restitution extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('compagnie_lieu_restitution_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['fuel'] = $this->compagnie_lieu_restitution_model->getall_compagnielist();
		$data['compagnie_lieu_restitutionlist'] = $this->compagnie_lieu_restitution_model->getall_compagnie_lieu_restitution();
		$this->template->template_render('compagnie_lieu_restitution_management',$data);
	}
	public function addcompagnie_lieu_restitution()
	{
		$data['carte_carburantcompagnielist'] = $this->compagnie_lieu_restitution_model->getall_compagnielist();
		$this->template->template_render('compagnie_lieu_restitution_add',$data);
	}
	public function insertcompagnie_lieu_restitution()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			/*$exist = $this->db->select('*')->from('compagnie_lieu_restitution')->where('clr_name',$this->input->post('clr_name'))->get()->result_array();
			if(count($exist)==0) {*/
				$response = $this->compagnie_lieu_restitution_model->add_compagnie_lieu_restitution($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New compagnie_lieu_restitution added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			/*} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}*/
			redirect('compagnie_lieu_restitution');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compagnie_lieu_restitution');
		}
	}
	public function editcompagnie_lieu_restitution()
	{
		$cc_id = $this->uri->segment(3);
		$data['compagnie_lieu_restitutiondetails'] = $this->compagnie_lieu_restitution_model->get_compagnie_lieu_restitutiondetails($cc_id);
		$this->template->template_render('compagnie_lieu_restitution_add',$data);
	}

	public function updatecompagnie_lieu_restitution()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->compagnie_lieu_restitution_model->update_compagnie_lieu_restitution($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'compagnie_lieu_restitution updated successfully..');
				    redirect('compagnie_lieu_restitution');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('compagnie_lieu_restitution');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compagnie_lieu_restitution');
		}
	}
}
