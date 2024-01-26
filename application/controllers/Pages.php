<?php
class Pages extends My_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('category/Category_model');
        $this->load->model('blog/Blog_model');
    }
    function index()
    {    
        $list_cate = $this->Category_model->list_cate();
        $numb_cate = count($list_cate);
        for($i =0 ; $i <$numb_cate ; $i++){
            $data["cate_".$i] = $this->Blog_model->blog_first($list_cate[$i]['cate_id']);
        }
            
        
        $data['numb_cate'] = $numb_cate;
        $data['list_cate'] = $list_cate;
        $data['login'] = $this->_islogin();
        $data['title'] = "Home";
        $data['admin'] = $this->_session_role();
        $data["css"] = "assets/css/home.css";
        $data["js"] = "assets/js/test.js";
        $this->load->view('home', $data);
        

        
    }



}
