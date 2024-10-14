<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mission extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('mission_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
          $this->load->model('pregate_model');	
//          $this->load->model('pregate_model');	


     }

	public function index()
	{
		$data['mission'] = $this->mission_model->getall_mission();
 		$data['country'] = $this->mission_model->fetch_country();
		$this->template->template_render('mission',$data);
	}
	
	 function ajax_pregate_conteneur()
 {
		 
	  if($this->input->post('pr_trip_id'))
	  {
		   echo $this->mission_model->ajax_pregate_conteneur($this->input->post('pr_trip_id'));
	  }
		 
 }
	

	public function mission_validation()
	{
		$id = $this->uri->segment(3);
        $mi_validation=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        $createur = "";
        $validation_date = "";
		$createur = $this->session->userdata['session_data']['u_id'];
        $validation_date = date('Y-m-d h:i:s');

		$data = array(
        'mi_validation' => $mi_validation,
        'mi_validation_date' => $validation_date,
        'mi_validation_by' => $createur
);

$this->db->where('mi_id', $id);
$response = $this->db->update('trip_mission', $data);  

	
/*RECUPERATION DONNEES DE LA MISSION*/
		$requete_mission='';	 
$restant_mission=0;	 
$row_mission = "";		
//$requete="";	 
	 $requete_mission = "mi_id=$id";

  $this->db->where($requete_mission);
 // $this->db->order_by('mi_id', 'desc');
  $query = $this->db->get('trip_mission');
  $row_mission = $query->row();

		if($row_mission != ''){
			
		$mi_type_mission = $row_mission->mi_type_mission;		 
		$mi_numero = $row_mission->mi_numero;		 
		$mi_vehicle_id = $row_mission->mi_vehicle_id;
		$mi_date_mission = $row_mission->mi_date_mission;		 
		$mi_quantite_carburant = $row_mission->mi_quantite_carburant;
		$mi_description = $row_mission->mi_description;		 
		$mi_created_date = $row_mission->mi_created_date;

		$mi_trip_id = $row_mission->mi_trip_id;
		$mi_frais_ags = $row_mission->mi_frais_ags;
		$mi_driver_id = $row_mission->mi_driver_id;
		$mi_prime = $row_mission->mi_prime;
		$mi_conteneur_id = $row_mission->mi_conteneur_id;
	
			
/* BEGIN MODIFICATION STATUT PREGATE*/

		$this->db->where('pr_trip_id',$mi_trip_id);
			
			$datastatut_pregate = array(
   
   'pr_statut' => '3' 
);
$this->db->update('trip_pregate', $datastatut_pregate); //exit;
			
/*END MODIFICATION  STATUT FACTURE*/			
			
	 }		
/*FIN RECUPERATION DONNEES DE LA MISSION*/		

		
/*VERIFICATION STATUT CONDUCTEUR*/

	$requete_profil_chauffeur = "d_id=$mi_driver_id";


		$profil_chauffeur = "";
	$mp_amount = 0;	
  $this->db->where($requete_profil_chauffeur);
  $query_profil_drivers = $this->db->get('drivers');
  $row_profil_drivers = $query_profil_drivers->row();

		if($row_profil_drivers != ''){		
		
		$profil_chauffeur = $row_profil_drivers->d_profil;//exit;
		}
 
		
/*DEBUT PROFIL*/		


/*END REQUETE*/		
		
		 $s_driver_prime_permanent_eleve = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_permanent_eleve;
		 $s_driver_prime_permanent_bas = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_permanent_bas;
 $s_driver_prime_prestataire = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_prestataire;		
		
/*DEBUT PRIME*/ 
//echo "ddd";//exit;


if($mi_prime == 1)
{	//echo "ghkjhkfdgf";//exit;	
/**/if($profil_chauffeur == "PERMANENT")
{		
	if(($mi_type_mission == "LIVRAISON") || ($mi_type_mission == "RESTITUTION_VIDE") || ($mi_type_mission == "MISE_A_TERRE") || ($mi_type_mission == "DECROCHAGE"))
	{		
	//exit;		
	if(($mi_type_mission == "LIVRAISON") )
	{

		$mp_amount = $s_driver_prime_permanent_eleve;	//exit;
	}

	if(($mi_type_mission == "RESTITUTION_VIDE") || ($mi_type_mission == "MISE_A_TERRE") || ($mi_type_mission == "DECROCHAGE") )
	{
		 $mp_amount = $s_driver_prime_permanent_bas;	//exit;	
	}
}
}else{
		$mp_amount = $s_driver_prime_prestataire;	//exit;	
		
	}		

	$add_mission_prime = '';
		$add_mission_prime = array('mp_conteneur_id'=>$mi_conteneur_id,'mp_mission_id'=>$id,'mp_numero'=>$mi_numero,'mp_vehicle_id'=>$mi_vehicle_id,'mp_date_mission'=>$mi_date_mission,'mp_amount'=>$mp_amount,'mp_desc'=>$mi_description,'mp_created_date'=> $validation_date,'mp_trip_id'=>$mi_trip_id,'mp_type_mission'=>$mi_type_mission,'mp_driver_id'=>$mi_driver_id);		
			
		 $response_add_mission_prime = $this->db->insert('trip_mission_prime',$add_mission_prime);		//exit;


	
}
	/*FIN PRIME*/		
		
		
		
		
		
/*DEBUT INSERTION TABLE JOURNAL */
			$fjc_type='';
			$fjc_type='MISSION';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_mi_id'=>$id,'fjc_mi_numero'=>$mi_numero,'fjc_v_id'=>$mi_vehicle_id,'fjc_date'=>$mi_date_mission,'fjc_quantite'=>$mi_quantite_carburant,'fjc_description'=>$mi_description,'fjc_created_date'=> $mi_created_date,'fjc_type'=>$fjc_type);		
			
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL */	
	 
/*DEBUT INSERTION TABLE JOURNAL AGS*/

			$tja_type='';
			$tja_type='MISSION';
	$add_fuel_journal_ags = '';
		$add_fuel_journal_ags = array('tja_mi_id'=>$id,'tja_mi_numero'=>$mi_numero,'tja_mi_amount'=>$mi_frais_ags,'tja_mi_v_id'=>$mi_vehicle_id,'tja_date'=>$mi_date_mission,'tja_description'=>$mi_description,'tja_created_date'=> $mi_created_date,'tja_type'=>$tja_type,'tja_t_id'=>$mi_trip_id);		
			
		$response_add_journal = $this->db->insert('trip_journal_ags',$add_fuel_journal_ags);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL AGS */		

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

		$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id";

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
$quantite_carburant_restant = $carburant_restant - $mi_quantite_carburant;		
$quantite_carburant_totale = $carburant_quantite_totale + $mi_quantite_carburant;		
		$this->db->where('v_id',$mi_vehicle_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); 		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/		 
		
		
		if($response) {
			$this->session->set_flashdata('successmessage', 'Mission validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Mission non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('fuel_bon_carburant/addfuel_bon_carburant');
		
		redirect('reports/mission');	
	
	}	
	
/*BEGIN VALIDATION SUITE*/
	public function mission_validation_suite()
	{
		$id = $this->uri->segment(3);
// Debut if	pour verifier la quantité de carbutant
		
        $mi_validation=1;
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        $createur = "";
        $validation_date = "";
		$createur = $this->session->userdata['session_data']['u_id'];
        $validation_date = date('Y-m-d h:i:s');

		$data = array(
        'mi_validation' => $mi_validation,
        'mi_validation_date' => $validation_date,
        'mi_validation_by' => $createur
);

$this->db->where('mi_id', $id);
$response = $this->db->update('trip_mission', $data);  

	
/*RECUPERATION DONNEES DE LA MISSION*/
		$requete_mission='';	 
$restant_mission=0;	 
$row_mission = "";		
//$requete="";	 
	 $requete_mission = "mi_id=$id";

  $this->db->where($requete_mission);
 // $this->db->order_by('mi_id', 'desc');
  $query = $this->db->get('trip_mission');
  $row_mission = $query->row();

		if($row_mission != ''){
			
		$mi_numero = $row_mission->mi_numero;		 
		$mi_vehicle_id = $row_mission->mi_vehicle_id;
		$mi_date_mission = $row_mission->mi_date_mission;		 
		$mi_quantite_carburant = $row_mission->mi_quantite_carburant;
		$mi_description = $row_mission->mi_description;		 
		$mi_created_date = $row_mission->mi_created_date;

		$mi_trip_id = $row_mission->mi_trip_id;
		$mi_frais_ags = $row_mission->mi_frais_ags;
		$mi_driver_id = $row_mission->mi_driver_id;
		$mi_prime = $row_mission->mi_prime;
		$mi_conteneur_id = $row_mission->mi_conteneur_id;
			
	 }		
/*FIN RECUPERATION DONNEES DE LA MISSION*/		

	/*DEBUT PRIME*/	
	$requete_profil_chauffeur = "d_id=$mi_driver_id";

	$mp_amount = 0;	

		$profil_chauffeur = "";
		
  $this->db->where($requete_profil_chauffeur);
  $query_profil_drivers = $this->db->get('drivers');
  $row_profil_drivers = $query_profil_drivers->row();

		if($row_profil_drivers != ''){		
		
		$profil_chauffeur = $row_profil_drivers->d_profil;//exit;
		}
 
		
/*DEBUT PROFIL*/		


/*END REQUETE*/		
		
		 $s_driver_prime_permanent_eleve = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_permanent_eleve;
		 $s_driver_prime_permanent_bas = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_permanent_bas;
 $s_driver_prime_prestataire = $this->db->select('*')->from('settings')->get()->row()->s_driver_prime_prestataire;		
		
/*DEBUT PRIME*/ 
//echo "ddd";//exit;


if($mi_prime == 1)
{	//echo "ghkjhkfdgf";//exit;	
/**/if($profil_chauffeur == "PERMANENT")
{		
	if(($mi_type_mission == "LIVRAISON") || ($mi_type_mission == "RESTITUTION_VIDE") || ($mi_type_mission == "MISE_A_TERRE") || ($mi_type_mission == "DECROCHAGE"))
	{		
	//exit;		
	if(($mi_type_mission == "LIVRAISON") )
	{

		$mp_amount = $s_driver_prime_permanent_eleve;	//exit;
	}

	if(($mi_type_mission == "RESTITUTION_VIDE") || ($mi_type_mission == "MISE_A_TERRE") || ($mi_type_mission == "DECROCHAGE") )
	{
		$mp_amount = $s_driver_prime_permanent_bas;	//exit;	
	}
}
}else{
		$mp_amount = $s_driver_prime_prestataire;	//exit;	
		
	}		

	$add_mission_prime = '';
		$add_mission_prime = array('mp_conteneur_id'=>$mi_conteneur_id,'mp_mission_id'=>$id,'mp_numero'=>$mi_numero,'mp_vehicle_id'=>$mi_vehicle_id,'mp_date_mission'=>$mi_date_mission,'mp_amount'=>$mp_amount,'mp_desc'=>$mi_description,'mp_created_date'=> $validation_date,'mp_trip_id'=>$mi_trip_id,'mp_type_mission'=>$mi_type_mission,'mp_driver_id'=>$mi_driver_id);		
			
		 $response_add_mission_prime = $this->db->insert('trip_mission_prime',$add_mission_prime);		//exit;


	
}
	/*FIN PRIME*/					
			
			
			
			
/*FIN RECUPERATION DONNEES DE LA MISSION*/		
	 
/*DEBUT INSERTION TABLE JOURNAL */
			$fjc_type='';
			$fjc_type='MISSION';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_mi_id'=>$id,'fjc_mi_numero'=>$mi_numero,'fjc_v_id'=>$mi_vehicle_id,'fjc_date'=>$mi_date_mission,'fjc_quantite'=>$mi_quantite_carburant,'fjc_description'=>$mi_description,'fjc_created_date'=> $mi_created_date,'fjc_type'=>$fjc_type);		
			
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL */	
	 
/*DEBUT INSERTION TABLE JOURNAL AGS*/

			$tja_type='';
			$tja_type='MISSION';
	$add_fuel_journal_ags = '';
		$add_fuel_journal_ags = array('tja_mi_id'=>$id,'tja_mi_numero'=>$mi_numero,'tja_mi_amount'=>$mi_frais_ags,'tja_mi_v_id'=>$mi_vehicle_id,'tja_date'=>$mi_date_mission,'tja_description'=>$mi_description,'tja_created_date'=> $mi_created_date,'tja_type'=>$tja_type,'tja_t_id'=>$mi_trip_id);		
			
		$response_add_journal = $this->db->insert('trip_journal_ags',$add_fuel_journal_ags);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL AGS */		

/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

		$requete='';	 
$restant=0;	 
//$requete="";	 
	 $requete = "v_id=$mi_vehicle_id";

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
$quantite_carburant_restant = $carburant_restant - $mi_quantite_carburant;		
$quantite_carburant_totale = $carburant_quantite_totale + $mi_quantite_carburant;		
		$this->db->where('v_id',$mi_vehicle_id);
$dataMaj_carburant ='';			
$dataMaj_carburant = array('v_quantite_restant' => $quantite_carburant_restant,'v_quantite_totale' => $quantite_carburant_totale);
$this->db->update('vehicles', $dataMaj_carburant); 		
		
/* END MODIFICATION CARBURANT DU VEHICULE*/		 
		
		
		if($response) {
			$this->session->set_flashdata('successmessage', 'Mission validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Mission non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('fuel_bon_carburant/addfuel_bon_carburant');
		
//		redirect('reports/mission');	
		redirect('mission/mission_suite_report/'.$this->uri->segment(4));	
	}	
/*END VALIDATION SUITE*/	
	
/*	public function addmissionpregate()
	{
		$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
       
        
        $this->template->template_render('mission_pregate_add',$data);
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
	}*/	
	
	public function addmission()
	{
		
		$facture = "";
		$conteneur = "";
		$existe = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
	/*	if((isset($conteneur))){
		$existe = $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
		}
		if($existe){
		$this->load->model('trips_model');//trip_conteneur
exit();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();

		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieulivraison();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();

		$data['website_setting'] = $this->mission_model->websitesetting_price();
	
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();				
		$data['mission'] = $this->mission_model->getall_mission();
	
			
 		$data['country'] = $this->mission_model->fetch_country();
			
		$data['missiondetails'] = $this->mission_model->editmission($conteneur);
			
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport();
  		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
	
		}else{*/

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieulivraison();
	
//		$data['lieulivraisonlist'] = $this->mission_model->getall_lieulivraison();
			
			
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
        
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
		$data['mission'] = $this->mission_model->getall_mission();	
		$data['mission_livraison'] = $this->mission_model->getall_mission_livraison();	
		$data['mission_mise_a_terre'] = $this->mission_model->getall_mission_mise_a_terre();	
		$data['mission_decrochage'] = $this->mission_model->getall_mission_decrochage();
		$data['mission_garage'] = $this->mission_model->getall_mission_garage();
			
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport(); //add mission
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
			
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_restitution'] = $this->mission_model->fetch_lieu_restitution();
         $data['trip_mission_motif_pertelist'] = $this->mission_model->get_mission_motif_perte();		
		$data['website_setting'] = $this->mission_model->websitesetting_price();
		$data['mission_validee'] = $this->mission_model->getall_mission_validee();			
		//}
	
		if(isset($_POST['mission_report'])) {
			$fuelreport = $this->mission_model->reports_journal($this->input->post('from'),$this->input->post('to'),$this->input->post('type_mission'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['journal_mission'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['journal_mission'] = $fuelreport;//exit;
			}
		}		
       
        $this->template->template_render('mission_add',$data);
	}
	
/*DEBUT PRIME*/
	public function primemission()
	{
		
		$facture = "";
		$conteneur = "";
		$existe = "";

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		if((isset($conteneur))){
		$existe = $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
		}
		

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieulivraison();
	
//		$data['lieulivraisonlist'] = $this->mission_model->getall_lieulivraison();
			
			
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
        
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
		$data['mission'] = $this->mission_model->getall_mission();	$data['mission_livraison'] = $this->mission_model->getall_mission_livraison();	
		$data['mission_mise_a_terre'] = $this->mission_model->getall_mission_mise_a_terre();	
		$data['mission_decrochage'] = $this->mission_model->getall_mission_decrochage();
/*		$data['mission_prime'] = $this->mission_model->getall_mission_prime();*/
			
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport(); //add mission

			
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
         $data['trip_mission_motif_pertelist'] = $this->mission_model->get_mission_motif_perte();		
		$data['website_setting'] = $this->mission_model->websitesetting_price();

		$data['mission_prime_tab_paiement_list'] = $this->mission_model->getall_mission_prime_tab_paiement();		
		
		$data['mission_prime_paiement_list'] = $this->mission_model->getall_mission_prime_paiement();		
		
		$data['numerobon_prime_payments'] = $this->mission_model->get_numeroprimepayments();		
		$data['mission_primelist'] = $this->mission_model->getall_mission_prime();
		
/*		if(isset($_POST['mission_report'])) {
			$fuelreport = $this->mission_model->reports_journal($this->input->post('from'),$this->input->post('to'),$this->input->post('type_mission'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['journal_mission'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['journal_mission'] = $fuelreport;
			}
		}*/	
		
		if(isset($_POST['mission_report_prime'])) {
			$fuelreport = $this->mission_model->reports_journal_prime($this->input->post('from'),$this->input->post('to'),$this->input->post('driver'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['mission_prime'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['mission_prime'] = $fuelreport;
			}
		}else{
			$data['mission_prime'] = $this->mission_model->getall_mission_prime();
		}		
       
        $this->template->template_render('mission_prime',$data);
	}	
/*FIN PRIME*/	

/*BEGIN PAIEMENT PRIME*/	
	
	public function insert_paiementprime()
	{


		$paiementprime = $this->input->post();
		$mpp_numero = $paiementprime['mpp_numero'];		
		$mpp_date_demande = $paiementprime['mpp_date_demande'];
		$mpp_date_debut = $paiementprime['mpp_date_debut'];
		$mpp_date_fin = $paiementprime['mpp_date_fin'];
		$mpp_driver_id = $paiementprime['mpp_driver_id'];
		$mpp_created_date = $paiementprime['mpp_created_date'];
		$mpp_numero = $paiementprime['mpp_numero'];
			
	$addincomexpense = array('mpp_numero'=>$mpp_numero,'mpp_date_demande'=>$mpp_date_demande,'mpp_date_fin'=>$mpp_date_fin,'mpp_driver_id'=>$mpp_driver_id,'mpp_created_date'=>$mpp_created_date,'mpp_numero'=>$mpp_numero); //exit; /**/  
			
	  $response = $this->mission_model->add_mission_prime($addincomexpense);
		
$data_trip_mission_prime_payments_compteur = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$compteur= $this->db->insert('trip_mission_prime_payments_compteur', $data_trip_mission_prime_payments_compteur);		
			if($response) {

				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('mission/primemission');

	}	
/*END PAIEMENT PRIME*/	
	
/*BEGIN ADD MISSION SUITE REPORT*/
	public function mission_suite_report()
	{
		
		$suite = 0;
		$suite = $this->uri->segment(3);
		
		$data['missionsuite'] = $this->mission_model->viewmission_suite_report($suite);

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieulivraison();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
        
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
		$data['mission'] = $this->mission_model->getall_mission();	$data['mission_livraison'] = $this->mission_model->getall_mission_livraison();	
		$data['mission_mise_a_terre'] = $this->mission_model->getall_mission_mise_a_terre();	
		$data['mission_decrochage'] = $this->mission_model->getall_mission_decrochage();
		$data['mission_garage'] = $this->mission_model->getall_mission_garage();
			
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport(); //add mission
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
			
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();

         $data['trip_mission_motif_pertelist'] = $this->mission_model->get_mission_motif_perte();		
		$data['website_setting'] = $this->mission_model->websitesetting_price();
		
	
		if(isset($_POST['mission_report'])) {
			$fuelreport = $this->mission_model->reports_journal($this->input->post('from'),$this->input->post('to'),$this->input->post('type_transport'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['journal_mission'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['journal_mission'] = $fuelreport;
			}
		}		
       
        $this->template->template_render('mission_suite_report',$data);
	}
		
/*END ADD MISSION SUITE REPORT*/	
	
	
/*BEGIN ADD MISSION SUITE*/
	public function addmission_suite()
	{
		
		$suite = 0;
		$suite = $this->uri->segment(3);
		
		$data['missionsuite'] = $this->mission_model->viewmission_suite($suite);

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieulivraison();

		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
        
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();
		$data['mission'] = $this->mission_model->getall_mission();	$data['mission_livraison'] = $this->mission_model->getall_mission_livraison();	
		$data['mission_mise_a_terre'] = $this->mission_model->getall_mission_mise_a_terre();	
		$data['mission_decrochage'] = $this->mission_model->getall_mission_decrochage();
		$data['mission_garage'] = $this->mission_model->getall_mission_garage();
			
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport(); //add mission
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
			
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();

         $data['trip_mission_motif_pertelist'] = $this->mission_model->get_mission_motif_perte();		
		$data['website_setting'] = $this->mission_model->websitesetting_price();
		
	
		if(isset($_POST['mission_report'])) {
			$fuelreport = $this->mission_model->reports_journal($this->input->post('from'),$this->input->post('to'),$this->input->post('type_transport'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['journal_mission'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['journal_mission'] = $fuelreport;
			}
		}		
       
        $this->template->template_render('mission_suite_add',$data);
	}
		
/*END ADD MISSION SUITE*/	
	
	public function insertmission()
	{ 

			
		$mission = $this->input->post();
		$mi_type_mission = $mission['mi_type_mission'];

//DEBUT LIVRAISON		
	
if($mi_type_mission=="LIVRAISON")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_livraison'];

		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_livraison'];
		$mi_prime = $mission['mi_prime'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
		$mi_type_mission = $mission['mi_type_mission'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	
		//$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $addincomexpense = array('mi_prime'=>$mi_prime,'mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id_livraison'))); 
}

//FIN LIVRAISON		

	
		
//DEBUT MISE_TERRE		
	
if($mi_type_mission=="MISE_A_TERRE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_mise_terre'];
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_mise_terre'];
		//$mi_type_transport = $mission['mi_type_transport'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
		$mi_prime = $mission['mi_prime'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	
		$mi_type_mission = $mission['mi_type_mission'];	
		
			
	 $addincomexpense = array('mi_prime'=>$mi_prime,'mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id_mise_terre'))); 
}

//FIN MISE_TERRE	
		
//DEBUT DECROCHAGE		
	
if($mi_type_mission=="DECROCHAGE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		$mi_prime = $mission['mi_prime'];
		//$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];,'mi_bon_carburant_id'=>$mi_bon_carburant_id
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_decrochage'];
		//$mi_type_transport = $mission['mi_type_transport'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
		//$mi_lieu_restitution_id = $mission['mi_lieu_restitution_id'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	
		$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $addincomexpense = array('mi_prime'=>$mi_prime,'mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); 
}

//FIN DECROCHAGE	
		
//DEBUT GARAGE		
	
if($mi_type_mission=="GARAGE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_garage'];

		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
		$mi_type_mission = $mission['mi_type_mission'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	
		
			
	 $addincomexpense = array('mi_type_mission'=>$mi_type_mission,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero); 
}

//FIN LIVRAISON	
		


//FIN LIVRAISON			
		
	  $response = $this->mission_model->add_mission($addincomexpense);
			$last_mission_id = 0;	
			$last_mission_id= $this->db->insert_id();	
		
 if($response)   {   
	 
if($mi_type_mission!="GARAGE")
{
		$this->db->where('t_id',$mi_trip_id);
		// $this->db->update('trip_pregate',$this->input->post());
			
			$dataCompteur_facture = array(
   
   't_statut_id' => '3' 
);
$this->db->update('trips', $dataCompteur_facture); 
	
/* BEGIN MODIFICATION STATUT PREGATE*/

		$this->db->where('pr_trip_id',$mi_trip_id);
			
			$datastatut_pregate = array(
   
   'pr_statut' => '2' 
);
$this->db->update('trip_pregate', $datastatut_pregate); //exit;
			
/*END MODIFICATION  STATUT FACTURE*/	
}
	 
	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'Mission ajoutée avec succes..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}	

	
/*DEBUT SUITE MISSION*/	
	public function insertmission_suite()
	{ 

			
		$mission = $this->input->post();
		$mi_type_mission = $mission['mi_type_mission'];
		$mi_prime = $mission['mi_prime'];


		$mi_vehicle_id = $mission['mi_vehicle_id'];

		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
		$mi_type_mission = $mission['mi_type_mission'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	

/*		$mi_mission_date_mission = $mission['mi_mission_date_mission'];	
		$mi_mission_created_date = $mission['mi_mission_created_date'];	*/

		$mi_mission_id = $mission['mi_mission_id'];
		
			
	 $addincomexpense = array('mi_prime'=>$mi_prime,'mi_mission_id'=>$mi_mission_id,'mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); 

	  $response = $this->mission_model->add_mission($addincomexpense);
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'Mission ajoutée avec succes..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');
		
}	
	
/*FIN SUITE MISSION*/	
	
/*DEBUT DUPLICATE*/
	public function duplicate_mission()
	{ 
/*		$testxss = xssclean($_POST);
		if($testxss){*/

		$mission = 0;
		$mission = $this->uri->segment(3);
		//$conteneur = $this->uri->segment(4);
		
		//$existe = $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();		
		
		$mission = $this->input->post();
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id'];
		//$mi_type_transport = $mission['mi_type_transport'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_created_date = $mission['mi_created_date'];
		$mi_numero = $mission['mi_numero'];	
		//$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $addincomexpense = array('mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); /**/  
			
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	  $response = $this->mission_model->add_mission($addincomexpense);
			$last_mission_id = 0;	
			$last_mission_id= $this->db->insert_id();	
		
 if($response)   {   

	 
/* BEGIN MODIFICATION STATUT FACTURE*/

		$this->db->where('t_id',$mi_trip_id);
			
			$dataCompteur_facture = array(
   
   't_statut_id' => '3' 
);
$this->db->update('trips', $dataCompteur_facture); 
			
/*END MODIFICATION  STATUT FACTURE*/

/* BEGIN MODIFICATION STATUT PREGATE*/

		$this->db->where('pr_trip_id',$mi_trip_id);
			
			$datastatut_pregate = array(
   
   'pr_statut' => '2' 
);
$this->db->update('trip_pregate', $datastatut_pregate); exit;
			
/*END MODIFICATION  STATUT FACTURE*/	 
	 
/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'Mission ajoutée avec succes..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}
	
/*FIN DUPLICATE*/	
	
	
	public function updatemission()
	{
		
		$mission = $this->input->post();

		$mi_type_mission = $mission['mi_type_mission'];

//DEBUT LIVRAISON		
	
if($mi_type_mission=="LIVRAISON")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_livraison'];

		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_livraison'];
		//$mi_id = $mission['mi_id'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
		$mi_type_mission = $mission['mi_type_mission'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_modified_date = $mission['mi_modified_date'];

		
			
	 $majincomexpense = array('mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_modified_date'=> $mi_modified_date,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id_livraison'))); 
}

//FIN LIVRAISON		
		
//DEBUT MISE_TERRE		
	
if($mi_type_mission=="MISE_A_TERRE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_mise_terre'];
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_mise_terre'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_modified_date = $mission['mi_modified_date'];
		$mi_type_mission = $mission['mi_type_mission'];	
		
			
	 $majincomexpense = array('mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_modified_date'=> $mi_modified_date,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id_mise_terre'))); 
}

//FIN MISE_TERRE	
		
//DEBUT DECROCHAGE		
	
if($mi_type_mission=="DECROCHAGE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id_decrochage'];
       // $mi_conteneur_id = $mission['mi_conteneur_id_decrochage'];
		$mi_lieu_livraison = $mission['mi_lieu_livraison'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_modified_date = $mission['mi_modified_date'];
		//$mi_numero = $mission['mi_numero'];	
		//$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $majincomexpense = array('mi_type_mission'=>$mi_type_mission,'mi_lieu_livraison'=>$mi_lieu_livraison,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_modified_date'=> $mi_modified_date,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); 
}

//FIN DECROCHAGE	
		
//DEBUT GARAGE		
	
if($mi_type_mission=="GARAGE")
{
		$mi_vehicle_id = $mission['mi_vehicle_id_garage'];

		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
		$mi_type_mission = $mission['mi_type_mission'];
        
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
        $mi_description = $mission['mi_description'];
        $mi_modified_date = $mission['mi_modified_date'];
		//$mi_numero = $mission['mi_numero'];	
		
			
	 $majincomexpense = array('mi_type_mission'=>$mi_type_mission,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_modified_date'=> $mi_modified_date); 
}		

	  $response = $this->mission_model->updatemission($majincomexpense);		
	
				if($response) {
					$this->session->set_flashdata('successmessage', ' Modification effectuée avec succés..');
					redirect('mission/addmission');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('mission/addmission');
				}

	}
	
	
	public function mission_demande_annulation()
	{
		$mi_id = $this->uri->segment(3);		
		$this->load->model('trips_model');//trip_conteneur
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
//		$e_id = $this->uri->segment(3);
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
		
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();
         $data['trip_mission_type_annulationlist'] = $this->mission_model->get_mission_type_annulation();			
       $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();			
		$data['missiondetails'] = $this->mission_model->mission_demande_annulation($mi_id);
		$this->template->template_render('mission_demande_annulation',$data);
	}
	
	public function mission_demande_annulation_validation()
	{
		$mi_id = $this->uri->segment(3);		
		$this->load->model('trips_model');//trip_conteneur
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
//		$e_id = $this->uri->segment(3);
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
		
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();
        $data['trip_mission_type_annulationlist'] = $this->mission_model->get_trip_mission_type_annulation();			
       $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();			
		$data['missiondetails'] = $this->mission_model->mission_demande_annulation($mi_id);
		$this->template->template_render('mission_demande_annulation_validation',$data);
	}	
	
	public function insertdemandeannulationmission()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$mission = $this->input->post();
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		//$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];,'mi_bon_carburant_id'=>$mi_bon_carburant_id
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_id = $mission['mi_id'];
		$mi_conteneur_id = $mission['mi_conteneur_id'];
        
		//$mi_lieu_restitution_id = $mission['mi_lieu_restitution_id'];
        $mi_date_mission = $mission['mi_date_mission'];
        $mi_driver_id = $mission['mi_driver_id'];
        $mi_vehicle_remorque_id = $mission['mi_vehicle_remorque_id'];
		$mi_carte_peage_id = $mission['mi_carte_peage_id'];		
        $mi_carte_peage_amount = $mission['mi_carte_peage_amount'];
        $mi_frais_ags = $mission['mi_frais_ags'];
		$mi_autre_frais = $mission['mi_autre_frais'];		
       // $mi_description = $mission['mi_description'];
      //  $mi_created_date = $mission['mi_created_date'];
		//$mi_numero = $mission['mi_numero'];		
			
	$maj_mission = array('mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_conteneur_id'=>$mi_conteneur_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_numero'=> $mi_numero); /**/  

/*$data_restant = array(
   
   'bc_restant' => $bc_qte_restant
);*/	 
	 
		$this->db->where('mi_id',$mi_id);
	    $response = $this->db->update('trip_mission',$maj_mission); 		
		
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	//$response = $this->mission_model->add_mission($this->input->post());
		
 if($response)   {  
        $mo_desc = $mission['mo_desc'];
        $mo_motif_id = $mission['mo_motif_id'];
		$mo_mission_id = $mission['mi_id'];	 
//fuel_bon_carburant

$ajout_motif = '';	
$ajout_motif = array('mo_desc'=>$mo_desc,'mo_motif_id'=>$mo_motif_id,'mo_mission_id'=>$mo_mission_id);	 
	 
		//$this->db->where('mi_id',$mi_id);
	    $response2 = $this->db->insert('trip_mission_motif_annulation',$ajout_motif); 
     
	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New  added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}	
	
	
/* Validation demande annulation*/	
	public function insertdemandeannulationmission_validation()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$mission = $this->input->post();

        $mi_id = $mission['mi_id'];

		$mi_validation = 1;	
	$maj_mission = array('mi_validation'=>$mi_validation); /**/  

/*$data_restant = array(
   
   'bc_restant' => $bc_qte_restant
);*/	 
	 
		$this->db->where('mi_id',$mi_id);
	    $response = $this->db->update('trip_mission',$maj_mission); 		

		
/* BEGIN MODIFICATION STATUT PREGATE*/

		$this->db->where('pr_trip_id',$mi_id);
			
			$datastatut_pregate = array(
   
   'pr_statut' => '3' 
);
$this->db->update('trip_pregate', $datastatut_pregate); 
			
/*END MODIFICATION  STATUT FACTURE*/		
		
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	//$response = $this->mission_model->add_mission($this->input->post());
		

		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'New  added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}		
/* Fin validation demande annulation*/		
		
	public function editmission()
	{
		$mi_id = $this->uri->segment(3);		
		$this->load->model('trips_model');//trip_conteneur
//		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
//		$e_id = $this->uri->segment(3);
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieu_livraison();
		
		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();
		$data['mission'] = $this->mission_model->getall_mission();
 	
		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport();
		
        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();			
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();		
		$data['missiondetails'] = $this->mission_model->editmission($mi_id);
		$this->template->template_render('mission_add',$data);
	}	


	
	
/* BEGIN VIEW MISSION */
	
/*	public function mission_details()
	{
        $mi_id = $this->uri->segment(3);//exit;
		$demande_annulation = $this->mission_model->get_demande_annulation($mi_id);
		$missiondetails = $this->mission_model->get_missiondetails($mi_id);
		$eir_vide = $this->mission_model->get_eir_vide($mi_id);
		$eir_plein = $this->mission_model->get_eir_plein($mi_id);

		
		if(isset($missiondetails[0]['mi_id'])) {
			$data['missiondetails'] = $missiondetails[0];
			$data['eir_vide'] = $eir_vide;
			$data['eir_plein'] = $eir_plein;
			$data['demande_annulation'] = $demande_annulation;

			$this->template->template_render('mission_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}*/	
	
/* END VIEW MISSION */	
	
/*BEGIN AJAX*/
/**/	
 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	

/*BEGIN DECROCHAGE */
 function fetch_conteneur_decrochage()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id_decrochage'))
  {
   echo $this->mission_model->fetch_conteneur_decrochage($this->input->post('mi_trip_id_decrochage'));
  }
 }

	 function fetch_bon_carburant_decrochage()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id_decrochage'))
  {
   echo $this->mission_model->fetch_bon_carburant_decrochage($this->input->post('mi_vehicle_id_decrochage'));
  }
 }	
/*END DECROCHAGE*/	
	
	
/*BEGIN MISE A TERRE */
 function fetch_conteneur_mise_terre()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id_mise_terre'))
  {
   echo $this->mission_model->fetch_conteneur_mise_terre($this->input->post('mi_trip_id_mise_terre'));
  }
 }

	 function fetch_bon_carburant_mise_terre()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id_mise_terre'))
  {
   echo $this->mission_model->fetch_bon_carburant_mise_terre($this->input->post('mi_vehicle_id_mise_terre'));
  }
 }	
/*END MISE A TERRE*/
	
	
/*BEGIN LIVRAISON */
 function fetch_conteneur_livraison()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id_livraison'))
  {
   echo $this->mission_model->fetch_conteneur_livraison($this->input->post('mi_trip_id_livraison'));
  }
 }

	 function fetch_bon_carburant_livraison()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id_livraison'))
  {
   echo $this->mission_model->fetch_bon_carburant_livraison($this->input->post('mi_vehicle_id_livraison'));
  }
 }	
/*END LIVRAISON*/	

	
/*BEGIN GARAGE / REPARATION*/
	 function fetch_bon_carburant_garage()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id_garage'))
  {
   echo $this->mission_model->fetch_bon_carburant_garage($this->input->post('mi_vehicle_id_garage'));
  }
 }	
/*BEGIN GARAGE / REPARATION*/
	
	
	
 function fetch_conteneur_vide()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur_vide($this->input->post('mi_trip_id'));
  }
 }		
	
 function fetch_information()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	

	
 function fetch_state()
 { //echo "bjr";exit;
  if($this->input->post('country_id'))
  {
   echo $this->mission_model->fetch_state($this->input->post('country_id'));
  }
 }

 function fetch_city()
 {exit;
  if($this->input->post('state_id'))
  {
   echo $this->mission_model->fetch_city($this->input->post('state_id'));
  }
 }	
/*END AJAX*/	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_bon_carburant()
 { //echo "bjr";exit;
  if($this->input->post('mi_vehicle_id'))
  {
   echo $this->mission_model->fetch_bon_carburant($this->input->post('mi_vehicle_id'));
  }
 }
/* END AJAX VEHICULE*/	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_bon_carburant_quantite()
 { //echo "bjr";exit;
  if($this->input->post('mi_bon_carburant_id'))
  {
   echo $this->mission_model->fetch_bon_carburant_quantite($this->input->post('mi_bon_carburant_id'));
  }
 }
/* END AJAX VEHICULE*/	
	
	
/* BEGIN AJAX VEHICULE*/	
	 function fetch_lieu_restitution()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_lieu_restitution($this->input->post('mi_trip_id'));
  }
 }
	
/*	 function fetch_lieu_transport()
		 { //echo "bjr";exit;
		  if($this->input->post('mi_type_transport'))
		  {
		   echo $this->mission_model->fetch_lieu_transport($this->input->post('mi_type_transport'));
		  }
		 }	*/

	 function fetch_lieu_livraison()
		 { //echo "bjr";exit;
		  if($this->input->post('mi_type_transport'))
		  {
		   echo $this->mission_model->fetch_lieu_transport($this->input->post('mi_type_transport'));
		  }
		 }		
	
/* END AJAX VEHICULE*/		
	
	
    /*Debut Annulation*/

	public function mission_annulation()
	{
		$id = $this->uri->segment(3);
        $annulation='annule';
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        'mi_annulation' => $annulation
);

$this->db->where('mi_id', $id);
$response = $this->db->update('trip_mission', $data);        
        
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Mission annulée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Mission non annulée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('mission/addmission');
	}    
   
    
    /*Fin Annulation*/ 	

	public function mission_type_annulation()
	{
		$data['type_annulation'] = $this->mission_model->get_mission_type_annulation();
		$this->template->template_render('mission_type_annulation',$data);
	}
	
	
	public function mission_type_annulation_delete()
	{
		$ta_id = $this->uri->segment(3);
		$returndata = $this->mission_model->mission_type_annulation_delete($ta_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Type d\annulation supprimé avec succés...');
			redirect('mission/mission_type_annulation');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! ');
		    redirect('mission/mission_type_annulation');
		}
	}
	
	public function addmission_type_annulation()
	{
		$response = $this->db->insert('trip_mission_type_annulation',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('mission/mission_type_annulation');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('mission/mission_type_annulation');
		}
	}	

	public function mission_motif_perte()
	{
		$data['motif_perte'] = $this->mission_model->get_mission_motif_perte();
		$this->template->template_render('mission_motif_perte',$data);
	}
	
	
	public function mission_motif_perte_delete()
	{
		$ta_id = $this->uri->segment(3);
		$returndata = $this->mission_model->mission_motif_perte_delete($ta_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Type d\annulation supprimé avec succés...');
			redirect('mission/mission_motif_perte');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! ');
		    redirect('mission/mission_motif_perte');
		}
	}
	
	public function addmission_motif_perte()
	{
		$response = $this->db->insert('trip_mission_motif_perte',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('mission/mission_motif_perte');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('mission/mission_motif_perte');
		}
	}	


/*DEBUT TYPE TRANSPORT*/ 	

	public function mission_type_transport()
	{
		$data['type_transport'] = $this->mission_model->get_mission_type_transport();
		$this->template->template_render('mission_type_transport',$data);
	}
	
	
	public function mission_type_transport_delete()
	{
		$ta_id = $this->uri->segment(3);
		$returndata = $this->mission_model->mission_type_transport_delete($ta_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Type d\transport supprimé avec succés...');
			redirect('mission/mission_type_transport');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! ');
		    redirect('mission/mission_type_transport');
		}
	}
	
	public function addmission_type_transport()
	{
		$response = $this->db->insert('trip_mission_type_transport',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('mission/mission_type_transport');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('mission/mission_type_transport');
		}
	}	
	
	
/*FIN TYPE TRANSPORT*/	


/*DEBUT LIEU LIVRAISON*/ 	

	public function mission_lieu_livraison()
	{
		$data['lieu_livraison'] = $this->mission_model->get_mission_lieu_livraison();
		$this->template->template_render('mission_lieu_livraison',$data);
	}
	
	
	public function mission_lieu_livraison_delete()
	{
		$ta_id = $this->uri->segment(3);
		$returndata = $this->mission_model->mission_lieu_livraison_delete($ta_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Type d\transport supprimé avec succés...');
			redirect('mission/mission_lieu_livraison');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! ');
		    redirect('mission/mission_lieu_livraison');
		}
	}
	
	public function deletemission()
	{
		$mi_id = $this->uri->segment(3);
		$returndata = $this->mission_model->mission_delete($mi_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Type d\transport supprimé avec succés...');
			redirect('reports/mission');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! ');
		    redirect('reports/mission');
		}
	}	
	
	public function addmission_lieu_livraison()
	{
		$response = $this->db->insert('trip_mission_lieu_livraison',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('mission/mission_lieu_livraison');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('mission/mission_lieu_livraison');
		}
	}	
	
	
/*FIN TYPE TRANSPORT*/
	
/*BEGIN JOURNAL*/
	
/*	public function journal()	{
		if(isset($_POST['mission_report'])) {
			$fuelreport = $this->mission_model->reports_journal($this->input->post('from'),$this->input->post('to'),$this->input->post('type_transport'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['fuel'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['fuel'] = $fuelreport;
			}
		}
		echo 'merci';//exit;
		//$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('mission_add',$data);
		//		redirect('mission/addmission');
		
	}*/	
/*END JOURNAL*/		

/* BEGIN VIEW MISSION */
	
	public function mission_details()
	{
        $mi_id = $this->uri->segment(3);//exit;
		$demande_annulation = $this->mission_model->get_demande_annulation($mi_id);
		$missiondetails = $this->mission_model->get_missiondetails($mi_id);
		$eir_vide = $this->mission_model->get_eir_vide($mi_id);
		$eir_plein = $this->mission_model->get_eir_plein($mi_id);

		
		if(isset($missiondetails[0]['mi_id'])) {
			$data['missiondetails'] = $missiondetails[0];
			$data['eir_vide'] = $eir_vide;
			$data['eir_plein'] = $eir_plein;
			$data['demande_annulation'] = $demande_annulation;
/*			$data['ristourne'] = $ristourne;
			$data['banquelist'] = $banquelist;
			$data['facture_transitaire'] = $facture_transitaire;*/
			//$data['numeromission'] = $numeromission;
			$this->template->template_render('mission_details',$data);
		} else {
			$this->template->template_render('pagenotfound');
		}
	}	
	
/* END VIEW MISSION */	
	
	
}
