<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zone extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('zone_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['zonelist'] = $this->zone_model->getall_zone();
		$this->template->template_render('zone_management',$data);
	}
	public function addzone()
	{
		$this->template->template_render('zone_add');
	}
	public function insertzone()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('zone')->where('z_destination',$this->input->post('z_destination'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->zone_model->add_zone($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New zone added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un zone du même nom existe déjà.');
			}
			redirect('zone');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('zone');
		}
	}
	public function editzone()
	{
		$c_id = $this->uri->segment(3);
		$data['zonedetails'] = $this->zone_model->get_zonedetails($c_id);
		$this->template->template_render('zone_add',$data);
	}

	public function updatezone()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->zone_model->update_zone($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'zone updated successfully..');
				    redirect('zone');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('zone');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('zone');
		}
	}
    
/*Debut supp zone*/    
	public function zone_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('zone', array('z_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Zone supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Zone non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('zone');
	}    
/* Fin supp zone*/     
    
    
    
}
