<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piece_rechange_pneu extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('piece_rechange_pneu_model');
          $this->load->model('fuel_carte_carburant_recharge_model');
          $this->load->model('piece_rechange_fournisseur_model');
           $this->load->model('piece_rechange_marque_model');
         $this->load->model('vehicle_model');
          $this->load->model('trips_model');
          $this->load->model('drivers_model');
          $this->load->model('fuel_compagnie_model');
 //         $this->load->model('trips_model');
          $this->load->library('tcpdf_Pdf_Library');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

/*	public function index()
	{
		//$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		
		
		
		
		$this->template->template_render('piece_rechange_pneu_add',$data);
	}*/
	
	public function index()
	{
		$this->load->model('trips_model');

 		$data['numero_pneu_entree'] = $this->piece_rechange_pneu_model->get_numero_pneu_entree();
 		$data['numero_pneu_sortie'] = $this->piece_rechange_pneu_model->get_numero_pneu_sortie();

				if(isset($_POST['journal_piece_rechange_pneu'])) {
			$data['fuel_journal_piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));//exit;

		}			
			else{
		}
			$data['piece_rechange_pneu_entree_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_entree();
		
			$data['piece_rechange_pneu_sortie_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_sortie();	
		
			$data['piece_rechange_pneu_reference_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_reference_list();		
		
			$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		
			$data['piece_rechange_pneu_tab_paiement_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_paiement();
			$data['fournisseurlist'] = $this->piece_rechange_pneu_model->getall_piece_rechange_fournisseurs_entree();

	
		$data['marquelist'] = $this->piece_rechange_pneu_model->get_piece_rechange_marque();		

		$data['positionlist'] = $this->piece_rechange_pneu_model->get_piece_rechange_position();		
		
		
		
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();	
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant();
		$data['station_service'] = $this->piece_rechange_pneu_model->fetch_station_service();

		//$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['paiement_piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getpaiement_piece_rechange_pneu();
		$data['paiement_piece_rechange_pneulist'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();

		
		
		$data['journal_list'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();		
	
			$data['numero_entree_dans_sortie_list'] = $this->piece_rechange_pneu_model->get_entree_dans_sortie_list();				
		
		//$data['piece_rechange_pneu_tab_paiement_list'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();

		$this->template->template_render('piece_rechange_pneu_add',$data);
	}	
	
	
	public function addpiece_rechange_pneu()
	{
		$this->load->model('trips_model');

 		$data['numero_pneu'] = $this->piece_rechange_pneu_model->get_numero_pneu();

				if(isset($_POST['journal_piece_rechange_pneu'])) {
			$data['fuel_journal_piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));//exit;

		}			
			/*else{
		}*/
		

			$data['piece_rechange_pneu_entree_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_entree();
	
			$data['numero_entree_dans_sortie_list'] = $this->piece_rechange_pneu_model->get_entree_dans_sortie_list();		
		
			$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		
			$data['piece_rechange_pneu_tab_paiement_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_paiement();
		
		$data['incomeexpenselist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_incomeexpense();	
		$data['carte_carburantlist'] = $this->fuel_carte_carburant_recharge_model->getall_fuel_carte_carburant();
		$data['marquelist'] = $this->piece_rechange_pneu_model->get_piece_rechange_marque();
		$data['station_service'] = $this->piece_rechange_pneu_model->fetch_station_service();

		//$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['paiement_piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getpaiement_piece_rechange_pneu();
		$data['paiement_piece_rechange_pneulist'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();

		$data['journal_list'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();		
		
/*		$data['numero_bon_entree_pour_sortie_list'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu_entree_list();*/

		//$data['piece_rechange_pneu_tab_paiement_list'] = $this->piece_rechange_pneu_model->getallpaiement_piece_rechange_pneu();
		
		$this->template->template_render('piece_rechange_pneu_add',$data);
	}
	
	public function insertpiece_rechange_pneu_entree()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$piece_rechange_pneu = $this->input->post();

/*BEGIN ADD*/
		$pr_type = $piece_rechange_pneu['pr_type'];			
		$pr_numero = $piece_rechange_pneu['pr_numero'];			
		$pr_reference = $piece_rechange_pneu['pr_reference'];			
		$pr_date = $piece_rechange_pneu['pr_date'];			
		$pr_fournisseur_id = $piece_rechange_pneu['pr_fournisseur_id'];			
		$pr_desc = $piece_rechange_pneu['pr_desc'];			
		$pr_created_date = $piece_rechange_pneu['pr_created_date'];	
		$pr_created_by = $piece_rechange_pneu['pr_created_by'];		
		$pr_marque_id = $piece_rechange_pneu['pr_marque_id'];
		$pr_prix = $piece_rechange_pneu['pr_prix'];		
		$pr_type_paiement = $piece_rechange_pneu['pr_type_paiement'];


//Prix du litre du carburant	
			$montant = 0;
			/*$prix_carburant = 0;
			$prix_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;*/

//$montant = $pr_prix * $pr_quantite;			
$montant = $pr_prix;			

	 $add_piece_rechange_pneu = array('pr_type'=>$pr_type,'pr_numero'=>$pr_numero,'pr_reference'=>$pr_reference,'pr_date'=>$pr_date,'pr_desc'=>$pr_desc,'pr_created_date'=> $pr_created_date,'pr_created_by'=>$pr_created_by,'pr_fournisseur_id'=>$pr_fournisseur_id,'pr_montant'=>$montant,'pr_prix'=>$pr_prix,'pr_marque_id'=>$pr_marque_id,'pr_type_paiement'=>$pr_type_paiement);//exit;		
			
		 $response = $this->db->insert('piece_rechange_pneu',$add_piece_rechange_pneu);	//exit;		

			
$dataCompteur_piece_rechange_pneu = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('piece_rechange_pneu_compteur_entree', $dataCompteur_piece_rechange_pneu);			

			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('piece_rechange_pneu');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_pneu');
		}
	}
	
/*BEGIN SORTIE*/
	
	public function insertpiece_rechange_pneu_sortie()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$piece_rechange_pneu = $this->input->post();

/*BEGIN ADD*/
		$pr_type = $piece_rechange_pneu['pr_type'];			
		$pr_numero = $piece_rechange_pneu['pr_numero'];			
		$pr_reference = $piece_rechange_pneu['pr_reference'];			
		$pr_date = $piece_rechange_pneu['pr_date'];			
		$pr_fournisseur_id = $piece_rechange_pneu['pr_fournisseur_id'];		
		$pr_desc = $piece_rechange_pneu['pr_desc'];			
		$pr_created_date = $piece_rechange_pneu['pr_created_date'];	
		$pr_created_by = $piece_rechange_pneu['pr_created_by'];		
		$pr_marque_id = $piece_rechange_pneu['pr_marque_id'];
		//$pr_prix = $piece_rechange_pneu['pr_prix'];		
//		$pr_type_paiement = $piece_rechange_pneu['pr_type_paiement'];
		$pr_numero_bon_entree_id = $piece_rechange_pneu['pr_numero_bon_entree_id'];
		$pr_vehicule_id = $piece_rechange_pneu['pr_vehicule_id'];	
		$pr_driver_id = $piece_rechange_pneu['pr_driver_id'];
		$pr_position_id = $piece_rechange_pneu['pr_position_id'];
			

//Prix du litre du carburant	
			$montant = 0;
			/*$prix_carburant = 0;
			$prix_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;*/

//$montant = $pr_prix * $pr_quantite;			
//$montant = $pr_prix;			

	 $add_piece_rechange_pneu = array('pr_type'=>$pr_type,'pr_numero'=>$pr_numero,'pr_reference'=>$pr_reference,'pr_date'=>$pr_date,'pr_desc'=>$pr_desc,'pr_created_date'=> $pr_created_date,'pr_created_by'=>$pr_created_by,'pr_fournisseur_id'=>$pr_fournisseur_id,'pr_marque_id'=>$pr_marque_id,'pr_numero_bon_entree_id'=>$pr_numero_bon_entree_id,'pr_vehicule_id'=>$pr_vehicule_id,'pr_driver_id'=>$pr_driver_id,'pr_position_id'=>$pr_position_id);//exit;		
			
		 $response = $this->db->insert('piece_rechange_pneu',$add_piece_rechange_pneu);	//exit;		
$dataCompteur_piece_rechange_pneu = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('piece_rechange_pneu_compteur_sortie', $dataCompteur_piece_rechange_pneu);			

			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('piece_rechange_pneu');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_pneu');
		}
	}	
/*END SORTIE*/	
	
	
	public function insertpiece_rechange_pneu()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			
		$piece_rechange_pneu = $this->input->post();

/*BEGIN ADD*/
		$pr_quantite = $piece_rechange_pneu['pr_quantite'];			
		$pr_numero = $piece_rechange_pneu['pr_numero'];			
		$pr_vehicule_id = $piece_rechange_pneu['pr_vehicule_id'];			
		$pr_date = $piece_rechange_pneu['pr_date'];			
		$pr_quantite = $piece_rechange_pneu['pr_quantite'];			
		$pr_desc = $piece_rechange_pneu['pr_desc'];			
		$pr_created_date = $piece_rechange_pneu['pr_created_date'];	
		$pr_compagnie_id = $piece_rechange_pneu['pr_compagnie_id'];		
		$pr_driver_id = $piece_rechange_pneu['pr_driver_id'];

	    $quantite_restante = 0;

//Prix du litre du carburant	
			$montant_carburant = 0;
			$prix_carburant = 0;
			$prix_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;

$montant_carburant = $prix_carburant * $pr_quantite;			

	

	$add_piece_rechange_pneu = array('pr_numero'=>$pr_numero,'pr_vehicule_id'=>$pr_vehicule_id,'pr_date'=>$pr_date,'pr_quantite'=>$pr_quantite,'pr_desc'=>$pr_desc,'pr_created_date'=> $pr_created_date,'pr_compagnie_id'=>$pr_compagnie_id,'pr_driver_id'=>$pr_driver_id,'pr_montant'=>$montant_carburant);		
			
		$response = $this->db->insert('piece_rechange_pneu',$add_piece_rechange_pneu);			

			
$dataCompteur_piece_rechange_pneu = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('trip_compteur_piece_rechange_pneu', $dataCompteur_piece_rechange_pneu);			

			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('piece_rechange_pneu/addpiece_rechange_pneu');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_pneu/addpiece_rechange_pneu');
		}
	}

/*BEGIN PAIEMENT*/	
	
	public function insert_paiementpiece_rechange_pneu()
	{


		$piece_rechange_pneu = $this->input->post();
		//$permissionD = $piece_rechange_pneu['permission'];		
		$ccrp_date = $piece_rechange_pneu['ccrp_date'];
		$ccrp_compagnie_id = $piece_rechange_pneu['ccrp_compagnie_id'];
			
	$addincomexpense = array('ccrp_date'=>$ccrp_date,'ccrp_compagnie_id'=>$ccrp_compagnie_id,'ccrp_piece_rechange_pneu_id'=> implode(',', (array) $this->input->post('ccrp_piece_rechange_pneu_id'))); //exit; /**/  
			
	  $response = $this->piece_rechange_pneu_model->add_piece_rechange_pneu($addincomexpense);
		
		
			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('piece_rechange_pneu/addpiece_rechange_pneu');

	}	
/*END PAIEMENT*/	
	
	
	public function editpiece_rechange_pneu()
	{
		$pr_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['piece_rechange_pneudetails'] = $this->piece_rechange_pneu_model->editpiece_rechange_pneu($pr_id);
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();		
		$this->template->template_render('piece_rechange_pneu_add',$data);
	}

	public function updatepiece_rechange_pneu()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->piece_rechange_pneu_model->updatepiece_rechange_pneu($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('piece_rechange_pneu/addpiece_rechange_pneu');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('piece_rechange_pneu/addpiece_rechange_pneu');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_pneu/addpiece_rechange_pneu');
		}
	}
	

	public function journal($from,$to,$v_id) { 
		$piece_rechange_pneu = array();
		if($v_id=='all') {
			$where = array('pr_date>='=>$from,'pr_date<='=>$to);
		} else {
			$where = array('pr_date>='=>$from,'pr_date<='=>$to,'pr_vehicule_id'=>$v_id);
		}
		
		$piece_rechange_pneu = $this->db->select('*')->from('piece_rechange_pneu')->where($where)->order_by('pr_id','desc')->get()->result_array();
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$piece_rechange_pneus['pr_vehicule_id'])->get()->row();
				$newpiece_rechange_pneu[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['pr_driver_id'])->get()->row();
			}
			return $newpiece_rechange_pneu;
		} else 
		{
			return array();
		}
	}	
	
	
 function fetch_numero_bon_commande()
 { //echo "bjr";exit;
  if($this->input->post('fetch_numero_bon_commande'))
  {
   echo $this->piece_rechange_pneu_model->fetch_numero_bon_commande($this->input->post('fetch_numero_bon_commande'));
  }
 }	
	
 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->piece_rechange_pneu_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	
	
/*DEBUT VALIDATION PAIEMENT BON CARBURANT*/	

	public function piece_rechange_pneu_paiement_validation()
	{
		$id = $this->uri->segment(3);
        $ccrp_statut=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        'ccrp_statut' => $ccrp_statut
);

$this->db->where('ccrp_id', $id);
$response = $this->db->update('fuel_carte_carburant_recharge_payments', $data);  

		if($response) {
			$this->session->set_flashdata('successmessage', 'Paiement Bon carburant validé avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Paiement Bon carburant non validé');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('piece_rechange_pneu/addpiece_rechange_pneu');
		
		redirect('reports/piece_rechange_pneu');	
	
	}
/*FIN VALIDATION PAIEMENT BON CARBURANT*/	
	
	public function piece_rechange_pneu_validation()
	{
		$id = $this->uri->segment(3);
        $pr_type=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        'pr_type' => $pr_type
);

$this->db->where('pr_id', $id);
$response = $this->db->update('piece_rechange_pneu', $data);        

		
/*DEBUT VALIDATION */		
/*RECUPERATION DONNEES DE LA MISSION*/
		$requete_bc='';	 
$restant_bc=0;	 
$row_bc = "";		
//$requete="";	 
	 $requete_bc = "pr_id=$id";

  $this->db->where($requete_bc);
 // $this->db->order_by('mi_id', 'desc');
  $query = $this->db->get('piece_rechange_pneu');
  $row_bc = $query->row();

		if($row_bc != ''){
			
		$pr_quantite = $row_bc->pr_quantite;			
		$pr_numero = $row_bc->pr_numero;			
		$pr_vehicule_id = $row_bc->pr_vehicule_id;			
		$pr_date = $row_bc->pr_date;			
		//$pr_quantite = $row_bc->pr_quantite;			
		$pr_desc = $row_bc->pr_desc;			
		$pr_created_date = $row_bc->pr_created_date;	
		$pr_compagnie_id = $row_bc->pr_compagnie_id;			
	 }		
/*FIN RECUPERATION DONNEES DE LA MISSION*/		
	 
/*DEBUT INSERTION TABLE JOURNAL*/
			
			$fjc_type='';
			$fjc_type='BON CARBURANT';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_pr_id'=>$id,'fjc_pr_numero'=>$pr_numero,'fjc_v_id'=>$pr_vehicule_id,'fjc_date'=>$pr_date,'fjc_quantite'=>$pr_quantite,'fjc_description'=>$pr_desc,'fjc_created_date'=> $pr_created_date,'fjc_comp_id'=>$pr_compagnie_id,'fjc_type'=>$fjc_type);		
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);		//echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL*/			
		
/*DEBUT INSERTION TABLE JOURNAL AGS*/

		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL AGS */		

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

		$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$pr_vehicule_id";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = 0;
	 $carburant_quantite_totale = 0;
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
		$carburant_quantite_totale = $row_quantite->v_quantite_totale;
		
	 }
$quantite_carburant_restant = 0;	 
$quantite_carburant_totale = 0;	 
$quantite_carburant_restant = $carburant_restant + $pr_quantite;		
$quantite_carburant_totale = $carburant_quantite_totale + $pr_quantite;		
		$this->db->where('v_id',$pr_vehicule_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); 		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/			
		
	/*	$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$pr_vehicule_id";

  $this->db->where($requete);
  $this->db->order_by('v_id', 'desc');
  $query = $this->db->get('vehicles');
$row_quantite = $query->row();
	 $carburant_restant = 0;
	 $carburant_quantite_totale = 0;
	 if($row_quantite != ''){
		$carburant_restant = $row_quantite->v_quantite_restant;		 
		$carburant_quantite_totale = $row_quantite->v_quantite_totale;
		
	 }
$quantite_carburant_restant = 0;	 
$quantite_carburant_totale = 0;	 
$quantite_carburant_restant = $carburant_restant + $mi_quantite_carburant;		
$quantite_carburant_totale = $carburant_quantite_totale + $mi_quantite_carburant;		
		$this->db->where('v_id',$pr_vehicule_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); */		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/		 
		
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Bon carburant validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Bon carburant non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('piece_rechange_pneu/addpiece_rechange_pneu');
		
		redirect('reports/piece_rechange_pneu');
		
	}    
   
    
    /*Fin Validation*/    	

public function piece_rechange_pneu_pdf()
	{
		$data = array();
		$pr_id = $this->uri->segment(3);
		$piece_rechange_pneudetails= $this->piece_rechange_pneu_model->editpiece_rechange_pneu($pr_id);	
		//$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($piece_rechange_pneudetails[0]['pr_id'])) {
			
            $data['piece_rechange_pneudetails'] = $piece_rechange_pneudetails[0];
			
/*			$driverdetails = $this->drivers_model->get_driverdetails($piece_rechange_pneudetails[0]['pr_driver_id']);
			
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';*/
			
// pour afficher la compagnie 
            $compagniedetails = $this->fuel_compagnie_model->get_fuel_compagniedetails($piece_rechange_pneudetails[0]['pr_compagnie_id']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['ccc_id']))?$compagniedetails[0]:'';
			

			$vechicledetails = $this->vehicle_model->get_vehicledetails($piece_rechange_pneudetails[0]['pr_vehicule_id']);		
			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';

			
			$driverdetails = $this->drivers_model->get_driverdetails($piece_rechange_pneudetails[0]['pr_driver_id']);
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
			
			
/*			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';			
			
		$pr_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['piece_rechange_pneu'] = $this->piece_rechange_pneu_model->getall_piece_rechange_pneu();*/
			
		/*$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['piece_rechange_pneudetails'] = $this->piece_rechange_pneu_model->editpiece_rechange_pneu($piece_rechange_pneudetails[0]['pr_id']);
		$data['fuel_compagnielist'] = $this->fuel_compagnie_model->getall_fuel_compagnie();*/				
			
			
			//$vechicledetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			//$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['pr_driver_id']);
			/*$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
            
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
            
 
            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
            //$zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);            
//            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';            
// pour afficher la compagnie 
            $compagniedetails = $this->compagnie_model->get_compagniedetails($facturedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';*/ 
            
            }
		$this->load->view('piece_rechange_pneu_pdf',$data);
	}	

	
public function piece_rechange_pneu_paiement_pdf()
	{
		$data = array();
		$pr_id = $this->uri->segment(3);
		$piece_rechange_pneudetails= $this->piece_rechange_pneu_model->piece_rechange_pneu_paiement_pdf($pr_id);	
		//$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($piece_rechange_pneudetails[0]['ccrp_id'])) {
			
            $data['piece_rechange_pneudetails'] = $piece_rechange_pneudetails[0];
			
/*
            $compagniedetails = $this->fuel_compagnie_model->get_fuel_compagniedetails($piece_rechange_pneudetails[0]['pr_compagnie_id']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['ccc_id']))?$compagniedetails[0]:'';
			

			$vechicledetails = $this->vehicle_model->get_vehicledetails($piece_rechange_pneudetails[0]['pr_vehicule_id']);		
			$data['vechicledetails'] = (isset($vechicledetails[0]['v_id']))?$vechicledetails[0]:'';

			
			$driverdetails = $this->drivers_model->get_driverdetails($piece_rechange_pneudetails[0]['pr_driver_id']);
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';*/
			
            }
		$this->load->view('piece_rechange_pneu_paiement_pdf',$data);
	}	
	
}
