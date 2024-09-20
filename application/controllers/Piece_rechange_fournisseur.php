<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piece_rechange_fournisseur extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
           $this->load->model('piece_rechange_fournisseur_model');
         //$this->load->model('piece_rechange_fournisseur_type_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['piece_rechange_fournisseurlist'] = $this->piece_rechange_fournisseur_model->getall_piece_rechange_fournisseur();
  	//	$data['piece_rechange_fournisseur_typelist'] = $this->piece_rechange_fournisseur_model->getall_piece_rechange_fournisseur_typelist();
      
		$this->template->template_render('piece_rechange_fournisseur_management',$data);
	}
	public function addpiece_rechange_fournisseur()
	{
        
		//$data['piece_rechange_fournisseur_typelist'] = $this->piece_rechange_fournisseur_model->getall_piece_rechange_fournisseur_typelist();
		$data['numeropiece_rechange_fournisseur'] = $this->piece_rechange_fournisseur_model->get_numeropiece_rechange_fournisseur();
    
		$this->template->template_render('piece_rechange_fournisseur_add',$data);
	}
	public function insertpiece_rechange_fournisseur()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('piece_rechange_fournisseurs')->where('f_name',$this->input->post('f_name'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->piece_rechange_fournisseur_model->add_piece_rechange_fournisseur($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New piece_rechange_fournisseur added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Un client du même nom existe déjà.');//modifier
			}
			redirect('piece_rechange_fournisseur');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_fournisseur');
		}
	}
	public function editpiece_rechange_fournisseur()
	{
		$f_id = $this->uri->segment(3);
		$data['piece_rechange_fournisseurdetails'] = $this->piece_rechange_fournisseur_model->get_piece_rechange_fournisseurdetails($f_id);
		//$data['piece_rechange_fournisseur_typelist'] = $this->piece_rechange_fournisseur_model->getall_piece_rechange_fournisseur_typelist();
        $this->template->template_render('piece_rechange_fournisseur_add',$data);
	}

	public function updatepiece_rechange_fournisseur()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->piece_rechange_fournisseur_model->update_piece_rechange_fournisseur($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'piece_rechange_fournisseur updated successfully..');
				    redirect('piece_rechange_fournisseur');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('piece_rechange_fournisseur');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('piece_rechange_fournisseur');
		}
	}
}
