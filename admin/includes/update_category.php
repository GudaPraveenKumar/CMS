<!--   ------    -------------  php code for updating the category ---------- -------->

<?php

if(isset($_POST['updateCategory'])){
    $cat_title = $_POST['categoryName'];
    $query = "update categories set cat_title = '$cat_title' where cat_id = $cat_id";

    if(empty($cat_title) || $cat_title = ""){
        echo "<small style='color:red'>Please enter the category title</small>";
    }else{
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query failed'. mysqli_error($connection));
        }else{
            header("Location:categories.php");
        }
    }

}

?>

<!--    ------    -------------  php code for showing the form for editing the category ---------- -------->

     <?php

        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            $query = "select * from categories where cat_id = $cat_id";

            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
        ?>

        <form action="" method="post">
            <div class="form-group">Update a category</div>
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $cat_title; ?>" name="categoryName">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update" name="updateCategory">
            </div>
        </form>

    <?php
                }
        }
        if(!$result){
            die('Query failed'. mysqli_error($connection));
        }
    }

    ?>

                            
