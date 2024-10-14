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
          $this->load->model('Transitaire_model');
          $this->load->model('vehicle_model');
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
    //      $this->load->library('app_helper');
         $this->load->library('tcpdf_Pdf_Library');
		 $this->load->library('session');
		 $this->load->library('upload');
          $this->load->model('customer_model');	

     }

	public function index()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$this->template->template_render('incomexpense',$data);
	}

	public function reglement_facture()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
		$this->template->template_render('reglement_facture',$data);
	}	
	
	public function addincomexpense()
	{
		$this->load->model('trips_model');
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
		$this->template->template_render('incomexpense_add',$data);
//			$this->data['system_users'] = $this->ion_auth->users(array(1,2))->result();

	}

	public function insertincomexpense_reglementfacture_espece()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
 //       $ie_type_mouvement = $numero_facture['ie_type_mouvement'];
		//$ie_trip_id = implode(',',$this->input->post('ie_trip_id'));
		$ie_trip_id = $numero_facture['ie_trip_id'];
        
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture par espece";
        $ie_type = $numero_facture['ie_type'];
//        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];
		$ie_numero_enregistrement = $numero_facture['ie_numero_enregistrement'];		
			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_trip_id'=> $ie_trip_id); /**/  
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
		
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_reglement_facture', $dataCompteur_incomexpense);        
//		return $this->db->insert_id();
	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
//			redirect('incomexpense');
				redirect('incomexpense/addreglement_facture');
/*	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
			redirect('incomexpense/addreglement_facture');
		}*/
	}	

	public function journal_facture()
	{ 
			redirect('incomexpense/addreglement_facture');

		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}
		//$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('report_incomeexpense',$data);			
			
	}	
	
	
	
	public function insertincomexpense_reglementfacture_cheque()
	{ 
			
		$numero_facture = $this->input->post();
		$ie_date = $numero_facture['ie_date'];
		$ie_numero = $numero_facture['ie_numero'];
		$ie_amount = $numero_facture['ie_amount'];
        $ie_type_mouvement = $numero_facture['ie_type_mouvement'];
        $ie_transitaire_id = $numero_facture['ie_transitaire_id'];        $ie_amount_ristourne = $numero_facture['ie_amount_ristourne'];
			
		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture par chéque";
        $ie_type = $numero_facture['ie_type'];
        $ie_espece_cheque = $numero_facture['ie_espece_cheque'];
		$ie_numero_enregistrement = $numero_facture['ie_numero_enregistrement'];
//        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
//        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];       

if($ie_espece_cheque=="CHEQUE"){	

        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];  	
	
	$addincomexpense = array('ie_type_mouvement'=>$ie_type_mouvement,'ie_date'=>$ie_date,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_espece_cheque'=>$ie_espece_cheque,'ie_transitaire_id'=>$ie_transitaire_id,'ie_amount_ristourne'=>$ie_amount_ristourne);		
}else{	

  //      $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];
        $ie_banque_receptrice_id = $numero_facture['ie_banque_receptrice_id'];  	
	
	$addincomexpense = array('ie_type_mouvement'=>$ie_type_mouvement,'ie_date'=>$ie_date,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_amount'=>$ie_amount,'ie_numero'=>$ie_numero,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_espece_cheque'=>$ie_espece_cheque,'ie_transitaire_id'=>$ie_transitaire_id,'ie_amount_ristourne'=>$ie_amount_ristourne);
}			

		
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
		

 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_reglement_facture', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 		
		
				
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
		//	header(Location.'incomexpense/addincomexpense');
				redirect('incomexpense/addreglement_facture');
//				redirect('incomexpense/incomexpense_reglementfacture');

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


	/* DEBUT AFFICHAGE BANQUE*/
	
			public function addbanque()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id')); //echo $incomeexpensereport;
//			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('ie_banque_receptrice_id')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_banque();	
			}
			// permet d’afficher tous les elements de la liste		

		$data['comptelist'] = $this->Incomexpense_model->getall_compte();
				
		$data['reglementlist'] = $this->Incomexpense_model->getall_banque();//
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numero_compteurbanque'] = $this->Incomexpense_model->get_numero_compteur_banque();
		$data['comptelist'] = $this->Incomexpense_model->getall_compte();
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées

						$this->load->model('fuel_carte_carburant_model');
//		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_model->getall_fuel_carte_carburant();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();			
			
			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_banque',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_banque',$data);
				
			}
			
	}
	
	/*FIN AFFICHAGE BANQUE*/
	
	
		public function incomexpense_banque()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_banque_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_objet')); //echo $incomeexpensereport;
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

//		$this->template->template_render('incomexpense_banque',$data);
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


//		$this->template->template_render('incomexpense_banque',$data);
		$this->template->template_render('incomexpense_add_banque',$data);
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
	

	public function insertincomexpense_banque_entree()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();
		$ie_reglement_id = $banque['ie_reglement_id'];
			
$ie_amount = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_amount;
$ie_banque_emettrice_id = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_banque_emettrice_id;
$ie_banque_receptrice_id = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_banque_receptrice_id;
$ie_numero = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_numero;
$ie_numero_enregistrement_reglement = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ie_reglement_id)->get()->row()->ie_numero_enregistrement;
			
		$ie_numero = $ie_numero;
		$ie_amount = $ie_amount;
 		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
       $ie_type_mouvement = $banque['ie_type_mouvement'];
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		$ie_description = $banque['ie_description']. "effectué par le réglement N°" .$ie_numero_enregistrement_reglement;
        $ie_type = $banque['ie_type'];
		$ie_date = $banque['ie_date'];

			$ie_numero_recu_bordereau_versement="";
			if(isset($banque['ie_numero_recu_bordereau_versement']))
			$ie_numero_recu_bordereau_versement = $banque['ie_numero_recu_bordereau_versement'];

			if(!empty($_FILES['file']['name'])) { 
			    $data = array(); 
				   $image = time().'-'.$_FILES['file']['name']; 
					  $config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_height' => "250",
							'max_width' => "50",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				$this->upload->do_upload('file');//exit;
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $ie_recu_bordereau_versement = $uploadData['file_name'];
					    } else { 
					    	 $success=false;
					    	 $msg = $this->upload->display_errors();
					    } 
			}			
if(!empty($_FILES['file']['name'])) { 			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_recu_bordereau_versement'=>$ie_recu_bordereau_versement,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_reglement_id'=>$ie_reglement_id,'ie_numero_recu_bordereau_versement'=>$ie_numero_recu_bordereau_versement);  
}
	else{
		$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_reglement_id'=>$ie_reglement_id,'ie_numero_recu_bordereau_versement'=>$ie_numero_recu_bordereau_versement);	
	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_banque', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addbanque');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addbanque');
//			redirect('incomexpense/addincomexpense');
		}
	}	
// FIN BANQUE ENTREE	

/* DEBUT AFFICHAGE JOURNAL*/	
	
		public function journalbanque()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->journalbanque_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_reglement_id'),$this->input->post('ie_numero_enregistrement'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('ie_compte_id'),$this->input->post('ie_numero')); 
				
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_banque();	
			}
			// permet d’afficher tous les elements de la liste		
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
//		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
//		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numero_compteurbanque'] = $this->Incomexpense_model->get_numero_compteur_banque();
		$data['comptelist'] = $this->Incomexpense_model->getall_compte();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture(); //lister les factures validées
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées
//		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
  //      $data['customerlist'] = $this->Incomexpense_model->getall_customer();


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_banque',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_banque',$data);
		//		redirect('incomexpense/addbanque');
			
			}
			
	}		
/* FIN AFFICHAGE JOURNAL*/	
	
	public function insertincomexpense_banque_sortie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();
		$ie_compte_id = $banque['ie_compte_id'];
		$ie_ristourne_tva ="";
			
			
		if($ie_compte_id==174){
		$ie_ristourne_tva = " F. AUTRES ENERGIES";	
		}
			
				if($ie_compte_id==140){
		$ie_ristourne_tva = "TVA";	
		}	
		
		$ie_transitaire_id='';
		$ie_transitaire_id = $banque['ie_transitaire_id'];

		if($ie_transitaire_id!=''){
		$ie_ristourne_tva = "RISTOURNE";	
		}			
		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
		$ie_objet = $banque['ie_objet'];
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		//$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];
		if($ie_type=="expense"){
        $ie_banque_receptrice_id = 0;
			
		}else{
        $ie_banque_receptrice_id = $banque['ie_banque_receptrice_id'];
			
		}
	
/*			if(!empty($_FILES['file']['name'])) { 
			    $data = array(); 
				   echo $image = time().'-'.$_FILES['file']['name']; 
					  $config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_height' => "250",
							'max_width' => "50",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				echo $this->upload->do_upload('file');//exit;
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $ie_recu_bordereau_versement = $uploadData['file_name'];
					    } else { 
					    	 $success=false;
					    	 $msg = $this->upload->display_errors();
					    } 
			}			
if(!empty($_FILES['file']['name'])) { 			
	$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_recu_bordereau_versement'=>$uploadData,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement);  
}
	else{*/
		$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_receptrice_id'=>$ie_banque_receptrice_id,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_objet'=>$ie_objet,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_compte_id'=>$ie_compte_id,'ie_ristourne_tva'=>$ie_ristourne_tva,'ie_transitaire_id'=>$ie_transitaire_id);	
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_banque', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addbanque');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addbanque');
//			redirect('incomexpense/addincomexpense');
		}
	}	

	
/*BEGIN CARBURANT*/	
	
	public function insertincomexpense_banque_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();
		$ie_compte_id = $banque['ie_compte_id'];
		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
		//$ie_objet = $banque['ie_objet'];
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		//$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];
		$addincomexpense = array('ie_date'=>$ie_date,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_compte_id'=>$ie_compte_id);	
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   
	 
// Insertion dans la table recharge carburant
	 
/*		if($this->db->insert_id()) {
			$addrecharge_carburant = array('ie_v_id'=>$this->input->post('tp_v_id'),'ccr_fueldate'=>$this->input->post('ie_date'),'ie_type'=>'income','ie_description'=>'payment from trip and '.$this->input->post('tp_notes'),'ccr_amount'=>$this->input->post('ie_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('fuel_carte_carburant_recharge',$addrecharge_carburant);
			//	$this->session->set_flashdata('successmessage', 'Paiement effectué avec succès');

			//redirect('incomexpense/details/'.$tp_ie_id);
			//echo "1";
		}*/	 

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_banque', $dataCompteur_incomexpense);        

	 
	 
	 
 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addbanque');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addbanque');
//			redirect('incomexpense/addincomexpense');
		}
	}	
/*END CARBURANT*/	
	
	
	
/* BEGIN RISTOURNE AND TVA*/
	
	
/* BEGIN RISTOURNE*/	

		public function insertincomexpense_paiement_ristourne_banque()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$banque = $this->input->post();
//		$ie_compte_id = $banque['ie_compte_id'];
		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
		$ie_ristourne_tva = $banque['ie_ristourne_tva'];
		$ie_transitaire_id = $banque['ie_transitaire_id'];

/*	    if($ie_ristourne_tva=="RISTOURNE"){
			$ie_transitaire_id = $banque['ie_transitaire_id'];
		}else {
			$ie_transitaire_id = NULL;
		}*/
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		$ie_trip_id = implode(',',$this->input->post('ie_trip_id'));
//		$ie_trip_id = $banque['ie_trip_id'];
        
		//$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];

		$addincomexpense = array('ie_transitaire_id'=>$ie_transitaire_id,'ie_date'=>$ie_date,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_ristourne_tva'=>$ie_ristourne_tva,'ie_trip_id'=>$ie_trip_id);	
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_banque', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('transitaire/transitaire_details/'.$ie_transitaire_id);
//				redirect('incomexpense/addincomexpense');incomexpense/addbanque
/*	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addbanque');
//			redirect('incomexpense/addincomexpense');
		}*/
	}	

	
/*END RISTOURNE*/	
	
	
	
	public function insertincomexpense_banque_sortie_ristournetva()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();
//		$ie_compte_id = $banque['ie_compte_id'];
		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
		$ie_ristourne_tva = $banque['ie_ristourne_tva'];
	    if($ie_ristourne_tva=="RISTOURNE"){
			$ie_transitaire_id = $banque['ie_transitaire_id'];
		}else {
			$ie_transitaire_id = 0;
		}
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		//$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];

		 $addincomexpense = array('ie_transitaire_id'=>$ie_transitaire_id,'ie_date'=>$ie_date,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_ristourne_tva'=>$ie_ristourne_tva);	//exit;
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_banque', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addbanque');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addbanque');
//			redirect('incomexpense/addincomexpense');
		}
	}	
/* END RISTOURNE AND TVA*/	
	

/* END RISTOURNE CAISSE*/	
	public function insertincomexpense_caisse_sortie_ristourne()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();
//		$ie_compte_id = $banque['ie_compte_id'];
		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
		$ie_ristourne_tva = $banque['ie_ristourne_tva'];
	    if($ie_ristourne_tva=="RISTOURNE"){
			$ie_transitaire_id = $banque['ie_transitaire_id'];
		}else {
			$ie_transitaire_id = NULL;
		}
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		//$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;

        $ie_banque_emettrice_id = $banque['ie_banque_emettrice_id'];

		$addincomexpense = array('ie_transitaire_id'=>$ie_transitaire_id,'ie_date'=>$ie_date,'ie_banque_emettrice_id'=>$ie_banque_emettrice_id,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_ristourne_tva'=>$ie_ristourne_tva);	
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_caisse', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addcaisse');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addcaisse');
//			redirect('incomexpense/addincomexpense');
		}
	}	
/* END RISTOURNE CAISSE*/	
	
	
	
	
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
	
	public function editreglement()
	{
		$this->load->model('trips_model');
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
//		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numeroreglement'] = $this->Incomexpense_model->get_numero_reglement_facture();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture(); //lister les factures validées
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();		
		
		$data['incomexpensedetails'] = $this->Incomexpense_model->editincomexpense($e_id);
		$this->template->template_render('incomexpense_add_reglementfacture',$data);
	}	
	
// BEGIN UPDATE BILL PAYMENT
	
	public function updatereglement()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('incomexpense/addreglement_facture');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('incomexpense/addreglement_facture');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addreglement_facture');
		}
	}	
// END UPDATE BILL PAYMENT		
	
	
	

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
	

	

		public function journalreglement_facture()	{
			
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->journalreglement_facture_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_numero_enregistrement'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('ie_banque_receptrice_id'),$this->input->post('t_customer_id'),$this->input->post('t_transitaire'),$this->input->post('t_reference'),$this->input->post('co_numero_conteneur'),$this->input->post('ie_numero')); 
				
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_reglementfacture();	
			}
			// permet d’afficher tous les elements de la liste		
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
//		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
//		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numeroreglement'] = $this->Incomexpense_model->get_numero_reglement_facture();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture(); //lister les factures validées
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées
		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_reglementfacture',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_reglementfacture',$data);
				
			}
			
	}	
	
		public function addreglement_facture()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id')); //echo $incomeexpensereport;
//			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('ie_banque_receptrice_id')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_reglementfacture();	
			}
			// permet d’afficher tous les elements de la liste		
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
//		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numeroreglement'] = $this->Incomexpense_model->get_numero_reglement_facture();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture(); //lister les factures validées
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();			
			
			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_reglementfacture',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_reglementfacture',$data);
				
			}
			
	}
	

	
/*		public function incomexpense_reglementfacture()	{
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
			//$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_reglementfacture();

		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_reglementfacture',$data);
	}
	
		public function incomexpense_reglementfacturelist()	{
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
			//$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_reglementfacture();

		}
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_add_reglementfacture',$data);
	}	
	*/
	
/*		public function addcaisse()	{
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
*/
	
	/* DEBUT CAISSE*/
	/* DEBUT ADD CAISSE*/
	
/* DEBUT AFFICHAGE BANQUE*/
	
			public function addcaisse()	{
		if(isset($_POST['incomeexpensereport'])) {
			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id')); //echo $incomeexpensereport;
//			$incomeexpensereport = $this->Incomexpense_model->incomexpense_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('ie_banque_receptrice_id')); //echo $incomeexpensereport;
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_caisse();	
			}
			// permet d’afficher tous les elements de la liste		

		$data['comptelist'] = $this->Incomexpense_model->getall_compte();
				
				$data['reglementlist'] = $this->Incomexpense_model->getall_caisse();//
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numero_compteurcaisse'] = $this->Incomexpense_model->get_numero_compteur_caisse();
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();			
			
			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_caisse',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_caisse',$data);
				
			}
			
	}
	
	/*FIN AFFICHAGE CAISSE*/
		
	
	/*DEBUT ADD CAISSE*/

	public function insertincomexpense_caisse()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$banque = $this->input->post();

		$ie_date = $banque['ie_date'];
		$ie_numero = $banque['ie_numero'];
		$ie_amount = $banque['ie_amount'];
        $ie_type_mouvement = $banque['ie_type_mouvement'];
//		$ie_objet = $banque['ie_objet'];
		$ie_espece_cheque = $banque['ie_espece_cheque'];
		//$ie_ieb_id = implode(',',$this->input->post('ie_ieb_id'));
        
		$ie_description = $banque['ie_description'];
        $ie_type = $banque['ie_type'];
		$ie_numero_enregistrement = $banque['ie_numero_enregistrement'];
		//$ie_objet = "BANQUE ".$ie_type;
		if($ie_type=="expense"){
 //       $ie_beneficiaire = 0;
		$ie_beneficiaire = $banque['ie_beneficiaire'];
		$ie_objet = $banque['ie_objet'];
			
		}
			

		if($ie_type=="expense"){
			$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement,'ie_beneficiaire'=>$ie_beneficiaire,'ie_objet'=>$ie_objet);		
		}else{
		$addincomexpense = array('ie_date'=>$ie_date,'ie_type_mouvement'=>$ie_type_mouvement,'ie_amount'=>$ie_amount,'ie_description'=>$ie_description,'ie_type'=>$ie_type,'ie_numero'=>$ie_numero,'ie_numero_enregistrement'=>$ie_numero_enregistrement);			
		}			
//	}
			
$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
			
			
 if($response)   {   

$dataCompteur_incomexpense = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('incomeexpense_compteur_caisse', $dataCompteur_incomexpense);        

 
//		return $this->db->insert_id();
	} 			
			
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_mode_paiement').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense/addcaisse');
//				redirect('incomexpense/addincomexpense');
	} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense/addcaisse');
//			redirect('incomexpense/addincomexpense');
		}
	}
	
/*FIN ADD CAISSE*/	
	
	
/*DEBUT JOURNAL CAISSE*/	
	
		public function journalcaisse()	{
		if(isset($_POST['incomeexpensereport'])) {
		//	exit;
			$incomeexpensereport = $this->Incomexpense_model->caisse_reports($this->input->post('incomeexpense_from'),$this->input->post('incomeexpense_to'),$this->input->post('ie_ieb_id'),$this->input->post('ie_numero_enregistrement'),$this->input->post('ie_banque_emettrice_id'),$this->input->post('t_customer_id'),$this->input->post('t_transitaire'),$this->input->post('t_reference'),$this->input->post('co_numero_conteneur'),$this->input->post('ie_numero')); 
				
			if(empty($incomeexpensereport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['incomexpense'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['incomexpense'] = $incomeexpensereport;
			}
		}else{
			$data['incomexpense'] = $this->Incomexpense_model->get_incomexpense_caisse();	
			}
			// permet d’afficher tous les elements de la liste		
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['banquelist'] = $this->Banque_model->getall_banque();
//		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//
//		$data['facturelist'] = $this->Incomexpense_model->getall_facture();
		$data['numero_compteurcaisse'] = $this->Incomexpense_model->get_numero_compteur_caisse();
		$data['facturelist'] = $this->Incomexpense_model->getall_facture(); //lister les factures validées
		//$data['facturelist'] = $this->Incomexpense_model->getall_facture_validee(); //lister les factures validées
		$data['transitairelist'] = $this->Incomexpense_model->getall_transitairelist();       
        $data['customerlist'] = $this->Incomexpense_model->getall_customer();


			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();

			if(isset($_POST['incomeexpensereport'])) {
				$this->template->template_render('incomexpense_add_caisse',$data);

			}else
			{
				$this->template->template_render('incomexpense_add_caisse',$data);
				
			}
			
	}	
/*FIN JOURNAL CAISSE*/
	
	
/* FIN CAISSE*/	
	
// FIN BANQUE ENTREE	
	
/*			public function caisse()	{
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
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();//

			//		$data['facturelist'] = $this->facture_model->getall_facture();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('incomexpense_caisse',$data);
	}*/
	
/* FIN AJOUT ALIMENTATION*/	

/*		public function details()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$tripdetails = $this->trips_model->get_tripdetails($b_id);
		if(isset($tripdetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($tripdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails[0]['t_id']);
			$data['tripdetails'] = $tripdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
		}
		$this->template->template_render('incomexpense_details',$data);
	}*/
	
	public function details() //function that displays details
	{
		$data = array();
		$ie_id = $this->uri->segment(3);
//		echo "id".$ie_id = $this->uri->segment(3);

		$incomexpensedetails = $this->Incomexpense_model->get_incomexpensedetails($ie_id);


        
		if(isset($incomexpensedetails[0]['ie_id'])) {
			//echo "bonjour";exit;

			$data['paymentdetails'] = $this->Facture_model->get_paymentdetails($incomexpensedetails[0]['ie_id']);
			
//			$data['paymentdetails2'] = $this->Facture_model->get_paymentdetails($paiementdetails[0]['ie_id']);
			
			
           $data['facturelist'] = $this->Facture_model->getall_facture();
		   $data['facturedetails'] = $this->Facture_model->get_facturedetails($incomexpensedetails[0]['ie_id']);

		   $data['facturetransitaire'] = $this->Incomexpense_model->get_facturetransitaire($incomexpensedetails[0]['ie_transitaire_id']);
			
			
//			$data['banqueemetrice'] = $this->Incomexpense_model->get_banquedetails($incomexpensedetails[0]['ie_id']);			

			
/*

			$customerdetails = $this->customer_model->get_customerdetails($tripdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($tripdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->trips_model->get_paymentdetails($tripdetails[0]['t_id']);
			$data['tripdetails'] = $tripdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';


*/			

			$banqueemettrice = $this->Incomexpense_model->get_incomexpensedetails_banqueemettrice($incomexpensedetails[0]['ie_banque_emettrice_id']);

			$banquereceptrice = $this->Incomexpense_model->get_incomexpensedetails_banquereceptrice($incomexpensedetails[0]['ie_banque_receptrice_id']);

			$data['banqueemettrice'] = (isset($banqueemettrice[0]['ieb_id']))?$banqueemettrice[0]:'';
			$data['banquereceptrice'] =  (isset($banquereceptrice[0]['ieb_id']))?$banquereceptrice[0]:'';		
			
	//		$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($incomexpensedetails[0]['ie_id']);			
//			$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($banquedetails[0]['ie_id']);			
			
            $data['incomexpensedetails'] = $incomexpensedetails[0];
			$data['paiementreglementdetails'] = $this->Incomexpense_model->get_paiementdetails($incomexpensedetails[0]['ie_id']);
 			//$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);    
        }
		$this->template->template_render('incomexpense_details',$data);
        
 //       $data['zonelist'] = $this->facture_model->getall_zonelist();
        
    }/**/
 
	public function details_banque() //function that displays details
	{
		$data = array();
		$ie_id = $this->uri->segment(3);
//		echo "id".$ie_id = $this->uri->segment(3);

		$incomexpensedetails = $this->Incomexpense_model->get_incomexpensedetails_banque($ie_id);


        
		if(isset($incomexpensedetails[0]['ie_id'])) {
			//echo "bonjour";exit;

//			$data['paymentdetails'] = $this->Facture_model->get_paymentdetails($incomexpensedetails[0]['ie_id']);
			
//			$data['paymentdetails2'] = $this->Facture_model->get_paymentdetails($paiementdetails[0]['ie_id']);
			
			
           $data['facturelist'] = $this->Facture_model->getall_facture();
		   $data['facturedetails'] = $this->Facture_model->get_facturedetails($incomexpensedetails[0]['ie_id']);

		   $data['facturetransitaire'] = $this->Incomexpense_model->get_facturetransitaire($incomexpensedetails[0]['ie_transitaire_id']);
			
			
		

			$banqueemettrice = $this->Incomexpense_model->get_incomexpensedetails_banqueemettrice($incomexpensedetails[0]['ie_banque_emettrice_id']);

			$banquereceptrice = $this->Incomexpense_model->get_incomexpensedetails_banquereceptrice($incomexpensedetails[0]['ie_banque_receptrice_id']);

			$data['banqueemettrice'] = (isset($banqueemettrice[0]['ieb_id']))?$banqueemettrice[0]:'';
			$data['banquereceptrice'] =  (isset($banquereceptrice[0]['ieb_id']))?$banquereceptrice[0]:'';		
			
	//		$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($incomexpensedetails[0]['ie_id']);			
//			$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($banquedetails[0]['ie_id']);			
			
            $data['incomexpensedetails'] = $incomexpensedetails[0];
		//	$data['paiementreglementdetails'] = $this->Incomexpense_model->get_paiementdetails($incomexpensedetails[0]['ie_id']);
 			//$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);    
        }
		$this->template->template_render('incomexpense_details_banque',$data);
        
 //       $data['zonelist'] = $this->facture_model->getall_zonelist();
        
    }/**/
public function incomexpense_generation_pdf()
	{
		$data = array();
		$ie_id = $this->uri->segment(3);
		$incomexpensedetails = $this->Incomexpense_model->get_incomexpensedetails($ie_id);
 
		if(isset($incomexpensedetails[0]['ie_id'])) {
			//echo "bonjour";exit;

			$data['paymentdetails'] = $this->Facture_model->get_paymentdetails($incomexpensedetails[0]['ie_id']);
           $data['facturelist'] = $this->Facture_model->getall_facture();

			$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($incomexpensedetails[0]['ie_id']);			
//			$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($banquedetails[0]['ie_id']);			
			
            $data['incomexpensedetails'] = $incomexpensedetails[0];
			$data['paiementreglementdetails'] = $this->Incomexpense_model->get_paiementdetails($incomexpensedetails[0]['ie_id']);
			
/*			$data['banqueemettrice'] = $this->Incomexpense_model->get_incomexpensedetails_banqueemettrice($incomexpensedetails[0]['ie_banque_emettrice_id']);

			$data['banquereceptrice'] = $this->Incomexpense_model->get_incomexpensedetails_banquereceptrice($incomexpensedetails[0]['ie_banque_receptrice_id']);*/			
			
			$banqueemettrice = $this->Incomexpense_model->get_incomexpensedetails_banqueemettrice($incomexpensedetails[0]['ie_banque_emettrice_id']);

			$banquereceptrice = $this->Incomexpense_model->get_incomexpensedetails_banquereceptrice($incomexpensedetails[0]['ie_banque_receptrice_id']);

			$data['banqueemettrice'] = (isset($banqueemettrice[0]['ieb_id']))?$banqueemettrice[0]:'';
			$data['banquereceptrice'] =  (isset($banquereceptrice[0]['ieb_id']))?$banquereceptrice[0]:'';
  
			$transitairereglement = $this->Incomexpense_model->get_transitairereglement($incomexpensedetails[0]['ie_transitaire_id']);
		
			$data['transitairereglement'] =  (isset($transitairereglement[0]['tra_id']))?$transitairereglement[0]:'';
			
		}	
            
		$this->load->view('incomexpense_generation_pdf',$data);
	}	
	
	
/*	public function paiementreglementdetails()
	{
		$data = array();
		echo "idddqs".$ie_id = $this->uri->segment(3);exit();

		$paiementreglementdetails = $this->Incomexpense_model->get_incomexpensedetails($ie_id);

echo "merci merci";exit;
        
		if(isset($paiementreglementdetails[0]['ie_id'])) {
			echo "bonjour";exit;

			$data['paymentdetails'] = $this->Facture_model->get_paymentdetails($paiementreglementdetails[0]['ie_id']);
           $data['facturelist'] = $this->Facture_model->getall_facture();
            
            $data['paiementreglementdetails'] = $paiementreglementdetails[0];
     
        }
		$this->template->template_render('incomexpense_details',$data);
        
 //       $data['zonelist'] = $this->facture_model->getall_zonelist();
        
    }*/	
	
	
	public function trippayment()
	{
		$paiement = $this->input->post();
		//exit;
		
		$tp_date = $paiement['tp_date'];
		$tp_type = $paiement['tp_type'];
		$tp_amount = $paiement['tp_amount'];
        $tp_ie_id = $paiement['tp_ie_id'];
		$tp_trip_id = $paiement['tp_trip_id'];
        
/*		$ie_description = $numero_facture['ie_description'];
		$ie_objet = "Réglement de facture";
        $ie_type = $numero_facture['ie_type'];
        $ie_banque_emettrice_id = $numero_facture['ie_banque_emettrice_id'];*/
			
	$addpaiement = array('tp_date'=>$tp_date,'tp_type'=>$tp_type,'tp_amount'=>$tp_amount,'tp_ie_id'=>$tp_ie_id,'tp_created_date'=>date('Y-m-d'),'tp_trip_id'=>$tp_trip_id);/*
		
			$addpaiement = array('tp_ie_id'=>$this->input->post('tp_ie_id'),'tp_trip_id'=>$this->input->post('tp_trip_id'),'tp_date'=>date('Y-m-d'),'tp_type'=>$this->input->post('tp_type'),'tp_amount'=>$this->input->post('tp_amount'),'tp_created_date'=>date('Y-m-d'));*/
			$this->db->insert('trip_payments',$addpaiement);		
		
		//$this->db->insert('trip_payments',$addpaiement);
		if($this->db->insert_id()) {
			//$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from trip and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			//$this->db->insert('incomeexpense',$addincome);
				$this->session->set_flashdata('successmessage', 'Paiement effectué avec succès');

			redirect('incomexpense/details/'.$tp_ie_id);
			//echo "1";
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('incomexpense/details/'.$tp_ie_id);//echo "2";exit;
		}
	}	
	
/* DEBUT DETAIL CONTENEUR*/
 
	public function paiementdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$paiementdetails = $this->Incomexpense_model->get_paiementdetails($b_id);
		if(isset($paiementdetails[0]['tp_id'])) {
/*			$customerdetails = $this->customer_model->get_customerdetails($paiementdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($paiementdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($paiementdetails[0]['ie_id']);*/
            //$data['banquedetails'] = (isset($banquedetails[0]['ieb_id']))?$customerdetails[0]:'';
/*			$data['banquedetails'] = $this->Incomexpense_model->get_banquedetails($banquedetails[0]['tp_id']);*/
			
			/*debut conteneur*/
			$data['paiementdetails'] = $this->Incomexpense_model->get_paiementdetails($paiementdetails[0]['tp_id']);


			/*fin conteneur*/            
            
            $data['facturedetails'] = $paiementdetails[0];
/*			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
*/

            $compagniedetails = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';            
            
            }
//		$this->load->view('facture_generation',$data);
		$this->template->template_render('incomexpense_details',$data);        
//		$this->load->view('facture_generation',$data);
	} 	
	
/* DEBUT DETAIL PAIEMENT FACTURE*/
 
/*	public function conteneurdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$conteneurdetails = $this->facture_model->get_conteneurdetails($b_id);
		if(isset($conteneurdetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($conteneurdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($conteneurdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($conteneurdetails[0]['t_id']);
            
//debut conteneur
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($conteneurdetails[0]['t_id']);
//fin conteneur            
            
            $data['facturedetails'] = $conteneurdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

// pour afficher la compagnie 

//			$data['compagniedetails'] = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
            
            $compagniedetails = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';            
            
            }
//		$this->load->view('facture_generation',$data);
		$this->template->template_render('facture_details',$data);        
//		$this->load->view('facture_generation',$data);
	}*/

	
/* DEBUT DETAIL PAIEMENT*/
 
//	public function conteneurdetails()
	public function conteneurdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
//		$conteneurdetails = $this->incomexpense_model->get_trip_paymentsdetails($b_id);
		$conteneurdetails = $this->incomexpense_model->get_conteneurdetails($b_id);
		if(isset($conteneurdetails[0]['ie_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($conteneurdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($conteneurdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($conteneurdetails[0]['t_id']);
            
//debut conteneur
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($conteneurdetails[0]['t_id']);
//fin conteneur            
            
            $data['facturedetails'] = $conteneurdetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

// pour afficher la compagnie 

//			$data['compagniedetails'] = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
            
            $compagniedetails = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';            
            
            }
//		$this->load->view('facture_generation',$data);incomexpense_details
		$this->template->template_render('incomexpense/details/'.$tp_ie_id,$data);        
//		$this->load->view('facture_generation',$data);
	}  	
	
	
/* FIN DETAIL PAIEMENT FACTURE*/
	
// BEGIN delete paiement	
	public function reglementfacture_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('incomexpense/details/'.$this->uri->segment(4));
	}
	
// delete paiement
	
	
	public function reglement_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('incomeexpense', array('ie_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Réglement supprimé avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Réglement non supprimé');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('incomexpense/addreglement_facture#custom-tabs-one-journal');
	}   	
	
/*Debut supp conteneur*/    
    
	public function paiementreglementfacture_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_payments', array('co_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Paiement du réglement de la facture effectué avec succés...');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$this->uri->segment(4));
	} 
	
	
	public function reglement()
	{
		$data['reglementlists'] = $this->Incomexpense_model->getall_reglement();
//		$data['conteneur'] = $this->conteneur_model->getall_conteneur();
		$this->template->template_render('incomexpense/incomexpense_reglement',$data);
	}
	
	
 function fetch_transitaire()
 { //echo "bjr";exit;
  if($this->input->post('ie_compte_id'))
  {
   echo $this->incomexpense_model->fetch_transitaire($this->input->post('ie_compte_id'));
  }
 }
	
	 function fetch_bon_carburant()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id'))
  {
   echo $this->incomexpense_model->fetch_bon_carburant($this->input->post('mi_vehicle_id'));
  }
 }	
	
	
}
