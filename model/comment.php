<?php

//a class for dealing with a object comment saving, reading and deleting it from the database
class comment_model{
public $id;
public $nickname;
public $message;
public $email;
public $product_id;

public function __construct($nickname,$message, $email, $id,$product_id) {
      $this->id = $id;
      $this->nickname = $nickname;
      $this->message = $message;
      $this->email  = $email;
      $this->product_id  = $product_id;
}


public static function all(){
//list of al comments
 $list = [];
      $db = Db::getInstance();
         $result = mysqli_query($db,'SELECT * FROM comment');

		while($row = mysqli_fetch_assoc($result)){
			 $list[] = new comment_model($row['nickname'], $row['message'], $row['email'], $row['id'], $row['product_id']);
		}

        return $list;
}

    public static function getComment($id){
        $list = [];
        $db = Db::getInstance();
        $result = mysqli_query($db,"SELECT * FROM comment where id = $id");

        while($row = mysqli_fetch_assoc($result)){
            $list = new comment_model( $row['nickname'], $row['message'], $row['email'],  $row['id'], $row['product_id']);
        }
        return $list;
    }

public static function allFromUser($product_id){
        $list = [];
        $db = Db::getInstance();
        if($result = mysqli_query($db,"SELECT * FROM comment where product_id = $product_id")) {
            while($row = mysqli_fetch_assoc($result)){
                $list[] = new comment_model($row['nickname'], $row['message'], $row['email'],  $row['id'], $row['product_id']);
            }
        }
        return $list;

}


public static function delete($id){

     $db = Db::getInstance();
     $result = mysqli_query($db,"delete from comment where id='$id'");
    return true;

}

public static function add($nickname, $message, $email,$product_id) {

      $db = Db::getInstance();
      $result = mysqli_query($db,"Insert into comment (nickname,message,email,product_id) Values ('$nickname','$message','$email','$product_id')");
	    $id=mysqli_insert_id($db);

	    return new comment_model($nickname, $message, $email,$id,$product_id);
}
}
?>