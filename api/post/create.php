<?php

//integrating database and models
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Headers to handle HTTP request
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

//instantiate DB and connect
$database= new Database();
$db= $database->connect();

//Instatiate Post Object and passing connection to post model
$post= new Post($db);

//get raw posted data
$data=json_decode(file_get_contents("php://input"));

$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;

//create post
if($post->create()){
    echo json_encode(array('Message'=>'New post created!'));
}else{
   echo  json_encode(array('message'=>'new post failed!'));
}