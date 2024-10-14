<?php defined('BASEPATH') OR exit('No direct script access allowed');

class facture extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('facture_model');
          $this->load->model('customer_model');	
          $this->load->model('drivers_model');	
          $this->load->model('vehicle_model');	
          $this->load->model('vehicle_remorque_model');	
          $this->load->model('compagnie_model');	
          $this->load->model('zone_model');	
          $this->load->model('pregate_model');	
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
        //  $this->load->library('convertNumbersIntoWords');
          $this->load->library('tcpdf_Pdf_Library');
          $this->load->library('convertir_nombre_lettre');
         
       // $this->load->library('numbertowordconvertsconver');
     }

/*    public function facture_generation_pdf(){
        $this->load->view('facture_generation_pdf');
        
    }  */ 
    
	public function index()
	{
//		$this->load->view('nombre_en_lettre');
        $data['facturelist'] = $this->facture_model->getall_facture();
//		$data['journal_facture'] = $this->facture_model->getall_facture();
 // $PROFORMA=$this->input->get(); 
		
		if(isset($_POST['facture_report'])) {
			$fuelreport = $this->facture_model->journal_management($this->input->post('from'),$this->input->post('to'),$this->input->post('t_id'));
			if(empty($fuelreport)) {
				$this->session->set_flashdata('warningmessage', 'No data found..');
				$data['journal_facture'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['journal_facture'] = $fuelreport;
			}
		}else{
			$data['journal_facture'] = $this->facture_model->getall_facture();	
		}			
		
		$this->template->template_render('facture_management',$data);
	}
	
	public function a_valider()
	{
//		$this->load->view('nombre_en_lettre');
        $data['facturelist'] = $this->facture_model->getall_facture_a_valider();
//		$data['facturelist'] = $this->facture_model->getall_facture();
 // $PROFORMA=$this->input->get();      
		$this->template->template_render('facture_a_valider',$data);
	}	
	
	
	public function a_annuler()
	{
//		$this->load->view('nombre_en_lettre');
        $data['facturelist'] = $this->facture_model->getall_facture_a_annuler();
//		$data['facturelist'] = $this->facture_model->getall_facture();
 // $PROFORMA=$this->input->get();      
		$this->template->template_render('facture_a_annuler',$data);
	}	
 
  	public function instance()
	{

		if(isset($_POST['incomeexpensereport'])) {
			$data['facturelist'] = $this->facture_model->getall_facture_instance_reports($this->input->post('from'),$this->input->post('to'),$this->input->post('statut'));//exit;
	//	$data['facturelist'] = $this->facture_model->getall_facture_instance();

		}			
			else{
		$data['facturelist'] = $this->facture_model->getall_facture_instance();
		}			
				
		$data['statut'] = $this->facture_model->get_facturestatut();
//		$data['v_group'] = $this->vehicle_model->get_vehiclegroup();
		
		
      
		$this->template->template_render('facture_instance',$data);
	}  
    
	public function index1()
	{

  $PROFORMA=$this->input->get();      
//	$data['countlist'] = $this->facture_model->getall_countfacture();
//		$data['facturelist'] = $this->facture_model->getall_facture();
		$this->template->template_render('facture_add',$data);
	}    
    
/*	public function facture_delete()
	{
		$gr_id = $this->uri->segment(3);
		$returndata = $this->facture_model->facture_delete($t_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Facture supprimée avec succés.');
			redirect('facture');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Some vechicle are mapped with this group. Please remove from vechicle management');
		    redirect('facture');
		}
	}*/

    public function booking()	{
        if(isset($_POST['bookingreport'])) {
            $triplist = $this->facture_model->synthese($this->input->post('t_customer_id'),$this->input->post('t_transitaire'),$this->input->post('t_nom_navire'),$this->input->post('t_reference'),$this->input->post('t_taxe'),$this->input->post('t_nombre_ags'),$this->input->post('t_date_facture'),$this->input->post('t_ristourne'),$this->input->post('t_ristourne_amount'),$this->input->post('t_type_reglement'),$this->input->post('t_reglement'),$this->input->post('t_compagnie'),$this->input->post('booking_from'),$this->input->post('booking_to'));
            if(empty($triplist)) {
                $this->session->set_flashdata('warningmessage', 'No bookings found..');
                $data['triplist'] = '';
            } else {
                unset($_SESSION['warningmessage']);
                $data['triplist'] = $triplist;
            }
        }
        $data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
        $this->template->template_render('facture_synthese',$data);
    }


/*Debut supp zone*/    
	public function facture_delete()
	{
		$id = $this->uri->segment(3);
		$response = $this->db->delete('trips', array('t_id' =>$id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture supprimée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non supprimée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('facture');
	}    
/* Fin supp zone*/      

    

/*Debut ajout Pro forma*/
        
	public function addfacture_proforma()
	{
//		$data['numerofacture'] = $this->facture_model->getnumerofacture();

    //$PROFORMA = $this->uri->segment(2);

 //            $PROFORMA = $this->uri->segment(2);
  //$PROFORMA=$this->input->get();      
        $data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();

/* debut ajout*/      
        
        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();       
        $data['naturelist'] = $this->facture_model->getall_naturelist();         
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();        
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();        
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        

		$data['numeroproforma'] = $this->facture_model->get_numeroproforma();

        $this->template->template_render('facture_proforma_add',$data);
	}
    
/*Fin ajout Pro forma*/
    
	public function addfacture()
	{
//		$data['numerofacture'] = $this->facture_model->getnumerofacture();

    //$PROFORMA = $this->uri->segment(2);

 //            $PROFORMA = $this->uri->segment(2);
  //$PROFORMA=$this->input->get();      
        $data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();

/* debut ajout*/      
        
        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();       
        $data['naturelist'] = $this->facture_model->getall_naturelist();         
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();        
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();        
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        

		$data['numerofacture'] = $this->facture_model->get_numerofacture();

        $this->template->template_render('facture_add',$data);
	}

    
    
    
    
/* debut  */    
    
    
	public function insertfacture() 
	{
		$testxss = xssclean($_POST);
		if($testxss){
			//exit;
			
/* INSERT CONTROL BL */
			
			$t_reference = '';
			$t_type_facturation = '';

			$t_reference = $this->input->post('t_reference');
			$t_type_facturation = $this->input->post('t_type_facturation');
			$type = "Forfait";
			$type2 = "Transfert";
			
			if($t_type_facturation=="Transfert"){

			$response = $this->facture_model->add_facture($this->input->post());
            
			$bookingemail = $this->input->post('bookingemail');
			if(isset($bookingemail)) {
				$this->sendfactureemail($this->input->post());
			}
			if($response) {
                
				$this->session->set_flashdata('successmessage', 'Nouvelle facture ajoutée avec succès..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}				
			redirect('facture');	
			}else{
				$requete= "t_reference='$t_reference' AND t_type_facturation='$t_type_facturation' AND t_type_facturation !='$type'";
				
			
			
			
			
			$exist = $this->db->select('*')->from('trips')->where($requete)->get()->result_array();//modifier
			if(count($exist)==0) {			
/* INSERT CONTROL BL*/			
		   //echo "dddd";exit;
			$response = $this->facture_model->add_facture($this->input->post());
            
			$bookingemail = $this->input->post('bookingemail');
			if(isset($bookingemail)) {
				$this->sendfactureemail($this->input->post());
			}
			if($response) {
                
				$this->session->set_flashdata('successmessage', 'Nouvelle facture ajoutée avec succès..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
				
/* INSERT CONTROL BL*/				
			} else {
				$this->session->set_flashdata('warningmessage', 'Le BL '.$t_reference.' et le Type de facture '.$t_type_facturation.' avec les mêmes informations existe déjà.');
				
			
			}				
/* INSERT CONTROL BL*/				
				
			redirect('facture');
		}//Fin IF
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('facture');
		}
	}
	public function editfacture()
	{
		$data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();
/* debut ajout*/        
        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        
        
        $t_id = $this->uri->segment(3);
		$data['facturedetails'] = $this->facture_model->get_facturedetails($t_id);

		$this->template->template_render('facture_add',$data);
	}

	public function editfacture_proforma()
	{
		$data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();
/* debut ajout*/        
        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        
        
        $t_id = $this->uri->segment(3);
		$data['facturedetails'] = $this->facture_model->get_facturedetails($t_id);

		$this->template->template_render('facture_proforma_add',$data);
	}	
	
	
	public function updatefacture()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->facture_model->update_facture($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New facture added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('facture');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('facture');
		}
	}
    
 /* debut zone*/   
	public function get_zoneselect() { 
		return $this->db->select('*')->from('zone')->get()->result_array();
	}   
    
	public function get_articleselect() { 
		return $this->db->select('*')->from('trip_article')->get()->result_array();
	}       
    
	public function get_type_tache_manutentionselect() { 
		return $this->db->select('*')->from('trip_type_tache_manutention')->get()->result_array();
	}      
 /* Fin zone*/     
 
 /* debut vechicles*/   
/**/ 	public function get_vehicleselect() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	}   
 /* Fin vechicles*/   
    
 	public function get_vehicle_remorqueselect() { //affiche la liste
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	}     
    
	public function details()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$facturedetails = $this->facture_model->get_facturedetails($b_id);
        
/*		$data2['conteneur'] = $this->facture_model->get_conteneurdetails();
		$this->template->template_render('conteneur',$data2);*/
        
		if(isset($facturedetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);

/* debut */
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);
            
/*Fin*/     
            
            $data['vehicleselect'] = $this->facture_model->get_vehicleselect(); //affiche les infos de la liste
            $data['vehicledetails'] = $this->facture_model->get_vehicleselect();
            $vehicleselect = $this->facture_model->get_vehicleselect($facturedetails[0]);

           // $data['compagniedetails'] = $this->facture_model->get_compagnieselect();
          //  $compagnieselect = $this->facture_model->get_compagnieselect($facturedetails[0]);
            
            
            $data['vehicle_remorqueselect'] = $this->facture_model->get_vehicle_remorqueselect(); //affiche les infos de la liste
            $data['vehicledetails'] = $this->facture_model->get_vehicle_remorqueselect();
            $vehicle_remorqueselect = $this->facture_model->get_vehicle_remorqueselect($facturedetails[0]);
            
            
            $data['zoneselect'] = $this->facture_model->get_zoneselect(); //affiche les infos de la liste
            $data['zonedetails'] = $this->facture_model->get_zoneselect();
            $zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);       
            
            $data['articleselect'] = $this->facture_model->get_articleselect(); //affiche les infos de la liste
            $data['articledetails'] = $this->facture_model->get_articleselect();
            $zoneselect = $this->facture_model->get_articleselect($facturedetails[0]['t_id']); // $data['zonedetails'] = $this->facture_model->get_articleselect($facturedetails[0]['t_id']);            
           
            
             $data['type_tache_manutentionselect'] = $this->facture_model->get_type_tache_manutentionselect(); //affiche les infos de la liste
            $data['type_tache_manutentiondetails'] = $this->facture_model->get_type_tache_manutentionselect();
            $type_tache_manutentionselect = $this->facture_model->get_type_tache_manutentionselect($facturedetails[0]['t_id']);            
            
             $data['natureselect'] = $this->facture_model->get_natureselect(); //affiche les infos de la liste
            $data['naturedetails'] = $this->facture_model->get_natureselect();
            $natureselect = $this->facture_model->get_natureselect($facturedetails[0]['t_id']);
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

//			$data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
//			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
        
        
        
        }
		$this->template->template_render('facture_details',$data);
        
 //       $data['zonelist'] = $this->facture_model->getall_zonelist();
        
    }
    
/* DEBUT DETAIL CONTENEUR*/
 
	public function conteneurdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$conteneurdetails = $this->facture_model->get_conteneurdetails($b_id);
		if(isset($conteneurdetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($conteneurdetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($conteneurdetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($conteneurdetails[0]['t_id']);
            
/*debut conteneur*/
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($conteneurdetails[0]['t_id']);
/*fin conteneur*/            
            
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
	}    
    
/*	public function conteneurdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$conteneurdetails = $this->facture_model->get_conteneurdetails($b_id);

	if(isset($conteneurdetails[0]['co_id'])) {

			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);

            $data['zonedetails'] = $this->facture_model->get_zoneselect();
            $zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);
            
             $data['natureselect'] = $this->facture_model->get_natureselect(); //affiche les infos de la liste
            $data['naturedetails'] = $this->facture_model->get_natureselect();
            $natureselect = $this->facture_model->get_natureselect($facturedetails[0]['t_id']);
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

			$data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
        
        
        
        }
//		$this->template->template_render('conteneur_details',$data);        
        $this->template->template_render('conteneur',$data);
	} */   
/*		public function conteneurdetails()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$conteneurdetails = $this->facture_model->get_conteneurdetails($b_id);
        

        
	if(isset($conteneurdetails[0]['co_id'])) {

			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);

            $data['zonedetails'] = $this->facture_model->get_zoneselect();
            $zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);
            
             $data['natureselect'] = $this->facture_model->get_natureselect(); //affiche les infos de la liste
            $data['naturedetails'] = $this->facture_model->get_natureselect();
            $natureselect = $this->facture_model->get_natureselect($facturedetails[0]['t_id']);
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

//			$data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
//			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
        
        
        
        }
		$this->template->template_render('conteneur_details',$data);
        
 //       $data['zonelist'] = $this->facture_model->getall_zonelist();
        
    } */   
/*FIN DETAIL CONTENEUR*/    
    
    
    
	public function facture_generation()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($facturedetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
            
/*debut conteneur*/
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);
/*fin conteneur*/            
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';

// pour afficher la compagnie 
            $compagniedetails = $this->compagnie_model->get_compagniedetails($facturedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';           
            


            
            
            }
		$this->load->view('facture_generation',$data);
	}
    
public function facture_generation_pdf()
	{
		$data = array();
		$b_id = $this->uri->segment(3);
		$facturedetails = $this->facture_model->get_facturedetails($b_id);
		if(isset($facturedetails[0]['t_id'])) {
			$customerdetails = $this->customer_model->get_customerdetails($facturedetails[0]['t_customer_id']);
			$driverdetails = $this->drivers_model->get_driverdetails($facturedetails[0]['t_driver']);
			$data['paymentdetails'] = $this->facture_model->get_paymentdetails($facturedetails[0]['t_id']);
            
/*debut conteneur*/
			$data['conteneurdetails'] = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);
/*fin conteneur*/            
            
            $data['facturedetails'] = $facturedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
            
 
            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
            //$zoneselect = $this->facture_model->get_zoneselect($facturedetails[0]['t_id']);            
//            $data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';            
// pour afficher la compagnie 
            $compagniedetails = $this->compagnie_model->get_compagniedetails($facturedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:''; 
            
            }
		$this->load->view('facture_generation_pdf',$data);
	}    
    
    
	public function facturepayment()
	{
		$pyment = $this->input->post();
		$this->db->insert('trip_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from facture and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('facture/details/'.$pyment['tp_trip_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('facture/details/'.$pyment['tp_trip_id']);
		}
	}
	
/* BEGIN ADD PREGATE */	
	
    
	public function facturepregate()
	{
		$pregate = $this->input->post();
		$this->db->insert('trip_pregate',$pregate);
		if($this->db->insert_id()) {
/*			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from facture and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);*/
			$this->session->set_flashdata('successmessage', 'Ajout Pregate effectué avec succés');
			redirect('facture/details/'.$pregate['pr_trip_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur!. Ajout non effectué');
			redirect('facture/details/'.$pregate['pr_trip_id']);
		}
	}	
	
/* END ADD PREGATE*/	
	
	
	public function facturepayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$this->uri->segment(4));
	}

/*Debut supp conteneur*/    
    
	public function conteneurfacture_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_conteneur', array('co_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$this->uri->segment(4));
	}  
        
    
	public function conteneurfacture_delete_A_REVOIR()
	{
		$tp_id = $this->uri->segment(3);
        $facture_id = $this->uri->segment(4);
 //co_trip_id co_montant       
//
        
$co_zone = $this->db->select('*')->from('trip_conteneur')->where('co_id', $tp_id)->get()->row()->co_zone;
        
$co_trip_id = $this->db->select('*')->from('trip_conteneur')->where('co_id', $tp_id)->get()->row()->co_trip_id;
        
$t_trip_amount = $this->db->select('*')->from('trips')->where('t_id', $facture_id)->get()->row()->t_trip_amount;

$t_nombre_ags = $this->db->select('*')->from('trips')->where('t_id', $facture_id)->get()->row()->t_nombre_ags;

$tva = $this->db->select('*')->from('trips')->where('t_id', $facture_id)->get()->row()->t_taxe;

$t_type_facturation = $this->db->select('*')->from('trips')->where('t_id', $facture_id)->get()->row()->t_type_facturation;       
        
        
        
// Debut mise à jour de la facture
if(($t_type_facturation)=="Exportation")// Debut du controle if
{
 $ags=1500;   
}
else
{
 $ags=1271;
}
$montantags=$t_nombre_ags * $ags;
 
       
$co_type_conteneur = $this->db->select('*')->from('zone')->where('z_id', $co_zone)->get()->row()->co_type_conteneur;
        
/**/if($co_type_conteneur=='20_pieds')
{
        $montant_conteneur = $this->db->select('*')->from('zone')->where('z_id', $co_zone)->get()->row()->z_montant_conteneur_20;
}
else
{
         $montant_conteneur = $this->db->select('*')->from('zone')->where('z_id', $co_zone)->get()->row()->z_montant_conteneur_40;
}

    unset($addfactureconteneur['co_id']);
       
  
// calcul de la 
 //$montant_conteneur_actuel=$this->input->post('t_trip_amount')+ $montant_conteneur;      
$montantHT=0;       
$montantTVAArrondi=0;        
$montantHT=$t_trip_amount + $montantags - $montant_conteneur ;        
$montantTVA=0; 
if($tva=="avec_tva")
{
    //ceil(1.1)
$montantTVA=ceil((int)(($montantHT*18)/100));

    $divmontantTVA = floor($montantTVA / 5);
    $modmontantTVA = $montantTVA % 5;

    If ($modmontantTVA > 0) $addmontantTVA = 5;
    Else $addmontantTVA = 0;

    $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA; 

}        

    $montantTTC=$montantTVA+$montantHT;
    $divmontantTTC = floor($montantTTC / 5);
    $modmontantTTC = $montantTTC % 5;

    If ($modmontantTTC > 0) $addmontantTTC = 5;
    Else $addmontantTTC = 0;
    $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;  

 // fin calcul TVA et Montant       
        
 /*       unset($addfactureconteneur['co_id']);
         unset($addfactureconteneur['co_id']);
	   // $response =  $this->db->insert('trip_conteneur',$addconteneur);*/
        
$editfacture = array('t_id'=>$facture_id,'t_trip_amount'=>$montantTTCArrondi,'t_montant_tva'=>$montantTVAArrondi,'t_montant_ags'=>$montantags);        
        
$this->db->where('t_id', $facture_id);
$response = $this->db->update('trips', $editfacture);         
// Fin mise à jour de la facture        
        
        
		$response = $this->db->delete('trip_conteneur', array('co_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Conteneur supprimé avec succés et facture mise à jour..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$this->uri->segment(4));
	}  
    
    
	public function conteneurfacture_edit()
	{
		$data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();
/* debut ajout*/        
        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        
        
        $co_id = $this->uri->segment(3);
		//$data['conteneuredit'] = $this->facture_model->get_conteneurdetails($co_id);

		$this->template->template_render('facture_details',$data);
	}

	public function conteneurfacture_update()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->facture_model->update_facture($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New facture added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('facture');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('facture');
		}
	}    
/* Fin supp conteneur*/    
    
    
    
	public function addfactureexpense() 	{
		$addfactureexpense = $this->input->post();
		$facture_id = $addfactureexpense['addfactureexpense_facture_id'];
		unset($addfactureexpense['addfactureexpense_facture_id']);
		$response =  $this->db->insert('incomeexpense',$addfactureexpense);
		if($response) {
			$this->session->set_flashdata('successmessage', 'Expense added successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$facture_id);
	}
    

	
/* BEGIN ADD FACTURE CONTENEUR */    
	
	public function addfactureconteneur() 	{

 $co_nombre_jour_franchise =0;       
        $addfactureconteneur = $this->input->post();//exit;

$type_facture = "";		
		 $type_facture = $addfactureconteneur['t_type_facturation'];
if($type_facture =="forfait"){
	
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_quantite = $addfactureconteneur['co_quantite'];
		$co_prix_unitaire = $addfactureconteneur['co_prix_unitaire'];

		$co_description = $addfactureconteneur['co_description'];
		$co_numero_conteneur = $addfactureconteneur['co_numero_conteneur'];
        $co_libelle = $addfactureconteneur['co_libelle'];
	    $co_montant=$co_quantite*$co_prix_unitaire;

        $co_date_heure_debut =date('Y-m-d');

        $co_date_heure_fin =date('Y-m-d');


    unset($addfactureconteneur['co_id']);
	 $addconteneur = array('co_trip_id'=>$facture_id,'co_montant'=>$co_montant,'co_description'=>$co_description,'co_quantite'=>$co_quantite,'co_prix_unitaire'=>$co_prix_unitaire,'co_libelle'=>$co_libelle,'co_numero_conteneur'=>$co_numero_conteneur,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin);  
	
}	
elseif($type_facture =="immobilisation"){
	
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_vehicle = $addfactureconteneur['co_vehicle'];
		$co_vehicle_remorque = $addfactureconteneur['co_vehicle_remorque'];

/*		$co_vehicle = $addfactureconteneur['co_vehicle'];
		$co_vehicle_remorque_montant = $addfactureconteneur['co_vehicle_remorque_montant'];	*/
		$nbre_jour_immo = $addfactureconteneur['nbre_jour_immo'];
	
if($co_vehicle!='')	
{
	$co_vehicle_montant = 55000*$nbre_jour_immo;	
}
	
if($co_vehicle_remorque!='')	
{
	$co_vehicle_remorque_montant = 25000*$nbre_jour_immo;	
//echo "remorque".$co_vehicle_remorque_montant;//exit;	
}	
	
//		$co_vehicle_remorque = $addfactureconteneur['co_vehicle_remorque'];
		$co_description = $addfactureconteneur['co_description'];
        $co_libelle = $addfactureconteneur['co_libelle'];
//	    $co_montant=$co_quantite*$co_prix_unitaire;

        $co_date_heure_debut =date('Y-m-d');

        $co_date_heure_fin =date('Y-m-d');
	$co_montant= $co_vehicle_remorque_montant + $co_vehicle_montant;

     unset($addfactureconteneur['co_id']);
	 $addconteneur = array('co_trip_id'=>$facture_id,'co_vehicle'=>$co_vehicle,'co_description'=>$co_description,'co_vehicle_montant'=>$co_vehicle_montant,'co_vehicle_remorque'=>$co_vehicle_remorque,'co_libelle'=>$co_libelle,'co_vehicle_remorque_montant'=>$co_vehicle_remorque_montant,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin,'co_montant'=>$co_montant);  //exit; //,'co_created_date'=>date('Y-m-d')     

	
}		
elseif($type_facture =="transfert"){
	
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_type_conteneur = $addfactureconteneur['co_type_conteneur'];
		$co_zone = $addfactureconteneur['co_zone'];

		$co_description = $addfactureconteneur['co_description'];
		$co_numero_conteneur = $addfactureconteneur['co_numero_conteneur'];
        $co_adresse_livraison = $addfactureconteneur['co_adresse_livraison'];
//	    $co_montant=$co_quantite*$co_prix_unitaire;
	    $co_montant=$addfactureconteneur['co_montant'];

        $co_date_heure_debut =date('Y-m-d');

        $co_date_heure_fin =date('Y-m-d');


    unset($addfactureconteneur['co_id']);
	 $addconteneur = array('co_trip_id'=>$facture_id,'co_montant'=>$co_montant,'co_description'=>$co_description,'co_adresse_livraison'=>$co_adresse_livraison,'co_numero_conteneur'=>$co_numero_conteneur,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin,'co_type_conteneur'=>$co_type_conteneur,'co_zone'=>$co_zone);  
	//exit;
}		
		
		else {
	//echo "fdsfsd";exit;
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_zone = $addfactureconteneur['co_zone'];
		$co_type_conteneur = $addfactureconteneur['co_type_conteneur'];
        if(!empty($addfactureconteneur['co_nombre_jour_franchise'])) {
		$co_nombre_jour_franchise = $addfactureconteneur['co_nombre_jour_franchise'];
        }

        $co_date_heure_debut =date('Y-m-d');
        if(!empty($addfactureconteneur['co_date_heure_debut'])) {
             $co_date_heure_debut = $addfactureconteneur['co_date_heure_debut'];
       }
        $co_date_heure_fin =date('Y-m-d');
        if(!empty($addfactureconteneur['co_date_heure_fin'])) {
		$co_date_heure_fin = $addfactureconteneur['co_date_heure_fin'];
        }

		$co_description = $addfactureconteneur['co_description'];
		$co_numero_conteneur = $addfactureconteneur['co_numero_conteneur'];
        $co_adresse_livraison = $addfactureconteneur['co_adresse_livraison'];

if ($co_type_conteneur=='20_pieds')
{
    
  $montant=15000;  
  $montant_conteneur=$montant*$co_nombre_jour_franchise;
}
 else
  {
  $montant=25000;  
   $montant_conteneur=$montant*$co_nombre_jour_franchise;
 }

    unset($addfactureconteneur['co_id']);
	$addconteneur = array('co_trip_id'=>$facture_id,'co_montant'=>$montant_conteneur,'co_description'=>$co_description,'co_type_conteneur'=>$co_type_conteneur,'co_zone'=>$co_zone,'co_adresse_livraison'=>$co_adresse_livraison,'co_numero_conteneur'=>$co_numero_conteneur,'co_nombre_jour_franchise'=>$co_nombre_jour_franchise,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin);   //,'co_created_date'=>date('Y-m-d')     
	
}

   
	    $response =  $this->db->insert('trip_conteneur',$addconteneur);        

        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Numéro conteneur ajouté avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$facture_id);
	}   
	
/* END ADD FACTURE CONTENEUR */    
    
	
	
	public function sendfactureemail($data) {
		$this->load->model('email_model');	
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$value = '<b>facture Details :</b><br><br> '.$data['t_trip_fromlocation']. ' <br><b>to</b><br> ' . $data['t_trip_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
			$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email;
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
		}
	}
	public function sendtracking() {
		$this->load->model('email_model');
		$custemail = urldecode($_GET['email']);
		$url = base_url().'facturetracking/'.$_GET['trackingcode'];
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','tracking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$body = str_replace('{{url}}', $url, $emailcontent);
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
			if($email) {
				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
			}
			redirect('facture/details/'.$_GET['t_id']);
		}
	}
    
    /*Debut validation*/

	public function facture_validation()
	{
		$id = $this->uri->segment(3);
		$page = $this->uri->segment(4);
        $validation='valide';
		$montantags=0;
		$nombreags= 0;
		$montantTVA=0;
		$montanttotal =0;

		$t_nombre_ags=0;
		$t_rabais= 0;
		$t_frais_divers=0;
		$t_taxe ='';			
		$montanttotal_ristourne = 0;
		$t_ristourne_additional =0;
		$t_impression=0;


		$t_ristourne_additional = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_ristourne_additional; 
		$t_type_facturation = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_type_facturation; 
		$t_nombre_ags = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_nombre_ags; 
		$t_rabais = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_rabais; 
		$t_frais_divers = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_frais_divers; 
		$t_taxe = $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_taxe; 	
		$t_impression= $this->db->select('*')->from('trips')->where('t_id', $id)->get()->row()->t_impression;
		
		
		$facturedetails = $this->facture_model->get_facturedetails($id);


	/*debut conteneur*/
				$conteneurdetails = $this->facture_model->get_conteneurdetails($facturedetails[0]['t_id']);		
		
/* BEGIN IMPORTATION - EXPORTATION*/		
		
if(($t_type_facturation=="Exportation") || ($t_type_facturation=="Transport")) 
{// Debut du controle if
	

		

		

	/*fin conteneur*/            


		
			  if(($t_type_facturation)=="Exportation")// Debut du controle if
				{
				 $ags=1500;   
				}
				else
				{
				 $ags=1271;
				}

		
    
					foreach($conteneurdetails as $conteneurdetails)
					{ $type='';
					 $montant_conteneur=0;
					 $montant=0; 
					 //$count++;
					 $destination =''; 
					 $montant_conteneurAffiche=0;
					 $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20;

					 // début calcul du montant du type de contenteur
					 if($conteneurdetails['co_type_conteneur']!='') {
											  if($conteneurdetails['co_type_conteneur']=='20_pieds') 
											  { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20;
											   $montant_ristourne = $conteneurdetails['zone_name']->z_montant_ristourne_20;
												$type='20 pieds'; 
											   $t_ristourne_amount = 0;
											   $t_ristourne_amount = 15000;
											   
											} else { 
												$montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
												$montant_ristourne = $conteneurdetails['zone_name']->z_montant_ristourne_40;
												  $type='40 pieds'; 
												  
											   $t_ristourne_amount = 0;
												  $t_ristourne_amount = 25000;
												  
											  }} 
					 //$montant_conteneurAffiche = number_format($montant_conteneur, 0, ',', ' '); 
					  // Fin calcul du montant du type de contenteur

					 //Début affichage destination
					 $destination = $conteneurdetails['zone_name']->z_destination;

					 $adresselivraison='';
					 if(isset($conteneurdetails['co_adresse_livraison']))
					 { 
						$adresselivraison= $conteneurdetails['co_adresse_livraison'];
					 } 



					// cumul du montant total
					  $montanttotal += $montant_conteneur;
					 // $montanttotal_ristourne += $t_ristourne_amount;
					 $t_ristourne_amount += $t_ristourne_amount;
					// $nombreags += $facturedetails['t_nombre_ags'];
					// $nombreags += $facturedetails['t_nombre_ags'];
					}

}
/* END IMPORTATION - EXPORTATION*/	

		
/*BEGIN IMMOBILISATION*/	

	if($t_type_facturation=="Immobilisation") 
{// Debut du controle if

		$montantTVA=0;
    
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 $montant_conteneurAffiche=0;

 
 $montant_conteneur = $conteneurdetails['co_montant']; 
 
  $montanttotal += $montant_conteneur;
// $nombreags += $facturedetails['t_nombre_ags'];
// $nombreags += $facturedetails['t_nombre_ags'];
	}

	
	}
		
		
		
		
		
		

/*BEGIN FORFAIT*/	

//	if(($facturedetails['t_type_facturation'])=="Immobilisation") 
		
 if($t_type_facturation == "Forfait")  		
		
{// Debut du controle if

     $ags=1271;
 //   }



$montantags=0;
$nombreags= 0;
$montantTVA=0;
   $montanttotal = 0;
    
foreach($conteneurdetails as $conteneurdetails)
{ $type='';
 $montant_conteneur=0;
 $montant=0; 
 $count++;
 $destination =''; 
 //$montant_conteneurAffiche=0;	 

 if($conteneurdetails['co_type_conteneur']!='') {
                          if($conteneurdetails['co_type_conteneur']=='20_pieds') 
                          { $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_20; 
                            $type='20 pieds'; 
											   $t_ristourne_amount = 0;
											   $t_ristourne_amount = 15000;
 
						  } else { 
                            $montant_conteneur = $conteneurdetails['zone_name']->z_montant_conteneur_40;
                              $type='40 pieds'; 
											   $t_ristourne_amount = 0;
											   $t_ristourne_amount = 25000;
 
						  }
 	} 

  $montanttotal += $conteneurdetails['co_montant']; //exit;

}


	 
	 
}

/*END FORFAIT*/		
		

		
/*BEGIN DETENTION*/		
		
 if($t_type_facturation == "Detention")  		
		
 {
	 
	 
	 
    foreach($conteneurdetails as $conteneurdetails)
    { 
        $count++;
             if(isset($conteneurdetails['co_type_conteneur']))
             {
                 $type=$conteneurdetails['co_type_conteneur'];
                    if($type=='20_pieds')
                    {  
                        $type="20 pieds"; $montant=15000;
                    } 
                 else 
                 {
                     $type="40 pieds";$montant=25000;
                 }
             }	 
  $montanttotal += $conteneurdetails['co_montant'];

    }//Fin foreach
	 
	 
 }
		
/*END DETENTION*/		
		
		
/* BEGIN CALCUL DETAIL*/		
		
	 $nombreags = 0;    
	 $nombreags = $t_nombre_ags;
	$montantags=$nombreags * $ags;
//	$montantagsAfficher =0;

	// initialisation        
	$montantHT=0;$montantTTC=0;        

	//Calcul montant hors taxe    
	$montantHT=$montanttotal+$montantags;   
	// $montantHTAfficher =0;

	// deduction du rabais
	$rabais = 0;    
	$rabais = $t_rabais;   

		if($rabais>0)
	{
			$montantHT=$montantHT-$rabais;
	}
		
		
		
//Begin cool printing	
$impression = 0;    
$impression = $t_impression;  
		
/*    if($impression>0)
{
//        $impressionAfficher =0;
		$montantHT=$montantHT+$impression;
//        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}*/		
		

		


		if($t_frais_divers>0)
	{
			$montantHT=$montantHT + $t_frais_divers;
	//        $t_frais_diversAfficher = number_format($t_frais_divers, 0, ',', ' ');
	}

	$montantTVAArrondi=0;
	$montantTVA=0;		
		if($t_taxe=='avec_tva')
		{

			$montantTVA=ceil((int)(($montantHT*18)/100));

			$divmontantTVA = floor($montantTVA / 5);
			$modmontantTVA = $montantTVA % 5;

			If ($modmontantTVA > 0) $addmontantTVA = 5;
			Else $addmontantTVA = 0;

			 $montantTVAArrondi= $divmontantTVA * 5 + $addmontantTVA;  
   
		} 
/*		else
		{
			$montant_total="Montant total";  
		}*/
		// calcul montantTTC         
		 $montantTTC=$montantTVA+$montantHT;
			$divmontantTTC = floor($montantTTC / 5);
			$modmontantTTC = $montantTTC % 5;

			if ($modmontantTTC > 0) $addmontantTTC = 5;
			else $addmontantTTC = 0;

			 $montantTTCArrondi= $divmontantTTC * 5 + $addmontantTTC;     
		//$montantTTCAfficher =0;
		//$montantTTCAfficher = number_format($montantTTCArrondi, 0, ',', ' ');
		//$montantTTCAfficher = number_format($montantTTC, 0, ',', ' ');
		// début conversion nombre en lettres
		//$val = $this->load->library('convertir_nombre_lettre');

		// 09 08 2021    
		//$nombre = intval($montantTTC);
		
    if($impression>0)
{
//        $impressionAfficher =0;
		$montantTTCArrondi=$montantTTCArrondi+$impression;
//        $impressionAfficher = number_format($impression, 0, ',', ' ');
//        $rabaisAfficher = number_format($rabais, 0, ',', ' ');
}		
		
		 $nombre = ceil($montantTTCArrondi);	//exit;
		
		$montanttotal_ristourne =0;
		$montanttotal_ristourne = $t_ristourne_amount +	$t_ristourne_additional;

		
        $createur = "";
        $validation_date = "";
		$createur = $this->session->userdata['session_data']['u_id'];
        $validation_date = date('Y-m-d h:i:s');		
		
		$data = array(
				't_validation' => $validation,
				't_trip_amount' => $nombre,
				't_montant_ags' => $montantags,
				't_validation_by' => $createur,
				't_validation_date' => $validation_date,
				't_montant_tva' => $montantTVAArrondi,
				't_trip_amount_ht' => $montantHT,
				't_ristourne_amount' => $montanttotal_ristourne
		);
				

		$this->db->where('t_id', $id);
		$response = $this->db->update('trips', $data);        
        
        
	if($response) {
		$this->session->set_flashdata('successmessage', 'Facture validée avec succés..');
	} else {
		$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non validée');
	}
		if($page=="a_valider"){
	redirect('facture/a_valider');
}else { redirect('facture');
			}
   
}    
    /*Fin validation*/
 
    /*Debut demandeAnnulation*/

	public function facture_demande_annulation()
	{
		$id = $this->uri->segment(3);
		$page = $this->uri->segment(4);
        $annulation='demande_annulation';
        $date_demande_annulation=date('Y-m-d h:i:s');
		//t_date_validation_demande_annulation
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        't_date_demande_annulation' => $date_demande_annulation,'t_annulation' => $annulation
);

$this->db->where('t_id', $id);
$response = $this->db->update('trips', $data);        
        
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture annulée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non annulée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('facture');
		
		if($page=="a_annuler"){
	redirect('facture/a_annuler');
}else { redirect('facture');
			}		
		
	}    
   
    
    /*Fin demande Annulation*/    
	

    /*Debut Annulation*/

	public function facture_validation_annulation()
	{
		$id = $this->uri->segment(3);
		$page = $this->uri->segment(4);
          $createur = "";
        $validation_date = "";
		$createur = $this->session->userdata['session_data']['u_id'];
        $t_annulation_date = date('Y-m-d h:i:s');	
		
		$annulation='annule';
        $date_validation_demande_annulation=date('Y-m-d h:i:s');
		//t_date_validation_demande_annulation
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
 				't_annulation_by' => $createur,
				't_annulation_date' => $validation_date,
       't_date_validation_demande_annulation' => $date_validation_demande_annulation,'t_annulation' => $annulation
);

$this->db->where('t_id', $id);
$response = $this->db->update('trips', $data);        
        
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture annulée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non annulée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		//redirect('facture');
		
		if($page=="a_annuler"){
	redirect('facture/a_annuler');
}else { redirect('facture');
			}		
		
	}    
   
    
    /*Fin Annulation*/    	

  /* debut synthese*/
    public function facture_synthese()
    {
//		$data['numerofacture'] = $this->facture_model->getnumerofacture();

        //$PROFORMA = $this->uri->segment(2);

        //            $PROFORMA = $this->uri->segment(2);
        //$PROFORMA=$this->input->get();
        $data['customerlist'] = $this->facture_model->getall_customer();
        $data['vechiclelist'] = $this->facture_model->getall_vechicle();
        $data['driverlist'] = $this->facture_model->getall_driverlist();

        /* debut ajout*/

        $data['zonelist'] = $this->facture_model->getall_zonelist();
        $data['transitairelist'] = $this->facture_model->getall_transitairelist();
        $data['naturelist'] = $this->facture_model->getall_naturelist();
        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
        $data['reglementlist'] = $this->facture_model->getall_reglementlist();
        $data['compagnielist'] = $this->facture_model->getall_compagnielist();
        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
        /* debut ajout*/

        $data['numeroproforma'] = $this->facture_model->get_numeroproforma();

        $this->template->template_render('facture_synthese',$data);
    }
    /* debut synthese*/
 
	public function trippayment()
	{
		$pyment = $this->input->post();
		$this->db->insert('trip_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from trip and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('trips/details/'.$pyment['tp_trip_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('trips/details/'.$pyment['tp_trip_id']);
		}
	}
	public function trippayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('trip_payments', array('tp_id' =>$tp_id));
		if($response) {
			$this->session->set_flashdata('successmessage', 'Payment record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('trips/details/'.$this->uri->segment(4));
	}

    
    
	public function addpregate()
	{
//		$data['numerofacture'] = $this->facture_model->getnumerofacture();

    //$PROFORMA = $this->uri->segment(2);

 //            $PROFORMA = $this->uri->segment(2);
  //$PROFORMA=$this->input->get(); 
		$this->load->model('trips_model');
		$data['facturelist'] = $this->facture_model->getall_facture_pregate_add();        
        
/*        $data['customerlist'] = $this->facture_model->getall_customer();
		$data['vechiclelist'] = $this->facture_model->getall_vechicle();
		$data['driverlist'] = $this->facture_model->getall_driverlist();*/

/* debut ajout*/      
        
//        $data['zonelist'] = $this->facture_model->getall_zonelist();
//        $data['transitairelist'] = $this->facture_model->getall_transitairelist();       
//        $data['naturelist'] = $this->facture_model->getall_naturelist();         
//        $data['type_reglementlist'] = $this->facture_model->getall_type_reglementlist();
//        $data['reglementlist'] = $this->facture_model->getall_reglementlist();        
//        $data['compagnielist'] = $this->facture_model->getall_compagnielist();        
//        $data['carte_peagelist'] = $this->facture_model->getall_carte_peagelist();
//        $data['carte_carburantlist'] = $this->facture_model->getall_carte_carburantlist();
/* debut ajout*/        

		$data['numerofacture'] = $this->facture_model->get_numerofacture();

        $this->template->template_render('pregate_add',$data);
	}    

	public function pregate()
	{
//		$this->load->view('nombre_en_lettre');
        //$t_date_pregate='';
        $data['facturelist'] = $this->facture_model->getall_facture_pregate();
//		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
        //$t_date_pregate='';
        //$data['facturelist'] = $this->db->select('*')->from('trips')->where('t_date_pregate',$t_date_pregate)->get()->result_array();//exit;

//		$data['facturelist'] = $this->facture_model->getall_facture();
 // $PROFORMA=$this->input->get();      
		$this->template->template_render('facture_pregate',$data);
	}    

    
        /*Debut Transformation proforma*/

	public function facture_transformation_proforma()
	{
		$id = $this->uri->segment(3);
       // $validation='valide';
        $t_modele_facture= 'FACTURE';
        $t_num_facture='';
		$t_date_facture='';
		$t_date_facture=date("Y-m-d");
//        $data['numerofacture'] = $this->facture_model->get_numerofacture();
		$t_num_facture = 'FA000'.$this->facture_model->get_numerofacture();

//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        't_modele_facture' => $t_modele_facture,'t_num_facture' => $t_num_facture,'t_date_facture' => $t_date_facture
);

$this->db->where('t_id', $id);
$response = $this->db->update('trips', $data);        
        
			$response = $this->facture_model->add_trip_compteur_facture($this->input->post());

        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture proforma transformée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture proforma non transformée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('facture');
	}    
   
    
    /*Fin validation*/

	
	/*BEGIN CONTENEUR IMPORT*/

	public function addfactureconteneur_import() 	{

 $co_nombre_jour_franchise =0;       
        $addfactureconteneur = $this->input->post();//exit;

$forfait = "";		
		 $forfait = $addfactureconteneur['forfait'];
if($forfait =="forfait"){
	
/*co_trip_id'=>$facture_id,'co_montant'=>$co_montant,'co_description'=>$co_description,'co_quantite'=>$co_quantite,'$co_prix_unitaire'=>$co_prix_unitaire,'co_libelle'=>$co_libelle,'co_numero_conteneur'=>$co_numero_conteneur*/
	
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_quantite = $addfactureconteneur['co_quantite'];
		$co_prix_unitaire = $addfactureconteneur['co_prix_unitaire'];

		$co_description = $addfactureconteneur['co_description'];
		$co_numero_conteneur = $addfactureconteneur['co_numero_conteneur'];
        $co_libelle = $addfactureconteneur['co_libelle'];
	    $co_montant=$co_quantite*$co_prix_unitaire;

        $co_date_heure_debut =date('Y-m-d');
/*        if(!empty($addfactureconteneur['co_date_heure_debut'])) {
             $co_date_heure_debut = $addfactureconteneur['co_date_heure_debut'];
       }*/
        $co_date_heure_fin =date('Y-m-d');
/*        if(!empty($addfactureconteneur['co_date_heure_fin'])) {
		$co_date_heure_fin = $addfactureconteneur['co_date_heure_fin'];
        }	*/
/*        $t_zone = $this->db->select('*')->from('trips')->where('t_id',$facture_id)->get()->row()->t_zone; */       

/*if ($co_type_conteneur=='20_pieds')
{
    
  $montant=15000;  
  $montant_conteneur=$montant*$co_nombre_jour_franchise;
}
 else
  {
  $montant=25000;  
   $montant_conteneur=$montant*$co_nombre_jour_franchise;
 }*/

    unset($addfactureconteneur['co_id']);
	 $addconteneur = array('co_trip_id'=>$facture_id,'co_montant'=>$co_montant,'co_description'=>$co_description,'co_quantite'=>$co_quantite,'co_prix_unitaire'=>$co_prix_unitaire,'co_libelle'=>$co_libelle,'co_numero_conteneur'=>$co_numero_conteneur,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin);  //exit; //,'co_created_date'=>date('Y-m-d')     

	
}	else {
	
		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_zone = $addfactureconteneur['co_zone'];
		$co_type_conteneur = $addfactureconteneur['co_type_conteneur'];
        if(!empty($addfactureconteneur['co_nombre_jour_franchise'])) {
		$co_nombre_jour_franchise = $addfactureconteneur['co_nombre_jour_franchise'];
        }

        $co_date_heure_debut =date('Y-m-d');
        if(!empty($addfactureconteneur['co_date_heure_debut'])) {
             $co_date_heure_debut = $addfactureconteneur['co_date_heure_debut'];
       }
        $co_date_heure_fin =date('Y-m-d');
        if(!empty($addfactureconteneur['co_date_heure_fin'])) {
		$co_date_heure_fin = $addfactureconteneur['co_date_heure_fin'];
        }

		$co_description = $addfactureconteneur['co_description'];
		$co_numero_conteneur = $addfactureconteneur['co_numero_conteneur'];
        $co_adresse_livraison = $addfactureconteneur['co_adresse_livraison'];

/*        $t_zone = $this->db->select('*')->from('trips')->where('t_id',$facture_id)->get()->row()->t_zone; */       

if ($co_type_conteneur=='20_pieds')
{
    
  $montant=15000;  
  $montant_conteneur=$montant*$co_nombre_jour_franchise;
}
 else
  {
  $montant=25000;  
   $montant_conteneur=$montant*$co_nombre_jour_franchise;
 }
        
//$this->db->select('*')->from('zone')->where('z_id', $co_zone)->get()->row()->z_montant_conteneur_20;

    unset($addfactureconteneur['co_id']);
	$addconteneur = array('co_trip_id'=>$facture_id,'co_montant'=>$montant_conteneur,'co_description'=>$co_description,'co_type_conteneur'=>$co_type_conteneur,'co_zone'=>$co_zone,'co_adresse_livraison'=>$co_adresse_livraison,'co_numero_conteneur'=>$co_numero_conteneur,'co_nombre_jour_franchise'=>$co_nombre_jour_franchise,'co_date_heure_debut'=>$co_date_heure_debut,'co_date_heure_fin'=>$co_date_heure_fin);   //,'co_created_date'=>date('Y-m-d')     
	
}
		

   
	    $response =  $this->db->insert('trip_conteneur',$addconteneur);        

        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Numéro conteneur ajouté avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$facture_id);
	}    
/* Fin conteneur */ 	
	/* END CONTENEUR IMPORT*/
 
	
	/*BEGIN STATUT*/	
	public function facturestatut()
	{
		$data['facturestatut'] = $this->facture_model->get_facturestatut();
		$this->template->template_render('facture_statut',$data);
	}
	public function facturestatut_delete()
	{
		$st_id = $this->uri->segment(3);
		$returndata = $this->facture_model->facturestatut_delete($st_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Group deleted successfully..');
			redirect('facture/facturestatut');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Some vechicle are mapped with this group. Please remove from vechicle management');
		    redirect('facture/facturestatut');
		}
	}
	public function addstatut()
	{
		$response = $this->db->insert('facture_statut',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Group added successfully..');
		    redirect('facture/facturestatut');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('facture/facturestatut');
		}
	}

	
	
	/*END STATUT*/
	
    
}
