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
//		$data['facturelist'] = $this->facture_model->getall_facture();
 // $PROFORMA=$this->input->get();      
		$this->template->template_render('facture_management',$data);
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
            $triplist = $this->trips_model->trip_reports($this->input->post('booking_from'),$this->input->post('booking_to'),$this->input->post('booking_vechicle'));
            if(empty($triplist)) {
                $this->session->set_flashdata('warningmessage', 'No bookings found..');
                $data['triplist'] = '';
            } else {
                unset($_SESSION['warningmessage']);
                $data['triplist'] = $triplist;
            }
        }
        $data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
        $this->template->template_render('report_booking',$data);
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
			$response = $this->facture_model->add_facture($this->input->post());

          
            
			$bookingemail = $this->input->post('bookingemail');
			if(isset($bookingemail)) {
				$this->sendfactureemail($this->input->post());
			}
			if($response) {
   
// debut ajout compteur                
/*         $ags=1;   
		$this->db->insert('trip_compteur',$ags); exit();                 
 
		$addtrip_compteur = $this->input->post();
		$facture_id = $addtrip_compteur['cpt_numero'];
		unset($addtrip_compteur['cpt_id']);
		$response =  $this->db->insert('trip_compteur',$addtrip_compteur); */               
                
// fin ajout compteur                
                
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
            $zoneselect = $this->facture_model->get_articleselect($facturedetails[0]['t_id']);            
            
            
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

//			$data['compagniedetails'] = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
            
            $compagniedetails = $this->compagnie_model->get_compagniedetails($compagniedetails[0]['t_compagnie']);            
			$data['compagniedetails'] = (isset($compagniedetails[0]['cc_id']))?$compagniedetails[0]:'';            
            
            }
//		$this->load->view('facture_generation',$data);
		$this->template->template_render('conteneur_details',$data);        
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
		$this->db->insert('facture_payments',$pyment);
		if($this->db->insert_id()) {
			$addincome = array('ie_v_id'=>$this->input->post('tp_v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'income','ie_description'=>'payment from facture and '.$this->input->post('tp_notes'),'ie_amount'=>$this->input->post('tp_amount'),'ie_created_date'=>date('Y-m-d'));
			$this->db->insert('incomeexpense',$addincome);
			redirect('facture/details/'.$pyment['tp_facture_id']);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error!. Please try again');
			redirect('facture/details/'.$pyment['tp_facture_id']);
		}
	}
	public function facturepayment_delete()
	{
		$tp_id = $this->uri->segment(3);
		$response = $this->db->delete('facture_payments', array('tp_id' =>$tp_id));
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
        
        $t_id = $this->uri->segment(3);
		$data['facturedetails'] = $this->facture_model->get_facturedetails($t_id);

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
    
/* Debut conteneur */    

	public function addfactureconteneur() 	{
		$addfactureconteneur = $this->input->post();//exit;

		$facture_id = $addfactureconteneur['co_trip_id'];
		$co_zone = $addfactureconteneur['co_zone'];
		$co_type_conteneur = $addfactureconteneur['co_type_conteneur'];
//		$facture_id = $addfactureconteneur['co_trip_id'];
//        $facture_id = $addfactureconteneur['co_trip_id'];

// informations sur la zone
        $zone=$this->db->where('z_id', $co_zone);
        
  //      $montant_conteneur = $this->db->select('z_montant_conteneur_20')->from('zone')->where('co_type_conteneur',''.$co_type_conteneur.'')->get()->result_array();
        
		//echo $z_montant_conteneur_20 = $zone['z_montant_conteneur_20'];
		//echo $z_montant_conteneur_40 = $zone['z_montant_conteneur_40'];exit;
 //       
      //  $montant_conteneur=0;
/**/if($co_type_conteneur=='20_pieds')
{
   // $montant_conteneur=z_montant_conteneur_20;
//    $montant_conteneur_20 = $zone['z_montant_conteneur_20'];
        $montant_conteneur = $this->db->select('*')->from('zone')->where('z_id', $co_zone)->get()->row()->z_montant_conteneur_20;
		//	$custemail = $this->db->select('*')->from('customers')->where('c_id',$data['t_customer_id'])->get()->row()->c_email
}
else
{
    //$montant_conteneur=z_montant_conteneur_40;
//	$_montant_conteneur_40 = $zone['z_montant_conteneur_40'];
         $montant_conteneur = $this->db->select('*')->from('zone')->where('co_type_conteneur',''.$co_type_conteneur.'')->get()->row()->z_montant_conteneur_40;
   
}
//        $montant20= $zone[''];
// informations sur la zone        
        
//co_type_conteneur']=='20_pieds'    
      //  $addconteneur=array('co_montant'=>$montant_conteneur);
        unset($addfactureconteneur['co_id']);
	   // $response =  $this->db->insert('trip_conteneur',$addconteneur);

        
$editfacture = array('t_id'=>$facture_id,'t_validation' => $validation,'t_trip_amount'=>$this->input->post('t_trip_amount'),'t_montant_tva'=>$this->input->post('t_montant_tva'),'t_montant_ags'=>$this->input->post('t_montant_ags'));        
        
$this->db->where('t_id', $facture_id);
$response = $this->db->update('trips', $editfacture); 
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Numéro conteneur ajouté avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('facture/details/'.$facture_id);
	}    
/* Fin conteneur */    
    
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
        $validation='valide';
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        't_validation' => $validation
);

$this->db->where('t_id', $id);
$response = $this->db->update('trips', $data);        
        
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture validée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non validée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('facture');
	}    
   
    
    /*Fin validation*/
 
    /*Debut Annulation*/

	public function facture_annulation()
	{
		$id = $this->uri->segment(3);
        $annulation='annule';
//		$response = $this->db->delete('zone', array('z_id' =>$id));
        
$data = array(
        't_annulation' => $annulation
);

$this->db->where('t_id', $id);
$response = $this->db->update('trips', $data);        
        
        
		if($response) {
			$this->session->set_flashdata('successmessage', 'Facture annulée avec succés..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! Facture non annulée');
		}
//		redirect('facture/details/'.$this->uri->segment(4));
		redirect('facture');
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
    
}
