<?php

    $serverName="localhost";
    $username="root";
    $password="";

    $pdo=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




    
 function displayData() {
     
        $statement=$GLOBALS["pdo"]->prepare('SELECT * FROM products ORDER BY create_date desc');
        $statement->execute();
        $products=$statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
 }
 function displayProd($searchWord){ 

    $statement=$GLOBALS['pdo']->prepare("SELECT * FROM products WHERE title like :title ORDER by create_date DESC");

    $statement->bindValue(':title',"%$searchWord%");
    $statement->execute();

    $product=$statement->fetchAll(PDO::FETCH_ASSOC);

    return $product;
 }


 

 function createProduct(){

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $title=$_POST["title"];
        $description=$_POST['description'];
        $price=$_POST['price'];
        if($_FILES['image']['name']!=null)
        {
            $image="./images/$title-". count(displayData()) . $_FILES["image"]['name'];
        }
        else{
            $image=null;
        }
        $date=date("Y-m-d H:i:s");


       $img=$_FILES["image"] ?? null;
        if($img){
            move_uploaded_file($img['tmp_name'],$image);
        }

        $statement=$GLOBALS["pdo"]->prepare("INSERT INTO products(title,description,price,image,create_date)
            Values('$title','$description',$price,'$image','$date') ");

        $statement->execute();

        header('location: index.php');

    }


 }


?>