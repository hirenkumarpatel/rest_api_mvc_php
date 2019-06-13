<?php

//integrating database and models
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Headers to handle HTTP request
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

//instantiate DB and connect
$database= new Database();
$db= $database->connect();

//Instatiate Post Object and passing connection to post model
$post= new Post($db);

//get post query
$result=$post->get_post();

if($result->num_rows > 0)
{
    //creating array of posts
    $post_array= array();
    $post_array['data']=array();
    
    //looing through result to get all values
    while($rows=$result->fetch_array())
    {
        $post_item=array(
            'id'=>$rows['id'],
            'title'=>$rows['title'],
            'body'=>html_entity_decode($rows['body']),
            'author'=>$rows['author'],
            'created_at'=>$rows['created_at']
        );
        
        //pushing new post item to main array
        array_push($post_array['data'],$post_item);
    }

    //turn post_array to json and output
   echo json_encode($post_array);
}
else{
    // no data
    echo json_encode(
       array('message'=>'No Post Found!') 
    );
}

/**
 * To run this API you need to enter data in following format
 * http://localhost/rest_api_mvc/api/post/getpost.php
 */
?>