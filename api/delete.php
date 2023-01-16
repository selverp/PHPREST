<?php
//headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: DELETE');
    //initializing our api
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    //string passed via body - ovo je brisanje kada se ne šalju parametri preko params nego se šalju preko body-a
    //$data = json_decode(file_get_contents("php://input"));
    
    //string passed via params - localhost/phprest/api/delete.php?phprest_id=7
    $url_components = parse_url($_SERVER['REQUEST_URI']);

    // Use parse_str() function to parse the string passed via URL
    parse_str($url_components['query'], $params);
        
    $post->phprest_id = $params['phprest_id'];

    if($post->delete()){
        echo json_encode(
            array('message' => "Post deleted.")
        );
    }else{
        echo json_encode(
            array('message' => 'Post not deleted.')
        );
    }
?>