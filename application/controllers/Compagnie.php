<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compagnie extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('compagnie_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['compagnielist'] = $this->compagnie_model->getall_compagnie();
		$this->template->template_render('compagnie_management',$data);
	}
	public function addcompagnie()
	{
		$this->template->template_render('compagnie_add');
	}
	public function insertcompagnie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('compagnie')->where('cc_name',$this->input->post('cc_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->compagnie_model->add_compagnie($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New compagnie added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un compagnie du même nom existe déjà.');
			}
			redirect('compagnie');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compagnie');
		}
	}
	public function editcompagnie()
	{
		$c_id = $this->uri->segment(3);
		$data['compagniedetails'] = $this->compagnie_model->get_compagniedetails($c_id);
		$this->template->template_render('compagnie_add',$data);
	}

	public function updatecompagnie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->compagnie_model->update_compagnie($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'compagnie modifiée avec succés..');
				    redirect('compagnie');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('compagnie');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compagnie');
		}
	}
    
/*Debut supp compagnie*/    
	public function compagnie_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('compagnie', array('cc_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'compagnie supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! compagnie non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('compagnie');
	}    
/* Fin supp compagnie*/     
    
    
    
}
