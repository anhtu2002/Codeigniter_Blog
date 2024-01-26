<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Logout extends MY_Controller
{

   
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user_id = $this->_session_uid();
        if($user_id > 0){
            $this->session->sess_destroy();

            redirect(site_url(''));
            die();
        }
        else{
            echo ("<script>alert('Chưa đăng nhập');");
            echo "window.location.href='" . site_url('') . "';</script>";
            die();
        }
        
           
    }
    
}

