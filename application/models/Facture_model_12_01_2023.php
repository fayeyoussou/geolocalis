<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class facture_model extends CI_Model{

    
    public function add_facture($data) {   
		//$this->db->insert('trip_compteur');
        
        

        unset($data['bookingemail']);
		$insertdata = $data;

        $insertdata['t_trackingcode'] = uniqid();
	//	$this->db->insert('facture',$insertdata);
		$this->db->insert('trips',$insertdata);
        
// debut ajout compteur                
/*         $ags=1;   
		$this->db->insert('trip_compteur',$ags); exit();                 
*/ 
$dataCompteur_facture = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('trip_compteur_facture', $dataCompteur_facture);        
/*		$addtrip_compteur = $this->input->post();
		$cpt_numero = $addtrip_compteur['cpt_numero'];
		unset($addtrip_compteur['cpt_id']);
		$response =  $this->db->insert('trip_compteur',$addtrip_compteur);*/               
 
$dataCompteur_proforma = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('trip_compteur_proforma', $dataCompteur_proforma);         
// fin ajout compteur          
        
		//echo $this->db->last_query();
		return $this->db->insert_id();
	} 
    
/**/     public function get_numerofacture() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('trip_compteur_facture');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}
    
    
/**/     public function get_numeroproforma() { //$this->db->count_all_results('Employees');
		return $this->db->count_all_results('trip_compteur_proforma');
//		return $this->db->select('*')->from('trip_compteur')->get()->result_array();
	}    
    
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_name','asc')->get()->result_array();
	} 
	public function getall_vechicle() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	} 
    
				//$newconteneur[$key]['ags'] =  $this->db->select('*')->from('ags')->get()->row();                   
 	public function getags() { 
		return $this->db->select('*')->from('ags')->get()->result_array();
	}   
    
	public function getall_vehicle_remorque() { 
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	}     
    
	public function getall_mybookings($c_id) { 
		return $this->db->select('*')->from('trips')->where('t_customer_id',$c_id)->order_by('t_id','asc')->get()->result_array();
	}
	public function getall_driverlist() { 
		return $this->db->select('*')->from('drivers')->get()->result_array();
	}
    
 /* debut zone*/   
/**/ 	public function getall_zonelist() { 
		return $this->db->select('*')->from('zone')->get()->result_array();
	}   
 /* Fin zone*/  
    
 /* debut vechicles*/   
/**/ 	public function getall_vehiclelist() { 
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	}   
 /* Fin vechicles*/     

  /* debut Carte carburant*/   
	public function getall_carte_carburantlist() { 
		return $this->db->select('*')->from('fuel_carte_carburant')->get()->result_array();
	}    
 /* Fin Carte carburant*/
    
    /* debut carte péage*/   
	public function getall_carte_peagelist() { 
		return $this->db->select('*')->from('fuel_carte_peage')->get()->result_array();
	}    
 /* Fin carte péage*/
    
  /* debut transitaire*/   
	public function getall_transitairelist() { 
		return $this->db->select('*')->from('transitaire')->get()->result_array();
	}    
 /* Fin transitaire*/    
  
    /* debut transitaire*/   
	public function getall_naturelist() { 
		return $this->db->select('*')->from('trip_nature')->get()->result_array();
	}    
 /* Fin transitaire*/ 
    
    
  /* debut trip_type_reglement*/   
	public function getall_type_reglementlist() { 
		return $this->db->select('*')->from('trip_type_reglement')->get()->result_array();
	}    
 /* Fin trip_type_reglement*/ 
    
 /* debut trip_reglement*/   
	public function getall_reglementlist() { 
		return $this->db->select('*')->from('trip_reglement')->get()->result_array();
	}    
 /* Fin trip_reglement*/     
 
    
 /* debut compagnie*/   
	public function getall_compagnielist() { 
		return $this->db->select('*')->from('compagnie')->get()->result_array();
	}    
 /* Fin trip_reglement*/      
    
	public function getall_facture_expense($t_id) { 
		return $this->db->select('*')->from('facture_expense')->where('e_facture_id',$t_id)->get()->result_array();
	} 
	
/*	public function getall_facture_validee() { 
		$t_validation='valide';
		return $this->db->select('*')->from('trip')->where('t_validation',$t_validation)->get()->result_array();
	}*/ 	
    
	public function getall_countfacture() { 
		return $this->db->select('*')->from('trip_compteur_facture')->get()->result_array();
	}   
  
	public function getall_countproforma() { 
		return $this->db->select('*')->from('trip_compteur_proforma')->get()->result_array();
	}     
    
 	public function get_paymentdetails($t_id) { 
	//	return $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();

		return $this->db->select('*')->from('trip_payments')->where('tp_trip_id',$t_id)->get()->result_array();
	
	}
    
/*public function ceilFive($number) {
    $div = floor($number / 5);
    $mod = $number % 5;

    If ($mod > 0) $add = 5;
    Else $add = 0;

    return $div * 5 + $add;
} */    
/*	public function get_facturedetails($t_id) { 
		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
	}*/
/* debut conteneur*/    
//  	public function get_conteneurdetails($t_id) { 

/*	public function get_conteneurdetails($co_id) { 
		return $this->db->select('*')->from('trip_conteneur')->where('co_id',$co_id)->get()->result_array();exit;
	}*/    
    
    	public function get_conteneurdetails($t_id) { 
		$conteneur =  $this->db->select('*')->from('trip_conteneur')->where('co_trip_id',$t_id)->get()->result_array();
 		if(!empty($conteneur)) {
			foreach ($conteneur as $key => $conteneurs) {
				$newconteneur[$key] = $conteneurs;                
				$newconteneur[$key]['nature_name'] =  $this->db->select('*')->from('trip_nature')->where('na_id',$conteneurs['co_nature'])->get()->row();
                
				$newconteneur[$key]['facture_name'] =  $this->db->select('*')->from('trips')->where('t_id',$conteneurs['co_trip_id'])->get()->row();                
                
				$newconteneur[$key]['zone_name'] =  $this->db->select('*')->from('zone')->where('z_id',$conteneurs['co_zone'])->get()->row();                

				$newconteneur[$key]['v_name'] =  $this->db->select('*')->from('vehicles')->where('v_id',$conteneurs['co_zone'])->get()->row();                
 
				$newconteneur[$key]['cc_name'] =  $this->db->select('*')->from('compagnie')->where('cc_id',$conteneurs['co_zone'])->get()->row();                  
                

			}
			return $newconteneur;
		} else 
		{
			return false;
		}       
	}  
    
/* fin conteneur*/    
	
	public function getall_facture($trackingcode=false) { 
		$newfacturedata = array();
		if($trackingcode) {
			$facturedata = $this->db->select('*')->from('trips')->where('t_trackingcode',$trackingcode)->order_by('t_id','desc')->get()->result_array();
		} else {
			$facturedata = $this->db->select('*')->from('trips')->order_by('t_id','desc')->get()->result_array();
		}
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();

/*debut ajout*/
				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
            }
			return $newfacturedata;
		} else 
		{
			return false;
		}
	}
    
/*BEGIN PENDING INVOICE*/	

	/*BEGIN INSTANCE REPORTS*/
	public function getall_facture_instance_reports($from,$to) { 
		$newfacturedata = array();$where = "";
		/*if($trackingcode) {*/
			//$facturedata = $this->db->select('*')->from('trips')->where('t_trackingcode',$trackingcode)->order_by('t_id','desc')->get()->result_array();
					
		//$where= "t_transitaire=tra_id AND cc_id=t_compagnie ";//exit;
		//t_transitaire=tra_id AND cc_id=t_compagnie 
		$where = "t_date_facture BETWEEN '$from' AND '$to' AND t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )";//exit;
		
		$pregate = "";

		  $facturedata = $this->db->select('*')->from('trip_pregate,trips')->where($where)->order_by('t_id','desc')->group_by('t_id')->get()->result_array();	
/*		} else {
			//$facturedata = $this->db->select('*')->from('trips')->order_by('t_id','desc')->get()->result_array();
		$where = "t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )";//exit;
			$facturedata = $this->db->select('*')->from('trip_pregate,trips')->where($where)->order_by('t_id','desc')->group_by('t_id')->get()->result_array();	
		}*/
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();

/*debut ajout*/
				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
            }
			return $newfacturedata;
		} else 
		{
			return false;
		}
	}		
	/*END INSTANCE REPORTS*/
	
	
	public function getall_facture_instance($trackingcode=false) { 
		$newfacturedata = array();$where = "";
		if($trackingcode) {
			//$facturedata = $this->db->select('*')->from('trips')->where('t_trackingcode',$trackingcode)->order_by('t_id','desc')->get()->result_array();
					
		//$where= "t_transitaire=tra_id AND cc_id=t_compagnie ";//exit;
		//t_transitaire=tra_id AND cc_id=t_compagnie 
		$where = "t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )";//exit;
		
		$pregate = "";

		  $facturedata = $this->db->select('*')->from('trip_pregate,trips')->where($where)->order_by('t_id','desc')->group_by('t_id')->get()->result_array();	
		} else {
			//$facturedata = $this->db->select('*')->from('trips')->order_by('t_id','desc')->get()->result_array();
		$where = "t_id NOT IN ( SELECT pr_trip_id FROM trip_pregate )";//exit;
			$facturedata = $this->db->select('*')->from('trip_pregate,trips')->where($where)->order_by('t_id','desc')->group_by('t_id')->get()->result_array();	
		}
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();

/*debut ajout*/
				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
            }
			return $newfacturedata;
		} else 
		{
			return false;
		}
	}	
/*END PENDING INVOICE*/	
	
	public function getall_facture_pregate() { 
		$newfacturedata = array();

        $t_statut_pregate="oui";
            
			$facturedata = $this->db->select('*')->from('trips')->where('t_statut_pregate',$t_statut_pregate)->order_by('t_id','desc')->get()->result_array();

		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();


				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
            }
			return $newfacturedata;
		} else 
		{
			return false;
		}
	}    
 
    
    
	public function getall_facture_pregate_add() { 
		$newfacturedata = array();

        //t_validation
        $t_statut_pregate="non";
            
			$facturedata = $this->db->select('*')->from('trips')->where('t_statut_pregate',$t_statut_pregate)->order_by('t_id','desc')->get()->result_array();

		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();
				$newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();


				$newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                
                $newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_transitaire_details'] =   $this->db->select('*')->from('transitaire')->where('tra_id',$facturedataval['t_transitaire'])->get()->row();
 
				$newfacturedata[$key]['t_type_reglement_details'] =   $this->db->select('*')->from('trip_type_reglement')->where('tr_id',$facturedataval['t_type_reglement'])->get()->row();                
                
				$newfacturedata[$key]['t_reglement_details'] =   $this->db->select('*')->from('trip_reglement')->where('tg_id',$facturedataval['t_reglement'])->get()->row();                  
  
				$newfacturedata[$key]['t_compagnie_details'] =   $this->db->select('*')->from('compagnie')->where('cc_id',$facturedataval['t_compagnie'])->get()->row();                 
                
				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
/* Fin ajout*/                
            
            
            }
			return $newfacturedata;
		} else 
		{
			return false;
		}
	}    
    
    
    
	public function getaddress($lat,$lng)
	{
	 $google_api_key = $this->config->item('google_api_key'); 
	 $url = 'https://maps.googleapis.com/maps/api/geocode/json?key='.$google_api_key.'&latlng='.trim($lat).','.trim($lng).'&sensor=false';
	$json = @file_get_contents($url);
	$data = json_decode($json);
        if (!empty($data)) {
            $status = $data->status;
            if ($status == "OK") {
                return $data->results[1]->formatted_address;
            } else {
                return false;
            }
        } else {
            return '';
        }
    }
	public function get_facturedetails($t_id) { 
		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
	}
    
 /* debut zone*/   
	public function get_zoneselect() { //affiche la liste
		return $this->db->select('*')->from('zone')->get()->result_array();
	} 
    
	public function get_articleselect() { //affiche la liste
		return $this->db->select('*')->from('trip_article')->get()->result_array();
	}     
    
	public function get_vehicleselect() { //affiche la liste
		return $this->db->select('*')->from('vehicles')->get()->result_array();
	}     
 
 	public function get_vehicle_remorqueselect() { //affiche la liste
		return $this->db->select('*')->from('vehicle_remorque')->get()->result_array();
	}     
    
 	public function get_type_tache_manutentionselect() { //affiche la liste
		return $this->db->select('*')->from('trip_type_tache_manutention')->get()->result_array();
	}     
 /* debut zone*/   
	public function get_natureselect() { //affiche la liste
		return $this->db->select('*')->from('trip_nature')->get()->result_array();
	}     
    
	public function get_zonedetails($t_id) { 
		return $this->db->select('*')->from('zone')->where('co_trip_id',$t_id)->get()->result_array();
	}      
 /* Fin zone*/    
    
	public function get_facturemanagement($t_id) { 
		return $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
	}    
    
	public function update_facture($data) { 
		$this->db->where('t_id',$this->input->post('t_id'));
		$this->db->update('trips',$data);
		return $this->input->post('t_id');
	}
	public function facture_reports($from,$to,$v_id) { 
		$newfacturedata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}
		
		$facturedata = $this->db->select('*')->from('trips')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($facturedata)) {
			foreach ($facturedata as $key => $facturedataval) {
				$newfacturedata[$key] = $facturedataval;
				$newfacturedata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$facturedataval['t_customer_id'])->get()->row();
				$newfacturedata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$facturedataval['t_vechicle'])->get()->row();

                $newfacturedata[$key]['t_vehicle_remorque_details'] =  $this->db->select('*')->from('vehicle_remorque')->where('vr_id',$facturedataval['t_vehicle_remorque'])->get()->row();

                $newfacturedata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$facturedataval['t_driver'])->get()->row();
/* Debut ajout*/
				$newfacturedata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$facturedataval['t_zone'])->get()->row();

				$newfacturedata[$key]['t_destinataire_details'] =   $this->db->select('*')->from('destinataire')->where('d_id',$facturedataval['t_destinataire'])->get()->row();

				$newfacturedata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$facturedataval['t_carte_carburant'])->get()->row();

				$newfacturedata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$facturedataval['t_carte_peage'])->get()->row();
                
                
                
                
/* Fin ajout*/
                
            }
			return $newfacturedata;
		} else 
		{
			return array();
		}
	}
    
/* DEBUT SUPP*/
    
/*	public function facture_delete($t_id) { 
		$groupinfo = $this->db->select('*')->from('trips')->where('t_id',$t_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('t_id', $t_id);
    		$this->db->delete('trips');
    		return true;
		}
	}*/    
/* FIN SUPP*/
 
/* DEBUT */
//function NumberToLetter( $nombre, $U, $D ){
function nombre_en_lettre1( $nombre, $U, $D ){

    $toLetter = [
        0 => "zéro",
        1 => "un",
        2 => "deux",
        3 => "trois",
        4 => "quatre",
        5 => "cinq",
        6 => "six",
        7 => "sept",
        8 => "huit",
        9 => "neuf",
        10 => "dix",
        11 => "onze",
        12 => "douze",
        13 => "treize",
        14 => "quatorze",
        15 => "quinze",
        16 => "seize",
        17 => "dix-sept",
        18 => "dix-huit",
        19 => "dix-neuf",
        20 => "vingt",
        30 => "trente",
        40 => "quarante",
        50 => "cinquante",
        60 => "soixante",
        70 => "soixante-dix",
        80 => "quatre-vingt",
        90 => "quatre-vingt-dix",
    ];
    
    global $toLetter;
    $numberToLetter='';
    $nombre = strtr((string)$nombre, [" "=>""]);
    $nb = floatval($nombre);

    if( strlen($nombre) > 15 ) return "dépassement de capacité";
    if( !is_numeric($nombre) ) return "Nombre non valide";
	if( ceil($nb) != $nb ){
        $nb = explode('.',$nombre);
        return NumberToLetter($nb[0]) . ($U ? " $U et " : " virgule ") . NumberToLetter($nb[1]) . ($D ? " $D" : "");
    }

	$n = strlen($nombre);
	switch( $n ){
        case 1:
            $numberToLetter = $toLetter[$nb];
            break;
        case 2:
            if(  $nb > 19  ){
                $quotient = floor($nb / 10);
                $reste = $nb % 10;
                if(  $nb < 71 || ($nb > 79 && $nb < 91)  ){
                    if(  $reste == 0  ) $numberToLetter = $toLetter[$quotient * 10];
                    if(  $reste == 1  ) $numberToLetter = $toLetter[$quotient * 10] . "-et-" . $toLetter[$reste];
                    if(  $reste > 1   ) $numberToLetter = $toLetter[$quotient * 10] . "-" . $toLetter[$reste];
                }else $numberToLetter = $toLetter[($quotient - 1) * 10] . "-" . $toLetter[10 + $reste];
            }else $numberToLetter = $toLetter[$nb];
            break;

        case 3:
            $quotient = floor($nb / 100);
            $reste = $nb % 100;
            if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "cent";
            if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "cent" . " " . NumberToLetter($reste);
            if(  $quotient > 1 && $reste == 0    ) $numberToLetter = $toLetter[$quotient] . " cents";
            if(  $quotient > 1 && $reste != 0    ) $numberToLetter = $toLetter[$quotient] . " cent " . NumberToLetter($reste);
            break;
        case 4 :
        case 5 :
        case 6 :
            $quotient = floor($nb / 1000);
            $reste = $nb - $quotient * 1000;
            if(  $quotient == 1 && $reste == 0   ) $numberToLetter = "mille";
            if(  $quotient == 1 && $reste != 0   ) $numberToLetter = "mille" . " " . NumberToLetter($reste);
            if(  $quotient > 1 && $reste == 0    ) $numberToLetter = NumberToLetter($quotient) . " mille";
            if(  $quotient > 1 && $reste != 0    ) $numberToLetter = NumberToLetter($quotient) . " mille " . NumberToLetter($reste);
            break;
        case 7:
        case 8:
        case 9:
            $quotient = floor($nb / 1000000);
            $reste = $nb % 1000000;
            if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un million";
            if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un million" . " " . NumberToLetter($reste);
            if(  $quotient > 1 && $reste == 0   ) $numberToLetter = NumberToLetter($quotient) . " millions";
            if(  $quotient > 1 && $reste != 0   ) $numberToLetter = NumberToLetter($quotient) . " millions " . NumberToLetter($reste);
            break;
        case 10:
        case 11:
        case 12:
            $quotient = floor($nb / 1000000000);
            $reste = $nb - $quotient * 1000000000;
            if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un milliard";
            if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un milliard" . " " . NumberToLetter($reste);
            if(  $quotient > 1 && $reste == 0   ) $numberToLetter = NumberToLetter($quotient) . " milliards";
            if(  $quotient > 1 && $reste != 0   ) $numberToLetter = NumberToLetter($quotient) . " milliards " . NumberToLetter($reste);
            break;
        case 13:
        case 14:
        case 15:
            $quotient = floor($nb / 1000000000000);
            $reste = $nb - $quotient * 1000000000000;
            if(  $quotient == 1 && $reste == 0  ) $numberToLetter = "un billion";
            if(  $quotient == 1 && $reste != 0  ) $numberToLetter = "un billion" . " " . NumberToLetter($reste);
            if(  $quotient > 1 && $reste == 0   ) $numberToLetter = NumberToLetter($quotient) . " billions";
            if(  $quotient > 1 && $reste != 0   ) $numberToLetter = NumberToLetter($quotient) . " billions " . NumberToLetter($reste);
            break;
    }
	/*respect de l'accord de quatre-vingt*/
    if( substr($numberToLetter, strlen($numberToLetter)-12, 12 ) == "quatre-vingt" ) $numberToLetter .= "s";

    return $numberToLetter;
}//-----------------------------------------------------------------------    
/* FIN*/    

        public function add_trip_compteur_facture($data) {   

$dataCompteur_facture = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

$this->db->insert('trip_compteur_facture', $dataCompteur_facture);        

 
		return $this->db->insert_id();
	} 

//		public function synthese($from,$to,$v_id) { 
	public function synthese($t_customer_id,$t_transitaire,$t_nom_navire,$t_reference,$t_taxe,$t_nombre_ags,$t_date_facture,$t_ristourne,$t_ristourne_amount,$t_type_reglement,$t_reglement,$t_compagnie,$from,$to){
		$newtripdata = array();
		
		$where .= array('t_customer_id>='=>$t_customer_id);
		
/*
https://www.php.net/manual/fr/function.array-merge.php

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);	*/	
		
		
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}
		
		$tripdata = $this->db->select('*')->from('trips')->where($where)->order_by('t_id','desc')->get()->result_array();
		if(!empty($tripdata)) {
			foreach ($tripdata as $key => $tripdataval) {
				$newtripdata[$key] = $tripdataval;
				$newtripdata[$key]['t_customer_details'] =  $this->db->select('*')->from('customers')->where('c_id',$tripdataval['t_customer_id'])->get()->row();
				$newtripdata[$key]['t_vechicle_details'] =  $this->db->select('*')->from('vehicles')->where('v_id',$tripdataval['t_vechicle'])->get()->row();
				$newtripdata[$key]['t_driver_details'] =   $this->db->select('*')->from('drivers')->where('d_id',$tripdataval['t_driver'])->get()->row();
/* Debut ajout*/
				$newtripdata[$key]['t_zone_details'] =   $this->db->select('*')->from('zone')->where('z_id',$tripdataval['t_zone'])->get()->row();

/*				$newtripdata[$key]['t_destinataire_details'] =   $this->db->select('*')->from('destinataire')->where('d_id',$tripdataval['t_destinataire'])->get()->row();*/

				$newtripdata[$key]['t_carte_carburant_details'] =   $this->db->select('*')->from('fuel_carte_carburant')->where('cc_id',$tripdataval['t_carte_carburant'])->get()->row();

				$newtripdata[$key]['t_carte_peage_details'] =   $this->db->select('*')->from('fuel_carte_peage')->where('cp_id',$tripdataval['t_carte_peage'])->get()->row();
                
                
/* Fin ajout*/
                
            }
			return $newtripdata;
		} else 
		{
			return array();
		}
	}

   
    
} 