
<?php 
    if(isset($_POST['createPost'])){
       
        $title = $_POST['title'];
        $category_id = $_POST['category_id'];
        $author = $_POST['author'];
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $tags = $_POST['tags'];
        $content = $_POST['content'];
        $date = date('d-m-y');
        $comment_count = 0;
        
        move_uploaded_file($image_temp, "../images/$image");
        
        $query = "insert into posts(title, category_id, author, status, image, tags, content, date, comment_count) values('$title', $category_id, '$author', '$status', '$image', '$tags', '$content', now(), $comment_count)";
        
        $result = mysqli_query($connection, $query);
        
        check_query_execution($result);
        
   ?>

<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Post has been created!
  </div>

<?php
        
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    
    <h3>Create A New Post</h3>
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control">
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
        <input type="text" name="author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" name="status" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" name="tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="content">Post Cotents</label>
        <textarea class="form-control" name="content" id="" cols="25" row="10"></textarea>
        
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Create" name="createPost">
     </div>

</form>