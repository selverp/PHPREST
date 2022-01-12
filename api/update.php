<?php
//headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: PUT');
    //initializing our api
    include_once('../core/initialize.php');

    //instantiate post
    $post = new Post($db);

    //get row posted data
    $data = json_decode(file_get_contents("php://input"));

    $post->phprest_id = $data->phprest_id;
    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;
    $post->category_id = $data->category_id;

    if($post->update()){
        echo json_encode(
            array('message' => "Post updated.")
        );
    }else{
        echo json_encode(
            array('message' => 'Post not updated.')
        );
    }
?>