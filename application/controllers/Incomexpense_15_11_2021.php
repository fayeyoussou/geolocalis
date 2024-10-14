<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomexpense extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Incomexpense_model');
          $this->load->model('Facture_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$this->template->template_render('incomexpense',$data);
	}
	public function addincomexpense()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('incomexpense_add',$data);
	}
	public function insertincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$facture_id = $numero_facture['ie_trip_id'];
		$data['facturedetails'] = $this->Facture_model->get_facturedetails($facture_id);
		
		$t_customer_id = $this->db->select('*')->from('trips')->where('t_customer_id', $facture_id)->get()->row()->t_customer_id;
			
		//$co_zone = $this->db->select('*')->from('trip_conteneur')->where('co_id', $tp_id)->get()->row()->co_zone;			
			
		//	$t_customer_id = $data['facturedetails']->t_customer_id;

//		$addfactureconteneur = $this->input->post();//exit;

	//	$facture_id = $numero_facture['ie_trip_id'];
		$ie_date = $numero_facture['ie_date'];
		$ie_numero_caisse = $numero_facture['ie_numero_caisse'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_espece_cheque = $numero_facture['ie_espece_cheque'];
		//$ie_user = $numero_facture['ie_user'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture";
        $ie_type = $numero_facture['ie_type'];
			
	$addincomexpense = array('ie_trip_id'=>$facture_id,'ie_date'=>$ie_date,'ie_numero_caisse'=>$ie_numero_caisse,'ie_amount'=>$ie_amount,'ie_espece_cheque'=>$ie_espece_cheque,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_beneficiaire'=>$t_customer_id);   //,'co_created_date'=>date('Y-m-d')     

        //$addconteneur = array('co_trip_id'=>$facture_id,'co_type_conteneur'=>$co_type_conteneur,'co_montant'=>$montant_conteneur,'co_description'=>$co_description,'t_type_facturation'=>$t_type_facturation,'co_zone'=>$co_zone,'co_adresse_livraison'=>$co_adresse_livraison,'co_numero_conteneur'=>$co_numero_conteneur);   //,'co_created_date'=>date('Y-m-d')     
	    $response =  $this->db->insert('incomeexpense',$addincomexpense); 			
			
			
				//$response =  $this->db->insert('incomeexpense',$addtrip_compteur);           

		//$response = $this->Incomexpense_model->add_incomexpense($this->input->post());
			if($response) {
				
// debut ajout compteur                
/**/ //        $ags=1;   

//				$this->db->insert('trip_compteur',$ags); exit();                 

				//	$t_id = $this->uri->segment(3);
//		$data['facturedetails'] = $this->facture_model->get_facturedetails($t_id); 
				
 
        //$facture=
     //   $t_id = $this->uri->segment(3);
       // $co_trip_id = $data['conteneurdetails'] ->co_trip_id;

				
				//		unset($addtrip_compteur['cpt_id']);
//		$response =  $this->db->insert('trip_compteur',$addtrip_compteur);                
                
// fin ajout compteur  				
				
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addincomexpense');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addincomexpense');
		}
	}
	public function editincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['incomexpensedetails'] = $this->Incomexpense_model->editincomexpense($e_id);
		$this->template->template_render('incomexpense_add',$data);
	}

	public function updateincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('incomexpense');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('incomexpense');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}
}
