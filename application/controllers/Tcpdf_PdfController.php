<?Php //defined('BASEPATH') OR exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');

//abstract class Tcpdf_PdfController extends CI_Controller {
class Tcpdf_PdfController extends CI_Controller {    
        public function __construct()
    {
       parent::__construct();
            $this->load->library('tcpdf_Pdf_Library');
    }
    public function tcpdf_generer_pdf(){
        $this->load->view('tcpdf_generer_pdf');
        
    }
}
?> 