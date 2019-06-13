<?php

//import database and model
include_once "../../config/Database.php";
include_once "../../models/post.php";

//import header to handle HTTP request
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

//creating data object of database
$database= new Database();
$db=$database->connect();

//passing database connection to Post Model
$post=new Post($db);

//fetching id to delete post
$post->id=isset($_GET['id'])?$_GET['id']:die();

//call to delete method
if($post->delete()){
    echo json_encode(
        array("message"=>"Post deletd!"));
}
else{
    echo json_encode(
        array("message"=>"Post deletion failed!")
    );
}


/**
 * To run this API you need to enter data in following format
 * http://localhost/rest_api_mvc/api/post/delete.php?id=1
 */


?>