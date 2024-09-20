<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banque extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Banque_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['banque'] = $this->Banque_model->getall_banque();
		$this->template->template_render('banque',$data);
	}
	public function addbanque()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('banque_add',$data);
	}
	public function insertbanque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Banque_model->add_banque($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('banque/addbanque');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('banque/addbanque');
		}
	}
	public function editbanque()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['banquedetails'] = $this->Banque_model->editbanque($e_id);
		$this->template->template_render('banque_add',$data);
	}

	public function updatebanque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Banque_model->updatebanque($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('banque');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('banque');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('banque');
		}
	}
}
