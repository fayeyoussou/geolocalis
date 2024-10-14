<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transitaire extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('transitaire_model');
		  $this->load->model('Incomexpense_model');
          $this->load->model('Facture_model');
          $this->load->model('Banque_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['transitairelist'] = $this->transitaire_model->getall_transitaire();
		$this->template->template_render('transitaire_management',$data);
	}
	public function addtransitaire()
	{
		$this->template->template_render('transitaire_add');
	}
	public function inserttransitaire()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('transitaire')->where('tra_name',$this->input->post('tra_name'))->get()->result_array();//modifier
			if(count($exist)==0) {
				$response = $this->transitaire_model->add_transitaire($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New transitaire added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un transitaire du même nom existe déjà.');
			}
			redirect('transitaire');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('transitaire');
		}
	}
	public function edittransitaire()
	{
		$tra_id = $this->uri->segment(3);
		$data['transitairedetails'] = $this->transitaire_model->get_transitairedetails($tra_id);
		$this->template->template_render('transitaire_add',$data);
	}

	public function updatetransitaire()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->transitaire_model->update_transitaire($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'transitaire updated successfully..');
				    redirect('transitaire');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('transitaire');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('transitaire');
		}
	}
	
/* BEGIN VIEW FORWARDING AGENT */
	
	public function transitaire_details()
	{
		$tra_id = $this->uri->segment(3);
		$transitairedetails = $this->transitaire_model->get_transitairedetails($tra_id);
		$bookings = $this->transitaire_model->get_facture($tra_id);
		$conteneur = $this->transitaire_model->get_conteneur($tra_id);
		$customer = $this->transitaire_model->get_customer($tra_id);
		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();
		
		//		$geofence_events = $this->geofence_model->countvehiclengeofence_events($tra_id);
		if(isset($transitairedetails[0]['tra_id'])) {
			$data['transitairedetails'] = $transitairedetails[0];
			$data['bookings'] = $bookings;
			$data['conteneur'] = $conteneur;
			$data['customer'] = $customer;
			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;
			$data['numero_compteurbanque'] = $numero_compteurbanque;
			$this->template->template_render('transitaire_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}	
	
/* END VIEW FORWARDING AGENT */	
	
}
