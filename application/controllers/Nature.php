<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nature extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('nature_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['naturelist'] = $this->nature_model->getall_nature();
		$this->template->template_render('nature_management',$data);
	}
	public function addnature()
	{
		$this->template->template_render('nature_add');
	}
	public function insertnature()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('trip_nature')->where('na_name',$this->input->post('na_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->nature_model->add_nature($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New nature added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un nature du même nom existe déjà.');
			}
			redirect('nature');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('nature');
		}
	}
	public function editnature()
	{
		$c_id = $this->uri->segment(3);
		$data['naturedetails'] = $this->nature_model->get_naturedetails($c_id);
		$this->template->template_render('nature_add',$data);
	}

	public function updatenature()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->nature_model->update_nature($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'nature modifiée avec succés..');
				    redirect('nature');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('nature');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('nature');
		}
	}
    
/*Debut supp nature*/    
	public function nature_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trip_nature', array('na_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'nature supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! nature non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('nature');
	}    
/* Fin supp nature*/     
    
    
    
}
