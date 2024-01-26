<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Author extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/Blog_model');
        $this->load->model('category/Category_model');
    }

    function view($uid)
    {
        // check login
        if (!$this->_islogin()) {
            redirect(site_url('login'));
            die();
        }
        if (isset($_POST['offset'])) {
            $offset_blog = $_POST['offset'];
            $this->session->set_userdata('offset_author', $offset_blog);
        }

        if (trim($this->session->userdata('offset_author'))) {
            $offset_blog = trim($this->session->userdata('offset_author'));
        } else {
            $offset_blog = 1;
        }
        $posts = $this->Blog_model->my_blog($offset_blog, $uid);
        $data["posts"] = $posts;
        $data["uid"] = $uid;
        $data['active'] = $offset_blog;
        // Xử lý khi form được submit
        $results = $this->User_model->info($uid);
        $data['login'] = $this->_islogin();
        $data['title'] = "Author";
        $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/author.css";
        $data["js"] = "assets/js/test.js";
        $data["results"] = $results;
        $this->load->view('author/infor_author_view', $data);
        
    }
}