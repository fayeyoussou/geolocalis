<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Piece_rechange_categorie extends CI_Controller {
	function __construct()
    {
          parent::__construct();
          $this->load->database();
          $this->load->model('piece_rechange_categorie_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
    }
	public function index()
	{
		$data['piece_rechange_categorie'] = $this->piece_rechange_categorie_model->get_piece_rechange_categorie();
//		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('piece_rechange_categorie',$data);
	}
	

	
	public function piece_rechange_categorie_delete()
	{
		$c_id = $this->uri->segment(3);
		$returndata = $this->piece_rechange_categorie_model->piece_rechange_categorie_delete($c_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Group deleted successfully..');
			redirect('piece_rechange_categorie');
		} else {
			$this->session->set_flashdata('warningmessage', 'Erreur..! ');
		    redirect('piece_rechange_categorie');
		}
	}
	public function addpiece_rechange_categorie()
	{
		$response = $this->db->insert('piece_rechange_categorie',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Catégorie ajoutée avec succés..');
		    redirect('piece_rechange_categorie');
		} else
		{
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		    redirect('piece_rechange_categorie');
		}
	}
}
