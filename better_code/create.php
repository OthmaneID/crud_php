<?php


require_once "database.php";

createProduct();

$id=null;
$prod=[
    [
        "image"=>'',
        "title"=>"",
        "price"=>"",
        "description"=>""
    ]
]

?>


<?php
include_once "./views/partials/header.php";
?>

<body>
        <div class="container-fluid text-center bg-dark text-light py-2 rounded">
          <h1>Crud Product</h1>
        </div>
    <h1>Create a Product</h1>

    <?php
        include_once "./views/Products/form.php";
    ?>
</body>
</html>