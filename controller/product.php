<?php


class product{
//three simple actions

//return all the comments
    function all(){
        //use the model to get all the comments from the database
        $products=product_model::all();
        require_once("view/product/index.php");
    }

    //AJAX
    function showAll(){
        $products=product_model::all();
        require_once("view/product/showProducts.php");
    }

//delete a comment
    function delete(){
        //read the id passed over query string
        if(isset($_GET["id"]))
            $id=$_GET["id"];
//execute the delete command on the model
        $product=product_model::delete($id);
//return a simple view of confirming the deletion
        require_once("view/product/delete.php");
    }


//add a comment
    function add(){
//read the data send over post method
        if(isset($_POST["name"]) ) {
            $name = $_POST["name"];
//add a new comment using the model
            $product = product_model::add($name);
//return the conformation of succesful insertion
            require_once("view/product/add.php");
        }
    }
}
?>