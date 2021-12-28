<!-- Displaying the all Product  and the Filtered Products  -->
<?php
   require_once "database.php";
   
    $search=$_GET['search'] ?? null;
    if($search){
       $products=displayProd($search);
    }
    else{
      $products=displayData();
    }
?>

<!-- Deleting the Product -->
<?php

  $clicked_del=$_POST['del-click'] ?? null ;
  if($clicked_del){

    $serverName="localhost";
    $username="root";
    $password="";
    $GLOBALS['pdo']=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

    // set the PDO error mode to exception
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




    $id=$_POST['id-del'] ?? null;

    if(!$id){
        header('location:index.php');
        exit;
    }
    try{
        $imgSql="SELECT image FROM products WHERE id=$id";

        $statement=$GLOBALS['pdo']->prepare($imgSql);

        $statement->execute();

        $res=$statement->FetchAll(PDO::FETCH_ASSOC);

        $sql="DELETE FROM products WHERE id=$id ";
        
        if($res!=null){
            unlink($res[0]["image"]);
        }
        $GLOBALS["pdo"]->exec($sql);
        header("location:index.php",true);
    }catch(PDOException $ex)
    {
        echo "error". $ex->getMessage();
    }
    
}


?>

<!-- The Head -->
<?php
  include_once "./views/partials/header.php";
?>
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
         <form action="" method="post">
             <input type="hidden" name="id-del" value=<?= $product['id'] ?>>
             <input type="hidden" name="del-click" value=<?=true?>>
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