<?php


class comment{
//three simple actions

//return all the comments
function all(){
	//use the model to get all the comments from the database
$comments=comment_model::all();
	//push the variable $comments to the view
require_once("view/comment/index.php");
}

//AJAX
function showAll(){
        $comments=comment_model::allFromUser($_GET["product_id"]);
        require_once("view/comment/showComments.php");
}

function allFromUser(){

if(isset($_GET["product_id"]))
    $product_id=$_GET["product_id"];
	//use the model to get all the comments from the database
$comments=comment_model::allFromUser($product_id);
require_once("model/product.php");
$product=product_model::get($product_id);
require_once("view/comment/index.php");

}

//delete a comment
function delete(){
	//read the id passed over query string
if(isset($_GET["id"]))
$id=$_GET["id"];
//$product_id=comment_model::getComment($id)->product_id;
//execute the delete command on the model
$comment=comment_model::delete($id);
//return a simple view of confirming the deletion
require_once("view/comment/delete.php");
}


//add a comment
function add(){
//read the data send over post method
    if(isset($_GET["product_id"])) {
        $nickname = $_POST["user"];
        $message = $_POST["msg"];
        $email = $_POST["email"];
        $product_id = $_GET["product_id"];
//add a new comment using the model
        $comment = comment_model::add($nickname, $message, $email,$product_id);
//return the conformation of succesful insertion
        require_once("view/comment/add.php");
    }
}


}
?>