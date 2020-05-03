<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    public function save($uname,$pwd){
        $this -> db -> insert('t_user',array(
            'username' => $uname,
            'password' => $pwd
        ));
        return $this -> db -> affected_rows();
    }
    public function get_by_name($uname){
        $query = $this -> db -> get_where('t_user',array(
            'username' => $uname
        ));
        return $query -> row();
    }
    public function get_by_name_pwd($uanme,$pwd){
        $query = $this -> db -> get_where('t_user',array(
            'username' => $uanme,
            'password' => $pwd
        ));
        return $query -> row(); // $quert -> result();
    }
    public function  get_name_by_user_id($id){
        $this -> db -> select('t_user.username');
        $this -> db -> from('t_user');
        $this -> db -> where('t_user.user_id',$id);
        $query = $this->db->get();
        return $query -> row();
    }
}