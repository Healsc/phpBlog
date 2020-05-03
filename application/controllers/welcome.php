<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
//		$loginUser = $this->session->userdata('loginUser');
		$this -> load -> model('article_model');
        $articles = $articles = $this -> article_model -> get_articles();

        $this->load->view('index',array(
            'articles' => $articles
        ));
	}
	public function home(){
       // $loginUser = $this->session->userdata('loginUser');
        $id = $this->input->get('id');
        $this -> load -> model('article_model');
        $this->load->model('user_model');
        $userinfo = $this->user_model->get_name_by_user_id($id);
        $articles = $this -> article_model -> get_articles_by_user($id);
        $types = $this ->article_model -> get_types_by_user($id);
        $this->load->view('home',array(
            'articles' => $articles,
            'types' => $types,
            'userinfo'=>$userinfo
        ));
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function regist()
    {
        $this->load->view('regist');
    }
    public function check_login()
    {
        $uname = $this -> input -> post('username');
        $pwd = $this -> input -> post('password');
        $data = array();
        $flag = TRUE;
        if($uname == ""){
            $data['error_name'] = "请输入用户名";
            $flag = FALSE;
        }
        if ($pwd == ""){
            $data['error_pwd'] = "请输入密码";
            $flag = FALSE;
        }
        if($flag){
            $this -> load -> model('user_model');
            $row = $this -> user_model -> get_by_name_pwd($uname,$pwd);
            if($row){
                $this -> session -> set_userdata('loginUser',$row);
                 echo '登录成功';
                redirect('welcome/index');
            }else{
               // echo "登陆失败,检查账号密码";
                $data['error_err'] = "登陆失败,请检查账号密码";
                $this -> load -> view('login',$data);
            }
        }else{
            $this -> load -> view('login',$data);
        }
        //$this->load->view('login');
    }

    public function save_regist()
    {
        $uname = $this -> input -> post('username');
        $pwd = $this -> input -> post('password');
        $repwd = $this -> input -> post('repassword');
        $data = array();
        $flag = TRUE;
        if($uname == ""){
            $data['error_name'] = "请输入用户名";
            $flag = FALSE;
        }
        if ($pwd == ""){
            $data['error_pwd'] = "请输入密码";
            $flag = FALSE;
        }
        if($repwd == ""){
            $data['error_repwd'] = "请输入确认密码";
            $flag = FALSE;
        }
        if($pwd != "" && $repwd != "" && $pwd != $repwd ){
            $data['error_buyizhi'] = "两次密码不一致";
            $flag = FALSE;
        }
        if($flag){
            $this -> load -> model('user_model');
            $row_name = $this -> user_model -> get_by_name($uname);
            if($row_name){
                $data['error_rename'] = "用户名已存在";
                $this -> load -> view('regist',$data);
            }else{
                $rows = $this -> user_model -> save($uname,$pwd);
                if($rows > 0){
                    redirect('welcome/login');
                }else{
                    echo "注册失败";
                }
            }
//            $rows = $this -> user_model -> save($uname,$pwd);
//            if($rows > 0){
//                echo 'success';
//            }else{
//                echo "fail";
//            }
        }else{
            $this -> load -> view('regist',$data);
        }
    }
    public function login_out(){
        $this -> session -> unset_userdata('loginUser');
        redirect('welcome/index');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */