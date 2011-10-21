<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Mymodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function get_post()
    {
       $query = $this->db->query('SELECT id,title,summary,body,adate,(SELECT c.name FROM categories c WHERE c.id=a.catid) cat FROM articles a ORDER BY adate');
       return $query->result();
    }
    
    function getcomments($articleid)
    {
       $query = $this->db->query('SELECT comment,articleid,cdate FROM comments WHERE articleid='.$articleid.' ORDER BY cdate;');
       return $query->result();
    }
    function get_categories()
    {
       $query = $this->db->query('SELECT name FROM categories');
       return $query->result();
    }
    function get_articles_of($cat)
    {
       $catid=$this->db->query('SELECT (SELECT id FROM categories WHERE name="'.$cat.'") res FROM DUAL;')->row()->res;
       $query = $this->db->query('SELECT id,title,summary,body,adate,(SELECT c.name FROM categories c WHERE c.id=a.catid) cat FROM articles a WHERE catid='.$catid.' ORDER BY adate');
       return $query->result();
    }
    function newpost($title,$cat,$cat2,$body,$summ)
    {
        if($cat == 'other')
        {
            $q1=$this->db->query('SELECT (SELECT MAX(id) FROM articles)+1 res FROM DUAL;')->row()->res;
            $q2=$this->db->query('SELECT (SELECT MAX(id) FROM categories)+1 res FROM DUAL;')->row()->res;
            $q3=$this->db->query('INSERT INTO categories VALUES ('.$q2.' , "'.$cat2.'" )');
            $query = $this->db->query('INSERT INTO articles VALUES ('.$q1.' ,'.$q2.', "'.$title.'","'.$body.'","'.$summ.'",CURRENT_TIMESTAMP )');
        }
        else
        {
            $q1=$this->db->query('SELECT (SELECT MAX(id) FROM articles)+1 res FROM DUAL;')->row()->res;//->result_array();//->result();
            $query = $this->db->query('INSERT INTO articles VALUES ('.$q1.' ,(SELECT id FROM categories WHERE name="'.$cat.'"), "'.$title.'","'.$body.'","'.$summ.'",CURRENT_TIMESTAMP )');
        }
    }
    function newcomment($articleid,$comm)
    {
        /*
        +-----------+--------------+------+-----+---------+-------+
        | Field     | Type         | Null | Key | Default | Extra |
        +-----------+--------------+------+-----+---------+-------+
        | cdate     | datetime     | NO   |     | NULL    |       |
        | id        | int(11)      | NO   | PRI | NULL    |       |
        | articleid | int(11)      | NO   | MUL | NULL    |       |
        | comment   | varchar(200) | NO   |     | NULL    |       |
        +-----------+--------------+------+-----+---------+-------+
        */
        $id=$this->db->query('SELECT (SELECT MAX(id) FROM comments)+1 res FROM DUAL;')->row()->res;//->result_array();//->result();       
        $query = $this->db->query('INSERT INTO comments VALUES (CURRENT_TIMESTAMP,'.$id.' ,'.$articleid.', "'.$comm.'")');
    }
}
?>
