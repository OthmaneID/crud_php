<?php
require_once  "db.php";

createCon();


createProduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="create.css">
    <title>create Product</title>
</head>
<body>
        <div class="container-fluid text-center bg-dark text-light py-2 rounded">
          <h1>Crud Product</h1>
        </div>
    <h1>Create a Product</h1>


    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-group mb-3">
            <label for="Title" class="form-label">Title*: </label>
            <input type="text" name="title" class="form-control" id="Title" required>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">description:</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price*:</label>
            <input class="form-control" type="number" step=".01" name="price" id="price" required>
        </div>
        <div class="form-group mb-3 text-center">
            <label id="label-img" for="image"><strong> Image: </strong>
                <i class="fas fa-images btn btn-outline-warning rounded-circle btn-lg " ></i> <br>
                <span id="file-name" >no file selected</span>
            </label>
            <input type="file" name="image" id="image" hidden>
            <!-- script for showing the selected file name -->
            <script>
                $("#image").change(function(){
                    $("#file-name").text(this.files[0].name);
                })
            </script>
        </div>
        <button type="submit" class="btn btn-primary" >Submit</button>


       
    </form>
</body>
</html>