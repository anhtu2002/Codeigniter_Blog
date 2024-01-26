<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Blog extends MY_Controller
{

    
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/Blog_model');
        $this->load->model('category/Category_model');
    }

    function new_blog()
    {
        // check login
        if(!$this->_islogin())
        {
            redirect(site_url(''));
            die();
        }
        $data['admin'] = $this->_session_role();
        $data['uid'] = $this->_session_uid();
        $data['login'] = $this->_islogin();
        $data['title'] = "New Blog";
        $data['list_cates'] = $this->Category_model->list_cate();
        $data["css"] = "assets/css/new_blog.css";
        $data["js"] = "assets/js/test.js";
        $uid = $this->_session_uid();
        if (isset($_POST['title_blog'])) {
            // Lấy ID người dùng từ session
            $upload_path = "./uploaded/" . $uid ."/blog" . "/"; // Thư mục upload trên máy chủ

            // Kiểm tra nếu thư mục không tồn tại, tạo mới
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            $new_image_name = $_FILES['img_blog']['name'];
            $config['file_name'] = $new_image_name;
            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size']      = 3072; 
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('img_blog');
            // Upload thành công
            $upload_data = $this->upload->data();
            $blog_ava = $upload_data['file_name'];
            var_dump($this->upload->display_errors());

            // Lấy các giá trị từ form
            $title_blog = $this->input->post('title_blog');
            $sumary = $this->input->post('sumary');
            $category = $this->input->post('category');
            $content = $this->input->post('ccccc');

            // Lưu thông tin người dùng vào cơ sở dữ liệu
            $data_form = [
                'blog_name' => $title_blog,
                'blog_summary' => $sumary,
                'blog_content' => $content,
                'blog_img' => $blog_ava,
                'date' => date("F j, Y"),
                'user_id' => $uid,
                'cate_id' => $category,
            ];

            var_dump($this->Blog_model->create_new_blog($data_form));
            redirect(base_url('blog/list_blog'));

        } else {
            $this->load->view('blog/new_blog_view', $data);
        }
    }


    function list_blog()
    {
        // check login
        if (!$this->_islogin()) {
            redirect(site_url(''));
            die();
        }

       
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            //$results = $this->api_model->fetch_single_user($username);
            $this->Blog_model->status_blog($id,$status);
        }
        if(isset($_POST['offset'] )){
            $offset = $_POST['offset'];
            $this->session->set_userdata('offset', $offset);
        }

        if($this->_session_offset()){
          $offset =$this->_session_offset();  
        }else{
            $offset = 1;
        }
        $uid = $this->_session_uid();
        $data['active'] = $offset;
        $data['admin'] = $this->_session_role();
        $data['uid'] = $this->_session_uid();
        $data['login'] = $this->_islogin();
        $data['results'] = $this->Blog_model->get_list_blog($offset,$uid);
        $data['title'] = "List Blog";
        $data["css"] = "assets/css/list_blog.css";
        $data["js"] = "assets/js/test.js";
        $this->load->view('blog/list_blog_view', $data);
    }

    function all_blog()
    {
        // check login
        if (!$this->_islogin()) {
            redirect(site_url(''));
            die();
        }

        if (isset($_POST['offset_blog'])) {
            $offset_blog = $_POST['offset_blog'];
            $this->session->set_userdata('offset_blog', $offset_blog);
        }

        if (trim($this->session->userdata('offset_blog'))) {
            $offset_blog = trim($this->session->userdata('offset_blog'));
        } else {
            $offset_blog = 1;
        }
        $list_cate = $this->Category_model->list_cate();
        $uid = $this->_session_uid();
        $data['list_cate'] = $list_cate;
        $data['active'] = $offset_blog;
        $data['admin'] = $this->_session_role();
        $data['uid'] = $this->_session_uid();
        $data['login'] = $this->_islogin();
        $data['results'] = $this->Blog_model->get_all_blog($offset_blog);
        $data['title'] = "Blog";
        $data["css"] = "assets/css/blog.css";
        $data["js"] = "assets/js/test.js";
        $this->load->view('blog/blog_view', $data);
    }
}