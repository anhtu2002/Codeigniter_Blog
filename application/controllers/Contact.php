<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Contact extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    public function index()

    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $mess = $_POST['msg'];

            //$results = $this->api_model->fetch_single_user($username);
            $this->Contact_model->add_contact($name,$email, $phone, $mess);
        }

        $data = [];
        $data['css'] = "assets/css/contact.css";
        $data['title'] = "Contact Us";
        $data['admin'] = $this->_session_role();
        $data["js"] = "assets/js/test.js";
        $data['login'] = $this->_islogin();
        $this->load->view('contact/contact_view', $data);
    }
    public function list_contact()

    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            //$results = $this->api_model->fetch_single_user($username);
            $this->Contact_model->status_contact($id);
            // echo ("<script>alert('Duyệt thành công');");
            // echo "window.location.href='" . site_url('contact/list_contact') . "';</script>";
            //     if (!empty($loginInfo)) {
            //         $user_id = $loginInfo['uid'];
            //         $user_email = $loginInfo['email'];
            //         $user_role = $loginInfo['role'];


            //         // set session luu login
            //         $this->session->set_userdata('uid', $user_id);
            //         $this->session->set_userdata('email', $user_email);
            //         $this->session->set_userdata('role', $user_role);

            //         redirect(site_url(''));
            //         die();
            //     } else {
            //         $loginMsg = 'Invalid email or password';
            //     }
        }

        
        $data = [];
        $data['results'] =$this->Contact_model->list_contact(); 
        $data['css'] = "assets/css/list_contact.css";
        $data['title'] = "List Contact";
        $data['admin'] = $this->_session_role();
        $data["js"] = "assets/js/test.js";
        $data['login'] = $this->_islogin();
        $this->load->view('contact/list_contact_view', $data);
    }
}
