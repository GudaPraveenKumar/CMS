<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Category Posts
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                
                if(isset($_GET['category'])){
                    
                    $cat_id = $_GET['category'];
                    
                }
                
                    $post_query = "select * from posts where category_id = {$cat_id}";
                    
                    $post_results = mysqli_query($connection, $post_query);
                    
                    if(!$post_results){
                        die("Query Failed". mysqli_error($connection));
                    }
                    if(mysqli_num_rows($post_results) > 0){
                        
                   
                        while($row = mysqli_fetch_assoc($post_results)){
                            $post_id = $row['id'];
                            $post_title = $row['title'];
                            $post_author = $row['author'];
                            $post_date = $row['date'];
                           $post_content = substr($row['content'], 0, 150);
                            $post_image = $row['image'];
                ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php
                     }
                }else{
                        echo "<h3>No posts found with this category.</h3>";
                    }
                
                ?>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
             <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php 
include "includes/footer.php";        
?>