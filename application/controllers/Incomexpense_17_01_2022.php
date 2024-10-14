<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomexpense extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Incomexpense_model');
          $this->load->model('Facture_model');
          $this->load->model('Banque_model');
          $this->load->model('vehicle_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
    //      $this->load->library('app_helper');
          $this->load->library('session');

     }

	public function index()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$this->template->template_render('incomexpense',$data);
	}

	public function reglement_facture()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$this->template->template_render('reglement_facture',$data);
	}	
	
	public function addincomexpense()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('incomexpense_add',$data);
//			$this->data['system_users'] = $this->ion_auth->users(array(1,2))->result();

	}

	public function insertincomexpense_reglementfacture_espece()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
		//$ie_ieb_id = $numero_facture['ie_ieb_id'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture par espece";
        $ie_type = $numero_facture['ie_type'];
//        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id'))); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
	
	public function insertincomexpense_reglementfacture_cheque()
	{ 
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
			
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture par chéque";
        $ie_type = $numero_facture['ie_type'];
        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_ieb_id'=>$this->input->post('ie_ieb_id')?implode(',', $this->input->post('ie_ieb_id')):'',); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
		//	header(Location.'incomexpense/addincomexpense');
				redirect('incomexpense/incomexpense_reglementfacture');
/*	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addincomexpense');
//			redirect('incomexpense/addincomexpense');
		}*/
	}	
/*
// DEBUT ALIMENTATION CHEQUE
	public function insertincomexpense_caisse_alimentationcaisse_cheque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		//$ie_ieb_id = $numero_facture['ie_ieb_id'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Alimentation de la caisse par chéque";
        $ie_type = $numero_facture['ie_type'];
        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
 //       $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id')));   
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN ALIMENTATION CHEQUE*/
	
	
// DEBUT ALIMENTATION ESPECE
	public function insertincomexpense_caisse_alimentationcaisse_espece()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		$ie_nature = $numero_facture['ie_nature'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Alimentation de la caisse par espece";
        $ie_type = $numero_facture['ie_type'];
 //       $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
 //       $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id'))); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN DEPENSES	
	
	
// DEBUT ALIMENTATION DEPENSE SORTIE
	public function insertincomexpense_caisse_alimentationcaisse_depense_sortie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		$ie_nature = $numero_facture['ie_nature'];
		$ie_beneficiaire = $numero_facture['ie_beneficiaire'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Alimentation de la caisse par espece";
        $ie_type = $numero_facture['ie_type'];
 //       $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
 //       $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_nature'=>$ie_nature,'ie_beneficiaire'=>$ie_beneficiaire,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id'))); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN ALIMENTATION DEPENSE SORTIE

	
	
// DEBUT BANQUE ENTREE
	
// DEBUT BANQUE ENTREE
	
		public function addbanque()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_add_banque',$data);
	}	
	
		public function banque()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		} else
		{
			$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();

		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_banque',$data);
	}
	
	public function insertincomexpense_banque2()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
//		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		$ie_nature = $numero_facture['ie_nature'];
		//$ie_beneficiaire = $numero_facture['ie_beneficiaire'];
		$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $numero_facture['ie_description'];
        $ie_type = $numero_facture['ie_type'];
		$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_nature'=>$ie_nature,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_ieb_id'=>$ie_ieb_id); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN BANQUE ENTREE	
	
	
	
	
	public function insertincomexpense_banque()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
//		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement_caisse = $numero_facture['ie_type_mouvement_caisse'];
		$ie_nature = $numero_facture['ie_nature'];
		//$ie_beneficiaire = $numero_facture['ie_beneficiaire'];
		$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $numero_facture['ie_description'];
        $ie_type = $numero_facture['ie_type'];
		$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_nature'=>$ie_nature,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement_caisse'=>$ie_type_mouvement_caisse,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_ieb_id'=>$ie_ieb_id); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN BANQUE ENTREE	
	
	
	public function insertincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$numero_facture = $this->input->post();
	//	$facture_id = $numero_facture['ie_trip_id'];
	//	$data['facturedetails'] = $this->Facture_model->get_facturedetails($facture_id);
	//    $response =  $this->db->insert('incomeexpense',$addincomexpense); 			

		//	$response = $this->Incomexpense_model->add_incomexpense($this->input->post());
			
			
			
			
			//$t_customer_id = $this->db->select('*')->from('trips')->where('t_customer_id', $facture_id)->get()->row()->t_customer_id;
			
		//$co_zone = $this->db->select('*')->from('trip_conteneur')->where('co_id', $tp_id)->get()->row()->co_zone;			
			
		//	$t_customer_id = $data['facturedetails']->t_customer_id;

//		$addfactureconteneur = $this->input->post();//exit;

	//	$facture_id = $numero_facture['ie_trip_id'];		

	//$ie_ieb_id = implode(',', (array) $this->input->post('ie_ieb_id'));

	//	$ie_ieb_id= implode(',', (array) $numero_facture('ie_ieb_id'));
	 //$ie_ieb_id = array(1,2,3);
		$ie_date = $numero_facture['ie_date'];
		$ie_numero_caisse = $numero_facture['ie_numero_caisse'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_espece_cheque = $numero_facture['ie_espece_cheque'];
		//$ie_ieb_id = $numero_facture['ie_ieb_id'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture";
        $ie_type = $numero_facture['ie_type'];
        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_numero_caisse'=>$ie_numero_caisse,'ie_amount'=>$ie_amount,'ie_espece_cheque'=>$ie_espece_cheque,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id'))); /**/  
//	$addincomexpense = array('ie_trip_id'=>$facture_id,'ie_date'=>$ie_date,'ie_numero_caisse'=>$ie_numero_caisse,'ie_amount'=>$ie_amount,'ie_espece_cheque'=>$ie_espece_cheque,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_ieb_id'=> implode(',', (array) $this->input->post('ie_ieb_id'))); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
if($response) {
			
			//	$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
//			redirect('incomexpense/addincomexpense');
		}
	}
	
	
	public function editincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
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
	
		public function addreglement_facture()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_add_reglementfacture',$data);
	}
	

	
		public function incomexpense_reglementfacture()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		} else
		{
			$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();

		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_reglementfacture',$data);
	}
	
		public function addcaisse()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_add_caisse',$data);
	}	

			public function caisse()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		} else
		{
			$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();

		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_caisse',$data);
	}
	
	
}
