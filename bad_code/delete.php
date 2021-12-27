<?php


    $serverName="localhost";
    $username="root";
    $password="";
 $GLOBALS['pdo']=new PDO("mysql:host${serverName};port=3306;dbname=products_crud",$username,$password);

 // set the PDO error mode to exception
 $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



$id=$_POST['id'] ?? null;

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
    
    


?>