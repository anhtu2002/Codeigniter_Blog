
<?php
class Blog_Post_model extends CI_Model
{

    function this_blog($blog_id)
    {
        $postVal = [
        'blog_id' => $blog_id
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/this_blog');
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
    function other_blog()
    {
        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, SERVICE_URL . 'blog/other_blog');
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
}