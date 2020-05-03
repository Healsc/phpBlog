<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller
{
    public function get_article_by_id(){
        $article_id = $this->input->get('id');
        $this->load->model('article_model');
        $result = $this->article_model->get_article_by_article_id($article_id);
        $this->load->model('comment_model');
        $comment_result = $this->comment_model->get_content_by_articleid($article_id);
        $this->load->view('article_detail',array(
            'article'=>$result,
            'comment_result'=>$comment_result
        ));
    }

//    public function get_article_by_id(){
//        $id = $this->input->get('id');
//        $loginUser = $this->session->userdata('loginUser');
//        $this->load->model('article_model');
//        $results = $this->article_model->get_articles_by_user($loginUser->user_id);
//        $this->load->model('comment_model');
//        $comment_result = $this->comment_model->get_content_by_articleid($id);
//        $preArticle = null;
//        $nextArticle = null;
//        foreach ($results as $index=>$result){
//            if($id == $result->article_id){
//                $row = $result;
//                if($index>0){
//                    $preArticle = $results[$index-1];
//                }
//                if($index < count($results)-1){
//                    $nextArticle = $results[$index+1];
//                }
//                break;
//            }
//        }
//        if($results){
//            $this->load->view('article_detail',array(
//                'row'=>$row,
//                'preArticle'=>$preArticle,
//                'nextArticle'=>$nextArticle,
//                'comment_result'=>$comment_result
//            ));
//        }else{
//            echo 'fail';
//        }
//    }

}