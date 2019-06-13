<?php


class Post{
    private $connect;

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
}

?>