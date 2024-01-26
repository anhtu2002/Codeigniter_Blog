<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Blog_Post extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_post/Blog_Post_model');
        $this->load->model('category/Category_model');
    }

    function view($blog_id)
    {
        // check login
        if (!$this->_islogin()) {
            redirect(site_url('login'));
            die();
        }
        // Xử lý khi form được submit
        // $results = $this->User_model->info($uid);
        $post = $this->Blog_Post_model->this_blog($blog_id);
        $other_post = $this->Blog_Post_model->other_blog();
        $data['login'] = $this->_islogin();
        $data['title'] = "Blog Post";
        $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/blog_post.css";
        $data["js"] = "assets/js/test.js";
        // $data["results"] = $results;
        $data["post"] = $post;
        $data["other_post"] = $other_post;
        $this->load->view('blog_post/Blog_post_view', $data);
    }
}
