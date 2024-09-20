<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reglement extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('reglement_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['reglementlist'] = $this->reglement_model->getall_reglement();
		$this->template->template_render('reglement_management',$data);
	}
	public function addreglement()
	{
		$this->template->template_render('reglement_add');
	}
	public function insertreglement()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('trip_reglement')->where('tg_name',$this->input->post('tg_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->reglement_model->add_reglement($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New reglement added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un reglement du même nom existe déjà.');
			}
			redirect('reglement');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('reglement');
		}
	}
	public function editreglement()
	{
		$c_id = $this->uri->segment(3);
		$data['reglementdetails'] = $this->reglement_model->get_reglementdetails($c_id);
		$this->template->template_render('reglement_add',$data);
	}

	public function updatereglement()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->reglement_model->update_reglement($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'reglement modifiée avec succés..');
				    redirect('reglement');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('reglement');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('reglement');
		}
	}
    
/*Debut supp reglement*/    
	public function reglement_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trip_reglement', array('tg_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'reglement supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! reglement non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('reglement');
	}    
/* Fin supp reglement*/     
    
    
    
}
