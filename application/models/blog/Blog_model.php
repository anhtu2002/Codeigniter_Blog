<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;
class Blog_model extends CI_Model
{
    function create_new_blog($postVal)
    {
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/create_blog');
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
                $rel = isset($response['data']) ? $response['status'] : [];
            }
        }

        return $rel;
    }

    function get_list_blog($offset,$uid)
    {
        $postVal = [
            'offset' => $offset
        ];

        $jwtToken = $this->generateJwtToken($offset);
        $headers = array('Content-Type: application/json', 'Authorization: ' . $jwtToken);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/list_blog');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
            else{
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;

    }

    function get_all_blog($offset_blog)
    {
        $postVal = [
            'offset_blog' => $offset_blog
        ];

        $jwtToken = $this->generateJwtToken($offset_blog);
        $headers = array('Content-Type: application/json', 'Authorization: ' . $jwtToken);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/all_blog');
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postVal));

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $rel = [];
        $response = json_decode($response, true);
        if (is_array($response)) {
            if ($response['status'] == 'SUCCESS') {
                $rel = isset($response['data']) ? $response['data'] : [];
            } else {
                $rel = isset($response['data']) ? $response['data'] : [];
            }
        }

        return $rel;
    }
    function my_blog($offset,$uid)
    {
        
        $postVal = [
            'offset' => $offset,
            'uid' => $uid
        ];


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/my_blog');
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

    function status_blog($id, $status)
    {
        $postVal = [
            'id' => $id,
            'status' => $status
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/status_blog');
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

    

    function cate_list_blog($cate_id)
    {
        $postVal = [
            'cate_id' => $cate_id
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/cate_list_blog');
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
    function blog_first($cate_id)
    {
        $postVal = [
            'cate_id' => $cate_id
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/blog_first');
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