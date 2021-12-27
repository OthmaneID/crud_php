<?php

/** @var $pdo \PDO  */
require_once "database.php";

$id=$_GET['idE'] ?? null;
if(!$id){
    header("location:index.php");
    exit;
}



$sql="SELECT * FROM products WHERE id=$id";

$statement=$pdo->prepare($sql);
$statement->execute();
$prod=$statement->fetchAll(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD']==='POST'){
        

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


<?php
    include_once "./views/partials/header.php";
?>

<body>
        <div class="container-fluid text-center bg-dark text-light py-2 rounded">
          <h1>Crud Product</h1>

          
        </div>
    <h1 class="text-center pt-3" >EDIT a Product</h1>

    <?php
        include_once "./views/Products/form.php";
    ?>
</body>
</html>