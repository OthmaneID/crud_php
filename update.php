<?php
 require_once 'db.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    
   $serverName="localhost";
    $username="root";
    $password="";
 $pdo=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

 // set the PDO error mode to exception
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$img=$_FILES["image"]??null;
// Getting the image path if it exicts
    $sql="SELECT image FROM products";

    $statement=$pdo->prepare($sql);
    $statement->execute();

    $image=$statement->fetchAll(PDO::FETCH_ASSOC);
    

$title=$_POST['title'];
$description=$_POST['description'];
$price=$_POST['price'];
$image=$image[0]["image"];
$id=$_POST['id'];
$image_path=$image;
if($img){
    
    // deleting the image Path
    if($image!=null && $_FILES['image']['name']!=null)
    {
        unlink($image);
    }
    if($_FILES['image']['name']!=null)
    {
        //Uploading the new Image to the Images folder
        $image_path="./images/$title-". count(displayData()) . $_FILES["image"]['name'];
        
        move_uploaded_file($img['tmp_name'],$image_path);
    }



}else{
    $image_path=$image;
}

    echo $image_path;
    $sql="UPDATE products SET title='$title',description='$description',price=$price
    ,image='$image_path' WHERE id=$id";

    $statement=$pdo->prepare($sql);

    $statement->execute();


    header('location:index.php',true);

}

?>