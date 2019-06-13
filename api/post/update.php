<?php
/**
 * Rest API PHP MVC
 *  Update Post
 * @author : Hiren Patel
 */
//integrating database and models
include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Headers to handle HTTP request
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

//instantiate DB and connect
$database= new Database();
$db= $database->connect();

//Instatiate Post Object and passing connection to post model
$post= new Post($db);

//get raw posted data
$data=json_decode(file_get_contents("php://input"));

$post->id=$data->id;
$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;

//update post
if($post->update()){
    echo json_encode(array('Message'=>'Post updated!'));
}else{
   echo  json_encode(array('message'=>'Update post failed!'));
}