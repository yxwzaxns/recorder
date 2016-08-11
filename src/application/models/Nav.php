<?php
class Nav extends CI_Model {

    public $navname;
    public $sid;
    public $pid;
    public $rank=0;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_navs()
    {
        $navs = $this->db->query('select * from nav where sid=0')->result_array();

        if(!empty($navs)){
          foreach ($navs as $key => $value) {
            $subnav = $this->db->query('select * from nav where pid='.$value['id'])->result_array();
            $navs[$key]['subnav']= $subnav;
          }
        }else{
          $result='';
        }
        return $navs;
    }
    public function get_nav($nav_id)
    {
        $nav = $this->db->query('select * from nav where id='.$nav_id)->result_array();
        return $nav;
    }
    public function get_subnavs($nav_id='')
    {
        return $this->db->query('select * from nav where pid='.$nav_id)->result_array();
    }
    public function getIdFromNavname($name='')
    {
      return $this->db->query('select id from nav where navname="'.$name.'"')->result_array()[0]['id'];
    }
    public function getPidFromId($nav_id='')
    {
      return $this->db->query('select pid from nav where id='.$nav_id)->result_array()[0]['pid'];
    }
    public function has_node($nav_id='')
    {
      if($this->db->query('select count(*) from nav where pid='.$nav_id)->result_array()[0]['count(*)'] == 0)
        return 0;
      else
        return 1;
    }
    public function insert_subnav($value='')
    {
      $this->navname    = $this->input->post("navname"); // please read the below note
      $this->sid  = $this->input->post("sid");
      $this->pid  = $this->input->post("pid");

      return $this->db->insert('nav', $this);
    }
    public function insert()
    {
        $this->navname    = $this->input->post("navname"); // please read the below note
        $this->sid  = $this->input->post("sid");
        $this->pid  = $this->input->post("pid");

        if($this->db->insert('nav', $this))
          return $this->db->insert_id();
    }
    public function delete($nav_id='')
    {
      return $this->db->delete('nav',array('id' => $nav_id));
    }
    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    public function put($value='')
    {
      echo "ok";
    }
}
?>
