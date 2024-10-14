<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomeexpense_categorie_piece_rechange extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('incomeexpense_categorie_piece_rechange_model');
          $this->load->model('trips_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['fuel'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnielist();
		$data['incomeexpense_categorie_piece_rechangelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange();
		$this->template->template_render('incomeexpense_categorie_piece_rechange_add',$data);
	}
	public function addincomeexpense_categorie_piece_rechange()
	{
		
/*		if(isset($_POST['bookingreport'])) {
			$triplist = $this->trips_model->trip_reports($this->input->post('booking_from'),$this->input->post('booking_to'),$this->input->post('booking_vechicle'));
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
				$data['triplist'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['triplist'] = $triplist;
			}
		}else{
			
		}	*/	
		
		
		
		$data['fuel'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnielist();
		$data['incomeexpense_categorie_piece_rechangelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange();
		$data['carte_carburantcompagnielist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnielist();
		$this->template->template_render('incomeexpense_categorie_piece_rechange_add',$data);
	}
	public function insertincomeexpense_categorie_piece_rechange()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('incomeexpense_categorie_piece_rechange')->where('icpr_name',$this->input->post('icpr_name'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->incomeexpense_categorie_piece_rechange_model->add_incomeexpense_categorie_piece_rechange($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New incomeexpense_categorie_piece_rechange added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Le numéro existe déjà.');
			}
			redirect('incomeexpense_categorie_piece_rechange');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomeexpense_categorie_piece_rechange');
		}
	}
	public function editincomeexpense_categorie_piece_rechange()
	{
		$cc_id = $this->uri->segment(3);
		$data['incomeexpense_categorie_piece_rechangedetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_incomeexpense_categorie_piece_rechangedetails($cc_id);
				$data['fuel'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnielist();
		$data['incomeexpense_categorie_piece_rechangelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange();
		$data['carte_carburantcompagnielist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnielist();

		
				$data['incomeexpense_categorie_piece_rechangelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange();
		$this->template->template_render('incomeexpense_categorie_piece_rechange_add',$data);
	}

	public function updateincomeexpense_categorie_piece_rechange()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->incomeexpense_categorie_piece_rechange_model->update_incomeexpense_categorie_piece_rechange($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'incomeexpense_categorie_piece_rechange updated successfully..');
				    redirect('incomeexpense_categorie_piece_rechange/addincomeexpense_categorie_piece_rechange');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('incomeexpense_categorie_piece_rechange/addincomeexpense_categorie_piece_rechange');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomeexpense_categorie_piece_rechange');
		}
	}
	

	public function details()
		
	{
		$data = array();
		$cc_id = $this->uri->segment(3);
		$cartedetails = $this->incomeexpense_categorie_piece_rechange_model->get_cartedetails($cc_id);
        
/*		$data2['conteneur'] = $this->incomeexpense_categorie_piece_rechange_model->get_conteneurdetails();
		$this->template->template_render('conteneur',$data2);*/
        
		if(isset($cartedetails[0]['cc_id'])) {
			//$customerdetails = $this->customer_model->get_customerdetails($cartedetails[0]['t_customer_id']);
			//$driverdetails = $this->drivers_model->get_driverdetails($cartedetails[0]['t_driver']);
			$data['rechargedetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_rechargedetails($cartedetails[0]['cc_id']);
			
			$data['incomeexpense_categorie_piece_rechange_rechargelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_recharge($cartedetails[0]['cc_id']);
    		$data['carte_carburantcompagnie'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange_compagnie($cartedetails[0]['cc_id']);
			

/* debut */
			$data['boncarburantdetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_boncarburantdetails($cartedetails[0]['cc_id']);
            
/*Fin*/     
            
			
			$data['fuel_bon_carburant'] = $this->incomeexpense_categorie_piece_rechange_model->getall_fuel_bon_carburant($cartedetails[0]['cc_id']);
			
           // $data['vehicleselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_vehicleselect(); //affiche les infos de la liste
           // $data['vehicledetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_vehicleselect();
           // $vehicleselect = $this->incomeexpense_categorie_piece_rechange_model->get_vehicleselect($cartedetails[0]);

           // $data['compagniedetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_compagnieselect();
          //  $compagnieselect = $this->incomeexpense_categorie_piece_rechange_model->get_compagnieselect($cartedetails[0]);
            
            
           // $data['vehicle_remorqueselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_vehicle_remorqueselect(); //affiche les infos de la liste
            //$data['vehicledetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_vehicle_remorqueselect();
           // $vehicle_remorqueselect = $this->incomeexpense_categorie_piece_rechange_model->get_vehicle_remorqueselect($cartedetails[0]);
            
            
           // $data['zoneselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_zoneselect(); //affiche les infos de la liste
           /* $data['zonedetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_zoneselect();
            $zoneselect = $this->incomeexpense_categorie_piece_rechange_model->get_zoneselect($cartedetails[0]['t_id']);       
            
            $data['articleselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_articleselect(); //affiche les infos de la liste
            $data['articledetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_articleselect();
            $zoneselect = $this->incomeexpense_categorie_piece_rechange_model->get_articleselect($cartedetails[0]['t_id']);            
           
            
             $data['type_tache_manutentionselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_type_tache_manutentionselect(); //affiche les infos de la liste
            $data['type_tache_manutentiondetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_type_tache_manutentionselect();
            $type_tache_manutentionselect = $this->incomeexpense_categorie_piece_rechange_model->get_type_tache_manutentionselect($cartedetails[0]['t_id']);            
            
             $data['natureselect'] = $this->incomeexpense_categorie_piece_rechange_model->get_natureselect(); //affiche les infos de la liste
            $data['naturedetails'] = $this->incomeexpense_categorie_piece_rechange_model->get_natureselect();
            $natureselect = $this->incomeexpense_categorie_piece_rechange_model->get_natureselect($cartedetails[0]['t_id']);
            
            $data['cartedetails'] = $cartedetails[0];
			$data['customerdetails'] = (isset($customerdetails[0]['c_id']))?$customerdetails[0]:'';
			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';*/

//			$data['zonedetails'] = (isset($zonedetails[0]['z_id']))?$zonedetails[0]:'';
//			$data['driverdetails'] =  (isset($driverdetails[0]['d_id']))?$driverdetails[0]:'';
        
            $data['cartedetails'] = $cartedetails[0];
        
        
        }
		
		//		$data['carte_carburantlist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_incomeexpense_categorie_piece_rechange();
		$data['incomeexpenselist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_fuel_incomeexpense();
		$data['vechiclelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_vechicle();


		
		
		//$data['fuel'] = $this->incomeexpense_categorie_piece_rechange_recharge_model->getall_incomeexpense_categorie_piece_rechange_recharge_compagnielist();
		//$data['incomeexpense_categorie_piece_rechange_rechargelist'] = $this->incomeexpense_categorie_piece_rechange_recharge_model->getall_incomeexpense_categorie_piece_rechange_recharge();
		//$data['carte_carburantcompagnielist'] = $this->incomeexpense_categorie_piece_rechange_recharge_model->getall_incomeexpense_categorie_piece_rechange_recharge_compagnielist();
		
		$this->template->template_render('incomeexpense_categorie_piece_rechange_details',$data);
        
 //       $data['zonelist'] = $this->incomeexpense_categorie_piece_rechange_model->getall_zonelist();
        
    }	
	
	public function insertincomeexpense_categorie_piece_rechange_recharge()
	{
		$testxss = xssclean($_POST);
		if($testxss){
/*			$exist = $this->db->select('*')->from('incomeexpense_categorie_piece_rechange_recharge')->where('ccr_id',$this->input->post('ccr_id'))->get()->result_array();
			if(count($exist)==0) {*/
			
			
	//$response = $this->incomeexpense_categorie_piece_rechange_recharge_model->add_incomeexpense_categorie_piece_rechange_recharge($this->input->post());
		
		$reglement = $this->input->post();
		$ccr_incomeexpense_id = $reglement['ccr_incomeexpense_id'];	
			$ie_amount = $this->db->select('*')->from('incomeexpense')->where('ie_id', $ccr_incomeexpense_id)->get()->row()->ie_amount;

//Prix du litre du carburant	
			$montant_carburant = 0;
			$montant_carburant = $this->db->select('*')->from('settings')->get()->row()->s_fuelprice;	//exit;		
			
		$ccr_carte_id = $reglement['ccr_carte_id'];	
		$ccr_fuel_quantity = 0;	
		$ccr_fuel_quantity = $ie_amount/$montant_carburant;	
			
			$carburant_restant = 0;
/*echo "restant REQUETE=". */$carburant_restant = $this->db->select_sum('ccr_fuel_restant')->from('incomeexpense_categorie_piece_rechange_recharge')->where('ccr_carte_id', $ccr_carte_id)->get()->row()->ccr_fuel_restant;	
			
			//mettre à jour, la quantité restante
				$carte_carburant_restant =0;
				$carte_carburant_restant = $this->db->select_sum('cc_restant')->from('incomeexpense_categorie_piece_rechange')->where('cc_id', $ccr_carte_id)->get()->row()->cc_restant;
				//$carte_carburant_restant = $this->db->select_sum('cc_restant')->from('incomeexpense_categorie_piece_rechange')->where('cc_id', $ccr_carte_id)->get()->row()->cc_restant;					
			
				$quantite_totale_carburant_restant = $carte_carburant_restant + $ccr_fuel_quantity;
			

			$maj_carte_carburant_restant = array( 
   'cc_restant' => $quantite_totale_carburant_restant
);	 
	 
		$this->db->where('cc_id',$ccr_carte_id);
		        $this->db->update('incomeexpense_categorie_piece_rechange',$maj_carte_carburant_restant); 
		
			
			$total_carburant_restant = $carburant_restant + $ccr_fuel_quantity;
/*DEBUT AJOUT RECHARGE*/			
	$ajout = array('ccr_carte_id'=>$this->input->post('ccr_carte_id'),'ccr_number_ticket'=>$this->input->post('ccr_number_ticket'),'ccr_fueldate'=>$this->input->post('ccr_fueldate'),'ccr_desc'=>$this->input->post('ccr_desc'),'ccr_created_date'=>$this->input->post('ccr_created_date'),'ccr_incomeexpense_id'=>$this->input->post('ccr_incomeexpense_id'),'ccr_fuel_quantity'=>$ccr_fuel_quantity,'ccr_amount'=>$ie_amount,'ccr_fuelprice'=>$montant_carburant,'ccr_fuel_restant'=>$total_carburant_restant);
					$response = $this->db->insert('incomeexpense_categorie_piece_rechange_recharge',$ajout);				
/*FIN AJOUT RECHARGE*/			
			
			
			
				if($response) {
					$this->session->set_flashdata('successmessage', 'New incomeexpense_categorie_piece_rechange_recharge added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
/*			} else {
				$this->session->set_flashdata('warningmessage', 'Le numéro existe déjà.');
			}*/
			redirect('incomeexpense_categorie_piece_rechange/details/'.$ccr_carte_id);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomeexpense_categorie_piece_rechange/details/'.$ccr_carte_id);
		}
	}
	
/* END ADD CARTE CARBURANT*/	
	
	
/*BEGIN ADD BON CARBURANT*/	
	public function addfuel_bon_carburant()
	{
		$this->load->model('trips_model');
		
		if(isset($_POST['journal_bon_carburant'])) {
			$triplist = $this->fuel_bon_carburant->journal($this->input->post('from'),$this->input->post('to'),$this->input->post('vechicle'));
			if(empty($triplist)) {
				$this->session->set_flashdata('warningmessage', 'No bookings found..');
				$data['triplist'] = '';
			} else {
				unset($_SESSION['warningmessage']);
				$data['triplist'] = $triplist;
			}
		}else{
			$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();

		}		
		
		
		$data['carte_carburantlist'] = $this->incomeexpense_categorie_piece_rechange_recharge_model->getall_incomeexpense_categorie_piece_rechange();
		//$data['fuel_bon_carburant'] = $this->fuel_bon_carburant_model->getall_fuel_bon_carburant();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_bon_carburant_add',$data);
	}
	
	
	
	public function insertfuel_bon_carburant()
	{
		$testxss = xssclean($_POST);
		if($testxss){
		$bon_carburant = $this->input->post();
		/*echo "quantite=".*/ $bc_quantite = $bon_carburant['bc_quantite'];			
			$response = $this->fuel_bon_carburant_model->add_fuel_bon_carburant($this->input->post());

/* BEGIN */			
	           /*echo "id=". */ $id_bon_carburant = $this->db->insert_id(); //exit;

/*echo "bc_carte_id=".*/ $bc_carte_id = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_carte_id;
			
			
//echo "restant=". $bc_restant = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_restant;
$bc_restant = 0;
/*echo "restant REQUETE=". */$bc_restant = $this->db->select_sum('bc_restant')->from('fuel_bon_carburant')->where('bc_carte_id', $bc_carte_id)->get()->row()->bc_restant;
			
			
/*$this->db->select_sum('bc_restant');
$this->db->select('bc_restant');
$this->db->from('fuel_bon_carburant');
$this->db->where('bc_id', $id_bon_carburant);
$this->db->order_by('price desc');
$this->db->limit(3);
$this->db->get();	*/		
			
			
/*SELECT SUM(column_name)
FROM table_name
WHERE condition;*/			
		//bc_carte_id
$bc_qte_restant = '';
			

	//	$mi_bon_carburant_id = $mission['mi_bon_carburant_id'];			
			
/*echo "bc_restant=".$bc_restant;
echo "bc_quantite=".$bc_quantite;*/
			
$bc_qte_restant = $bc_restant+$bc_quantite;	//exit;		
			
$data_restant = array(
   
   'bc_restant' => $bc_qte_restant
);	 
	 
		$this->db->where('bc_id',$id_bon_carburant);
		        $this->db->update('fuel_bon_carburant',$data_restant); 			
			//exit;
/*$bc_restant = $this->db->select('*')->from('fuel_bon_carburant')->where('bc_id', $id_bon_carburant)->get()->row()->bc_restant;*/			

/* END AJOUT */			
			
	$addincome = array('bc_carte_id'=>$this->input->post('bc_carte_id'),'bc_numero'=>$this->input->post('bc_numero'),'bc_vehicule_id'=>$this->input->post('bc_vehicule_id'),'bc_quantite'=>$this->input->post('bc_quantite'),'bc_desc'=>$this->input->post('bc_desc'),'bc_created_date'=>$this->input->post('bc_created_date'));
					$this->db->insert('incomeexpense',$addincome);			
			
			
			if($response) {
/*				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel_bon_carburant - '.$this->input->post('v_fuel_bon_carburantcomments'),'ie_amount'=>$this->input->post('v_fuel_bon_carburantprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}*/
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomeexpense_categorie_piece_rechange/details/'.$bc_carte_id);
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomeexpense_categorie_piece_rechange/details/'.$bc_carte_id);
		}
	}	
/*END ADD BON CARBURANT*/	
	
}
