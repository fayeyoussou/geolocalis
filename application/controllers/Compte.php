<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compte extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('compte_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['comptelist'] = $this->compte_model->getall_compte();
		$this->template->template_render('compte_management',$data);
	}
	public function addcompte()
	{
		$this->template->template_render('compte_add');
	}
	public function insertcompte()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('incomeexpense_compte')->where('iec_name',$this->input->post('iec_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->compte_model->add_compte($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New compte added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un compte du même nom existe déjà.');
			}
			redirect('compte');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compte');
		}
	}
	public function editcompte()
	{
		$c_id = $this->uri->segment(3);
		$data['comptedetails'] = $this->compte_model->get_comptedetails($iec_id);
		$this->template->template_render('compte_add',$data);
	}

	public function updatecompte()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->compte_model->update_compte($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'compte updated successfully..');
				    redirect('compte');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('compte');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('compte');
		}
	}
    
/*Debut supp compte*/    
	public function compte_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('incomeexpense_compte', array('iec_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'compte supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! compte non supprimé');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('compte');
	}    
/* Fin supp compte*/     
    
    
    
}
