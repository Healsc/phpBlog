<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
    public function index(){
        $loginUser = $this -> session -> userdata('loginUser');
        if($loginUser){
            $this->load->view('admin_index',array(
                'loginUser'=>$loginUser
            ));
        }else{
            redirect('welcome/login');
        }

    }

    public function new_blog(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this->load->model('article_model');
        $types = $this->article_model->get_types_by_user($loginUser->user_id);
        $this->load->view('new_blog',array(
            'types' => $types,
            'loginUser'=>$loginUser
        ));
    }
    public function list_blogs(){
        $loginUser = $this -> session -> userdata('loginUser');
        $this -> load -> model('article_model');
        $articles = $this -> article_model-> get_articles_by_user($loginUser->user_id);

        $this -> load -> view('list_blogs',array(
            'articles'=>$articles
        ));
    }
    public function post_article(){
        $title = htmlspecialchars( $this->input->post('title'));
        $content = htmlspecialchars($this -> input -> post('content'));
        $type_id = $this -> input -> post('type_id');
        $this -> load -> model('article_model');
        $loginUser = $this -> session -> userdata('loginUser');
        $rows = $this -> article_model -> save_article($title,$content,$type_id,$loginUser->user_id);
        if($rows > 0){
            echo "发布成功";
            //$this -> load -> view('list_blogs');
            //redirect('admin/list_blogs');
        }else{
            echo 'fail';
        }
    }
    public function delete_articles(){
        $ids = $this -> input -> get('ids');
        //echo $ids;
        $this -> load -> model('article_model');
        $rows = $this -> article_model-> delete_article($ids);
        if($rows > 0){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function get_article_by_id(){
        $id = $this->input->get('id');
        $loginUser = $this->session->userdata('loginUser');
        $this->load->model('article_model');
        $results = $this->article_model->get_articles_by_user($loginUser->user_id);
        $this->load->model('comment_model');
        $comment_result = $this->comment_model->get_content_by_articleid($id);
        $preArticle = null;
        $nextArticle = null;
        foreach ($results as $index=>$result){
            if($id == $result->article_id){
                $row = $result;
                if($index>0){
                    $preArticle = $results[$index-1];
                }
                if($index < count($results)-1){
                    $nextArticle = $results[$index+1];
                }
                break;
            }
        }
        if($results){
            $this->load->view('viewPost',array(
                'row'=>$row,
                'preArticle'=>$preArticle,
                'nextArticle'=>$nextArticle,
                'comment_result'=>$comment_result
            ));
        }else{
            echo 'fail';
        }
    }
    public function save_comment(){
        $loginUser = $this -> session -> userdata('loginUser');
        $article_id = $this->input->post('id');
        $content = $this->input->post('content');
        $user_id = $loginUser->user_id;
        if($loginUser){
            $this->load->model('comment_model');
            $row = $this->comment_model->save_comment($article_id,$content,$user_id);
            if($row){
                redirect("article/get_article_by_id?id=$article_id");

            }else{
                echo 'fail';
            }
        }else{
            redirect('welcome/login');
        }


    }
    public function get_comment_about_me(){
        $loginUser = $this->session->userdata('loginUser');
        $this->load->model('comment_model');
        $results = $this->comment_model->get_comment_by_userid($loginUser->user_id);
        if($results){
            $this->load->view('blogComments',array(
                'results'=>$results
            ));
        }else{

        }
    }
    public function delete_comment(){

        $comment_id = $this->input->get('comment_id');
        $this->load->model('comment_model');
        $row = $this->comment_model->delete_comment($comment_id);
        if($row){
            redirect('admin/get_comment_about_me');
        }else{
            echo "删除评论失败";
        }
    }
    public function get_blog_type(){
        $loginUser = $this->session->userdata('loginUser');
        $this->load->model('type_model');
        $results = $this->type_model->get_types_by_user($loginUser->user_id);
        if($results){
            $this->load->view('blogCatalogs',array(
                'results'=>$results
            ));
        }
    }
    public function update_type(){
        $type_id = $this->input->get('type_id');
        $type_name = $this->input ->get('type_name');
        $this->load->model('type_model');
        $row = $this->type_model->update_type($type_id,$type_name);
        if($row){
            redirect('admin/get_blog_type');
        }
    }
    public function save_type(){
        $type_name = $this ->input->post('type_name');
        $user_id = $this->input->post('user_id');
        $this->load->model('type_model');
        $rows = $this->type_model->save_type($type_name,$user_id);
        if($rows){
            redirect('admin/new_blog');
        }
    }
}
