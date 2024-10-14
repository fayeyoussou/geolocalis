<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pregate extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('pregate_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['pregate'] = $this->pregate_model->getall_pregate();
		$this->template->template_render('pregate',$data);
	}
	public function addpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->pregate_model->getall_facture();
		$data['conteneurlist'] = $this->pregate_model->getall_conteneur();
		$this->template->template_render('pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}
/*	public function insertpregate()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->pregate_model->add_pregate($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('pr_statut').' Pregate ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('pregate');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('pregate');
		}
	}*/
	
/* BEGIN ADD PREGATE */	
	
    
	public function insertpregate()
	{
		$pregate = $this->input->post();//exit;
		$this->db->insert('trip_pregate',$pregate);
		if($this->db->insert_id()) {
/*			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from facture and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);*/
			$this->session->set_flashdata('successmessage', 'Ajout Pregate effectué avec succés');
			redirect('pregate');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur!. Ajout non effectué');
			redirect('pregate');
		}
	}	
	
/* END ADD PREGATE*/	
	
	
	public function editpregate()
	{
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->pregate_model->getall_facture();
		$data['conteneurlist'] = $this->pregate_model->getall_conteneur();
		$e_id = $this->uri->segment(3);
		$data['pregatedetails'] = $this->pregate_model->editpregate($e_id);
		$this->template->template_render('pregate_add',$data);
	}

	public function updatepregate()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->pregate_model->updatepregate($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('pr_statut')).' updated successfully..');
				    redirect('pregate');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('pregate');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('pregate');
		}
	}
}
