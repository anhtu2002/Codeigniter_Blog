<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;
class User_model extends CI_Model
{
    function login($email, $pass)
    {   
        $postVal = [
            'email' => $email,
            'pass' => $pass
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/login');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));


        $response = curl_exec($ch);
        curl_close($ch);
        
        $rel = [];
        $response = json_decode($response, true);
        if(is_array($response))
        {
            if($response['status'] == 'SUCCESS')
            {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
    }


    function create($name,$email, $avata, $type, $pass,$status)
    {
        $postVal = [
            'user_name' => $name,
            'user_email' => $email,
            'user_ava' => $avata,
            'type'=> $type,
            'pass' => $pass,
            "status" => $status
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/create');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);


        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));


        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            $rel = $response['status'];
        }

        return $rel;
    }


    function list()
    {
       
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/list_user');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
    }


    function info($user_id)
    {
        $postVal = [
            'user_id' => $user_id
,
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/info');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
    }
    //edit
    function edit($postVal)
    {
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/edit');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
    }
    function edit_user($user_id,$type, $status)
    {

        $postVal = [
            'user_id' => $user_id,
            'type' => $type,
            'status' => $status
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/edit_user');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
        ////
        
    }

    function change_passwword($user_id, $old_pas, $new_pas)
    {

        $postVal = [
            'user_id' => $user_id,
            'old_pas' => $old_pas,
            'new_pas' => $new_pas
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'user/change_pass');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = "";
        $response = json_decode($response, true);
        if (is_array($response)) {
            $rel = $response['status'] ;
            
        }

        return $rel;
        ////

    }
    function generateJwtToken($offset)
    {
        global $secretKey;

        $issuedAt   = new DateTimeImmutable();
        $expire     = $issuedAt->modify('+6 minutes')->getTimestamp(); // Add 6 minutes

        $data = [
            'iat'      => $issuedAt->getTimestamp(), // Issued at: time when the token was generated
            'iss'      => $_SERVER['SERVER_NAME'],    // Issuer
            'nbf'      => $issuedAt->getTimestamp(), // Not before
            'exp'      => $expire,                   // Expire
            'offset' => $offset,               // User name
        ];

        return JWT::encode($data, $secretKey = 'tututututututu', 'HS256');
    }
}

