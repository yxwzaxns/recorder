<?php
class User extends CI_Model {

    public $nid;
    public $title;
    public $author;
    public $content;
    public $createtime;
    public $video_url;
    public $thumb;
    public $type=1;
    public $rank=0;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_users()
    {
        $user = $this->db->query('select * from user where sid=1')->result_array();
        $subuser = $this->db->query('select * from user where sid <> 1')->result_array();
        if(!empty($user)){
          foreach ($user as $key => $value) {
            $result[$value['username']]= $value;
          }
        }else{
          $result='';
        }
        return $result;
    }
    public function get_user($user_id='')
    {
        return $this->db->query('select * from user where nid='.$user_id)->result_array()[0];
    }
    public function reset_password()
    {
        $new_password = md5($this->input->post('new_password'));
        $old_password = md5($this->input->post('old_password'));

        $this->db->where('id',1);

        return $this->db->update("admin",array("password" => $new_password));

        // $nav = $this->db->query("select id,navname from nav where id = ".$nid)->result_array()[0];

        // return $this->db->insert("user",array("nid" => $nid,"type" => 0,"title" => $nav['navname']));
    }
    public function insert()
    {
        $this->nid  = $this->input->post("nid"); // please read the below note
        $this->title  = $this->input->post("title");
        $this->author  = $this->input->post("author");

        $this->db->insert('user', $this);

        if($id=$this->db->insert_id()){
          // 初始化一篇user
          $values['nid']=$id;
          return $this->db->insert('user',$values);
        }else{
          var_dump($id);exit;
        }
    }
    public function delete($user_name='')
    {
      return $this->db->delete('user',array('username' => $user_name));
    }
    public function update()
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
