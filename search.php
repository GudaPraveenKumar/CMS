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
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                
                 
                <!-- First Blog Post -->
                <?php
                    if(isset($_POST['searchsubmit'])){
                        $searchVal = $_POST['searchVal'];
            
                        $query = "select * from posts where tags like '%$searchVal%'";
            
                        $results = mysqli_query($connection, $query);
            
           
                        if(mysqli_num_rows($results)){
                            while($row = mysqli_fetch_assoc($results)){
                                
                                $post_title = $row['title'];
                                $post_author = $row['author'];
                                $post_date = $row['date'];
                                $post_content = $row['content'];
                                $post_image = $row['image'];
                ?>
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php
                           
                            }
                     }else{
                            echo "<h3>No results found</h3>";
                        }
                }
                
                ?>
               
               

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
             <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php 
include "includes/footer.php";        
?>