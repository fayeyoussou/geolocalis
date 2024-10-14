<?Php defined('BASEPATH') OR exit('No direct script access allowed');
class PdfController extends CI_Controller {
publicfunction index(){
$data_user = array();
$data_user['users'] = $this->db->get('tbl_user')->result();
$this->load->view('user_list',$data_user);
$html = $this->output->get_output();
$this->load->library('pdf');
$this->dompdf->loadHtml($html);
$this->dompdf->setPaper('A4', 'landscape');
$this->dompdf->render();
$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
}
}
?> 