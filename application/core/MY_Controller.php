<?php if (!defined('BASEPATH')){exit('No direct script access allowed');}

class MY_Controller extends CI_Controller
{
    var $_template_f = '';
    var $_langcode = '';
    var $_langcode_id = '';
    var $_languri = '';
    var $_module = '';
    var $_function = '';
    var $_product_name = '';
    
	public function __construct()
    {
		parent::__construct();

        // init and assign common value to view: language, common lang
        $preHeader = array();

        $preHeader['module'] = $this->_module;
        $preHeader['function'] = $this->_function;
        $preHeader['product_name'] = $this->_product_name;
        
        $preHeader['email'] = '';
        $preHeader['userid'] = 0;
        $preHeader['isLogin'] = false;
        if ($this->_islogin())
        {
        	$preHeader['isLogin'] = true;
        	
            $preHeader['email'] = $this->_session_email();
            $preHeader['userid'] = $this->_session_uid();
        }
        
    	
        // assign all common param to view
        $this->load->view('common/preheader_view', $preHeader);
    }
    
    protected function _session_uid()
    {
        $user_id = trim($this->session->userdata('uid'));
        $user_id = (int) $user_id;
        $user_id = $user_id > 0 ? $user_id : 0;
        return $user_id;
    }

    protected function _session_email()
    {
        $email = $this->session->userdata('email');
        $email = strtolower($email);
        $email = preg_match('/^[a-z0-9\@_\-\.]+$/', $email) ? $email : '';
        return $email;
    }

    protected function _session_role()
    {
        $role = trim($this->session->userdata('role'));
        return $role;
    }
    protected function _session_offset()
    {
        $offset = trim($this->session->userdata('offset'));
        return $offset;
    }

    protected function _islogin()
    {
        $user_id = $this->_session_uid();
        $email = $this->_session_email();
        return ($user_id > 0 && $email != '') ? TRUE : FALSE;
    }
}