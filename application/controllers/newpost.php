<?php
//http://localhost/index.php/newpost
class newpost extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
        }
        
	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
//                $this->load->library(array('form_validation','encrypt','session'));
                //My Validation Rules here:
//                $this->form_validation->set_rules
                
		if (!$this->input->post())
		{
                        $data['cats']=$this->mymodel->get_categories();
			$this->load->view('newpost',$data);
		}
		else
		{
                    //$title = $this->input->post('title' , TRUE);
//                    echo $title;
                        $this->mymodel->newpost($this->input->post('title'),$this->input->post('cat',TRUE),$this->input->post('cat2',TRUE),$this->input->post('body',TRUE),$this->input->post('summ',TRUE));
//                        $this->mymodel->newpost($data['title'],$data['cat'],$data['cat2'],$data['body'],$data['summ']);
			$this->load->view('posted');
		}
	}
}
?>