<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piece_rechange_pneu_model extends CI_Model{
	
	public function add_piece_rechange_pneu($data) { 
		return  $this->db->insert('fuel_carte_carburant_recharge_payments',$data);
		
$dataCompteur_bon_carburant = array(
   'cpt_id' => '' ,
   'cpt_numero' => '1' 
);

return $this->db->insert('piece_rechange_pneu_compteur', $dataCompteur_bon_carburant);		
		
	} 
	
     public function get_numero_pneu() { 
			return $this->db->count_all_results('piece_rechange_pneu_compteur');
}	
	
	public function getall_piece_rechange_pneu_reports($from,$to,$vehicle){ 
		//fuel_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($vehicle=='all') {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to);
		} else {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to,'pr_vehicule_id'=>$vehicle);
		}
		$fuel = $this->db->select('*')->from('piece_rechange_pneu')->where($where)->order_by('pr_id','desc')->get()->result_array();
		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name,v_quantite_restant')->from('vehicles')->where('v_id',$fuels['pr_vehicule_id'])->get()->row();
				/*$newfuel[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$fuels['pr_compagnie_id'])->get()->row();*/
			}
			return $newfuel;
		} else {
			return false;
		}
	}	
	
	
    public function getall_piece_rechange_pneu() { 
		
/*
		$requete="";
		$requete="pr_vehicule_id=v_id AND pr_compagnie_id=ccc_id";
		return $this->db->select('*')->from('piece_rechange_pneu,vehicles,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();*/		
		
		
		$piece_rechange_pneu = $this->db->select('*')->from('piece_rechange_pneu')->order_by('pr_id','desc')->get()->result_array();
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['vehicule'] =  $this->db->select('v_registration_no,v_name,v_quantite_restant')->from('vehicles')->where('v_id',$piece_rechange_pneus['pr_vehicule_id'])->get()->row();
				$newpiece_rechange_pneu[$key]['chauffeur'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['pr_driver_id'])->get()->row();
				/*$newpiece_rechange_pneu[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$piece_rechange_pneus['pr_compagnie_id'])->get()->row();*/				
			}
			return $newpiece_rechange_pneu;
		} else {
			return false;
		}
	} 
	
    public function getall_piece_rechange_pneu_paiement() { 
		
		$requete="";
		$requete="ccrp_compagnie_id=ccc_id";
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();		

	} 	

    public function getall_piece_rechange_pneu_paiement_non_valide() { 
		
/**/
		$requete="";
		//$statutType = "N";
		$requete="ccrp_compagnie_id=ccc_id AND ccrp_statut=0";
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($requete)->get()->result_array();		

	} 	
	
    public function getall_piece_rechange_pneu_non_valide() { 
		
/**/
		$requete="";
		$statutType = 0;
		$requete="pr_vehicule_id=v_id AND pr_type=0";
		return $this->db->select('*')->from('piece_rechange_pneu,vehicles')->where($requete)->get()->result_array();		
		
/*		$piece_rechange_pneu = $this->db->select('*')->from('piece_rechange_pneu')->where($where)->order_by('v_piece_rechange_pneu_id','desc')->get()->result_array();
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$piece_rechange_pneus['v_id'])->get()->row();
				$newpiece_rechange_pneu[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['v_piece_rechange_pneuaddedby'])->get()->row();
			}
			return $newpiece_rechange_pneu;
		} else {
			return false;
		}*/		

	}	

/*BEGIN PAIEMENT BC*/	
  
	public function getpaiement_piece_rechange_pneu() { 
	
		
	 return $this->db->select('*')->from('piece_rechange_pneu')->order_by('pr_id','desc')->get()->result_array();

	} 	
/*END PAIEMENT BC*/		
	
	public function getallpaiement_piece_rechange_pneu() { 
		
		
		$where = "";
		$where= "ccc_id=ccrp_bon_carburant_id ";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,fuel_carte_carburant_compagnie')->where($where)->order_by('ccrp_bon_carburant_id','desc')->group_by('ccrp_bon_carburant_id')->get()->result_array();		
		
/*		$where = "";
		$where= "cc_id=ccrp_carte_carburant_id ";//exit;

		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments,incomeexpense,fuel_carte_carburant')->where($where)->order_by('ccrp_incomeexpense_id','desc')->group_by('ccrp_incomeexpense_id')->get()->result_array();*/

	}
	
	/*END PREGATE INSTANCE LIST*/	
	
	public function piece_rechange_pneu_quantitevehicule($f_id) { 
		return $this->db->select('*')->from('piece_rechange_pneu')->where('pr_id',$f_id)->get()->result_array();
	}
	
	
	public function editpiece_rechange_pneu($f_id) { 
		return $this->db->select('*')->from('piece_rechange_pneu')->where('pr_id',$f_id)->get()->result_array();
	}

	public function piece_rechange_pneu_paiement_pdf($paiement) { 
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments')->where('ccrp_id',$paiement)->get()->result_array();
	}
	
	public function piece_rechange_pneu_paiement__pdf($paiement) { 
		return $this->db->select('*')->from('fuel_carte_carburant_recharge_payments')->where('ccrp_id',$paiement)->get()->result_array();
	}	
	
	public function updatepiece_rechange_pneu() { 
		$this->db->where('pr_id',$this->input->post('pr_id'));
		return $this->db->update('piece_rechange_pneu',$this->input->post());
	}

	public function piece_rechange_pneu_reports($from,$to,$pr_vehicule_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to);
		} else {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to,'pr_vehicule_id'=>$pr_vehicule_id);
		}
		$piece_rechange_pneu = $this->db->select('*')->from('piece_rechange_pneu')->where($where)->order_by('v_piece_rechange_pneu_id','desc')->get()->result_array();
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$piece_rechange_pneus['v_id'])->get()->row();
				$newpiece_rechange_pneu[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['v_piece_rechange_pneuaddedby'])->get()->row();
			}
			return $newpiece_rechange_pneu;
		} else {
			return false;
		}
	} 

/*DEBUT BON CARBURANT JOURNAL LISTE*/
	public function getall_piece_rechange_pneu_journal_list() { 
		$newincomexpense = array();
		
			/*$where = array('pr_vehicule_id'=>$pr_vehicule_id);

		$piece_rechange_pneu = $this->db->select('*')->from('fuel_journal_carburant')->where($where)->order_by('fjc_id','desc')->get()->result_array();*/

		$piece_rechange_pneu = $this->db->select('*')->from('fuel_journal_carburant')->order_by('fjc_id','desc')->get()->result_array();
		
		
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['bon_carburant'] =  $this->db->select('pr_numero,pr_quantite,pr_montant,pr_type')->from('piece_rechange_pneu')->where('pr_id',$piece_rechange_pneus['fjc_pr_id'])->get()->row();
				
				/*$newpiece_rechange_pneu[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$piece_rechange_pneus['v_id'])->get()->row();*/
				
				
				/*$newpiece_rechange_pneu[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['v_piece_rechange_pneuaddedby'])->get()->row();*/
			}
			return $newpiece_rechange_pneu;
		} else {
			return false;
		}
	} 

	
	public function getall_piece_rechange_pneu_journal_list_reports($from,$to,$vehicle){ 
		//fuel_reports($from,$to,$v_id) { 
		$newincomexpense = array();
		if($vehicle=='all') {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to);
		} else {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to,'pr_vehicule_id'=>$vehicle);
		}
		$fuel = $this->db->select('*')->from('fuel_journal_carburant')->where($where)->order_by('pr_id','desc')->get()->result_array();
		if(!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name,v_quantite_restant')->from('vehicles')->where('v_id',$fuels['pr_vehicule_id'])->get()->row();
				/*$newfuel[$key]['compagnie'] =  $this->db->select('ccc_name')->from('fuel_carte_carburant_compagnie')->where('ccc_id',$fuels['pr_compagnie_id'])->get()->row();*/
			}
			return $newfuel;
		} else {
			return false;
		}
	}	
	
/*FIN BON CARBURANT */		
	
/*DEBUT BON CARBURANT JOURNAL*/
	public function piece_rechange_pneu_journal($from,$to,$pr_vehicule_id) { 
		$newincomexpense = array();
		if($v_id=='all') {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to);
		} else {
			$where = array('pr_date >='=>$from,'pr_date<='=>$to,'pr_vehicule_id'=>$pr_vehicule_id);
		}
		$piece_rechange_pneu = $this->db->select('*')->from('piece_rechange_pneu')->where($where)->order_by('v_piece_rechange_pneu_id','desc')->get()->result_array();
		if(!empty($piece_rechange_pneu)) {
			foreach ($piece_rechange_pneu as $key => $piece_rechange_pneus) {
				$newpiece_rechange_pneu[$key] = $piece_rechange_pneus;
				$newpiece_rechange_pneu[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$piece_rechange_pneus['v_id'])->get()->row();
				$newpiece_rechange_pneu[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id',$piece_rechange_pneus['v_piece_rechange_pneuaddedby'])->get()->row();
			}
			return $newpiece_rechange_pneu;
		} else {
			return false;
		}
	} 

/*FIN BON CARBURANT */	
	
	
/* debut carte péage*/
	
	public function get_carte_peage() { 
		return $this->db->select('*')->from('carte_peage')->get()->result_array();
	}
	public function carte_peage_delete($gr_id) { 
		$groupinfo = $this->db->select('*')->from('vehicles')->where('v_group',$gr_id)->get()->result_array();
		if(count($groupinfo)>0) {
			return false;
		} else {
			$this->db->where('gr_id', $gr_id);
    		$this->db->delete('carte_peage');
    		return true;
		}
	} 	
/* debut carte péage*/	
	
	
    public function get_restant_fuel_carte_carburant() { 
		//return $this->db->select('*')->from('fuel_carte_carburant')->order_by('cc_id','desc')->get()->result_array();
		
		$requete="";
		$requete="ccc_id=cc_compagnie_id";
		return $this->db->select('*')->from('fuel_carte_carburant,fuel_carte_carburant_compagnie')->where($requete)->order_by('cc_id','desc')->get()->result_array();		
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
	
/*BEGIN DEMANDE PAIEMENT*/
 function fetch_station_service()
 { 
/*$where="";
	 $where=" pr_trip_id NOT IN (SELECT mi_trip_id FROM trip_mission )";	//exit; 

 

	 $this->db->where($where);	*/ 

  $this->db->order_by("ccc_name", "ASC");
  $query = $this->db->get("fuel_carte_carburant_compagnie");
  return $query->result();	 
 
	 
 
}
	
 function fetch_numero_bon_commande($mi_trip_id)
 { 
  $this->db->where('pr_compagnie_id', $mi_trip_id);
  $this->db->order_by('pr_id', 'ASC');
  $query = $this->db->get('piece_rechange_pneu');
  $output = '<option value="">Selectionnez le conteneur ok</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->pr_id.'">'.$row->pr_numero.'</option>';
  }
  return $output;
 }
	
 function fetch_conteneur($mi_trip_id)
 { 
/*$where="pr_id NOT IN (SELECT ccrp_bon_carburant_id FROM fuel_carte_carburant_recharge_payments )";
return $this->db->select('*')->from('trips')->where($where)->get()->result_array();	*/ 
	 
	 
  $this->db->where('pr_compagnie_id', $mi_trip_id);
  $this->db->where('pr_id NOT IN (SELECT ccrp_bon_carburant_id FROM fuel_carte_carburant_recharge_payments)');	 
  $this->db->order_by('pr_id', 'ASC');
  $query = $this->db->get('piece_rechange_pneu');	 
  $output = '<option value="">Selectionnez le conteneur</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->pr_id.'">'.$row->pr_numero.'</option>';
  }
  return $output;
 }	
	
/*END DEMANDE PAIEMENT*/	
	
/*	public function journal($from,$to,$v_id) { 
		$newtripdata = array();
		if($v_id=='all') {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to);
		} else {
			$where = array('t_start_date>='=>$from,'t_start_date<='=>$to,'t_vechicle'=>$v_id);
		}*/	
	
} 