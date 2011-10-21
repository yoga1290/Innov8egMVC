<?php
class comments extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        }
        
	function index()
	{
            if (!$this->input->post())
            {
                $data['posts']=$this->mymodel->get_post();
                $this->load->view('viewposts',$data);
            }
            else
            {
                
                $articleid=$this->input->post('articleid');
                $comm=$this->input->post('comment');
                $this->mymodel->newcomment($articleid,$comm);
                
                $data['posts']=$this->mymodel->get_post();
                $this->load->view('viewposts',$data);
            }
        }
        function show($articleid)
        {
            $data['posts']=$this->mymodel->getcomments($articleid);
            $data['articleid']=$articleid;
            $this->load->view('comments',$data);
        }
}
?>