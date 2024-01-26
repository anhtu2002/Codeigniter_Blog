<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog/Blog_model');

    }
    // phai login
    // phai la admin
    function create()
    {
        
        if (isset($_POST['user_name'])) {
            $user_name = $_POST['user_name'];
            $email = $_POST['user_email'];
            $avata = $_POST['user_ava'];
            $type = $_POST['type'];
            $pass = $_POST['pass'];
            $status = $_POST['status'];

            $result=$this->User_model->create($user_name, $email, $avata, $type, md5($pass),$status);
            
            if ($result === "SUCCESS") {
                redirect(site_url('login'));
                die();
            }else{
                echo '<script>alert("Email đã tồn tại")</script>';
            }
            
        }
        $data['admin'] = $this->_session_role();
        $data['login'] = $this->_islogin();
        $data['title'] = "Signup";
        $data["css"] = "assets/css/test.css";
        $data["js"] = "assets/js/test.js";
        $this->load->view('user/add_user_view', $data);
    }

    function list_user()
    {
        //check login
        if(!$this->_islogin())
        {
            redirect(site_url('login'));
            die();
        }

        //check role la admin
        $role = $this->_session_role();

        if($role != ROLE_ADMIN)
        {   
            
            
            echo ("<script>alert('chỉ admin mới được truy cập trang này');");
            echo "window.location.href='" . site_url('') . "';</script>";
            die();
        }
        $results = $this->User_model->list();
        // if (isset($_POST['user_name'])) {
        //     $user_name = $_POST['user_name'];
        //     $email = $_POST['user_email'];
        //     $avata = $_POST['user_ava'];
        //     $type = $_POST['type'];
        //     $pass = $_POST['pass'];


        //     //$results = $this->api_model->fetch_single_user($username);

        //    $results = $this->User_model->infor();

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
        $data['login'] = $this->_islogin();
        $data['title'] = "List User";
        $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/list_user.css";
        $data["js"] = "assets/js/test.js";
        $data["results"] = $results;
        $this->load->view('user/list_user_view', $data);
    }


    //upload
    public function infor()
    {
        if (!$this->_islogin()) {
            redirect(site_url('login'));
            die();
        }
        // Xử lý khi form được submit
        $uid = $this->_session_uid();
        $results = $this->User_model->info($uid);
        $data['login'] = $this->_islogin();
        $data['title'] = "My Infor";
        $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/my_infor.css";
        $data["js"] = "assets/js/test.js";
        $data["results"] = $results;
       
        if (isset($_POST['offset'])) {
            $offset_blog = $_POST['offset'];
            $this->session->set_userdata('offset_infor', $offset_blog);
        }

        if (trim($this->session->userdata('offset_infor'))) {
            $offset_blog = trim($this->session->userdata('offset_infor'));
        } else {
            $offset_blog = 1;
        }
        $posts = $this->Blog_model->my_blog($offset_blog,$uid);
        $data["posts"] = $posts;
        $data['active'] = $offset_blog;
        if (isset($_POST['user_name'])) {
             // Lấy ID người dùng từ session
            $upload_path = "./uploaded/" . $uid . "/avata"."/"; // Thư mục upload trên máy chủ

            // Kiểm tra nếu thư mục không tồn tại, tạo mới
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            $new_image_name =
                $_FILES['user_ava']['name'];
            $config['file_name'] = $new_image_name;
            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            

            $this->upload->do_upload('user_ava');
                // Upload thành công
                $upload_data = $this->upload->data();
                $user_ava = $upload_data['file_name'];
                if($user_ava ==='') {
                    $user_ava = $data["results"]["user_ava"];
                }

                // Lấy các giá trị từ form
                $user_name = $this->input->post('user_name');
                $type = $this->input->post('type');
                $slogan = $_POST['slogan'];
                $my_des = $_POST['my_des'];
                $url_fb = $this->input->post('url_fb');
                $url_tw = $this->input->post('url_tw');
                $url_ig = $this->input->post('url_ig');
                $url_in = $this->input->post('url_in');

                // Lưu thông tin người dùng vào cơ sở dữ liệu
                $data_form = [
                        'user_id'=> $uid,
                        'user_name' => $user_name,
                        'user_ava' => $user_ava,
                        'type' => $type,
                        'slogan' => $slogan,
                        'my_des' => $my_des,
                        'fb' => $url_fb,
                        'tw' => $url_tw,
                        'ig' => $url_ig,
                        'in' => $url_in,
                        
                    ];

                $this->User_model->edit($data_form);
                redirect(base_url('user/infor') );

                // Chuyển hướng hoặc hiển thị thông báo thành công tùy thuộc vào yêu cầu của bạn
                
            
                // Upload thất bại
             
        } else { 
            $this->load->view('user/infor_user_view', $data);
        }
    }
    function edit_user($user_id)
    {
        //check login
        if (!$this->_islogin()) {
            redirect(site_url('login'));
            die();
        }
        //check role la admin
        $role = $this->_session_role();

        if ($role != ROLE_ADMIN) {


            echo ("<script>alert('chỉ admin mới được truy cập trang này');");
            echo "window.location.href='" . site_url('') . "';</script>";
            die();
        }

        if (isset($_POST['type'])) {

            $type = $_POST['type'];
            $status = $_POST['status'];

            $this->User_model->edit_user($user_id, $type, $status);
            redirect(site_url('user/list_user'));

            //$results = $this->api_model->fetch_single_user($username);

            // $this->User_model->create($user_name, $email, $avata, $type, md5($pass));

            // if (!empty($loginInfo)) {
            //     $user_id = $loginInfo['uid'];
            //     $user_email = $loginInfo['email'];
            //     $user_role = $loginInfo['role'];


            //     // set session luu login
            //     $this->session->set_userdata('uid', $user_id);
            //     $this->session->set_userdata('email',
            //         $user_email
            //     );
            //     $this->session->set_userdata('role', $user_role);

            //     redirect(site_url(''));
            //     die();
            // } 
            die();
        }
        if($user_id >0){
            $results = $this->User_model->info($user_id); 
        $data['results'] = $results;
        $data['login'] = $this->_islogin();
        $data['title'] = "Edit user";
            $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/edit_user.css";
        $data["js"] = "assets/js/test.js";
        $this->load->view('user/edit_user_view', $data);
    }
    }

    function change_pas($user_id)
    {
        //check login
        if (!$this->_islogin()) {
            redirect(site_url('login'));
            die();
        }

        if (isset($_POST['old_pas'])) {

            $new_pas = $_POST['new_pas'];
            $old_pas = $_POST['old_pas'];

            $status = $this->User_model->change_passwword($user_id, md5($old_pas), md5($new_pas));
            if($status == "SUCCESS"){
                echo "ok";
            }
            else{
                echo "false";
            }
            // redirect(site_url('user/list_user'));
 
            die();
        }
    }
}
