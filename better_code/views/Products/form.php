

    <form action="" method="post" enctype="multipart/form-data" >
        
            <a class="btn btn-success" style="width:200px;" href="index.php">   go back to Products</a>
       
        
        <input type="hidden" name="id" value=<?=$id ?>>

            <div class="form-group mb-3">
            <label for="Title" class="form-label">Title*: </label>
            <input type="text" name="title" class="form-control" 
            id="Title"   required value=<?=$prod[0]["title"] ?>>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">description:</label>
            <textarea class="form-control" name="description" 
             
            id="description" rows="3">
            <?php echo $prod[0]["description"] ?>
        </textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price*:</label>
            <input class="form-control" type="number" step=".01" 
            name="price" id="price"  required value=<?=$prod[0]["price"] ?> >
        </div>
        <div class="form-group mb-3 text-center">
            <label id="label-img" for="image"><strong> Image: </strong>
                <i class="fas fa-images btn btn-outline-warning rounded-circle btn-lg " ></i> <br>
                <span id="file-name" > <?php  echo(str_replace("./images/","",$prod[0]["image"])) ?>  </span>
            </label>
            <input type="file" name="image" id="image" hidden>
            <!-- script for showing the selected file name -->
            <script>
                $("#image").change(function(){
                    $("#file-name").text(this.files[0].name);
                })
            </script>
        </div>
        <button type="submit" class="btn btn-primary" >submit</button>


       

    </form>