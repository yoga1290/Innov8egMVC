<?php
//index.php/category/show/
class category extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
            
        }
        
	function index()
	{
            echo "go to index.php/category/show/CATEGORY_NAME_HERE";
        }
        function show($cat)
        {
            $data['posts']=$this->mymodel->get_articles_of($cat);
            $this->load->view('viewposts',$data);
        }
}
?>