<?php
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once('../core/initialize.php');
   
    //instantiade post
    $post = new Post($db);
    //blog post query
    $result = $post->read();
    //get the row count
    $num = $result->rowCount();
    if($num>0){
        $post_arr = array();
        $post_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            //create name variable i fill with data from database
            // $my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
            // extract($my_array);
            // echo "\$a = $a; \$b = $b; \$c = $c";
            extract($row);
            $post_item = array(
                'phprest_id' => $phprest_id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                'category_id' => $category_id,
                'category_name' => $category_name
            );
            array_push($post_arr['data'], $post_item);
        }
            //convert to JSON and output 
            echo json_encode($post_arr);
    }else{
        echo json_encode(array('message' => 'No posts found.'));
    }

