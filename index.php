<?php
    require_once "db.php";

    createCon();

    $serverName="localhost";
    $username="root";
    $password="";

    // create connection
    $pdo=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




    $search=$_GET['search'] ?? null;
    if($search){
       $products=displayProd($search);
    }
    else{
      $products=displayData();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="app.css">
    
    <title>Product crud</title>
  </head>
  <body>
        <div class=" text-center container-fluid  bg-dark text-light py-2 rounded">
            <h1>Crud Product</h1>
        </div>

        <p class="text-center">
            <a href="create.php" class="btn btn-success m-3" >
                Create Product
            </a>
        </p>

            <form action="" method="get" >
              <div class="input-group mb-4">
                <input class="form-control" type="text" name="search" id="search" placeholder="Search" value=<?= "$search" ?>>
                <div class="input-group-append">

                  <button class="btn btn-outline-secondary" type="submit" id="btn-search"  >
                    <i class="fas fa-search"></i>
                  </button>
                </div>
            
              </div>
           </form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach($products as $i=>$product):
        echo "<tr>" 
        . "<th scope='row'> ". ($i+1). "</th>";
              
        
        echo"<td>". $product["title"]. "</td>" ;
        
        echo "<td>";
         if($product['image']==null){
            echo "Null";
         }else{
             echo "    <img src='" . $product['image']."' class='rounded' style='height:50px;' alt=''>";
            // echo "<img src="."/>";
         }
         
         echo "</td>";

         echo "<td>";
         echo $product['price'] ." DH"  ;
         echo "</td>";
        
         echo "<td>";
         echo $product['create_date'];
         echo "</td>";
         echo "<td>";?>
         <form action="edit.php" method="get">
             <input type="hidden" name="idE" value=<?= $product['id'] ?>>
         <button type='submit' class='btn btn-outline-danger'>

         </form>
         <?php
         echo  "edit";
         echo"</button>";
         echo "</td>";
         echo "<td>";?>
         <form action="delete.php" method="post">
             <input type="hidden" name="id" value=<?= $product['id'] ?>>
            <button type='submit' class='btn  btn-outline-warning' >
         </form>
         <?php
        //  echo " ";
         echo "delete";
         echo "</button>";
         echo "</td>";
        echo"</tr>";
        endforeach;

        if(count($products)==0){
          echo   "<h3> No Product Found </h3>";
        }
        
    ?>
  </tbody>
</table>




  </body>
</html>