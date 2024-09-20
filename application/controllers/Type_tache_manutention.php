<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class type_tache_manutention extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('type_tache_manutention_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['type_tache_manutentionlist'] = $this->type_tache_manutention_model->getall_type_tache_manutention();
		$this->template->template_render('type_tache_manutention_management',$data);
	}
	public function addtype_tache_manutention()
	{
		$this->template->template_render('type_tache_manutention_add');
	}
	public function inserttype_tache_manutention()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('trip_type_tache_manutention')->where('ttach_name',$this->input->post('ttach_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->type_tache_manutention_model->add_type_tache_manutention($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New type_tache_manutention added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un type_tache_manutention du même nom existe déjà.');
			}
			redirect('type_tache_manutention');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('type_tache_manutention');
		}
	}
	public function edittype_tache_manutention()
	{
		$c_id = $this->uri->segment(3);
		$data['type_tache_manutentiondetails'] = $this->type_tache_manutention_model->get_type_tache_manutentiondetails($c_id);
		$this->template->template_render('type_tache_manutention_add',$data);
	}

	public function updatetype_tache_manutention()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->type_tache_manutention_model->update_type_tache_manutention($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'type_tache_manutention modifiée avec succés..');
				    redirect('type_tache_manutention');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('type_tache_manutention');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('type_tache_manutention');
		}
	}
    
/*Debut supp type_tache_manutention*/    
	public function type_tache_manutention_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trip_type_tache_manutention', array('ttach_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'type_tache_manutention supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! type_tache_manutention non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('type_tache_manutention');
	}    
/* Fin supp type_tache_manutention*/     
    
    
    
}
