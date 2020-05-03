<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type_model extends CI_Model{
    public function get_types_by_user($user_id){
        $sql = "select t.*,(select count(*) from t_article a where a.type_id = t.type_id) num from t_article_type t where t.user_id = $user_id";
        return $this -> db -> query($sql) -> result();
    }
    public function update_type($type_id,$type_name){
        $this->db->set('type_name',$type_name);
        $this->db->where('type_id',$type_id);
        $this->db->update('t_article_type');
        return $this -> db -> affected_rows();
    }
    public function save_type($type_name,$user_id){
        $this->db->insert('t_article_type',array(
            'user_id'=>$user_id,
            'type_name'=>$type_name
        ));
        return $this -> db -> affected_rows();
    }
}