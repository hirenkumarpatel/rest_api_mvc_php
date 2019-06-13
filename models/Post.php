<?php


class Post{
    private $connect;

    //post variable
    public $id;
    //creating contructor to db
    public function __construct($db)
    {
        $this->connect=$db;
    }

    // get method to get all posts
    public function get_post()
    {
        $query='SELECT * FROM post ORDER BY created_at DESC';
        
        $result=$this->connect->query($query);
       
        return $result;

       
    }

    //get single post data
    public function get_post_single()
    {
        $query='SELECT * FROM post WHERE id=? LIMIT 0,1';

        //prepared statement and bind statement
        $stmt=$this->connect->prepare($query);
        $stmt->bind_param("i",$this->id);

        //excute prepare stmt
        $stmt->execute();

        //geting result from prepare
       $result= $stmt->get_result();

       // fethcing row data
        $rows=$result->fetch_array();
       
        $post_item=array(
            'id'=>$rows['id'],
            'title'=>$rows['title'],
            'body'=>html_entity_decode($rows['body']),
            'author'=>$rows['author'],
            'created_at'=>$rows['created_at']);
        
        return $post_item;
    }
}

/**
 * To run this API you need to enter data in following format
 * http://localhost/rest_api_mvc/api/post/get_post_single.php?id=1
 */

?>