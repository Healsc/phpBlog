<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model{
    public function  save_comment($article_id,$content,$user_id){
        $this->db->insert('t_comment',array(
            'article_id'=>$article_id,
            'user_id'=>$user_id,
            'content'=>$content
        ));
        return $this -> db -> affected_rows();
    }
    public function get_content_by_articleid($id){
//        $query = $this -> db -> get_where('t_comment',array(
//            'article_id'=>$id
//        ));
//        return $query->result();
//        $this -> db -> select('a.*,t.type_name');
//        $this -> db -> from('t_article a');
//        $this -> db -> join('t_article_type t','a.type_id=t.type_id');
//        $this -> db -> where('a.user_id',$user_id);
//        $this -> db ->order_by('a.post_date','desc');
//        return $this -> db -> get() -> result();

        $this -> db -> select('c.*,u.username');
        $this -> db -> from('t_comment c');
        $this -> db -> join('t_user u','c.user_id=u.user_id');
        $this -> db -> where('c.article_id',$id);
        $this -> db ->order_by('c.post_date','desc');
        return $this -> db -> get() -> result();
    }
    public function get_comment_by_userid($user_id){
        $sql = "select c.*,a.title,u.username from t_user u, t_article a,t_comment c where u.user_id=c.user_id and c.article_id=a.article_id and a.user_id=c.user_id";
        return $this->db->query($sql)->result();
    }
    public function delete_comment($comment_id){
        $this->db->delete('t_comment',array(
            'comm_id'=>$comment_id
        ));
        return $this -> db -> affected_rows();
    }
}