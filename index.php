<?php
    require_once "db.php";

    createCon();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->

    <link rel="stylesheet" href="app.css">
    
    <title>Product crud</title>
  </head>
  <body>
        <div class="container-fluid text-center bg-dark text-light py-2 rounded">
          <h1>Crud Product</h1>
        </div>

        <p class="text-center">
            <a href="create.php" class="btn btn-success m-3" >
                Create Product
            </a>
        </p>


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
    $products=displayData();
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
    ?>
  </tbody>
</table>




  </body>
</html>