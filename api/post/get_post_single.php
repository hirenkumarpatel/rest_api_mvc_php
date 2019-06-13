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

//check if querystring $_GET['id'] set then set it or die ternary if operator used
$post->id= isset($_GET['id'])?$_GET['id']:die();

//creating array of posts
$post_array= array();
$post_array['data']=array();

//get post 
$post_array['data']=$post->get_post_single();

//make json

echo json_encode($post_array);


/**
 * To run this API you need to enter data in following format
 * http://localhost/rest_api_mvc/api/post/get_post_single.php?id=1
 */


?>