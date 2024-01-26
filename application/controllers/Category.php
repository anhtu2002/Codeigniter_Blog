<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Category extends MY_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/Blog_model');
        $this->load->model('category/Category_model');
    }

    function view($cate_name)
    {
        // check login
        if(!$this->_islogin())
        {
            redirect(site_url(''));
            die();
        }
        $result = $this->Category_model->this_cate($cate_name);
        $list_blog = $this->Blog_model->cate_list_blog($result[0]['cate_id']);
        $list_cate = $this->Category_model->list_cate();
        //check role la admin
        // $role = $this->_session_role();

        // if($role != ROLE_ADMIN)
        // {
        //     redirect(site_url(''));
        //     die();
        // }

        // if (isset($_POST['user_name'])) {
        //     $user_name = $_POST['user_name'];
        //     $email = $_POST['user_email'];
        //     $avata = $_POST['user_ava'];
        //     $type = $_POST['type'];
        //     $pass = $_POST['pass'];
        //     $status = $_POST['status'];

        //     $result = $this->User_model->create($user_name, $email, $avata, $type, md5($pass), $status);

        //     if ($result === "SUCCESS") {
        //         redirect(site_url('login'));
        //         die();
        //     }
        //     //$results = $this->api_model->fetch_single_user($username);

        //     // $this->User_model->create($user_name, $email, $avata, $type, md5($pass));

        //     // if (!empty($loginInfo)) {
        //     //     $user_id = $loginInfo['uid'];
        //     //     $user_email = $loginInfo['email'];
        //     //     $user_role = $loginInfo['role'];


        //     //     // set session luu login
        //     //     $this->session->set_userdata('uid', $user_id);
        //     //     $this->session->set_userdata('email',
        //     //         $user_email
        //     //     );
        //     //     $this->session->set_userdata('role', $user_role);

        //     //     redirect(site_url(''));
        //     //     die();
        //     // } 

        // }
        
        $data['admin'] = $this->_session_role();
        $data['uid'] = $this->_session_uid();
        $data['login'] = $this->_islogin();
        $data['title'] = ucfirst($result[0]["cate_name"]);
        $data["css"] = "assets/css/category.css";
        $data["result"] = $result[0];
        $data["list_blog"] = $list_blog;
        $data["list_cate"] = $list_cate;
        $data["js"] = "assets/js/test.js";
        $this->load->view('category/category_view',$data);
    }
}
