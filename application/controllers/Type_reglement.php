<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class type_reglement extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('type_reglement_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['type_reglementlist'] = $this->type_reglement_model->getall_type_reglement();
		$this->template->template_render('type_reglement_management',$data);
	}
	public function addtype_reglement()
	{
		$this->template->template_render('type_reglement_add');
	}
	public function inserttype_reglement()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('trip_type_reglement')->where('tr_name',$this->input->post('tr_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->type_reglement_model->add_type_reglement($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New type_reglement added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un type_reglement du même nom existe déjà.');
			}
			redirect('type_reglement');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('type_reglement');
		}
	}
	public function edittype_reglement()
	{
		$c_id = $this->uri->segment(3);
		$data['type_reglementdetails'] = $this->type_reglement_model->get_type_reglementdetails($c_id);
		$this->template->template_render('type_reglement_add',$data);
	}

	public function updatetype_reglement()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->type_reglement_model->update_type_reglement($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'type_reglement modifiée avec succés..');
				    redirect('type_reglement');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('type_reglement');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('type_reglement');
		}
	}
    
/*Debut supp type_reglement*/    
	public function type_reglement_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trip_type_reglement', array('tr_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'type_reglement supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! type_reglement non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('type_reglement');
	}    
/* Fin supp type_reglement*/     
    
    
    
}
