<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Article_model extends CI_Model{
    public function get_articles_by_user($user_id){
       $this -> db -> select('a.*,t.type_name');
       $this -> db -> from('t_article a');
       $this -> db -> join('t_article_type t','a.type_id=t.type_id');
       $this -> db -> where('a.user_id',$user_id);
       $this -> db ->order_by('a.post_date','desc');
       return $this -> db -> get() -> result();
    }

    public function get_types_by_user($user_id){
    $sql = "select t.*,(select count(*) from t_article a where a.type_id = t.type_id) num from t_article_type t where t.user_id = $user_id";
    return $this -> db -> query($sql) -> result();
//        return $this -> db ->get_where('t_article_type',array(
//            'user_id' => $user_id
//        )) -> result();
}
    public function save_article($title,$content,$type_id,$user_id){
        $this -> db -> insert('t_article',array(
            'user_id' => $user_id,
            'title' => $title,
            'content' => $content,
            'type_id' => $type_id
        ));
        return $this -> db -> affected_rows();
    }
    public function delete_article($ids){
//        $sql = 'delete from t_article where article_id in('.$ids.')';
//        $this -> db -> query($sql);
        $this->db->where_in('article_id',$ids);
        $this->db->delete('t_article');
        return $this -> db -> affected_rows();
    }

    public function get_article_by_article_id($id){
//        $query = $this -> db -> get_where('t_article',array(
//            'article_id'=>$id
//        ));
//        return $query->row();
        $this -> db -> select('a.*,u.username');
        $this -> db -> from('t_article a');
        $this -> db -> join('t_user u','a.user_id=u.user_id');
        $this -> db -> where('a.article_id',$id);
        $query = $this->db->get();
        return $query -> row();
    }
    public function get_articles(){
//        $this -> db -> select('a.*,t.type_name');
//        $this -> db -> from('t_article a');
//        $this -> db -> join('t_article_type t','a.type_id=t.type_id');
//        $this -> db -> where('a.user_id',$user_id);
//        $this -> db ->order_by('a.post_date','desc');
//        return $this -> db -> get() -> result();

        $this->db->select('*');
        $this->db->from('t_article');
        $this->db->join('t_user', 't_article.user_id = t_user.user_id');
        $this->db->limit(5);
        $this -> db ->order_by('t_article.post_date','desc');
        $query = $this->db->get();
        return $query -> result();

//        $this->db->limit(2);
//        $this -> db ->order_by('t_article.post_date','desc');
//        $query  = $this->db->get('t_article');
//        return $query -> result();
    }

}