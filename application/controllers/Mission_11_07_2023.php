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
        
$data = array(
        'mi_validation' => $mi_validation
);

$this->db->where('mi_id', $id);
$response = $this->db->update('trip_mission', $data);  

		if($response) {
			$this->session->set_flashdata('successmessage', 'Mission validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Mission non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('fuel_bon_carburant/addfuel_bon_carburant');
		
		redirect('reports/mission');	
	
	}	
	
	
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

		$facture = $this->uri->segment(3);
		$conteneur = $this->uri->segment(4);
		
		$existe = $this->db->select('*')->from('trip_mission')->where('mi_conteneur_id',$conteneur)->get()->result_array();
		
		if($existe){
		$this->load->model('trips_model');//trip_conteneur

		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieu_livraison();


		$data['vechiclelist'] = $this->mission_model->getall_vechicle();
		$data['driverlist'] = $this->mission_model->getall_driverlist();

        $data['zonelist'] = $this->mission_model->getall_zonelist();
        $data['transitairelist'] = $this->mission_model->getall_transitairelist();
        $data['carte_peagelist'] = $this->mission_model->getall_carte_peagelist();
 		$data['numeromission'] = $this->mission_model->get_numeromission();
  		//$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();  
	//	$data['website_setting'] = $this->mission_model->get_price();
		$data['website_setting'] = $this->mission_model->websitesetting_price();
	
        $data['carte_carburantlist'] = $this->mission_model->getall_carte_carburantlist();

        $data['vehicleremorquelist'] = $this->mission_model->getall_vehicle_remorque();				
		$data['mission'] = $this->mission_model->getall_mission();
	
			
 		$data['country'] = $this->mission_model->fetch_country();
			
		//$mi_id = $existe['mi_id'];
		$data['missiondetails'] = $this->mission_model->editmission($conteneur);
	//	$this->template->template_render('mission_add',$data);		
			
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport();
  		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
	
		}else{

			$this->load->model('trips_model');
		$data['facturelist'] = $this->mission_model->getall_facture();
		$data['conteneurlist'] = $this->mission_model->getall_conteneur();
		$data['lieu_livraisonlist'] = $this->mission_model->getall_lieu_livraison();
	
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
 		$data['country'] = $this->mission_model->fetch_country();
 		$data['pregate'] = $this->mission_model->fetch_pregate();
 		$data['type_transport'] = $this->mission_model->fetch_type_transport(); //add mission
		//$data['lieu_transport'] = $this->mission_model->fetch_lieu_transport();
			
 		$data['vehicule_bc'] = $this->mission_model->fetch_vehicule_bc();
		//$data['lieu_restitution'] = $this->mission_model->fetch_lieu_restitution();
         $data['trip_mission_motif_pertelist'] = $this->mission_model->get_mission_motif_perte();		
		$data['website_setting'] = $this->mission_model->websitesetting_price();
		
		}
	
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
       
        $this->template->template_render('mission_add',$data);
	}
	
	
/*	public function insertmission()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->mission_model->add_mission($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('pr_statut').' mission ajouté avec succés..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}

			$pregate = $this->input->post();

			redirect('mission/addmission');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('mission/addmission');
		}
	}*/
	
	
	public function insertmission()
	{ 
/*		$testxss = xssclean($_POST);
		if($testxss){*/
			
		$mission = $this->input->post();
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		//$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];,'mi_bon_carburant_id'=>$mi_bon_carburant_id
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id'];
		$mi_type_transport = $mission['mi_type_transport'];
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
		//$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $addincomexpense = array('mi_lieu_livraison'=>$mi_lieu_livraison,'mi_type_transport'=>$mi_type_transport,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_created_date'=> $mi_created_date,'mi_numero'=> $mi_numero,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); /**/  
			
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	  $response = $this->mission_model->add_mission($addincomexpense);
			$last_mission_id = 0;	
			$last_mission_id= $this->db->insert_id();	
		
 if($response)   {   
	 
/*DEBUT INSERTION TABLE JOURNAL */

			$fjc_type='';
			$fjc_type='MISSION';
	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_mi_id'=>$last_mission_id,'fjc_mi_numero'=>$mi_numero,'fjc_v_id'=>$mi_vehicle_id,'fjc_date'=>$mi_date_mission,'fjc_quantite'=>$mi_quantite_carburant,'fjc_description'=>$mi_description,'fjc_created_date'=> $mi_created_date,'fjc_type'=>$fjc_type);		
			
		$response_add_journal = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL */	
	 
/*DEBUT INSERTION TABLE JOURNAL AGS*/

			$tja_type='';
			$tja_type='MISSION';
	$add_fuel_journal_ags = '';
		$add_fuel_journal_ags = array('tja_mi_id'=>$last_mission_id,'tja_mi_numero'=>$mi_numero,'tja_mi_amount'=>$mi_frais_ags,'tja_mi_v_id'=>$mi_vehicle_id,'tja_date'=>$mi_date_mission,'tja_description'=>$mi_description,'tja_created_date'=> $mi_created_date,'tja_type'=>$tja_type,'tja_t_id'=>$mi_trip_id);		
			
		$response_add_journal = $this->db->insert('trip_journal_ags',$add_fuel_journal_ags);		
	 //echo "fuel_journal_carburant".$this->db->insert_id();exit;			
/*FIN INSERTION TABLE JOURNAL AGS */		 
	 
//fuel_bon_carburant
/* BEGIN MODIFICATION*/

			/*$this->db->where('st_id', $gr_id);
    		$this->db->delete('trip_statut');*/
		$this->db->where('t_id',$mi_trip_id);
		// $this->db->update('trip_pregate',$this->input->post());
			
			$dataCompteur_facture = array(
   
   't_statut_id' => '3' 
);
$this->db->update('trips', $dataCompteur_facture); 
			
/*END MODIFICATION*/
	 
/* BEGIN MODIFICATION CARBURANT DU VEHICULE*/

/*$data['vehicledetails'] = $this->vehicle_model->get_vehicledetails($v_id);
		$existe = $this->db->select('*')->from('trip_mission')->where('v_id',$mi_vehicle_id)->get()->result_array();*/

	 
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

/*$fjc_type = '';	 
$fjc_type = "MISSION";	 */
	 
/*DEBUT INSERTION TABLE JOURNAL*/

/*	$add_fuel_journal_carburant = '';
		$add_fuel_journal_carburant = array('fjc_mi_numero'=>$mi_numero,'fjc_v_id'=>$mi_vehicle_id,'fjc_date'=>$mi_date_mission,'fjc_quantite'=>$mi_quantite_carburant,'fjc_description'=>$mi_description,'fjc_created_date'=> $mi_created_date,'fjc_type'=>$fjc_type,'fjc_mi_id'=>$id);		
			
		$response = $this->db->insert('fuel_journal_carburant',$add_fuel_journal_carburant);	*/				
/*FIN INSERTION TABLE JOURNAL*/		 
	 
/*		$this->db->where('v_id',$mi_vehicle_id);
			
			$dataMaj_carburant = array(
   
   'v_quantite_restant' => '3','v_quantite_totale' => '3' 
);
$this->db->update('vehicles', $dataMaj_carburant); */
			
/*END MODIFICATION CARBURANT DU VEHICULE*/	 

	 
	 
	} 		
		
if($response) {
			
				$this->session->set_flashdata('successmessage', 'Mission ajoutée avec succes..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
				redirect('mission/addmission');

	}	
	
	public function updatemission()
	{
/*		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->mission_model->updatemission($this->input->post());
			$pregate = $this->input->post();*/
		
		
		$mission = $this->input->post();
		$mi_vehicle_id = $mission['mi_vehicle_id'];
		//$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];,'mi_bon_carburant_id'=>$mi_bon_carburant_id
		$mi_quantite_carburant = $mission['mi_quantite_carburant'];
        $mi_trip_id = $mission['mi_trip_id'];
		$mi_type_transport = $mission['mi_type_transport'];
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
//		$mi_numero = $mission['mi_numero'];	
		//$mi_motif_perte_id = $mission['mi_motif_perte_id'];	
		
			
	 $majincomexpense = array('mi_lieu_livraison'=>$mi_lieu_livraison,'mi_type_transport'=>$mi_type_transport,'mi_vehicle_id'=>$mi_vehicle_id,'mi_quantite_carburant'=>$mi_quantite_carburant,'mi_trip_id'=>$mi_trip_id,'mi_date_mission'=>$mi_date_mission,'mi_driver_id'=>$mi_driver_id,'mi_vehicle_remorque_id'=> $mi_vehicle_remorque_id,'mi_carte_peage_id'=>$mi_carte_peage_id,'mi_carte_peage_amount'=> $mi_carte_peage_amount,'mi_frais_ags'=>$mi_frais_ags,'mi_autre_frais'=> $mi_autre_frais,'mi_description'=> $mi_description,'mi_conteneur_id'=> implode(',', (array) $this->input->post('mi_conteneur_id'))); /**/  
			
//$response = $this->Incomexpense_model->add_incomexpense($addincomexpense);
	  $response = $this->mission_model->updatemission($majincomexpense);		
//			$response = $this->mission_model->updatemission($this->input->post());
	//echo "sdsqd";exit;	
				if($response) {
					$this->session->set_flashdata('successmessage', ' Modification effectuée avec succés..');
//			$pregate = $this->input->post();

//			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);

					redirect('mission/addmission');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
//			redirect('conteneur/pregate/'.$pregate['mi_trip_id']);
				    redirect('mission/addmission');
				}
/*		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('mission/addmission');
		}*/
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
	
/*BEGIN AJAX*/
/**/	
 function fetch_conteneur()
 { //echo "bjr";exit;
  if($this->input->post('mi_trip_id'))
  {
   echo $this->mission_model->fetch_conteneur($this->input->post('mi_trip_id'));
  }
 }	
	
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
	
}
