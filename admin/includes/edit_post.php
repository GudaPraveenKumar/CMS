<?php

if(isset($_GET['p_id'])){
    $post_id = $_GET['p_id'];
    }

if(isset($_POST['update_post'])){
    
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $tags = $_POST['tags'];
    $content = $_POST['content'];
    $date = date('d-m-y');
    $comment_count = 4;

    move_uploaded_file($image_temp, "../images/$image");
    
    if(empty($image)){
        
        $query = "select * from posts where id = {$post_id}";
        
        $result = mysqli_query($connection, $query);
        check_query_execution($result);
        while($row = mysqli_fetch_assoc($result)){
            $image = $row['image'];
        }
    }

    $query = "update posts set title = '{$title}', category_id = {$category_id}, author ='{$author}', status = '{$status}', image = '{$image}', tags = '{$tags}', content = '{$content}', date = now(), comment_count = {$comment_count} where id = {$post_id}";

    $result = mysqli_query($connection, $query);

    check_query_execution($result);

}

$query = "select * from posts where id = {$post_id}";
    $result = mysqli_query($connection, $query);
    check_query_execution($result);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

            $post_id = $row['id'];
            $post_author = $row['author'];
            $post_title = $row['title'];
            $post_category = $row['category_id'];
            $post_status = $row['status'];
            $post_image = $row['image'];
            $post_tags = $row['tags'];
            $post_comments = $row['comment_count'];
            $post_content = $row['content'];
            $post_date = $row['date'];
        }
    }

?>



<form action="" method="post" enctype="multipart/form-data">
    
    <h3>Edit Post</h3>
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" name="title" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_category">Post Category</label>
        
      
        <select name="category_id" id="">
            <?php
                $query = "select * from categories";
                $result = mysqli_query($connection, $query);
                check_query_execution($result);
            
                while($row = mysqli_fetch_assoc($result)){
                    print_r($row);
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_name}</option>";
                }
                      
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" name="author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" value="<?php echo $post_status; ?>" name="status" class="form-control">
    </div>
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" />
        <input type="file" name="image" />
    </div>
    
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" name="tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="content">Post Cotents</label>
        <textarea class="form-control" name="content" id="" cols="25" row="10"><?php echo $post_content; ?>
        </textarea>
        
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Update Post" name="update_post">
     </div>

</form>