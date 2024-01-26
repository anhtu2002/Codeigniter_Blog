<?php
class Contact_model extends CI_Model
{
    function add_contact($name, $email, $phone, $mess)
    {
        $postVal = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'mess' => $mess
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'contact');
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
    function list_contact()
    {
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'contact/list_contact');
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
    ////
    function status_contact($id)
    {
        $postVal = [
            'id' => $id
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'contact/status_contact');
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

}