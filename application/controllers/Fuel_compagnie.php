<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fuel_compagnie extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_compagnie_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();
		$this->template->template_render('fuel_compagnie_management',$data);
	}
	public function addfuel_compagnie()
	{
		$this->template->template_render('fuel_compagnie_add');
	}
	public function insertfuel_compagnie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('fuel_carte_carburant_compagnie')->where('ccc_name',$this->input->post('ccc_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->fuel_compagnie_model->add_fuel_compagnie($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Nouvelle compagnie ajoutée avec succés..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Compagnie non ajoutée.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Une compagnie du même nom existe déjà.');
			}
			redirect('fuel_compagnie');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur! Votre saisie n\'est pas autorisée.Veuillez réessayer');
			redirect('fuel_compagnie');
		}
	}
	public function editfuel_compagnie()
	{
		$ccc_id = $this->uri->segment(3);
		$data['fuel_compagniedetails'] = $this->fuel_compagnie_model->get_fuel_compagniedetails($ccc_id);
		$this->template->template_render('fuel_compagnie_add',$data);
	}

	public function updatefuel_compagnie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_compagnie_model->update_fuel_compagnie($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Compagnie modifiée avec succés..');
				    redirect('fuel_compagnie');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Quelque chose s\'est mal passé  .. essaie encore');
				    redirect('fuel_compagnie');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur! Votre saisie n\'est pas autorisée.Veuillez réessayer');
			redirect('fuel_compagnie');
		}
	}
    
/*Debut supp fuel_compagnie*/    
	public function compagnie_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('fuel_carte_carburant_compagnie', array('ccc_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Compagnie supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Compagnie non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('fuel_compagnie');
	}    
/* Fin supp fuel_compagnie*/     
    
    
    
}
