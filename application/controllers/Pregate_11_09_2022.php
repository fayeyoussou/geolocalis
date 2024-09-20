<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pregate extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('pregate_model');
          $this->load->model('compagnie_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['pregate'] = $this->pregate_model->getall_pregate();
		$this->template->template_render('pregate_add',$data);
	}
	
	
	public function addpregate()
	{
		$this->load->model('trips_model');
		
/*BEGIN FILTRE*/	
		if(isset($_POST['pregate_add_report'])) {
			$pregate_report = $this->pregate_model->pregate_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('pr_statut'),$this->input->post('type'),$this->input->post('compagnie'),$this->input->post('pied')); //echo 
				if(empty($pregate_report)) {
					$this->session->set_flashdata('warningmessage', 'No data found..');
					$data['pregate'] = '';
				} else {
					unset($_SESSION['warningmessage']);
					$data['pregate'] = $pregate_report;
				}
		}else{
				$data['pregate'] = $this->pregate_model->getall_pregate();
			}		
/*END FILTRE*/		
	
		$data['facturelist'] = $this->pregate_model->getall_facture();
		$data['conteneurlist'] = $this->pregate_model->getall_conteneur();
		$data['compagnielist'] = $this->compagnie_model->getall_compagnie();

		$this->template->template_render('pregate_add',$data);
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
	
/* DEBUT DETAIL PREGATE*/
 
/*	public function pregatedetails()
	{
		$data = array();
		$pr_id = $this->uri->segment(3);
		
		$pregatedetails = $this->pregate_model->get_pregatedetails($pr_id);

		if(isset($pregatedetails[0]['pr_id'])) {
			$data['pregatedetails'] = $this->pregate_model->get_pregatedetails($pregatedetails[0]['pr_id']);			
            $compagniedetails = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';            
            
            }
		$this->template->template_render('pregate_details',$data);        
	}*/
	
		public function pregatedetails()
	{
		$pr_id = $this->uri->segment(3);
		$pregatedetails = $this->pregate_model->get_pregatedetails($pr_id);
/*		$bookings = $this->transitaire_model->get_facture($tra_id);
		$conteneur = $this->transitaire_model->get_conteneur($tra_id);
		$customer = $this->transitaire_model->get_customer($tra_id);
		$ristourne = $this->transitaire_model->get_ristourne($tra_id);
		$banquelist = $this->Banque_model->getall_banque();
		$facture_transitaire = $this->transitaire_model->get_facture_transitaire($tra_id);
		$numero_compteurbanque = $this->Incomexpense_model->get_numero_compteur_banque();*/
		
		if(isset($pregatedetails[0]['pr_id'])) {
			$data['$pregatedetails'] = $pregatedetails[0];
/*			$data['bookings'] = $bookings;
			$data['conteneur'] = $conteneur;
			$data['customer'] = $customer;
			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;
			$data['numero_compteurbanque'] = $numero_compteurbanque;*/
			$this->template->template_render('pregate_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}
	
	
	
}
