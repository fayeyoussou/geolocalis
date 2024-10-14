<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class conteneur extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('conteneur_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
/*		$t_id = $this->uri->segment(3);
		if(empty($t_id)) {*/
			$data['conteneur'] = $this->conteneur_model->getall_conteneur();
			$this->template->template_render('conteneur',$data);
/*		}else{
			$data['conteneur'] = $this->conteneur_model->getall_conteneur_pregate($t_id);
			$this->template->template_render('conteneur_pregate',$data);
		}*/
	}
	
	public function pregate()
	{
		$t_id = $this->uri->segment(3);
/*		if(empty($conteneur)) {
			$data['conteneur'] = $this->conteneur_model->getall_conteneur();
			$this->template->template_render('conteneur',$data);
		}else{*/
			$data['conteneur'] = $this->conteneur_model->getall_conteneur_pregate($t_id);
			$this->template->template_render('conteneur_pregate',$data);
	//	}
	}	
	public function addconteneur()
	{
		$this->load->model('trips_model');
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('conteneur_add',$data);
	}
	public function insertconteneur()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->conteneur_model->add_conteneur($this->input->post());
			if($response) {
				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_co_nature'=>$this->input->post('co_nature'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added conteneur - '.$this->input->post('co_adresse_livraison'),'ie_amount'=>$this->input->post('co_type_conteneur'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}
				$this->session->set_flashdata('successmessage', 'conteneur details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('conteneur');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('conteneur');
		}
	}
	public function editconteneur()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('facture_model');
//		$this->load->model('trips_model');
	//	$data['vechiclelist'] = $this->trips_model->getall_vechicle();
//		$data['driverlist'] = $this->trips_model->getall_driverlist();
		//$data['facturelist'] = $this->facture_model->getall_facture();
//        $data['zonelist'] = $this->facture_model->getall_zonelist();
		$data['zonelist'] = $this->facture_model->getall_zonelist();
		$data['conteneurdetails'] = $this->conteneur_model->editconteneur($f_id);
        //$facture=
     //   $t_id = $this->uri->segment(3);
       // $co_trip_id = $data['conteneurdetails'] ->co_trip_id;
		//$data['facturedetails'] = $this->facture_model->get_facturedetails($co_trip_id);
		$this->template->template_render('conteneur_add',$data);
	}

	public function updateconteneur()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->conteneur_model->updateconteneur($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'conteneur details updated successfully..');
			    redirect('conteneur');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('conteneur');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('conteneur');
		}
	}
}
